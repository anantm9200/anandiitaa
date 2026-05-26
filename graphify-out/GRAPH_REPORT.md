# Graph Report - .  (2026-05-26)

## Corpus Check
- Large corpus: 474 files · ~20,800,518 words. Semantic extraction will be expensive (many Claude tokens). Consider running on a subfolder, or use --no-semantic to run AST-only.

## Summary
- 239 nodes · 262 edges · 41 communities detected
- Extraction: 94% EXTRACTED · 6% INFERRED · 0% AMBIGUOUS · INFERRED: 15 edges (avg confidence: 0.76)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Product & Benefit Images|Product & Benefit Images]]
- [[_COMMUNITY_About & Standards Assets|About & Standards Assets]]
- [[_COMMUNITY_Brand & Design Tokens|Brand & Design Tokens]]
- [[_COMMUNITY_Seamless BG Redesign Plan|Seamless BG Redesign Plan]]
- [[_COMMUNITY_Theme Bootstrap & Cache|Theme Bootstrap & Cache]]
- [[_COMMUNITY_ACF Migration Plan|ACF Migration Plan]]
- [[_COMMUNITY_Image Performance Audit|Image Performance Audit]]
- [[_COMMUNITY_Responsive Image Tiers|Responsive Image Tiers]]
- [[_COMMUNITY_Header Scroll Script|Header Scroll Script]]
- [[_COMMUNITY_Admin Editability (CarbonACF)|Admin Editability (Carbon/ACF)]]
- [[_COMMUNITY_Hero Carousel Script|Hero Carousel Script]]
- [[_COMMUNITY_Product Page Routing|Product Page Routing]]
- [[_COMMUNITY_Service Worker Caching|Service Worker Caching]]
- [[_COMMUNITY_Glassmorphic Header|Glassmorphic Header]]
- [[_COMMUNITY_Benefits Accordion Script|Benefits Accordion Script]]
- [[_COMMUNITY_Carousel DOM Contract|Carousel DOM Contract]]
- [[_COMMUNITY_Header Navigation|Header Navigation]]
- [[_COMMUNITY_WebP Conversion Plan|WebP Conversion Plan]]
- [[_COMMUNITY_Sugar Page Template|Sugar Page Template]]
- [[_COMMUNITY_Products Landing Template|Products Landing Template]]
- [[_COMMUNITY_Index Template|Index Template]]
- [[_COMMUNITY_Jaggery Page Template|Jaggery Page Template]]
- [[_COMMUNITY_Header Template|Header Template]]
- [[_COMMUNITY_Footer Template|Footer Template]]
- [[_COMMUNITY_Front Page Template|Front Page Template]]
- [[_COMMUNITY_About Page Template|About Page Template]]
- [[_COMMUNITY_Scroll Reveal Script|Scroll Reveal Script]]
- [[_COMMUNITY_Default Template|Default Template]]
- [[_COMMUNITY_Unbuilt Pages|Unbuilt Pages]]
- [[_COMMUNITY_WP-CLI in Docker|WP-CLI in Docker]]
- [[_COMMUNITY_Style Cache Bust|Style Cache Bust]]
- [[_COMMUNITY_DM Sans License|DM Sans License]]
- [[_COMMUNITY_Appetite Pro License|Appetite Pro License]]
- [[_COMMUNITY_Brand Guidelines PDF|Brand Guidelines PDF]]
- [[_COMMUNITY_About Us Design PDF|About Us Design PDF]]
- [[_COMMUNITY_Sugar Page Design PDF|Sugar Page Design PDF]]
- [[_COMMUNITY_Jaggery Page Design PDF|Jaggery Page Design PDF]]
- [[_COMMUNITY_Home Page Design PDF|Home Page Design PDF]]
- [[_COMMUNITY_BeforeAfter Edit Rule|Before/After Edit Rule]]
- [[_COMMUNITY_PHP Upload Limits|PHP Upload Limits]]
- [[_COMMUNITY_Accent Palette|Accent Palette]]

