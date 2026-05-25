# HANDOFF — Anandiitaa Seamless Background Redesign

> Context handoff for a fresh Claude session. Read this top-to-bottom before touching anything.
> Project: WordPress theme at `my-custom-theme/`. Local dev via Docker (`docker-compose.yml`, WP on **localhost:8084**). Live dev site: **dev-anandiitaa.pantheonsite.io** (Pantheon).

---

## 1. The big goal

Make the whole site's background **seamless** — one continuous look with **no hard borders/seams between sections**. The chosen approach:

1. A single **CSS gradient on `<body>`** flows behind everything (all pages).
2. Each section's old full-bleed background image is replaced by a **transparent-background "sticker"** (product/scene cutout PNG) that floats on the gradient.
3. Sections that don't need imagery are **gradient-only** (no image).

This replaces the previous design where each section had its own opaque background image (which created visible seams).

---

## 2. The gradient (source of truth)

In `style.css`, on `html, body` (~line 107):

```css
background: linear-gradient(90deg, #feebc7 0%, #fcf9f3 100%);
background-attachment: fixed;
```

- Direction **90deg** (left→right), `#feebc7` → `#fcf9f3`. Client-approved.
- `fixed` so it stays put while content scrolls = no seam.
- Applies to **every page** (single rule on body, no per-page overrides).
- The original `background: var(--brand-cream)` is **commented out, not deleted** (see marker convention below).

Brand palette: `--brand-maroon #6b0f1a`, `--brand-cream #f5ebd2`, `--brand-yellow #f0c869`, accents `#76112D #9D2745 #BA3656 #CD3F60 #2a1810`.

---

## 3. Revert convention — `SEAMLESS_BG_TEST`

**Every change for this redesign is tagged with a `SEAMLESS_BG_TEST` comment.** Original code is commented out (not removed) right next to the new code. To find everything or revert:

```bash
grep -rn "SEAMLESS_BG_TEST" my-custom-theme/
```

Keep using this marker for any new change so the client can roll back.

---

## 4. Cache-busting — IMPORTANT, recently changed

We **removed `filemtime()` auto-busting** and switched to a **single manual version constant**, because the mixed caching layers were causing confusion during iteration.

- **`functions.php` line ~8:** `define( 'ANANDIITAA_VER', '3' );` — drives ALL asset versions (CSS, JS, images via `anandiitaa_bust()`). 
- **`service-worker.js` line ~28:** `const CACHE_VERSION = 'v3';` — the SW cache namespace; bumping it purges all SW caches on next load.

**Workflow now: after any change you want clients to refetch, BUMP `ANANDIITAA_VER` (e.g. '3'→'4'), and bump `CACHE_VERSION` too for a full purge.** They're both at `3` right now — keep them in step. If you forget to bump, clients keep serving stale assets (this is the tradeoff the user accepted vs filemtime).

SW behavior (`service-worker.js`): HTML = network-first; theme assets (`/wp-content/themes/...`) = stale-while-revalidate (keyed by full URL incl. `?v=`); `skipWaiting()` + `clients.claim()` so a new SW takes over immediately.

---

## 5. Breakpoint / resolution tiers

The site serves resolution-specific images + has tier-specific CSS. Tiers (width-based):

| Tier | Width range | Image folder | CSS media | Status |
|------|-------------|--------------|-----------|--------|
| **mac** | `≥1440px` | `/mac/` | `@media (min-width:1440px)` | done (primary design target) |
| **d1366** | `1281–1439px` | `/d1366/` | (CSS tuning NOT done yet) | images done; **CSS pending** |
| **d1280** | `1101–1280px` | `/d1280/` | (not started) | **NOT STARTED** |
| base/laptop | `<1440` fallback | `/laptop/` | base rules | original design |
| tablet | `≤1100px` | — | standards → 1-col | existing |
| mobile | `≤700px` | — | — | existing |

Images are chosen via `<picture>` with stacked `<source media>` — each tier source is **bounded top AND bottom** (e.g. `(min-width:1281px) and (max-width:1439px)`) so tiers don't bleed into each other. First matching `<source>` wins; `<img>` is the laptop fallback.

---

## 6. Asset folder structure

```
my-custom-theme/images/home/
  ├── mac/        (≥1440)  1.png..5.png, sections/6.png..11.png, sections/6-sticker.png
  ├── laptop/     (<1440 fallback)  *.png + *-sticker.png, slider/, sections/
  ├── d1366/      (1281-1439)  slider/slide-1-sticker.png, 2-5-sticker.png, sections/{6,7,9}-sticker.png, sections/11.png
  └── phone/

my-custom-theme/assets/images/products/{jaggery,sugar}/
  ├── mac/        *-slide-1-new.png  (transparent stickers)
  ├── d1366/      *-slide-1.png      (1366 stickers)
  └── *-slide-1.png  (laptop fallback — STILL OLD non-transparent for jaggery/sugar)
```

**Naming:** `d1366` mirrors the `laptop` path 1:1 so the PHP mapper is mechanical (`str_replace('/laptop/','/d1366/')`).

---

## 7. How home slides render — `front-page.php`

- `$slides` array (slides 1–5 = carousel, 6–11 = standalone `.page-section`).
- `render_slide()` builds a `<picture>`:
  - `mac_url_for()` + `mac_exists()` → mac `<source media="(min-width:1440px)">`
  - `d1366_url_for()` + reuses `mac_exists()` → d1366 `<source media="(min-width:1281px) and (max-width:1439px)">`
  - `<img>` = laptop fallback
- A slide with `'image' => ''` renders **no `<div class="hero-slide__bg">`** (guarded) = gradient-only.

