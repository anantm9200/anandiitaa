# context.md — Anandiitaa session continuity

> **Read this BEFORE HANDOFF.md.** This file captures what's changed since HANDOFF.md was written and the active priorities. HANDOFF.md is the foundational history; this is the "where we are now + where we're going."
>
> **HANDOFF.md is still authoritative** for: breakpoint tiers (mac / 1366 / 1280), image folder structure, `SEAMLESS_BG_TEST` revert convention, viewport-height insight (§9), and harmless lint warnings (§0.5 — the `.about-page` empty ruleset).

---

## 0. Communication style — Caveman mode

Working with this user in **caveman mode** (terse, fragment-friendly, drop articles/filler). Don't write long explanations unless they ask. Code blocks, errors, and commit messages stay in normal English. Drop caveman for multi-step sequences where fragment order risks misread. See `~/.claude/skills/caveman/SKILL.md` if curious.

---

## 1. Current cache architecture (NUCLEAR — IMPORTANT)

After multiple iterations battling stale-cache issues, the system is now:

### HTML caching: `Cache-Control: no-store, must-revalidate, max-age=0`
- Set in `functions.php` via `send_headers` action.
- Browser does **not** store HTML at all. Every visit = full network fetch from Pantheon.
- Client requirement: "fresh even for someone who visited 2 seconds ago, left, and came back."
- Tradeoff: ~60KB HTML re-download per visit. Negligible for marketing site.

### Asset caching: filemtime-based auto-busting (NO manual version bumps)
- `anandiitaa_asset_ver($rel)` and `anandiitaa_bust($url_or_rel)` in `functions.php` both use `filemtime()` to compute `?v=<unix-timestamp>`.
- Edit any asset file → its mtime changes → URL changes → browser/SW/CDN all miss → fresh fetch.
- **DO NOT** bump `ANANDIITAA_VER` manually for routine edits. It's now only:
  - Fallback when `filemtime()` can't stat a file (rare).
  - Source of truth for `CACHE_VERSION` in service-worker.js (SW namespace).

### Service worker: network-first + cache:'reload' + purge-on-activate
- `service-worker.js` strategy:
  - HTML: `networkFirst` with `fetch(req, { cache: 'reload' })` → bypasses browser HTTP cache.
  - Theme/plugin/wp-includes assets: same — `networkFirst` with `cache: 'reload'`.
  - Cross-origin (fonts) + wp-admin: passed through untouched.
- `activate` handler **purges every cache** (including current namespace) — no stale entries can survive across SW versions.
- `CACHE_VERSION = 'v32'` currently. Bumping it only forces a fresh SW install; not needed for normal asset changes (file content change is enough to trigger SW update).

### Pantheon edge
- Clear cache on Live env after each promotion (Pantheon dashboard).
- With `no-store` from origin, edge shouldn't cache HTML aggressively, but stale entries from before the nuclear-cache deploy can linger — clear once to flush.

### What client should do after a deploy
- Send ONE hard refresh (Cmd+Shift+R / Ctrl+Shift+R).
- After that single refresh, every future visit is auto-fresh forever — no special action needed.

---

## 2. The no-overlap rule (architectural concern — read this)

The site uses **slide-based layout with absolute positioning**:
- Every section is `min-height: 100vh`.
- Inside each section, content (titles, grids, images, badges) is `position: absolute; top: X%`.
- Each piece's position is tuned to specific viewport sizes.