## God Nodes (most connected - your core abstractions)
1. `ACF Migration Plan` - 11 edges
2. `Image Performance Audit (2026-05-05)` - 10 edges
3. `anandiitaa_bust()` - 9 edges
4. `Batch: site polish + /products landing` - 8 edges
5. `anandiitaa_enqueue_assets()` - 7 edges
6. `Seamless background redesign goal (continuous look, no seams)` - 7 edges
7. `Breakpoint / resolution tiers (mac/d1366/d1280/laptop/tablet/mobile)` - 7 edges
8. `anandiitaa_route_templates()` - 6 edges
9. `Color tokens: --brand-maroon #6b0f1a, --brand-cream #f5ebd2, --brand-yellow #f0c869` - 6 edges
10. `ACTIVE ISSUE: viewport HEIGHT overlap at 1366x768 (~600px usable)` - 5 edges

## Surprising Connections (you probably didn't know these)
- `Visual style: luxury, minimalist, clean; maroon + cream` --semantically_similar_to--> `Color tokens: --brand-maroon #6b0f1a, --brand-cream #f5ebd2, --brand-yellow #f0c869`  [INFERRED] [semantically similar]
  my-custom-theme/context.txt → DESIGN.md
- `HTML5 <picture> responsive image strategy by page+device` --semantically_similar_to--> `Breakpoint / resolution tiers (mac/d1366/d1280/laptop/tablet/mobile)`  [INFERRED] [semantically similar]
  my-custom-theme/context.txt → HANDOFF.md
- `Task 1: seamless scrolling — scroll-snap removed` --semantically_similar_to--> `Seamless background redesign goal (continuous look, no seams)`  [INFERRED] [semantically similar]
  TASKS.md → HANDOFF.md
- `Task 2: no section cuts (snap removal, continuous cream bg)` --semantically_similar_to--> `Seamless background redesign goal (continuous look, no seams)`  [INFERRED] [semantically similar]
  TASKS.md → HANDOFF.md
- `HTML5 <picture> responsive image strategy by page+device` --semantically_similar_to--> `render_slide() builds <picture> with mac/d1366 sources + laptop fallback`  [INFERRED] [semantically similar]
  my-custom-theme/context.txt → HANDOFF.md

## Hyperedges (group relationships)
- **ACF Migration Plan Components** — project_acf_pro, project_field_group_home_carousel, project_field_group_reviews, project_cpt_review, project_cpt_product, project_get_field_call [EXTRACTED 1.00]
- **Image Performance Root Causes** — project_png_everywhere_issue, project_resolution_oversize_issue, project_no_srcset_issue, project_patchy_lazy_loading, project_dead_weight_mac_images [EXTRACTED 1.00]
- **Theme JS bundle enqueued + deferred by functions.php** — functions_anandiitaa_enqueue_assets, hero_carousel_js, scroll_reveal_js, benefits_accordion_js [INFERRED 0.80]
- **render_slide responsive <picture> tiers (mac/d1366/d1280/laptop)** — front_page_render_slide, home_mac_1, slide_1, home_laptop_2_sticker [INFERRED 0.70]
- **Jaggery hero responsive tiers (mac/d1366/d1280/default)** — jaggery_slide_1_new, jaggery_slide_1_d1366, jaggery_slide_1_d1280, jaggery_slide_1 [INFERRED 0.75]
- **Cache-busting mechanism (manual version constants)** — handoff_cache_busting, handoff_anandiitaa_ver, handoff_cache_version, handoff_anandiitaa_bust, handoff_manual_vs_filemtime_rationale [INFERRED 0.85]
- **Responsive resolution tier system** — handoff_breakpoint_tiers, tier_mac, tier_d1366, tier_d1280, handoff_bounded_source_rationale, context_picture_responsive_strategy [INFERRED 0.85]
- **Seamless background redesign system** — handoff_seamless_bg_redesign, design_gradient_spec, handoff_seamless_bg_test, handoff_sticker_fade_mask, handoff_gradient_only_guard, handoff_seamless_bg_rationale [INFERRED 0.80]

## Communities

### Community 0 - "Product & Benefit Images"
Cohesion: 0.07
Nodes (16): 100-natural.png (jaggery), step-1.png (jaggery process), step-2.png (jaggery process), step-3.png (jaggery process), step-4.png (jaggery process), step-5.png (jaggery process), jaggery-slide-1.png (d1280), jaggery-slide-1.png (d1366) (+8 more)

