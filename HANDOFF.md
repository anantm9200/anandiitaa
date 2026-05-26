# HANDOFF — Anandiitaa Seamless Background + Responsive Redesign

> Context handoff for a fresh Claude session. Read top-to-bottom before touching anything.
> Project: WordPress theme at `my-custom-theme/`. Local dev via Docker (`docker-compose.yml`, WP on **localhost:8084**). Live dev site: **dev-anandiitaa.pantheonsite.io** (Pantheon). Brand: Anandiitaa (desi jaggery + refined sugar).
> Last updated: this covers the full seamless-bg work + the responsive tier build-out (mac / 1366 / 1280) + the desktop 1920 hero + the graphify knowledge graph.

---

## 0. TL;DR — how to not break things
1. **After ANY change, bump BOTH version constants** (see §4) or the client won't see it. Currently at **`24` / `v24`**.
2. **Tag every change `SEAMLESS_BG_TEST`** and comment out (never delete) the old code (see §3).
3. **The real responsive variable is viewport HEIGHT, not width/resolution** (see §9). Test at the actual `window.innerHeight`, not "1366×768".
4. **Don't change a slide's base `'image'` to a non-`/laptop/` path** — the tier mappers derive from `/laptop/` (see §7). Use `'mac_image'` for desktop-only swaps.
5. The `.about-page` empty-ruleset lint warning is **pre-existing and harmless** — ignore it.

---

## 1. The big goal
Seamless site background — one continuous look, **no hard seams between sections**:
1. Single **CSS gradient on `<body>`** flows behind everything (all pages).
2. Each section's old opaque full-bleed image → a **transparent "sticker"** PNG floating on the gradient.
3. Sections that don't need imagery are **gradient-only** (no image).

---

## 2. The gradient (source of truth)
`html, body` in `style.css` (~line 107):
```css
background: linear-gradient(90deg, #feebc7 0%, #fcf9f3 100%);
background-attachment: fixed;
```
90deg L→R, `#feebc7 → #fcf9f3`, client-approved, fixed, all pages. Original `background: var(--brand-cream)` commented out above it.

Palette: `--brand-maroon #6b0f1a`, `--brand-cream #f5ebd2`, `--brand-yellow #f0c869`, accents `#76112D #9D2745 #BA3656 #CD3F60 #2a1810`.

---

## 3. Revert convention — `SEAMLESS_BG_TEST`
Every redesign change is tagged with a `SEAMLESS_BG_TEST` comment; the old code is commented out right beside the new code. To see/revert everything:
```bash
grep -rn "SEAMLESS_BG_TEST" my-custom-theme/
```
Keep using this marker.

---

## 4. Cache-busting — MUST bump after every change
We removed `filemtime()` auto-busting in favor of one manual constant (the mixed caching layers caused confusion during iteration).
- **`functions.php` (~line 8):** `define( 'ANANDIITAA_VER', '24' );` → drives ALL asset versions (CSS, JS, images via `anandiitaa_bust()`).
- **`service-worker.js` (~line 28):** `const CACHE_VERSION = 'v24';` → SW cache namespace; bumping purges SW caches on next load.

**Workflow: after any change, bump BOTH (e.g. 24→25, v24→v25).** They've moved in lockstep all session. Forget to bump = stale assets served. SW: HTML = network-first; theme assets = stale-while-revalidate keyed by `?v=`; `skipWaiting()` + `clients.claim()` so a new SW takes over immediately.

---

## 5. Breakpoint / resolution tiers — ALL THREE DESKTOP TIERS DONE
| Tier | Width | Image folder | CSS block (end of style.css) | Status |
|------|-------|--------------|------------------------------|--------|
| **mac** | `≥1440px` | `/mac/` | `@media (min-width:1440px)` | done (primary) |
| **d1366** | `1281–1439px` | `/d1366/` | `@media (min-width:1281px) and (max-width:1439px)` | **done** (images + serving + layout) |
| **d1280** | `1101–1280px` | `/d1280/` | `@media (min-width:1101px) and (max-width:1280px)` | **done** (images + serving + layout) |
| base/laptop | `<1440` fallback | `/laptop/` | base rules | original design |
| tablet | `≤1100px` | — | `@media (max-width:1100px)` | standards → 1-col |
| mobile | `≤700px` | — | `@media (max-width:700px)` | existing |

