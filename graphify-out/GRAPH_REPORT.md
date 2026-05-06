# Graph Report - .  (2026-05-06)

## Corpus Check
- 12 files · ~23,981,264 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 296 nodes · 265 edges · 58 communities detected
- Extraction: 92% EXTRACTED · 8% INFERRED · 0% AMBIGUOUS · INFERRED: 22 edges (avg confidence: 0.84)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Community 0|Community 0]]
- [[_COMMUNITY_Community 1|Community 1]]
- [[_COMMUNITY_Community 2|Community 2]]
- [[_COMMUNITY_Community 3|Community 3]]
- [[_COMMUNITY_Community 4|Community 4]]
- [[_COMMUNITY_Community 5|Community 5]]
- [[_COMMUNITY_Community 6|Community 6]]
- [[_COMMUNITY_Community 7|Community 7]]
- [[_COMMUNITY_Community 8|Community 8]]
- [[_COMMUNITY_Community 9|Community 9]]
- [[_COMMUNITY_Community 10|Community 10]]
- [[_COMMUNITY_Community 11|Community 11]]
- [[_COMMUNITY_Community 12|Community 12]]
- [[_COMMUNITY_Community 13|Community 13]]
- [[_COMMUNITY_Community 14|Community 14]]
- [[_COMMUNITY_Community 15|Community 15]]
- [[_COMMUNITY_Community 16|Community 16]]
- [[_COMMUNITY_Community 17|Community 17]]
- [[_COMMUNITY_Community 18|Community 18]]
- [[_COMMUNITY_Community 19|Community 19]]
- [[_COMMUNITY_Community 20|Community 20]]
- [[_COMMUNITY_Community 21|Community 21]]
- [[_COMMUNITY_Community 22|Community 22]]
- [[_COMMUNITY_Community 23|Community 23]]
- [[_COMMUNITY_Community 24|Community 24]]
- [[_COMMUNITY_Community 25|Community 25]]
- [[_COMMUNITY_Community 26|Community 26]]
- [[_COMMUNITY_Community 27|Community 27]]
- [[_COMMUNITY_Community 28|Community 28]]
- [[_COMMUNITY_Community 29|Community 29]]
- [[_COMMUNITY_Community 30|Community 30]]
- [[_COMMUNITY_Community 31|Community 31]]
- [[_COMMUNITY_Community 32|Community 32]]
- [[_COMMUNITY_Community 33|Community 33]]
- [[_COMMUNITY_Community 34|Community 34]]
- [[_COMMUNITY_Community 35|Community 35]]
- [[_COMMUNITY_Community 36|Community 36]]
- [[_COMMUNITY_Community 37|Community 37]]
- [[_COMMUNITY_Community 38|Community 38]]
- [[_COMMUNITY_Community 39|Community 39]]
- [[_COMMUNITY_Community 40|Community 40]]
- [[_COMMUNITY_Community 41|Community 41]]
- [[_COMMUNITY_Community 42|Community 42]]
- [[_COMMUNITY_Community 43|Community 43]]
- [[_COMMUNITY_Community 44|Community 44]]
- [[_COMMUNITY_Community 45|Community 45]]
- [[_COMMUNITY_Community 46|Community 46]]
- [[_COMMUNITY_Community 47|Community 47]]
- [[_COMMUNITY_Community 48|Community 48]]
- [[_COMMUNITY_Community 49|Community 49]]
- [[_COMMUNITY_Community 50|Community 50]]
- [[_COMMUNITY_Community 51|Community 51]]
- [[_COMMUNITY_Community 52|Community 52]]
- [[_COMMUNITY_Community 53|Community 53]]
- [[_COMMUNITY_Community 54|Community 54]]
- [[_COMMUNITY_Community 55|Community 55]]
- [[_COMMUNITY_Community 56|Community 56]]
- [[_COMMUNITY_Community 57|Community 57]]

