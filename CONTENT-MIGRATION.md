# CONTENT MIGRATION — Anandiitaa block-theme rebuild

Companion to `DEPLOYMENT.md`. The SFTP pipeline ships **theme files only**
(`DEPLOYMENT.md §5`). The rebuild's editable content — which section blocks are
on each page, plus their text/image/link attributes — lives in the **WordPress
database** (`post_content` of each page), not in git. So every environment needs
a **one-time content seed**, separate from the code deploy.

This is by design (`DEPLOYMENT.md §6`): structure/CSS = code (deployed), text +
images = DB (authored in wp-admin).

---

## What "content" actually is here

| URL | DB page (slug) | Status |
|---|---|---|
| `/` (front page) | `home` | publish + set as front page |
| `/products` | `products` | publish |
| `/products/jaggery` | `products-jaggery` | private |
| `/products/sugar` | `products-sugar` | private |
| `/recipes/home-made-cookies` | `recipes-cookies` | private |
| `/recipes/gulab-jamun` | `recipes-gulab-jamun` | private |
| `/recipes/choco-lava-cake` | `recipes-choco-lava-cake` | private |
| `/recipes/gajar-ka-halwa` | `recipes-gajar-ka-halwa` | private |
| `/about-us` | `about-us-content` | private |
| `/nutritional-facts` | `nutrition-content` | private |
| `/manufacturing-details` | `mfg-content` | private |

The pretty URLs are mapped to these pages by the `template_include` router in
`functions.php` (ships with the theme). The "private" pages aren't publicly
reachable at their own slug — they only render through the router — so there's no
duplicate URL.

**Images:** the baseline (prod) images are theme files (`assets/…`, `images/…`)
and ship via SFTP. The seed references them by theme-relative path, so the seeded
site shows the correct images with **no Media Library upload**. The Media Library
is only needed when the client *swaps* an image.

---

## Recommended path: the seed script (reproducible, in git)

`anandiitaa-block/tools/seed-anandiitaa-pages.php` recreates all 11 pages with
their baseline content (= exact prod copy via block defaults), sets the static
front page, and activates the block theme. It's **idempotent** — re-running
updates the same slugs in place.

### Migrate to TESTING

1. **Push** `gutenberg-rebuild` → the `hostinger-staging` job builds the blocks
   and SFTP-mirrors `anandiitaa-block` to the testing theme path.
2. On the testing WP, **set Permalinks** to **Post name** (Settings → Permalinks)
   — required for the nested `/products/jaggery` style URLs.
3. **Run the seed** (via SSH/wp-cli on the host):
   ```bash
   ssh -p 65002 u605618459@148.135.140.158
   cd ~/domains/testing.anandiitaa.com/public_html
   wp eval-file wp-content/themes/anandiitaa-block/tools/seed-anandiitaa-pages.php
   ```
   (No wp-cli? Temporarily activate a "Code Snippets"-style runner or paste the
   file's body into a one-off must-use plugin, then delete it.)
4. **Verify**: visit `/`, `/about-us`, `/products/jaggery`, `/products/sugar`,
   each `/recipes/*`, `/nutritional-facts`, `/manufacturing-details`. All should
   render; missing → check theme is active + permalinks + that the seed ran.

### Cutover to PROD (one-time, at launch — `DEPLOYMENT.md §4`)

1. Deploy `anandiitaa-block` to the **prod** theme path (when ready, point a
   `main` job — or a manual SFTP — at `…/anandiitaa.com/…/themes/anandiitaa-block`).
2. Ensure Permalinks = Post name on prod.
3. **Run the seed once** on prod (same command, prod `public_html`). This both
   creates the pages and **activates** `anandiitaa-block` (flips the live site
   from the classic theme in one move).
4. Smoke-test every URL above.

> ⚠️ **After go-live, PROD content is the master.** Do **NOT** re-run the seed on
> prod — it resets pages back to defaults and would wipe client edits. The seed
> is a *first-time bootstrap* per environment, not a sync tool. Code deploys never
> touch `post_content`, so they're always safe to re-run.

---

## Alternative path: DB export / import

If you'd rather copy the already-populated pages from local dev (`:8095`) instead
of seeding:

- **Per-page export:** `wp export --post_type=page --post__in=6,15,53,54,55,56,57,58,60,61,62`
  on dev → WP Tools → Import on the target. Then set the front page + activate
  theme manually.
- **All-in-One WP Migration `.wpress`:** whole-site copy (also brings media,
  users, etc.). Heavier; fine for standing up testing from a dev snapshot, but
  the seed is cleaner for prod cutover since it carries *only* the intended pages.

Either way, the **theme files still come from the SFTP deploy** — export/import is
only for the DB rows.

---

## Pre-flight checklist (per environment)

- [ ] Block theme files deployed (SFTP) and present under `…/themes/anandiitaa-block`.
- [ ] Permalinks = **Post name**.
- [ ] Seed run once (`wp eval-file …/tools/seed-anandiitaa-pages.php`).
- [ ] Theme **active** (`anandiitaa-block`) — the seed does this.
- [ ] Front page = the `home` page — the seed does this.
- [ ] All 11 URLs return 200.
- [ ] (Prod, post-launch) seed is **never re-run**; content edited in wp-admin.