**This is the root cause of recurring "X behind Y" / "title clipped" bugs.** Absolute positioning means:
- Elements don't push siblings → no automatic layout reflow.
- Sections don't grow with content → 100vh constraint forces packing.
- Per-viewport tuning fights itself across breakpoint tiers (we've had cascade-ordering bugs from this multiple times).

### Diagnosed overlap incident (Nov 2025-ish, fixed in commit `d1d9aa1`)
- `.reviews-title` and `.reviews-grid` both have `z-index: 5` (equal).
- On 1366×625 (real Windows usable viewport), title at `top: max(33px, calc(14% - 123px))` = 33px, grid at `top: 56%` with `transform: translate(-50%, -50%)` and ~555px height → grid_top ≈ 73px from section top.
- Title bottom (33 + 49 = 82) overlapped grid_top (73) by ~10px. Grid won (later in DOM at same z-index) → title rendered behind cards.
- **Fix applied**: raised title floor to 56px, pushed grid down to `top: 60%`, set explicit `height: clamp(250px, 37vh, 340px)` on `.review-card__image` (flex layout was overriding `aspect-ratio` causing image to stretch to 372px instead of the calculated 133px).
- The explicit-height pattern (mirroring what 1280 tier did with `aspect-ratio: auto; height: 182px`) is the only reliable way to shrink images inside flex-column cards. `aspect-ratio` alone gets ignored when flex stretches.

### The general rule (apply to all new layout work)
- Whenever positioning two elements via `top: X%`, compute the overlap math at the shortest realistic viewport (1366×625, 1280×560).
- Header height: ~58px (mac base), ~42px (1366 tier with shrunk header), ~38px (1280 tier). Title `top` must be ≥ header_height + ~10px margin to clear it.
- When in doubt, use `max(SAFE_FLOOR_PX, calc(...))` so the floor protects short viewports while the calc preserves visual intent on tall ones.

---

## 3. Plan B for responsiveness (in-flight — pending decision to start)

Discussion-stage. User confirmed Path B (not A), but execution hasn't started yet. Current session ended on bug-fix patches that need to hold until Plan B begins.

### Why Plan B over Plan A
- Plan A (true rebuild with flex/grid flow layout, removing absolute positioning) = 2-4 weeks. Out of scope for launch window.
- Plan B (fluid retrofit, keep current architecture, replace fixed px values with `clamp()`) = ~48 hours focused work. Solves ~80% of responsiveness pain.
- Plan A is the "right" long-term answer but post-launch.

### Plan B scope (when started)
1. **Foundation** (~4h): Define one fluid type scale via `clamp()` (heading/subhead/body). One fluid spacing scale. Replace all `100vh` with `100svh`. Delete the 1280 + 1366 + per-page font/padding tier blocks — let `clamp()` cover them.
2. **Slide-by-slide fluid pass** (~24h): Replace fixed `top: X%` / `top: calc(...)` with flex/grid alignment OR `clamp()`-based values. Convert per-tier overrides into single base rules. ~25 slides total across homepage / about / products(jaggery+sugar) / landing.
3. **Responsive images** (~6h): `<picture>` + `srcset` with multiple sizes. Designer is providing mobile + tablet sizes (see images already sent in chat). Use `cwebp` if available for ~60% file-size drop on photos.
4. **Mobile safety net** (~4h): `@media (max-width: 700px)` proper stacked layout. Touch targets, simplified positioning, content-driven heights.
5. **Test + fix** (~6h): Playwright across 1280×560, 1366×625, 1440×900, 1920×1080, 2560×1440, plus phone sizes (375×812, 414×896).

### Image dimensions designer is providing
For mobile + tablet:
- **Full-bleed hero/section bg** (16:9): 480w, 768w, 1024w, 1200w.
- **Section/card** (varies): 300w, 600w, 1000w.
- **Product packets** (4:5): 400w × 500h, 800w × 1000h.
- **Square** (1:1): 300w, 600w.
- **Icons**: SVG preferred, else 128w PNG.

Desktop sizes (480w → 5120w for Mac Studio 5K retina) already in theme via current `mac/d1366/d1280/laptop` folders.

Naming convention for designer-supplied files: `<image-name>-<width>w.<ext>` (e.g., `home-hero-1-768w.jpg`).

### Plan B's payoff vs current state
- Kills per-tier cascade fights (no more "the 1366 rule loses to max-height:800 because of file order").
- "Title clear of header" becomes one clamp() rule, not three tier overrides.
- New viewport sizes (foldables, future devices) work without code changes.
- Visually nearly identical to current (per-pixel approval mostly preserved).

### What Plan B does NOT fix
- Architectural collisions (Plan A territory). On wildly unusual aspect ratios things can still overlap.
- Mobile native experience (designed-for-phone). Mobile safety net = "works, looks decent" not "looks designed."

---

## 4. Test workflow (clean, no-cache, repeatable)

For the user to test locally without browser-cache surprises:

### Fresh Chrome profile per test (Windows PowerShell)
```powershell
Remove-Item -Recurse -Force "$env:TEMP\chrome-test" -ErrorAction SilentlyContinue
Start-Process chrome -ArgumentList "--user-data-dir=$env:TEMP\chrome-test"
```
That gives a brand-new Chrome profile (no cookies, no SW, no cache, no history) every launch.

### Always run DevTools open with:
- **Network tab** → "Disable cache" checkbox ON.
- **Application** → Service Workers → "Update on reload" + "Bypass for network".
- **Storage** → "Clear site data" if you suspect anything is off.

### Use `Cmd+Shift+R` / `Ctrl+Shift+R` for hard reload between tests.

### For programmatic pixel measurement
Claude can use Playwright. Key script template:
```python
from playwright.sync_api import sync_playwright
UA = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36"
with sync_playwright() as p:
    b = p.chromium.launch()
    ctx = b.new_context(viewport={"width":W,"height":H}, service_workers="block", user_agent=UA)
    # IMPORTANT: Pantheon's "Sandbox Environment Notice" blocks unknown visitors.
    # Pre-set the bypass cookie:
    ctx.add_cookies([{"name":"Deterrence-Bypass","value":"1","domain":"dev-anandiitaa.pantheonsite.io","path":"/"}])
    pg = ctx.new_page()
    pg.goto("https://dev-anandiitaa.pantheonsite.io/", wait_until="domcontentloaded", timeout=30000)
    pg.wait_for_load_state("networkidle", timeout=15000)
    # ... measurements
```
Pantheon site lock detail: see comment in script. Without the cookie, headless Chromium gets the sandbox notice (curl bypasses it automatically).

---

## 5. Deploy pipeline (GitHub Action → Pantheon Dev → Test → Live)

- **Push to `main`** → GitHub Action (`deploy.yml`) → SFTP mirrors `my-custom-theme/` to **Pantheon Dev** (`/code/wp-content/themes/my-custom-theme`).
- Action is at `.github/workflows/deploy.yml`. Uses Pantheon SFTP with `PubkeyAcceptedKeyTypes=+ssh-rsa` (legacy RSA).
- **Promotion to Test → Live is MANUAL** via Pantheon dashboard. The Action does NOT auto-promote.
- User's flow: push → verify on dev → if good, promote dev→test on dashboard → verify on test → promote test→live → clear cache on each → tell client.
- **Clear cache on each Pantheon env after promotion** (dashboard).

### Known deploy gotcha (historical, but worth knowing)
- 2026-05-26: GitHub Actions had a major outage. Pushes registered but workflow runs weren't created. Bumping version constants doesn't help during this. Just wait + retry when Actions recovers. See git log for "Auto cache resolve, no incognito needed" commit and around it for the recovery context.

---

## 6. Key file paths

```
my-custom-theme/
├── functions.php              ← cache strategy (no-store HTML, filemtime asset busting),
│                                  wp_enqueue, SW route at /service-worker.js,
│                                  Carbon Fields hero carousel admin
├── service-worker.js          ← network-first + cache:'reload' + activate purges all caches
├── style.css                  ← all theme styles. ~3800 lines. Per-tier blocks at end:
│                                    @media (max-height: 800px) {...}     ← height-aware fonts
│                                    @media (max-height: 620px) {...}
│                                    @media (min-width: 1440px) {...}     ← MAC (multiple blocks)
│                                    @media (min-width: 1281px) and (max-width: 1439px) {...} ← 1366 tier
│                                    @media (min-width: 1101px) and (max-width: 1280px) {...} ← 1280 tier
│                                    @media (max-width: 1100px) {...}     ← tablet
│                                    @media (max-width: 700px) {...}      ← mobile
├── front-page.php             ← homepage (carousel + standards + news + products + benefits + reviews + social)
├── page-about.php             ← about-us (5 slides: products / vision / mission / standards / purpose)
├── page-products.php          ← products landing (2 cards: jaggery / sugar)
├── page-products-jaggery.php  ← jaggery (5 slides: hero / process / benefits / variants / reviews)
├── page-products-sugar.php    ← sugar (5 slides: hero / process / recipes / variants / reviews)
├── images/                    ← per-tier image folders (mac / d1366 / d1280 / laptop / phone)
├── assets/images/             ← assorted (products/jaggery/process, products/sugar/process,
│                                  products/packets, reviews, logo)
└── vendor/                    ← Carbon Fields composer dep (tracked in git, don't untrack)
```

Repo root:
```
HANDOFF.md                     ← historical foundation doc (READ before touching anything tier-related)
context.md                     ← THIS FILE (session continuity)
docker-compose.yml             ← local dev: localhost:8084
graphify-out/                  ← knowledge graph (rebuild after code changes: python3 -c "from graphify.watch import _rebuild_code; from pathlib import Path; _rebuild_code(Path('.'))")
.github/workflows/deploy.yml   ← Pantheon SFTP deploy action
```

---

## 7. Next task — RECIPES PAGE

User is starting a new chat to build the **Recipes page**. Content + structure:

### 4 recipes (matching the sugar page's slide-3 recipe cards)
1. **Home-made Cookies**
2. **Indian Battasa**
3. **Gulab Jamun**
4. **Chocolate Dessert**

### What user is providing in next chat
- Written recipe content (ingredients + steps for each).
- Final hero/section images (user is sourcing).

### What we need to plan together
- **Placeholder images** for each recipe until final ones arrive. Suggest a consistent placeholder strategy (e.g., a single neutral cream-colored placeholder with the recipe name overlay, or use the existing thumbnail from `assets/images/products/sugar/recipes/`).
- **Page route** — likely new template `page-recipes.php` with a hardcoded route in `anandiitaa_route_templates()` in functions.php (pattern: `'recipes' => 'page-recipes.php'`).
- **Layout** — could mirror the existing product slide structure (hero + sections) OR be a fresh flow layout (Plan B style). Decide based on whether Plan B has started.
- **Individual recipe pages?** — TBD with user. Could be one long scrolling page with 4 sections, or 4 routed sub-pages (`recipes/cookies`, etc.).
- **Image needs**: Hero image for recipes landing, plus 1 image per recipe (cooked dish photo). Sizes per "Plan B image dimensions" section above.

### Recipes already referenced elsewhere
- `page-products-sugar.php` already has a "recipes" slide with thumbnails for these 4. Images live in `assets/images/products/sugar/recipes/`. Filenames: `battasa.png`, `chocolate-dessert.png`, `cookies.png`, `gulab-jamun.png`. Can be reused as initial placeholders.

---

## 8. Chat-transition protocol — IMPORTANT

> **Whenever the user mentions starting a new chat / moving on / wrapping up the current session, UPDATE `context.md` BEFORE the chat ends.**

What to update each transition:
1. **Section 7 (Next task)** — replace with whatever the user is about to start next.
2. **Section 2 (No-overlap rule)** — add any new architectural diagnoses from this session.
3. **Section 3 (Plan B)** — update progress (e.g., "Phase 1 complete, Phase 2 in progress").
4. **Section 9 (Recent decisions)** — bullet list of important calls made this session.
5. **Bump the "last updated" line at the bottom**.

The goal: a brand-new Claude session reading context.md + HANDOFF.md should have ~95% of the context needed to be productive immediately, without the user having to re-explain.

---

## 9. Recent decisions (last session)

- Chose **Plan B over Plan A** for responsiveness (timeline pressure, 48h budget).
- Chose **NUCLEAR cache** (`no-store`) over `no-cache, must-revalidate` (client requirement: zero stale).
- Removed manual cache-version bumps in favor of **filemtime auto-busting**.
- Added explicit `height: clamp(250px, 37vh, 340px)` on `.review-card__image` at 1366 tier (flex layout was overriding `aspect-ratio`).
- Confirmed via Playwright: ALL viewports show 0px title-grid overlap. Header clearance positive across the board.
- Promoted dev → test → live workflow confirmed working. Client sees correct layout after one hard refresh.
- Designer is providing mobile + tablet image sizes (request was sent in prior chat).

---

## 10. Things to NEVER do

- Don't manually bump `ANANDIITAA_VER` or `CACHE_VERSION` for routine edits. Filemtime handles it. Only bump for emergency global flushes.
- Don't push changes to `main` without the user explicitly asking. User pushes themselves; agent prepares.
- Don't add per-viewport CSS overrides without checking if a `clamp()` rule can replace them. We're trying to REDUCE tier blocks, not add more.
- Don't change `<img>` to `<picture>` (responsive image refactor) without confirming with user — major markup changes need a checkpoint.
- Don't run destructive git commands (force push, hard reset, branch delete) without explicit instruction.
- Don't mock or fake fixes. The user will catch it.
- Don't ignore the `.about-page` empty-ruleset lint warning when it appears — it's pre-existing and harmless (HANDOFF §0.5).

---

**Last updated**: 2026-05-29 (end of multi-week responsiveness + cache iteration session). Next chat starts on Recipes page build.

---

## 11. Hostinger migration — done 2026-05-30

Site moved from Pantheon Dev → **Hostinger Cloud (anandiitaa.com)**. Pantheon kept alive 2 weeks as fallback. Migration was manual (theme zip + DB .sql via SFTP / phpMyAdmin) because AIOM 7.x paywalled the >100MB import and we declined the v6.77 downgrade.

### Server paths (Hostinger)
- WP root: `/home/u605618459/domains/anandiitaa.com/public_html/`
- Theme: `…/wp-content/themes/my-custom-theme/`
- DB name: `u605618459_by3yR` (find via `grep DB_NAME wp-config.php`)
- `~/public_html` symlinks to `domains/liaisonit.in/public_html` — DON'T use the symlink. Use the explicit `domains/anandiitaa.com/public_html/` path.

### SSH access
```bash
ssh -p 65002 u605618459@148.135.140.158
```
Then `cd /home/u605618459/domains/anandiitaa.com/public_html`.

### Theme naming gotcha (will trip you up again)
- Folder name: `my-custom-theme`
- `style.css` declares: `Theme Name: Anandiitaa Custom Theme!`
- wp-admin shows the HUMAN name, wp-cli + DB use the FOLDER name. They're THE SAME theme — not two themes.

### Cache layers on Hostinger (and how to flush each)
Hostinger has its own `hcdn` edge cache. Symptom: mobile/desktop show different versions or stale render after deploy.

```bash
# Full server-side cache flush after deploy or content change:
cd /home/u605618459/domains/anandiitaa.com/public_html && wp cache flush && wp transient delete --all

# Then in hPanel → Performance / Caching → Purge All  (if button exists)
```

Verify edge isn't caching HTML:
```bash
curl -sI https://anandiitaa.com/ | grep -i "cache"
# Want to see:
#   cache-control: no-store, must-revalidate, max-age=0   ← our PHP header
#   x-hcdn-cache-status: DYNAMIC                          ← Hostinger correctly NOT caching
```

If `x-hcdn-cache-status: HIT` shows up → edge IS caching. Purge in hPanel and check again.

### Theme activation pattern
WP-admin "Activate" click was silently failing post-migration (kept reverting to Twenty Twenty-Five). Force-activate via wp-cli is reliable:
```bash
cd /home/u605618459/domains/anandiitaa.com/public_html
wp theme activate my-custom-theme
wp rewrite flush --hard
wp cache flush
```

### Deploy pipeline (post-migration)
- `.github/workflows/deploy.yml` now has TWO jobs: `pantheon` + `hostinger`. Both run on push to `main`.
- Hostinger uses SFTP password auth on port 65002.
- GitHub secrets: `HOSTINGER_SFTP_HOST` (IP only, no `ftp://` prefix), `HOSTINGER_SFTP_USER` (just `u605618459`, no domain suffix), `HOSTINGER_SFTP_PASS`, `HOSTINGER_SFTP_PORT` (`65002`).
- Pantheon job: REMOVE this after 2 weeks (target 2026-06-13).

### What didn't travel in the migration
- `complete.anant@hotmail.com` admin user — wiped, recreated manually.
- Media Library (we skipped uploads — theme doesn't reference `wp-content/uploads/`). Re-add via wp-admin if needed.
- Wordfence — must reinstall + reconfigure post-migration.
- Hostinger's default plugins (Hostinger AI / Easy Onboarding / Reach / Tools) — wiped; Hostinger may auto-reinstall.

### Migration artifacts to clean
- `wp-content/themes/my-custom-theme.zip` (595MB) — keep till you're sure migration sticks, then `rm`.
- `public_html/anandiitaa-local.sql` (1.5MB) — same.
- `wp-content/ai1wm-backups/*.wpress` (866MB orphan) — keep as backup or `rm`.
- Drop `max_execution_time` back to 300 in hPanel PHP config (5000 was for the import).