## God Nodes (most connected - your core abstractions)
1. `Anandiitaa M30 1Kg Bold Grain - Back Pack (Green)` - 16 edges
2. `Anandiitaa S30 1Kg Fine Grain - Back Pack (Blue)` - 16 edges
3. `Home Slider Slide 1 - Anandiitaa Product Lineup` - 13 edges
4. `ACF Migration Plan` - 12 edges
5. `Anandiitaa M30 Premium Refined Sugar Bold Grain 1Kg - Front Pack (Green)` - 11 edges
6. `Anandiitaa S30 Premium Refined Sugar Fine Grain 1Kg - Front Pack (Blue)` - 11 edges
7. `Image Performance Audit (2026-05-05)` - 10 edges
8. `Mac Hero Slide 1 - Anandiitaa Product Family Lineup` - 9 edges
9. `Batch: Site Polish + /products Landing` - 7 edges
10. `Section 7 BG: Collage of newspaper clippings about jaggery food adulteration with red 'IN THE ERA OF' stamp (News)` - 7 edges

## Surprising Connections (you probably didn't know these)
- `ACF Migration Plan` --early_version_of--> `Roadmap: Dynamic Content via the_content() + Custom Fields`  [INFERRED]
  PROJECT.md → my-custom-theme/context.txt
- `my-custom-theme (WP theme dir)` --rationale_for--> `No Builders / No Elementor Decision`  [EXTRACTED]
  PROJECT.md → my-custom-theme/context.txt
- `my-custom-theme (WP theme dir)` --configures--> `Git Strategy: .gitignore Skips OS/Docker/PDFs, Includes Theme Images`  [EXTRACTED]
  PROJECT.md → my-custom-theme/context.txt
- `template_include filter (functions.php)` --uses--> `/products Landing Page (page-products.php)`  [INFERRED]
  PROJECT.md → TASKS.md
- `Hardcoded Header Navigation (header.php)` --describes--> `Sticky Header Convention`  [INFERRED]
  PROJECT.md → my-custom-theme/context.txt

## Hyperedges (group relationships)
- **Three Canonical Brand Fonts** — design_appetite_pro, design_dm_sans, design_montserrat [EXTRACTED 1.00]
- **ACF Migration Plan Components** — project_acf_pro, project_field_group_home_carousel, project_field_group_reviews, project_cpt_review, project_cpt_product, project_get_field_call [EXTRACTED 1.00]
- **Image Performance Root Causes** — project_png_everywhere_issue, project_resolution_oversize_issue, project_no_srcset_issue, project_patchy_lazy_loading, project_dead_weight_mac_images [EXTRACTED 1.00]
- **WordPress asset pipeline (enqueue + handles + JS files)** — functions_anandiitaa_enqueue_assets, functions_handle_hero_carousel, functions_handle_header_scroll, functions_handle_scroll_reveal, functions_handle_benefits_accordion, js_hero_carousel_iife, js_header_scroll_iife, js_scroll_reveal_iife, js_benefits_accordion_iife [EXTRACTED 0.95]
- **Home slide rendering pattern (data + closure + carousel + standalone sections)** — front_page_slides_data, front_page_render_slide, front_page_carousel_section, front_page_section_slides, front_page_icons_map [EXTRACTED 0.95]
- **Theme-owned URL routing flow (filter -> route table -> templates)** — functions_anandiitaa_route_templates, functions_route_table, page_products, page_products_jaggery, page_products_sugar [EXTRACTED 0.95]
- **Jaggery Production Pipeline** — process_step_1_sugarcane_juice_extraction, process_step_2_clarification_boiling, process_step_3_slow_cooking_sugar_forms, process_step_4_moulding_setting_facility, process_step_5_testing_packing_storage [EXTRACTED 1.00]

## Communities

### Community 0 - "Community 0"
Cohesion: 0.09
Nodes (30): Anandiitaa Brand Logo Wordmark, Hindi Devanagari Anandita Wordmark on Packs, Aloe Vera Plant Decorative Element, Beige Cream Textured Background, Anandiitaa Desi Jaggery Maroon Pack, Anandiitaa Desi Jaggery Powder Maroon Pack, Mac Hero Slide 1 - Anandiitaa Product Family Lineup, Jaggery Powder in Wooden Bowl Foreground (+22 more)

### Community 1 - "Community 1"
Cohesion: 0.1
Nodes (20): Wooden bowl photograph showing bold-grain sugar crystals, ANANDIITAA brand wordmark in cream/beige on green background, Pure & Hygienic icon claim, Sulphur Less wax-seal style badge claim, Untouched By Hands icon claim, Hindi/Devanagari name 'आनंदिता' (Anandita), Anandiitaa M30 Premium Refined Sugar Bold Grain 1Kg - Front Pack (Green), Premium Refined Sugar - Bold Grain (product descriptor) (+12 more)

