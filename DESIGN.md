# Anandiitaa — Design System

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