**To add a d1280 tier:** add `$d1280_url_for` (maps `/laptop/`→`/d1280/`), compute `$has_d1280`, emit a `<source media="(min-width:1101px) and (max-width:1280px)">`. Product pages have **hardcoded** `<picture>` blocks (not the mapper) — edit each manually.

### Per-section background status (homepage)
| # | Section | Background |
|---|---------|-----------|
| 1 | Hero "Choose Pure" | sticker (slider/slide-1-sticker.png) |
| 2-5 | Carousel | stickers (2-5-sticker.png) |
| 6 | The Anandiitaa Standards | sticker |
| 7 | News clippings "Not all jaggery..." | sticker |
| 8 | Product grid | **gradient-only** (intentional) |
| 9 | Benefits of Jaggery | sticker |
| 10 | Reviews | **gradient-only** (intentional) |
| 11 | Social CTA | image `11.png` — **OPAQUE, see open items** |

---

## 8. Sticker fade (mask)

Stickers get a soft top/bottom fade so edges dissolve into the gradient (no seam):

```css
.hero-slide__bg img[src*="-sticker"] {
    mask-image: linear-gradient(180deg, transparent 0%, #000 6%, #000 94%, transparent 100%);
}
```

- Targets only `*-sticker.png` filenames → old full-bleed slides untouched.
- Benefits section (`.page-section--benefits`) has the **bottom fade removed** per client request (top fade kept).
- **Section 11 (`11.png`) does NOT match `-sticker`** → no fade → hard edges (open item).

---

## 9. THE ACTIVE ISSUE — viewport HEIGHT at 1366×768  ⚠️ most important

**Client on a real Windows 1366×768 laptop sees text overlapping content.** Reproduced on LambdaTest/BrowserStack at 1366×768, but the user's own Windows PC test "looked fine."

### Root cause (confirmed in CSS, not yet fixed)
- `.page-section { height: 100vh; }` — every section is exactly one viewport tall.
- Titles are `position: absolute; top: 18%` (e.g. `.benefits-title`) with `font-size: var(--fs-heading)` = **57px**.
- **"1366×768" is the screen resolution, not the viewport.** On a real Windows Chrome, tabs+address bar+bookmarks (~110-140px) + taskbar (~48px) eat the height → actual usable viewport ≈ **1366 × 600**, not ×768.
- At ~600px height: 100vh section = 600px, title at 18% ≈ 108px, big font, content (cards/products) fills the rest → **content rides up over the title** → overlap.

### Why the user's PC "worked" but client/LambdaTest didn't
User tested with more height (bigger monitor / full-height window / DevTools responsive giving full 768 with no chrome). Real device = ~600px viewport. **`window.innerHeight` is the number that matters, not the resolution.** Test at `innerHeight ≈ 600` (set responsive mode to **1366 × 625**) to reproduce.

### The 3 confirmed overlap spots (QA checklist)
1. **Slide 1 hero** — "Choose Pure. Choose Anandiitaa." title overlaps the product packets.
2. **Section 7 news** — "Not all jaggery is made the same." caption overlaps the newspaper headlines.
3. **Section 9 benefits** — "The Benefits of Jaggery" title collides with / sits behind the benefit cards.

### Planned fix (height-aware — NOT started, await user go-ahead)
Font-size reduction alone won't fix it. Plan:
- Relax `height: 100vh` on these sections → `min-height` + allow auto growth so content never gets crushed.
- Stop absolutely-positioning titles **over** content — let titles flow above (normal flow) or push content down so they can't collide.
- Add `@media (max-height: 700px)` rules to compress spacing + shrink title fonts on short viewports. **Height-based, not just width-based**, because two machines at "1366 wide" can have very different heights.
- Proposed approach: do **section 9 (benefits) first as proof-of-concept**, confirm at `innerHeight ≈ 600`, then roll across slide 1 + section 7.

---

## 10. Free testing (no fees/limits)
- **DevTools responsive mode at 1366 × 625** (≈ real usable height) — reproduces the client view free, right now.
- **Playwright** (free, open-source) — script `viewport:{width:1366,height:625}`, screenshot. Best free repeatable tool.
- **Real Windows PC** at 1366×768 native + maximized Chrome → real ~600px viewport. (User is setting this up now.)
- **Microsoft free Windows VM** + VirtualBox — only if no real Windows hardware.
- Avoid: Responsively App (Mac underneath — won't show Windows chrome height/scrollbar). Note Windows scrollbar eats ~17px width too.

---

## 11. Open items / TODO
1. **CSS height-aware fixes** for the 3 overlap spots (section 9 first). ← next big task, waiting on user's Windows test box.
2. **Section 11 asset** is **opaque (no alpha) + 2MB + gets no fade** (filename `11.png`, not `*-sticker`). Decide: accept full-bleed, or get a transparent version named `11-sticker.png`.
3. **d1280 tier** (1101–1280px) — not started. Same process: `/d1280/` assets + `d1280_url_for` + `<source>` + CSS.
4. **Image compression** — no pngquant/optipng in the env. Some 1366 files are heavy: section 7 (~1MB), section 9 (~1.49MB), section 11 (~2MB). Compress before client handoff.
5. **Product/about laptop fallbacks** (`<1281`) are still the OLD non-transparent images — only mac + d1366 are stickers so far.

---

## 12. Quick facts
- Run local: `docker compose up -d` → localhost:8084. Python static test servers exist for `header-tests/` and `background-tests/` (concept demos).
- `vendor/` is **tracked** (do NOT untrack — Carbon Fields dependency, would break other machines).
- Test folders `header-tests/` and `background-tests/` are tracked intentionally.
- Caveman comms mode was active in the session (terse style) — not relevant to code.
- After editing code, the project convention is to bump `ANANDIITAA_VER` + `CACHE_VERSION` so changes show.