### Community 2 - "Community 2"
Cohesion: 0.11
Nodes (19): Image Architecture: Page x Device Resolution, HTML5 <picture> Responsive Strategy, Deployment Goal: PNG -> WebP, ~900MB Raster Image Problem, CDN On-the-fly Transformation, Unused images/home/mac/* (180MB Dead Weight), decoding=async on Non-critical Images, fetchpriority=high on LCP Image (+11 more)

### Community 3 - "Community 3"
Cohesion: 0.12
Nodes (18): Section 1 Hero Spec (Choose Pure), Section 2 Our Process Spec, Old Typography Fallback (Fraunces/Cooper Black), Luxury Minimalist Clean Visual Style, Appetite Pro Font, Body and Secondary Role, Decorative Unicode Quote Glyphs Convention, DM Sans Font (+10 more)

### Community 4 - "Community 4"
Cohesion: 0.12
Nodes (17): Roadmap: Dynamic Content via the_content() + Custom Fields, Hero Carousel Slides ($slides Array Convention), ACF Migration Plan, ACF Pro (Advanced Custom Fields), Custom Post Type: Product, Custom Post Type: Review, Field Group: Home Carousel (Repeater), Field Groups: Product Pages (+9 more)

### Community 5 - "Community 5"
Cohesion: 0.12
Nodes (16): Barcode and QR code, Best Before 24 Months indicator, Also Try Anandiitaa Desi Jaggery Powder cross-promotion, Sparkling White Crystals feature description, Sulphurless Refining feature description, Untouched By Hands feature description (no human contact), FSSAI License No. 10020022011296, Manufactured/Marketed by Maramant Agro Ltd. with address and contact (+8 more)

### Community 6 - "Community 6"
Cohesion: 0.12
Nodes (16): Barcode and QR code, Best Before 24 Months indicator, Also Try Anandiitaa Desi Jaggery Powder cross-promotion, Sparkling White Crystals feature description, Sulphurless Refining feature description, Untouched By Hands feature description, FSSAI License No. 10020022011296, Manufactured/Marketed by Maramant Agro Ltd. with address and contact (+8 more)

### Community 7 - "Community 7"
Cohesion: 0.19
Nodes (14): Background: Warm cream/beige textured wall with subtle vintage paper feel, Brand: ANANDIITAA (also rendered in Devanagari as आनंदिता) - registered trademark visible on each packet, Composition: Four product packets aligned center-stage on rustic beige background with sugarcane stalks and aloe-like green plants flanking left and right; small bowl of jaggery powder bottom-left and pile of white sugar bottom-right, Design layout: Symmetric hero composition with four packets center-aligned, props framing left/right, no overlay headline copy — product-forward visual, Design palette: Warm cream background contrasted with maroon (jaggery line), green and blue (sugar line) packets — natural, premium, traditional Indian feel, Home Slider Slide 1 - Anandiitaa Product Lineup, Product 1 (leftmost): Maroon/burgundy packet with handle - 'ANANDIITAA Desi Jaggery' featuring 100% Natural badge and round window showing jaggery block, Product 2: Maroon/burgundy packet - 'ANANDIITAA Desi Jaggery Powder' with 100% Natural badge and round window showing powdered jaggery (+6 more)

### Community 8 - "Community 8"
Cohesion: 0.17
Nodes (13): Products/Jaggery Page (page-products-jaggery.php), Products/Sugar Page (page-products-sugar.php), Route /products/jaggery, Route /products/sugar, template_include filter (functions.php), Animations & Effects Across Site, Batch: Site Polish + /products Landing, Benefits-of-Jaggery Polish (+5 more)

### Community 9 - "Community 9"
Cohesion: 0.15
Nodes (13): Home slide 9: Benefits of Jaggery, Section 11 BG: Coconut shell bowl of jaggery powder with wooden spoon and palm frond on dark slate (Social CTA), Section 6 BG: Jaggery powder in clay bowl with sugarcane stalks on burlap and wood (Standards), Section 9 BG: Traditional jaggery cones (bheli) with wooden spoon of jaggery powder on cream backdrop (Benefits of Jaggery), Home slide 11: Social CTA, Home slide 6: Standards, Source: Wooden spoon with jaggery powder beside jaggery cones and chunks (high-res original for section 9), Subject: traditional jaggery cones (bheli/mudda form) (+5 more)

### Community 10 - "Community 10"
Cohesion: 0.22
Nodes (9): Git Strategy: .gitignore Skips OS/Docker/PDFs, Includes Theme Images, Heramb Joshi (Developer), Isolated Docker Env (No Host Bloat), No Builders / No Elementor Decision, Anandiitaa Brand, Docker Local Dev (localhost:8084), Jaggery & Sugar Product Company, my-custom-theme (WP theme dir) (+1 more)

### Community 11 - "Community 11"
Cohesion: 0.25
Nodes (8): Headline copy: 'Action against food adulteration: 700 kg jaggery seized, challans issued in Ludhiana', Headline copy: 'FDA busts food adulteration: Jaggery dyed, paneer faked' (Panaji, Goa), Headline copy: 'Food safety officials seize one tonne of adulterated jaggery in Vellore', Stamp copy: red circular 'IN THE ERA OF' rubber stamp, Section 7 BG: Collage of newspaper clippings about jaggery food adulteration with red 'IN THE ERA OF' stamp (News), Home slide 7: News Clippings, Source: Newspaper-style clippings about food adulteration and jaggery seizures with 'In The Era Of' stamp (high-res original for section 7), Texture: faded newsprint collage with headline cutouts

### Community 12 - "Community 12"
Cohesion: 0.32
Nodes (8): Anandiitaa Premium Refined Sugar - Bold Grain product line, Anandiitaa Premium Refined Sugar - Fine Grain product line, Back-of-pack packaging design (nutritional info, manufacturer details, barcode), Front-of-pack packaging design (brand, product, sulphur-less seal), Anandiitaa Premium Refined Sugar Fine Grain 5Kg - Back of Pack (Blue), Anandiitaa Premium Refined Sugar Bold Grain 5Kg - Back of Pack (Green), Anandiitaa Premium Refined Sugar Fine Grain 5Kg - Front of Pack (Blue, Sulphur Less), Anandiitaa Premium Refined Sugar Fine Grain 1Kg - Front of Pack (Blue, Sulphur Less)

### Community 13 - "Community 13"
Cohesion: 0.29
Nodes (7): Brand: ANANDIITAA (with Devanagari आनंदिता), Composition: Four Anandiitaa product packets standing in a row on textured beige/wall background, with bowl of jaggery powder, aloe vera plants, and sugarcane stalks at base, Laptop Hero Slide 1 - Anandiitaa Product Lineup, Product: Anandiitaa Desi Jaggery (maroon packet, 100% Natural badge), Product: Anandiitaa Desi Jaggery Powder (maroon packet), Product: Anandiitaa Premium Refined Sugar Bold Grain (green packet, Sulphur Less badge), Product: Anandiitaa Premium Refined Sugar Fine Grain (blue packet, Sulphur Less badge)

### Community 14 - "Community 14"
Cohesion: 0.29
Nodes (7): Section 10 BG: Plain cream/beige paper texture, vignette edges (Words That Matter reviews), Section 8 BG: Plain cream/beige paper texture, vignette edges (Products grid), Home slide 8: Products Grid, Home slide 10: Words That Matter (reviews), Source: Plain cream/beige textured paper background (high-res original for section 10), Source: Plain cream/beige textured paper background (high-res original for section 8), Texture: cream/beige aged paper with soft vignette

### Community 15 - "Community 15"
Cohesion: 0.47
Nodes (3): scheduleHide(), show(), tick()

### Community 16 - "Community 16"
Cohesion: 0.6
Nodes (4): go(), render(), start(), stop()

### Community 17 - "Community 17"
Cohesion: 0.5
Nodes (5): Step 1 - Sugarcane Juice Extraction (glass of fresh cane juice with stalks), Step 2 - Clarification (worker stirring boiling cane juice in open pan over furnace), Step 3 - Slow Cooking (assorted sugar crystals, cubes and brown sugar piles on wood), Step 4 - Moulding & Setting (aerial view of sugar/jaggery processing facility with tanks, pipes and chimneys), Step 5 - Testing & Packing (wooden storage shed with bagged and piled finished product)

### Community 18 - "Community 18"
Cohesion: 0.4
Nodes (5): Anandiitaa brand identity, Deep maroon/burgundy brand color (approximately #6B1F2E / dark wine red), ANANDIITAA wordmark logo - bold sans-serif maroon typography with registered trademark symbol, Registered trademark symbol (R in circle) positioned at top-right of wordmark, Bold geometric sans-serif uppercase typography with wide letter spacing, sharp triangular A apexes, and curved bottom edges on letters creating arched baselines

### Community 19 - "Community 19"
Cohesion: 0.5
Nodes (0): 

### Community 20 - "Community 20"
Cohesion: 0.5
Nodes (4): Lifestyle 3 (jpeg) - Anandiitaa Premium Refined Sugar Bold Grain 5Kg pouch (green) with wooden bowl of sugar crystals, Sulphur Less seal, Lifestyle 3 (png) - Anandiitaa Premium Refined Sugar Bold Grain 1Kg pouch (green) with wooden bowl of sugar crystals, transparent background, Subject: Premium Refined Sugar Bold Grain 1Kg green pouch with wooden bowl of crystals, Subject: Premium Refined Sugar Bold Grain 5Kg green pouch with wooden bowl of crystals

### Community 21 - "Community 21"
Cohesion: 0.67
Nodes (3): Sticky Header Convention, Hardcoded Header Navigation (header.php), wp_nav_menu() Future Swap

### Community 22 - "Community 22"
Cohesion: 0.67
Nodes (3): Composition: Single Anandiitaa Desi Jaggery Powder maroon packet on right with bowl of jaggery powder; pink/maroon circular accent; left side empty negative space for copy, Laptop Hero Slide 2 - Desi Jaggery Powder Feature, Product: Anandiitaa Desi Jaggery Powder 500g (maroon pouch, 100% Natural badge)

### Community 23 - "Community 23"
Cohesion: 0.67
Nodes (3): Composition: Anandiitaa Premium Refined Sugar Bold Grain green packet on right with wooden bowl of sugar crystals and wooden scoop; green circular accent; left side negative space, Laptop Hero Slide 3 - Premium Refined Sugar Bold Grain Feature, Product: Anandiitaa Premium Refined Sugar Bold Grain 1kg (green pouch, Sulphur Less badge)

### Community 24 - "Community 24"
Cohesion: 0.67
Nodes (3): Composition: Anandiitaa Desi Jaggery maroon packet on right with whole jaggery block and broken pieces in front; pink circular accent; left negative space for copy, Laptop Hero Slide 4 - Desi Jaggery Block Feature, Product: Anandiitaa Desi Jaggery 900g (maroon pouch with handle, 100% Natural badge)

### Community 25 - "Community 25"
Cohesion: 0.67
Nodes (3): Composition: Anandiitaa Premium Refined Sugar Fine Grain blue packet on right with wooden bowl of fine sugar; blue/purple circular accent; left negative space for copy, Laptop Hero Slide 5 - Premium Refined Sugar Fine Grain Feature, Product: Anandiitaa Premium Refined Sugar Fine Grain 1kg (blue pouch, Sulphur Less badge)

### Community 26 - "Community 26"
Cohesion: 0.67
Nodes (3): Green circular '100% NATURAL' seal/badge with two leaves icon on white background, Anandiitaa Desi Jaggery 900g maroon stand-up pouch with circular window showing jaggery powder, Jaggery product page hero composition: two Anandiitaa Desi Jaggery pouches (powder and standard) flanked by an open glass jar of jaggery powder and solid jaggery blocks on a warm beige backdrop with pink circular accent

### Community 27 - "Community 27"
Cohesion: 1.0
Nodes (3): Lifestyle 2 (jpeg) - Anandiitaa Desi Jaggery Powder 500g pouch (front) with wooden bowl of jaggery powder, 100% Natural seal, Lifestyle 2 (png) - Anandiitaa Desi Jaggery Powder 500g pouch (front) with wooden bowl of jaggery powder, transparent background, Subject: Desi Jaggery Powder 500g pouch front with wooden bowl

### Community 28 - "Community 28"
Cohesion: 1.0
Nodes (2): Lifestyle 1 (jpeg) - Anandiitaa Desi Jaggery Powder pouch (back) showing nutritional info, certifications, batch details, Subject: Desi Jaggery Powder pouch back panel (nutritional/regulatory info)

### Community 29 - "Community 29"
Cohesion: 1.0
Nodes (0): 

### Community 30 - "Community 30"
Cohesion: 1.0
Nodes (0): 

### Community 31 - "Community 31"
Cohesion: 1.0
Nodes (0): 

### Community 32 - "Community 32"
Cohesion: 1.0
Nodes (0): 

### Community 33 - "Community 33"
Cohesion: 1.0
Nodes (0): 

### Community 34 - "Community 34"
Cohesion: 1.0
Nodes (0): 

### Community 35 - "Community 35"
Cohesion: 1.0
Nodes (0): 

### Community 36 - "Community 36"
Cohesion: 1.0
Nodes (0): 

### Community 37 - "Community 37"
Cohesion: 1.0
Nodes (0): 

### Community 38 - "Community 38"
Cohesion: 1.0
Nodes (1): Unbuilt Pages (Recipes, Blogs, Processing, Community, Contact)

### Community 39 - "Community 39"
Cohesion: 1.0
Nodes (1): WP-CLI in Docker Container

### Community 40 - "Community 40"
Cohesion: 1.0
Nodes (1): Bump wp_enqueue_style Version (Cache Bust)

### Community 41 - "Community 41"
Cohesion: 1.0
Nodes (1): Rule: Never Use Raw Generic Fallback Alone

### Community 42 - "Community 42"
Cohesion: 1.0
Nodes (1): Rule: Italic & Weight Variants Allowed

### Community 43 - "Community 43"
Cohesion: 1.0
Nodes (1): Color Token --brand-cream (#f5ebd2)

### Community 44 - "Community 44"
Cohesion: 1.0
Nodes (1): U-shaped Review Cards Convention

### Community 45 - "Community 45"
Cohesion: 1.0
Nodes (1): Coding Standard: Before/After Versions

### Community 46 - "Community 46"
Cohesion: 1.0
Nodes (1): DM Sans - SIL OFL 1.1 license

### Community 47 - "Community 47"
Cohesion: 1.0
Nodes (1): Appetite Pro - Personal Use Only license

### Community 48 - "Community 48"
Cohesion: 1.0
Nodes (1): Brand Guidelines (PDF)

### Community 49 - "Community 49"
Cohesion: 1.0
Nodes (1): About Us - Anandiitaa (PDF reference)

### Community 50 - "Community 50"
Cohesion: 1.0
Nodes (1): Sugar Page - Anandiitaa (PDF reference)

### Community 51 - "Community 51"
Cohesion: 1.0
Nodes (1): Jaggery Page - Anandiitaa (PDF reference)

### Community 52 - "Community 52"
Cohesion: 1.0
Nodes (1): Home Page (PDF reference)

### Community 53 - "Community 53"
Cohesion: 1.0
Nodes (1): Source: Jaggery powder bowl with sugarcane stalks on wooden surface (high-res original for section 6)

### Community 54 - "Community 54"
Cohesion: 1.0
Nodes (1): Source: Coconut shell bowl filled with jaggery powder and wooden spoon, palm fronds in background (high-res original for section 11)

### Community 55 - "Community 55"
Cohesion: 1.0
Nodes (1): Source: Anandiitaa product packaging lineup - Desi Jaggery, Desi Jaggery Powder, Premium Refined Sugar Bold Grain, Premium Refined Sugar Fine Grain with aloe and sugarcane props (high-res original for slide 1)

### Community 56 - "Community 56"
Cohesion: 1.0
Nodes (1): Review 1: Hands spooning jaggery powder over a bowl with jaggery cubes and chai on a kitchen counter (Aditi Parekh testimonial)

### Community 57 - "Community 57"
Cohesion: 1.0
Nodes (1): Review 2: Woman in floral apron sprinkling jaggery powder over a steaming paratha on a steel plate (Kavya Bhosle testimonial)

## Knowledge Gaps
- **172 isolated node(s):** `Jaggery & Sugar Product Company`, `ACF Pro (Advanced Custom Fields)`, `Field Group: Reviews (Repeater)`, `Field Groups: Product Pages`, `Custom Post Type: Review` (+167 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **Thin community `Community 28`** (2 nodes): `Lifestyle 1 (jpeg) - Anandiitaa Desi Jaggery Powder pouch (back) showing nutritional info, certifications, batch details`, `Subject: Desi Jaggery Powder pouch back panel (nutritional/regulatory info)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 29`** (1 nodes): `page-products-sugar.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 30`** (1 nodes): `page-products.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 31`** (1 nodes): `index.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 32`** (1 nodes): `page-products-jaggery.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 33`** (1 nodes): `header.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 34`** (1 nodes): `footer.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 35`** (1 nodes): `front-page.php`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 36`** (1 nodes): `benefits-accordion.js`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 37`** (1 nodes): `scroll-reveal.js`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 38`** (1 nodes): `Unbuilt Pages (Recipes, Blogs, Processing, Community, Contact)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 39`** (1 nodes): `WP-CLI in Docker Container`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 40`** (1 nodes): `Bump wp_enqueue_style Version (Cache Bust)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 41`** (1 nodes): `Rule: Never Use Raw Generic Fallback Alone`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 42`** (1 nodes): `Rule: Italic & Weight Variants Allowed`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 43`** (1 nodes): `Color Token --brand-cream (#f5ebd2)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 44`** (1 nodes): `U-shaped Review Cards Convention`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 45`** (1 nodes): `Coding Standard: Before/After Versions`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 46`** (1 nodes): `DM Sans - SIL OFL 1.1 license`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 47`** (1 nodes): `Appetite Pro - Personal Use Only license`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 48`** (1 nodes): `Brand Guidelines (PDF)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 49`** (1 nodes): `About Us - Anandiitaa (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 50`** (1 nodes): `Sugar Page - Anandiitaa (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 51`** (1 nodes): `Jaggery Page - Anandiitaa (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 52`** (1 nodes): `Home Page (PDF reference)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 53`** (1 nodes): `Source: Jaggery powder bowl with sugarcane stalks on wooden surface (high-res original for section 6)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 54`** (1 nodes): `Source: Coconut shell bowl filled with jaggery powder and wooden spoon, palm fronds in background (high-res original for section 11)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 55`** (1 nodes): `Source: Anandiitaa product packaging lineup - Desi Jaggery, Desi Jaggery Powder, Premium Refined Sugar Bold Grain, Premium Refined Sugar Fine Grain with aloe and sugarcane props (high-res original for slide 1)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 56`** (1 nodes): `Review 1: Hands spooning jaggery powder over a bowl with jaggery cubes and chai on a kitchen counter (Aditi Parekh testimonial)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.
- **Thin community `Community 57`** (1 nodes): `Review 2: Woman in floral apron sprinkling jaggery powder over a steaming paratha on a steel plate (Kavya Bhosle testimonial)`
  Too small to be a meaningful cluster - may be noise or needs more connections extracted.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Anandiitaa M30 Premium Refined Sugar Bold Grain 1Kg - Front Pack (Green)` connect `Community 1` to `Community 5`?**
  _High betweenness centrality (0.019) - this node is a cross-community bridge._
- **Why does `Anandiitaa S30 Premium Refined Sugar Fine Grain 1Kg - Front Pack (Blue)` connect `Community 1` to `Community 6`?**
  _High betweenness centrality (0.019) - this node is a cross-community bridge._
- **Why does `Anandiitaa M30 1Kg Bold Grain - Back Pack (Green)` connect `Community 5` to `Community 1`?**
  _High betweenness centrality (0.015) - this node is a cross-community bridge._
- **Are the 2 inferred relationships involving `Home Slider Slide 1 - Anandiitaa Product Lineup` (e.g. with `Design palette: Warm cream background contrasted with maroon (jaggery line), green and blue (sugar line) packets — natural, premium, traditional Indian feel` and `Design layout: Symmetric hero composition with four packets center-aligned, props framing left/right, no overlay headline copy — product-forward visual`) actually correct?**
  _`Home Slider Slide 1 - Anandiitaa Product Lineup` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Are the 2 inferred relationships involving `Anandiitaa M30 Premium Refined Sugar Bold Grain 1Kg - Front Pack (Green)` (e.g. with `Anandiitaa M30 1Kg Bold Grain - Back Pack (Green)` and `Anandiitaa S30 Premium Refined Sugar Fine Grain 1Kg - Front Pack (Blue)`) actually correct?**
  _`Anandiitaa M30 Premium Refined Sugar Bold Grain 1Kg - Front Pack (Green)` has 2 INFERRED edges - model-reasoned connections that need verification._
- **What connects `Jaggery & Sugar Product Company`, `ACF Pro (Advanced Custom Fields)`, `Field Group: Reviews (Repeater)` to the rest of the system?**
  _172 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Community 0` be split into smaller, more focused modules?**
  _Cohesion score 0.09 - nodes in this community are weakly interconnected._