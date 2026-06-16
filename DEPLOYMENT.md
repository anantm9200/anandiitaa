# DEPLOYMENT — Anandiitaa (read before touching `deploy.yml` or secrets)

Authoritative spec for how the Gutenberg block-theme rebuild ships. The other
agent diagnosed the situation correctly — this locks the decisions so the
pipeline gets built right.

---

## 0. Current build state (so any agent is oriented)

- **Editability model is BUILT, not a TODO.** Sections are **native dynamic
  blocks** (`anandiitaa-block/src/<block>/` → `block.json` + `edit.js` +
  `render.php`, built with `@wordpress/scripts` into `build/<block>/`).
  Reference: `src/hero-carousel/` — `save: () => null` (front end is 100%
  `render.php`), `edit.js` exposes ONLY editable fields (RichText headings,
  `MediaUpload` images, text controls for CTA/feature lines), and `block.json`
  `supports` lock `html/className/customClassName/reusable/multiple` so the
  client can't restyle/move it. Image previews in the editor use
  `window.anandiitaaThemeUri`.
- **Homepage content lives in the DB.** `templates/front-page.html` renders
  `<!-- wp:post-content /-->`, so the homepage **Page** holds the section blocks
  in `post_content`. Editing happens in wp-admin; **deploying theme files does
  NOT carry it** (see §5).
- **Foundation is exact:** fonts (Appetite Pro/DM Sans/Montserrat), body
  gradient, full classic CSS (`prod-styles.css`) + classic JS + `images/home`
  are all ported into the block theme and load, so reproduced markup renders
  pixel-identical to prod.
- **Theme-owned routes** (`/products`, `/products/jaggery`, recipes, …) are
  mapped to `templates/page-*.html` via a `template_include` filter in
  `functions.php` (mirrors the classic theme's router).
- **Where things run:** rebuild theme `anandiitaa-block` on branch
  `gutenberg-rebuild`, local dev at **:8095** (`~/Desktop/anandiitaa-rebuild`,
  a clone of prod content). Classic theme `my-custom-theme` on `main` = live
  prod, untouched until cutover.

---

## 1. Repos — secrets go on `origin`

| Remote | URL | Role |
|---|---|---|
| **origin** | `github.com/InvadeCode/anandiitaa` | **Active. Pushes + Actions run here. Set ALL secrets HERE.** |
| backup | `github.com/heramb-invadecode/anandiitaa` | Fallback only. |

Secrets are per-repo and write-only. If they're on the wrong repo (or you used
FTP creds), auth fails. Set them on **InvadeCode/anandiitaa**.

## 2. The Hostinger secrets — use **SSH Access**, NOT FTP Accounts

The workflow connects via **SFTP over SSH on port 65002**. That is the **SSH
Access** path, not plain FTP (port 21). Using FTP-account creds = "incorrect"
auth every time. Get these from **hPanel → Hosting → Manage → Advanced → SSH
Access** (enable SSH if it's off):

| Secret | Value |
|---|---|
| `HOSTINGER_SFTP_HOST` | the **SSH IP** from SSH Access (e.g. `82.x.x.x`) — NOT `anandiitaa.com`, NOT `ftp.…` |
| `HOSTINGER_SFTP_PORT` | `65002` |
| `HOSTINGER_SFTP_USER` | `u605618459` (your `u…` account name — it's in the deploy path) |
| `HOSTINGER_SFTP_PASS` | your **SSH password** |

One SSH account = the whole `/home/u605618459/`, so **the same 4 creds reach
BOTH** `anandiitaa.com` and `testing.anandiitaa.com` — only the target path
differs. (Pantheon secrets are the legacy parallel job — delete that job if
sunsetting Pantheon.)

## 3. Branch → environment → theme mapping (the target pipeline)

Two themes coexist during the transition. **The live site must stay up on the
classic theme until cutover.**

| Branch | Theme deployed | Target | Path |
|---|---|---|---|
| `gutenberg-rebuild` | **`anandiitaa-block`** (the rebuild) | **testing.anandiitaa.com** (staging) | `/home/u605618459/domains/testing.anandiitaa.com/public_html/wp-content/themes/anandiitaa-block` |
| `main` | `my-custom-theme` (classic) | **anandiitaa.com** (prod) | `/home/u605618459/domains/anandiitaa.com/public_html/wp-content/themes/my-custom-theme` |

⚠️ **Current `deploy.yml` only deploys `my-custom-theme`.** It needs a **new job**
that, on push to `gutenberg-rebuild`, mirrors **`anandiitaa-block`** to the
**testing** theme path above. Keep the existing `main`→classic→prod job as-is
(live site).
⚠️ **Confirm the testing path** in hPanel — the subdomain may be
`domains/testing.anandiitaa.com/public_html/…` or a subfolder; use whatever the
File Manager shows.

**Flow:** push to `gutenberg-rebuild` → auto-deploys to testing.anandiitaa.com →
validate → (at launch) cutover to prod.

## 4. Cutover (later, one-time)

When the rebuild is approved on testing:
1. Deploy `anandiitaa-block` to the **prod** theme path (anandiitaa.com).
2. **Activate** `anandiitaa-block` on the prod WP (DB option — one switch).
3. Migrate content (see §5).
Live site flips from classic → block theme in one move. Afterward, `main` can
deploy `anandiitaa-block` instead of `my-custom-theme`.

## 5. CONTENT does NOT travel with the deploy — this is the big one

SFTP deploys **theme files only**. The rebuild's editable content (page text,
images, block attributes) lives in the **DATABASE**, not in git. So on a fresh
testing/prod DB:
- The block theme loads, but the **pages won't exist** → routed URLs 404.
- The block theme must be **activated** (DB option).

So each environment needs a **separate content step**, NOT done by the file
deploy:
- Seed the testing/prod DB with the pages + their block content (All-in-One WP
  Migration `.wpress`, WP Tools → Export/Import, `wp-cli`, or re-create).
- After launch, **content is authored on prod** (the master) and is never
  overwritten by a code deploy.

This is by design and matches the editability model in §6.

## 6. The editability model (why content is separate)

Decided architecture — **do not violate this**:
- **Structure / layout / positions / CSS / which sections exist = CODE** (in
  git, deployed via SFTP, locked). Devs own it. Client cannot move or restyle.
- **Text + images (+ link targets) = DATABASE**, edited in wp-admin by client +
  devs, stored as **block attributes / page content**. Never baked into theme
  PHP, never carried by deploys.

Each homepage/section is a **native dynamic block** (`block.json` + `render.php`
+ `edit.js`): `render.php` emits the exact classic markup (so `prod-styles.css`
styles it 1:1, pixel-exact); only text/image/CTA are editable **attributes**.
Layout is hardcoded in `render.php` and not exposed. The hero-carousel block
(`src/hero-carousel/`) is the reference pattern for this.

> Litmus test: a non-dev client can change heading text + swap a section image
> in wp-admin with **zero code + zero deploy**, and **cannot** move or restyle
> anything. Content edits = DB; never theme-file edits.

## 7. Summary checklist for the pipeline rebuild
- [ ] Set the 4 Hostinger SSH-Access secrets (+ Pantheon if keeping) on **InvadeCode/anandiitaa**.
- [ ] Add a `deploy.yml` job: push `gutenberg-rebuild` → SFTP `anandiitaa-block` → testing.anandiitaa.com theme path.
- [ ] Leave `main` → `my-custom-theme` → prod untouched (live site).
- [ ] Confirm the testing subdomain's exact filesystem path in hPanel.
- [ ] Plan the content migration (DB) separately — deploys carry no content.
