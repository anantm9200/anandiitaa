# Anandiitaa — Project Context

Long-lived context for this project. Read this at the start of any new chat / session before making non-trivial changes. Update it as decisions land.

## What this site is
Marketing + brand site for **Anandiitaa**, a jaggery & sugar product company. Custom WordPress theme at `my-custom-theme/`. Local dev runs in Docker on `http://localhost:8084` (`docker-compose.yml`).

## Current build approach
Pages are built as **hardcoded PHP templates** with content inlined in arrays (e.g. `$slides` in `front-page.php`, the product hero in `page-products-jaggery.php`).

This is intentional for the build phase — fast iteration on layout, no WP admin overhead.

## WordPress conversion (post-build)

**The client wants to be able to edit the site after deployment.** Layouts and content are *not* fixed long-term — copy will change, slides may be reordered, new reviews/products added, etc.

So once layouts are signed off, **everything currently hardcoded must be migrated to be WP-admin-editable**. Plan:

### Recommended path: ACF (Advanced Custom Fields) + selective Custom Post Types

1. **ACF Pro** for structured content tied to specific pages:
   - Home page → field group "Home Carousel" with a Repeater for slides (image, heading, CTA, features…)
   - Home page → field group "Reviews" with a Repeater (image, name, role, quote)
   - Product pages → field groups for hero image, badge, features
2. **Custom Post Type "Review"** if reviews need their own admin entries (likely yes — client will want to add testimonials over time without touching code).
3. **Custom Post Type "Product"** if the product list grows beyond Jaggery + Sugar.
4. Replace every hardcoded array in PHP templates with `get_field()` / `WP_Query()` calls. Existing foreach loops stay — they already iterate over arrays.
5. Migrate current content into WP admin via the new fields.

### Order of operations
1. Finish all page layouts with hardcoded approach. (← we are here)
2. Get client sign-off on layouts.
3. ACF refactor pass — convert hardcoded → field-driven.
4. Content migration into WP admin.
5. Hand off + train client on editing.

### Skip these (for now)
- **Gutenberg custom blocks** — overkill unless client wants free-form page composition. Not needed for this site's structure.
- **Customizer API** — only relevant for site-wide theme settings (colors, logo). Most content is page-specific.

### Don't refactor too early
Every layout change is *much* cheaper to do in PHP arrays than in ACF field groups. Resist the urge to ACF-ify a section before its design is final.

## Routing notes
- WP permalink structure: `/%postname%/` (set, working).
- Manual `template_include` filter in `functions.php` maps `/products/jaggery` and `/products/sugar` → their templates as a fallback. Real WP pages exist for these slugs (admin-created, parent = Products).
- Header navigation is **hardcoded HTML** in `header.php`, not WP Menu admin. If client wants admin-managed nav post-launch, swap to `wp_nav_menu()` + register menu locations.

## Design system
See `DESIGN.md` for fonts (Appetite Pro / DM Sans / Montserrat — strict, no others), color tokens, and component conventions.

## Asset locations
- Custom fonts: `my-custom-theme/assets/fonts/`
- Images: `my-custom-theme/assets/images/{lifestyle,logo,products,reviews,source}/` and `my-custom-theme/images/home/`
- JS: `my-custom-theme/assets/js/` (`hero-carousel.js`, `header-scroll.js`, `scroll-reveal.js`)

## Performance / image optimization (2026-05-05 audit)

The theme is currently shipping ~900 MB of raster images (`my-custom-theme/images` + `my-custom-theme/assets`). Per-page download weight at the time of audit:

- Home (`/`): ~119 MB across 18 images
- Jaggery (`/products/jaggery`): ~106 MB across 13 images
- Reference: a normal modern page should be **<2 MB**.

### Root causes
1. **PNG everywhere** — including photos that don't need transparency. JPG/WebP of the same photo is 8–20× smaller.
2. **Resolutions far above display needs.** `process/step-4.png` is 3375×3375 (19.9 MB) but renders inside a 280px circle. `jaggery-slide-1.png` is 6000×3375 (16 MB) but the display target is ~1920px.
3. **No `srcset` / responsive variants** — desktop, mobile, slow-connection all pull the same massive file.
4. **Patchy `loading="lazy"`** — covered in some templates but not consistently across every `<img>`.
5. **Dead weight shipped** — `my-custom-theme/images/home/mac/*` (180 MB across 5 files) is referenced by nothing in any template.

### Lossless / visually-lossless wins (the "no 1% loss" tier)
Apply these *before* anything else — they typically yield 95%+ size reduction with zero perceptible quality loss:

1. **Resize to display size.** Cap photos at 1920 px wide (hero) or 800–1200 px (inline). Anything beyond ~2× retina is invisible.
2. **PNG → JPG (or WebP/AVIF) for photos** without transparency. Keep PNG only for logos / badges / anything with alpha.
3. **Run through an optimizer** — Squoosh, TinyPNG, `sharp`, `cwebp`. Even after the above, re-encoding shaves another 30–50%.

Combined: Home goes from 119 MB → ~3–6 MB; Jaggery from 106 MB → ~3–5 MB.

### Markup-level wins (no image edits required)
- Audit and add `loading="lazy"` to every `<img>` except the LCP / first-visible hero image.
- Add `decoding="async"` to all non-critical images.
- Add `fetchpriority="high"` *only* to the LCP image on each page (currently set on slide-1 hero — keep that pattern).

### Cleanup
- Delete `my-custom-theme/images/home/mac/*` (180 MB unreferenced).
- Move `my-custom-theme/assets/images/source/*` (107 MB raw masters) out of the theme — keep on disk separately. Already gitignored.

### Long-term / "right way"
- Upload images via the **WP Media Library** rather than referencing theme paths. WP auto-generates multiple sizes and `wp_get_attachment_image()` emits proper `srcset`.
- `<picture>` with AVIF + WebP + PNG fallback for best per-browser format.
- CDN with on-the-fly transformation (Cloudflare Images, ImgIX, Pantheon image-styles plugin) — source one high-res file, CDN serves the right size on demand.

### Order of operations recommendation
1. Cleanup first (delete unused, move source masters out) — instant 287 MB drop.
2. Lossless tier (resize + convert + optimize) — 95% reduction.
3. Markup audit (`loading="lazy"`, `decoding="async"`).
4. Long-term modernization only after the above is shipped.

## Pages built so far
- **Home** (`front-page.php`) — hero carousel (slides 1–5) + scroll-revealed standalone sections (slides 6–11: Standards, news caption, Products grid, Benefits, Reviews, Social).
- **Products / Jaggery** (`page-products-jaggery.php`) — slide 1 in progress.
- **Products / Sugar** (`page-products-sugar.php`) — placeholder.
- Other pages (Recipes, Blogs, Processing, Community, Contact) — not yet built.

## Dev quick-reference
- Bump `wp_enqueue_style` version in `functions.php` after CSS edits to bust browser cache.
- WP-CLI is installed in the container: `docker exec wp_custom_theme_app wp --allow-root <cmd>`.
- Apache + mod_rewrite live; `.htaccess` has the standard WP block written manually (WP-CLI couldn't auto-write it in this container).