### Community 1 - "About & Standards Assets"
Cohesion: 0.09
Nodes (8): anandiitaa_get_carousel_slides() helper (currently disabled), Why Home page was NOT switched to a page builder, Theme file map (style.css, templates, fonts, images), Hero carousel slides in front-page.php $slides array (type-tagged), $render_slide (front-page.php), anandiitaa_bust(), 11.png (laptop), 11.png (mac)

### Community 2 - "Brand & Design Tokens"
Cohesion: 0.09
Nodes (24): Anandiitaa (jaggery & refined sugar brand), --brand-cream #f5ebd2 (light backgrounds, cards), --brand-maroon #6b0f1a (primary brand color), --brand-yellow #f0c869 (accent, quote mark), Project overview: high-end responsive custom WP theme, no builders, Docker-based local WordPress, localhost:8084, Visual style: luxury, minimalist, clean; maroon + cream, Rule: body text is DM Sans regular 400, never bold (+16 more)

### Community 3 - "Seamless BG Redesign Plan"
Cohesion: 0.09
Nodes (23): HANDOFF — Anandiitaa Seamless Background Redesign, Free testing: DevTools 1366x625, Playwright, real Windows PC, Planned height-aware fix: min-height, flow titles, @media max-height:700px (not started), Rationale: window.innerHeight matters, not 1366x768 resolution (chrome+taskbar eat height), Open item: section 11 (11.png) opaque, no fade, 2MB, 3 confirmed overlap spots: slide 1 hero, section 7 news, section 9 benefits, Live dev site dev-anandiitaa.pantheonsite.io (Pantheon), Rationale: gradient on body + transparent stickers replaces per-section opaque images that created seams (+15 more)

### Community 4 - "Theme Bootstrap & Cache"
Cohesion: 0.13
Nodes (12): Carbon Fields (vendor library), anandiitaa_enqueue_assets(), anandiitaa_get_carousel_slides(), anandiitaa_preconnect_fonts(), anandiitaa_route_templates(), ANANDIITAA_VER, anandiitaa_bust() asset versioning helper, ANANDIITAA_VER constant (functions.php) drives all asset versions (+4 more)

### Community 5 - "ACF Migration Plan"
Cohesion: 0.11
Nodes (20): ACF Migration Plan, ACF Pro (Advanced Custom Fields), Anandiitaa Brand, Custom Post Type: Product, Custom Post Type: Review, Docker Local Dev (localhost:8084), Field Group: Home Carousel (Repeater), Field Groups: Product Pages (+12 more)

