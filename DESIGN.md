# Anandiitaa — Design System

## Type scale (canonical, mandatory)

Three sizes. Three weights. No improvising. All component CSS must reference these tokens — never hard-code px or rem values for these tiers.

| Tier | Size | Weight | Token (in `:root`) | Use for |
|---|---|---|---|---|
| **Heading** | 57px | 500 (medium, **never bold**) | `--fs-heading` / `--fw-heading` | Section titles, page titles, hero h2, all primary headlines |
| **Subtext** | 27px | 500 (medium) | `--fs-subtext` / `--fw-heading` | Card titles, accordion summary titles, sub-headings, emphasized labels |
| **Body** | 18px | 400 (DM Sans regular, **never bold**) | `--fs-body` / `--fw-body` | Paragraphs, descriptions, list items, captions, quotes |

CSS sample:

```css
.my-section__title { font-size: var(--fs-heading); font-weight: var(--fw-heading); }
.my-card__title    { font-size: var(--fs-subtext); font-weight: var(--fw-heading); }
.my-card__body     { font-size: var(--fs-body);    font-weight: var(--fw-body); }
```

### Rules

1. **Headings are medium (500), never bold (700).** Same for subtext.
2. **Body text is DM Sans regular (400).** Do not set `font-weight: 500` or `700` on paragraphs / descriptions.
3. **Never hard-code sizes for these tiers.** Reference the CSS variables. If a designer asks for a non-standard size, push back or treat it as a UI exception (see below).
4. **UI exceptions (allowed to use literal sizes):** nav links, button labels, footer copyright, uppercase mini-labels, decorative ornaments. These are not body/heading/subtext — they're chrome.
5. **Mobile breakpoints** can override these via `@media` if needed for readability — keep media-query overrides scoped to specific breakpoints, do not change the base tokens.

## Fonts (canonical, mandatory)

These are the **ONLY** fonts that should be used across the site. No other typefaces. No fallbacks for new components beyond the system stacks listed here.

| Role | Font | When to use |
|---|---|---|
| **Title Fonts** | Appetite Pro | All headings (h1–h4), section titles, hero captions, card titles, reviewer names — anything that reads as a title or display element. |
| **Body and Secondary Font** | DM Sans | Paragraphs, descriptions, list items, captions, reviewer roles, quote text, table cells — anything that reads as body or supporting copy. |
| **Immersive Header / Buttons / Menu** | Montserrat | Top navigation, button labels (primary + secondary CTAs), menu items, immersive-header chrome (sticky nav, overlay nav). |

### CSS stacks

```css
/* Titles */
font-family: 'Appetite Pro', 'Georgia', serif;

/* Body / secondary */
font-family: 'DM Sans', system-ui, sans-serif;

/* Immersive header / buttons / menu */
font-family: 'Montserrat', system-ui, sans-serif;
```

### Font sources

- **Appetite Pro** — self-hosted under `my-custom-theme/assets/fonts/appetite-pro/` (Light, Regular, Medium, Bold, Heavy). Loaded via `@font-face` at top of `style.css`.
- **DM Sans** — self-hosted under `my-custom-theme/assets/fonts/dm-sans/`. Loaded via `@font-face`.
- **Montserrat** — Google Fonts, enqueued in `functions.php` (`Montserrat:wght@400;500;600;700`).

### Rules

1. Never introduce a new font family. If a design needs a new style, get a new weight/size of one of the three above.
2. Never use raw `serif`, `sans-serif`, or `system-ui` without one of the three named families in front of it.
3. Italic / weight variants of the canonical fonts are allowed.
4. Code blocks may use a monospace stack — those are technical, not brand surfaces.

## Color tokens

Defined in `style.css` `:root`:

| Token | Value | Use |
|---|---|---|
| `--brand-maroon` | `#6b0f1a` | Primary brand color, titles, accents |
| `--brand-cream` | `#f5ebd2` | Light backgrounds, cards |
| `--brand-yellow` | `#f0c869` | Accent (e.g. review-card quote mark) |

## Type tokens

Defined in `style.css` `:root` (mirrors the table above):

| Token | Value |
|---|---|
| `--fs-heading` | `57px` |
| `--fs-subtext` | `27px` |
| `--fs-body` | `18px` |
| `--fw-heading` | `500` |
| `--fw-body` | `400` |

## Component conventions

- Hero carousel slides live in `front-page.php`'s `$slides` array. Type-tagged slides (`standards`, `benefits`, `products-grid`, `reviews`) get dedicated render blocks.
- U-shaped cards (review cards): flat top corners, `border-radius: 0 0 N N` on bottom; `overflow: hidden` on parent so the inner image's straight edge meets the card's rounded base cleanly.
- Decorative quote glyphs use unicode `”` rendered in Appetite Pro at 14–22rem, low-opacity yellow.

## File map

- Theme root: `my-custom-theme/`
- Styles: `my-custom-theme/style.css`
- Templates: `front-page.php`, `header.php`, `footer.php`, page templates
- Fonts: `assets/fonts/`
- Images: `assets/images/{lifestyle,logo,products,reviews,source}/` and `images/home/`