Plus **height-based font scaling** (independent of width — see §9):
- `@media (max-height: 800px)` → `--fs-heading:45px; --fs-subtext:24px; --fs-body:18px` (designer's small-screen spec)
- `@media (max-height: 620px)` → `--fs-heading:38px; --fs-subtext:22px`
- The **1280 width block overrides fonts** to `30/18/16` (designer-agreed compact scale for the ~560px viewport).

Image selection: `<picture>` with stacked `<source media>`, each tier **bounded top AND bottom** so they don't bleed. First match wins; `<img>` = laptop fallback.

---

## 6. Asset folder structure
```
my-custom-theme/images/home/
  ├── mac/        (≥1440) 1-5.png, sections/, AND home-hero-1920.png (desktop slide-1 hero, see §8)
  ├── d1366/      (1281-1439) slider/slide-1-sticker.png, 2-5-sticker.png, sections/{6,7,9}-sticker.png + 11.png
  ├── d1280/      (1101-1280) same layout as d1366 (carousel assets refreshed with new "juicy" set)
  ├── laptop/     (<1101 fallback) *-sticker.png + originals
  └── phone/

my-custom-theme/assets/images/products/{jaggery,sugar}/
  ├── mac/        *-slide-1-new.png (transparent)
  ├── d1366/      *-slide-1.png
  ├── d1280/      *-slide-1.png
  └── *-slide-1.png  (laptop fallback — STILL OLD non-transparent, see open items)
```
`d1366`/`d1280` mirror the `laptop` path 1:1 so the PHP mapper is a mechanical `str_replace`.

**Per-section background status (homepage):** 1-5 carousel = stickers; 6 standards = sticker; 7 news = sticker (`.page-section--news`, see §10); 8 product grid = **gradient-only**; 9 benefits = sticker; 10 reviews = **gradient-only**; 11 social = `11.png` **opaque, no alpha** (open item).

---

## 7. Image serving — `front-page.php` `render_slide()`
Builds `<picture>` with mappers + existence checks:
- `mac_url_for()` / `'mac_image'` → `<source media="(min-width:1440px)">`
- `d1366_url_for()` → `<source media="(min-width:1281px) and (max-width:1439px)">`
- `d1280_url_for()` → `<source media="(min-width:1101px) and (max-width:1280px)">`
- `<img>` = laptop fallback. `'image' => ''` renders NO `hero-slide__bg` (gradient-only guard).

**CRITICAL gotcha:** the d1366/d1280/mac mappers do `str_replace('/images/home/laptop/', '/images/home/dXXXX/', base_image)`. If a slide's base `'image'` is NOT under `/laptop/`, the mappers return it unchanged → every tier resolves to that one image. That's why the desktop 1920 hero is wired as **`'mac_image'`** (explicit ≥1440 source), NOT by changing the base `'image'`.

Product pages (`page-products-jaggery.php`, `page-products-sugar.php`) have **hardcoded** `<picture>` blocks (mac + d1366 + d1280 sources + `<img>`) — edit each manually, no mapper.

---

## 8. Desktop hero (slide 1) — the 1920×1080 image
`front-page.php` slide-1 config has:
- `'image' => '.../laptop/slider/slide-1-sticker.png'` (base → drives d1366/d1280 + fallback)
- `'mac_image' => '.../images/home/mac/home-hero-1920.png'` → **desktop-only (≥1440)** hero, a test image.

So: ≥1440 = the 1920 image; 1281-1439 = d1366 sticker; 1101-1280 = d1280 sticker; <1101 = laptop sticker. Revert the desktop hero by deleting the `'mac_image'` line.

---

## 9. ⚠️ THE CORE INSIGHT: viewport HEIGHT, not resolution
Client saw overlaps at "1366×768" that the dev couldn't reproduce. Root cause: **"1366×768" is the screen resolution, not the browser viewport.** Real Windows Chrome eats ~110-160px (tabs + address bar + taskbar), so the usable viewport at 1366×768 is **~600–680px tall**, and at 1280×720 it's **~560px**.

Sections are `height: 100vh`; titles are `position:absolute; top:X%` with big fonts. On a short viewport they collide/clip. This is why:
- **Font scaling is keyed on `@media (max-height: …)`**, not width — the same overlap hits any short viewport.
- **Test at the real `window.innerHeight`** (DevTools responsive `1366×625` / `1280×560`), NOT at ×768/×720.

**Absolute-positioned content can't auto-grow the frame.** Captions/grids/titles are all `position:absolute`, so they don't push section height — a section with only absolute children stays exactly its `min-height`/`100vh`. So "let the frame grow to fit" requires giving it an explicit taller floor (see §10 B-selective), not `height:auto` (which collapses).

---

## 10. The CSS tier blocks (all at the END of style.css, so they win the cascade)
Read these in order; they're the live state. Tune values here.

**`@media (max-height: 800px)`** — fonts 45/24/18; `.hero-slide__content--top-center{top:6%}`; `--top-caption{top:4%}`; `.benefits-title{top:5%}`; `.benefits-grid{bottom:12%}`.

**`@media (max-height: 620px)`** — fonts 38/22; `.benefits-title{top:3%}`; `.benefits-grid{bottom:8%}`.

**`@media (min-width:1281px) and (max-width:1439px)` — 1366 tier:**
- header shrunk: `.site-header{padding:8px ...}`, `.logo img{height:26px}`
- slide-1 hero: `--top-center{top:10%}`, its `h2{font-size:36px;margin-bottom:10px}` (shrunk so 2-line title clears header), `.btn{padding:9px 24px;font-size:0.74rem;margin-top:0}`
- standards title `{top:7%}`; benefits grid `{bottom:37%}`; reviews title `{top:calc(14% - 78px)}`; bottom-center caption `{bottom:calc(12% - 70px)}`
- reviews shrink: `.reviews-grid{top:56%;transform:translate(-50%,-50%);gap:36px}`, `.review-card__image{aspect-ratio:3/1}`, body padding tightened
- slide-8 grid: `.products-grid{width:86%;max-width:1140px}` + hover `transform:translateY(-6px) scale(1.03)` (stops top-row packet cutoff on hover)

**`@media (min-width:1101px) and (max-width:1280px)` — 1280 tier:**
- fonts overridden `30/18/16`
- header `padding:7px ...`, `.logo img{height:24px}`
- hero `--top-center{top:8%}`; standards `{top:10%}`; benefits-title `{top:10%}`; benefits-grid `{bottom:28%}`
- reviews: title `{top:9%}`, grid `{top:58%;translate(-50%,-50%);gap:28px}`, `.review-card__image{height:182px}` (explicit px, NOT aspect-ratio — see note), body padding tightened
- slide-8 grid `{width:84%;max-width:1080px}` + softer hover
- **Carousel image-fit hacks REMOVED** — was `contain + scale(1.2) + horizontal mask-fade`; reverted because the new properly-sized 1280×720 assets fill correctly with default `cover`.

**`.page-section--news`** (global, B-selective): `height:auto; min-height:max(100vh, 760px)` — gives the dense news slide (7) a taller frame floor on short viewports so its absolute captions don't crowd/clip. On mac it stays 100vh. **This is the B-selective pattern**: to fix other overflowing slides, add `'type' => 'X'` in front-page.php → `.page-section--X` → `min-height:max(100vh, Npx)`.

Notes: `mask-composite` proved unreliable cross-browser — use single `linear-gradient` masks. Explicit `height` beats `aspect-ratio` when you need a forceful shrink.

---

## 11. Open items / TODO
1. **B-selective is applied to slide 7 (news) only.** If other dense slides clip on short viewports, apply the same `--type` + `min-height:max(100vh,Npx)` recipe. (760px on slide 7 is the current dial.)
2. **Section 11 (social)** uses `11.png` — **opaque (no alpha), ~2MB, no fade mask** (filename lacks `-sticker`). Decide: accept full-bleed, or get a transparent `11-sticker.png`.
3. **Product/about laptop fallbacks** (`<1101`) are still the OLD non-transparent images — only mac/d1366/d1280 are stickers.
4. **Image compression** — no pngquant/optipng in the env; several assets are heavy (section 7/9/11 ~1-2MB). Compress before client handoff. Plan in docs: PNG→WebP.
5. **Desktop 1920 hero is a test** (`mac_image`); confirm with client before finalizing.
6. **About-us page** had its own seamless work (vision section bg, mission/standards font swaps, standards card layout) — see `SEAMLESS_BG_TEST` greps in `page-about.php` + style.css.

---

## 12. Free testing (no fees)
- **DevTools responsive at the real viewport**: `1366×625` and `1280×560` (NOT ×768/×720). Reproduces the client view free.
- **Playwright** (free): script `viewport:{width:1366,height:625}`, screenshot. Best repeatable tool.
- **Real Windows PC** at native res + maximized Chrome → real short viewport. Check `window.innerHeight`.
- Avoid Responsively App (macOS underneath — wrong scrollbar/height). Windows scrollbar eats ~17px width.

---

## 13. graphify knowledge graph (built this session)
A graph of the codebase lives in `graphify-out/` (HTML + GRAPH_REPORT.md + graph.json). Built on the **theme source only** (vendor excluded; images wired as code-references, not vision). `vendor/` = Carbon Fields composer library (the admin carousel repeater), represented as ONE `boots`-edge node off `functions.php`. To query: `/graphify query "..."`, `/graphify explain "X"`, `/graphify path "A" "B"`. Re-run `/graphify . --update` after big changes.

---

## 14. Quick facts
- Run local: `docker compose up -d` → localhost:8084.
- `vendor/` is **tracked** — do NOT untrack (Carbon Fields dep; breaks other machines).
- `header-tests/` + `background-tests/` are tracked concept demos.
- After editing code, bump `ANANDIITAA_VER` + `CACHE_VERSION` (§4).
- Line numbers in this doc drift — the `SEAMLESS_BG_TEST` grep is the durable anchor.