### Community 6 - "Image Performance Audit"
Cohesion: 0.12
Nodes (16): ~900MB Raster Image Problem, CDN On-the-fly Transformation, Unused images/home/mac/* (180MB Dead Weight), decoding=async on Non-critical Images, fetchpriority=high on LCP Image, Run Image Optimizer (Squoosh/TinyPNG/sharp/cwebp), Image Performance Audit (2026-05-05), loading=lazy Audit (+8 more)

### Community 7 - "Responsive Image Tiers"
Cohesion: 0.18
Nodes (12): HTML5 <picture> responsive image strategy by page+device, Asset folder structure (images/home + products jaggery/sugar by tier), Rationale: <source> tiers bounded top AND bottom so they don't bleed into each other, Breakpoint / resolution tiers (mac/d1366/d1280/laptop/tablet/mobile), Rationale: d1366 mirrors laptop path 1:1 so PHP mapper is mechanical str_replace, Gradient-only slide guard: image=='' renders no hero-slide__bg, Open item: d1280 tier not started, Open item: product/about laptop fallbacks still old non-transparent images (+4 more)

### Community 8 - "Header Scroll Script"
Cohesion: 0.47
Nodes (3): scheduleHide(), show(), tick()

### Community 9 - "Admin Editability (Carbon/ACF)"
Cohesion: 0.33
Nodes (6): ACF free installed but inactive, Carbon Fields v3.6.9 (code-registered repeater, installed), Carbon Fields home_carousel_slides repeater + features, Spectra v2.19.26 (Gutenberg blocks, active), WP-admin editability decision (logged 2026-05-07), vendor/ is tracked (Carbon Fields dependency, do not untrack)

### Community 10 - "Hero Carousel Script"
Cohesion: 0.6
Nodes (4): go(), render(), start(), stop()

### Community 11 - "Product Page Routing"
Cohesion: 0.4
Nodes (5): Products/Jaggery Page (page-products-jaggery.php), Products/Sugar Page (page-products-sugar.php), Route /products/jaggery, Route /products/sugar, template_include filter (functions.php)

### Community 12 - "Service Worker Caching"
Cohesion: 0.67
Nodes (0): 

### Community 13 - "Glassmorphic Header"
Cohesion: 0.67
Nodes (3): Concept: glassmorphic header (idle-fade), header-scroll.js IIFE (glassmorphic toggle), DOM contract: .site-header.is-scrolled

### Community 14 - "Benefits Accordion Script"
Cohesion: 1.0
Nodes (0): 

### Community 15 - "Carousel DOM Contract"
Cohesion: 1.0
Nodes (2): hero-carousel.js IIFE (autoplay, dots, kbd nav), DOM contract: .hero-carousel + [data-hero-*]

### Community 16 - "Header Navigation"
Cohesion: 1.0
Nodes (2): Hardcoded Header Navigation (header.php), wp_nav_menu() Future Swap

### Community 17 - "WebP Conversion Plan"
Cohesion: 1.0
Nodes (2): Deployment goal: transition PNG to WebP for performance, Open item: image compression (no pngquant/optipng in env)

### Community 18 - "Sugar Page Template"
Cohesion: 1.0
Nodes (0): 

### Community 19 - "Products Landing Template"
Cohesion: 1.0
Nodes (0): 

### Community 20 - "Index Template"
Cohesion: 1.0
Nodes (0): 

### Community 21 - "Jaggery Page Template"
Cohesion: 1.0
Nodes (0): 

### Community 22 - "Header Template"
Cohesion: 1.0
Nodes (0): 

### Community 23 - "Footer Template"
Cohesion: 1.0
Nodes (0): 

### Community 24 - "Front Page Template"
Cohesion: 1.0
Nodes (0): 

### Community 25 - "About Page Template"
Cohesion: 1.0
Nodes (0): 

### Community 26 - "Scroll Reveal Script"
Cohesion: 1.0
Nodes (0): 

### Community 27 - "Default Template"
Cohesion: 1.0
Nodes (1): index.php (default template)

### Community 28 - "Unbuilt Pages"
Cohesion: 1.0
Nodes (1): Unbuilt Pages (Recipes, Blogs, Processing, Community, Contact)

### Community 29 - "WP-CLI in Docker"
Cohesion: 1.0
Nodes (1): WP-CLI in Docker Container

### Community 30 - "Style Cache Bust"
Cohesion: 1.0
Nodes (1): Bump wp_enqueue_style Version (Cache Bust)

### Community 31 - "DM Sans License"
Cohesion: 1.0
Nodes (1): DM Sans - SIL OFL 1.1 license

### Community 32 - "Appetite Pro License"
Cohesion: 1.0
Nodes (1): Appetite Pro - Personal Use Only license

### Community 33 - "Brand Guidelines PDF"
Cohesion: 1.0
Nodes (1): Brand Guidelines (PDF)

### Community 34 - "About Us Design PDF"
Cohesion: 1.0
Nodes (1): About Us - Anandiitaa (PDF reference)

### Community 35 - "Sugar Page Design PDF"
Cohesion: 1.0
Nodes (1): Sugar Page - Anandiitaa (PDF reference)

### Community 36 - "Jaggery Page Design PDF"
Cohesion: 1.0
Nodes (1): Jaggery Page - Anandiitaa (PDF reference)

### Community 37 - "Home Page Design PDF"
Cohesion: 1.0
Nodes (1): Home Page (PDF reference)

### Community 38 - "Before/After Edit Rule"
Cohesion: 1.0
Nodes (1): Coding standard: provide edits as Before/After versions

### Community 39 - "PHP Upload Limits"
Cohesion: 1.0
Nodes (1): PHP upload limits bumped to 128MB via php-uploads.ini

### Community 40 - "Accent Palette"
Cohesion: 1.0
Nodes (1): Accent palette #76112D #9D2745 #BA3656 #CD3F60 #2a1810

## Knowledge Gaps
- **97 isolated node(s):** `index.php (default template)`, `hero-carousel.js IIFE (autoplay, dots, kbd nav)`, `DOM contract: .hero-carousel + [data-hero-*]`, `DOM contract: .site-header.is-scrolled`, `Concept: glassmorphic header (idle-fade)` (+92 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **Thin community `Benefits Accordion Script`** (2 nodes): `closeOther()`, `benefits-accordion.js`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Carousel DOM Contract`** (2 nodes): `hero-carousel.js IIFE (autoplay, dots, kbd nav)`, `DOM contract: .hero-carousel + [data-hero-*]`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Header Navigation`** (2 nodes): `Hardcoded Header Navigation (header.php)`, `wp_nav_menu() Future Swap`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `WebP Conversion Plan`** (2 nodes): `Deployment goal: transition PNG to WebP for performance`, `Open item: image compression (no pngquant/optipng in env)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Sugar Page Template`** (1 nodes): `page-products-sugar.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Products Landing Template`** (1 nodes): `page-products.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Index Template`** (1 nodes): `index.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Jaggery Page Template`** (1 nodes): `page-products-jaggery.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Header Template`** (1 nodes): `header.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Footer Template`** (1 nodes): `footer.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Front Page Template`** (1 nodes): `front-page.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `About Page Template`** (1 nodes): `page-about.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Scroll Reveal Script`** (1 nodes): `scroll-reveal.js`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Default Template`** (1 nodes): `index.php (default template)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Unbuilt Pages`** (1 nodes): `Unbuilt Pages (Recipes, Blogs, Processing, Community, Contact)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `WP-CLI in Docker`** (1 nodes): `WP-CLI in Docker Container`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Style Cache Bust`** (1 nodes): `Bump wp_enqueue_style Version (Cache Bust)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `DM Sans License`** (1 nodes): `DM Sans - SIL OFL 1.1 license`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Appetite Pro License`** (1 nodes): `Appetite Pro - Personal Use Only license`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Brand Guidelines PDF`** (1 nodes): `Brand Guidelines (PDF)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `About Us Design PDF`** (1 nodes): `About Us - Anandiitaa (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Sugar Page Design PDF`** (1 nodes): `Sugar Page - Anandiitaa (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Jaggery Page Design PDF`** (1 nodes): `Jaggery Page - Anandiitaa (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Home Page Design PDF`** (1 nodes): `Home Page (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Before/After Edit Rule`** (1 nodes): `Coding standard: provide edits as Before/After versions`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `PHP Upload Limits`** (1 nodes): `PHP upload limits bumped to 128MB via php-uploads.ini`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Accent Palette`** (1 nodes): `Accent palette #76112D #9D2745 #BA3656 #CD3F60 #2a1810`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Batch: site polish + /products landing` connect `Seamless BG Redesign Plan` to `Brand & Design Tokens`?**
  _High betweenness centrality (0.176) - this node is a cross-community bridge._
- **Why does `Task 7: /products landing page-products.php with two category cards` connect `Seamless BG Redesign Plan` to `About & Standards Assets`?**
  _High betweenness centrality (0.168) - this node is a cross-community bridge._
- **Why does `anandiitaa_bust()` connect `About & Standards Assets` to `Product & Benefit Images`, `Theme Bootstrap & Cache`?**
  _High betweenness centrality (0.076) - this node is a cross-community bridge._
- **What connects `index.php (default template)`, `hero-carousel.js IIFE (autoplay, dots, kbd nav)`, `DOM contract: .hero-carousel + [data-hero-*]` to the rest of the system?**
  _97 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Product & Benefit Images` be split into smaller, more focused modules?**
  _Cohesion score 0.07 - nodes in this community are weakly interconnected._
- **Should `About & Standards Assets` be split into smaller, more focused modules?**
  _Cohesion score 0.09 - nodes in this community are weakly interconnected._
- **Should `Brand & Design Tokens` be split into smaller, more focused modules?**
  _Cohesion score 0.09 - nodes in this community are weakly interconnected._