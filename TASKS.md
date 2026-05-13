# Active Tasks

Tracking the current work batch. Updated as items move through stages.

Status legend: `[ ]` todo · `[~]` in progress · `[x]` done · `[!]` blocked / needs input

## Batch — Site polish + /products landing

- [x] **1. Smooth, seamless scrolling** — scroll-snap removed entirely. Native browser scroll physics now active site-wide.
- [x] **2. No section cuts** — addressed via snap removal. Slides flow into each other with continuous cream bg; no more panel-style hard stops.
- [x] **3. Animations + effects across the site** — `/products` landing card hover-lift + arrow-slide; benefits accordion smooth grid-rows unfurl + caret rotate; `.btn` primary/outline now have lift on hover with branded shadow + active-state press; benefit-content image scale on row hover; process-step circles scale + shadow on hover with image zoom; variant cards lift + packet float on hover; smooth easing curves throughout.
- [x] **4. Smaller header** — logo `42px → 30px`, padding `22px → 14px`, nav font `0.85rem → 0.78rem`. ~30% tighter overall.
- [x] **5. Product section polish** (variants slide on jaggery page) — gradient bg `linear-gradient(155deg, #fbf2dc → #f1e2bd)` on cards, radial highlight overlay, hover lift `-6px` + bigger shadow, packet image floats up `12px` on hover, body font swapped from Montserrat to DM Sans (per design spec), padding bumped to `64px 68px`, AVAILABLE-IN label restyled with tracking + uppercase.
- [x] **6. Benefits-of-jaggery polish** — `display: flex; gap: 14px` on the list so rows have visible breathing room (was tightly stacked); each row gets a subtle hover bg tint (`rgba(184,156,112,0.08)`) and a slightly stronger one when open (`0.10`); transitions on color so it eases in.
- [x] **7. `/products` landing page** — created `page-products.php` with two gradient category cards (Jaggery + Sugar) linking to detail pages. Hover lift, image scale on hover, animated CTA arrow. Auto-resolves via `page-{slug}.php` hierarchy.

- [!] **8. Home hero heading overlaps the fixed header** — "Choose Pure. Choose Anandiitaa." sits at the very top of slide 1 and crowds the nav bar; bumping `.hero-slide__content--top-center { top }` down pushes the text into the packet imagery instead. Needs a different fix. Options on the table:
  - **A.** Shrink the header further (smaller logo + padding) so text fits above image with `top: 2-3%`.
  - **B.** Add `padding-top` to the hero slide so the image starts lower; heading + CTA get a clear band.
  - **C.** Side layout — text left, image right (60/40 or similar). Bigger restructure.
  - **D.** Move heading + CTA to the bottom of the slide on a cream band, image owns the top.
  - **E.** Translucent fixed header floating over the image; text starts at slide top normally.
  - **F.** Tighten the text stack — reduce gap between H2 and CTA so the block is shorter.
  - Recommendation in the conversation: A + F combined.

## Notes
- Tasks marked `[~]` are mid-flight. Always finish or move to `[ ]` before starting another so the list reflects reality.
- When a task generates follow-ups (e.g. tuning sizes after a layout change), append to the relevant entry as a sub-bullet rather than splitting into a new top-level item.
- Task 7 likely involves creating `page-products.php` and registering its `template_include` route.
