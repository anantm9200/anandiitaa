/*
 * Anandiitaa Service Worker.
 *
 * Strategy (post-redesign — was stale-while-revalidate, which served stale CSS
 * on first request after a deploy and produced the "two versions floating
 * around" symptom the client was hitting):
 *   - HTML       → network-first, cache fallback only on offline.
 *   - Theme + plugin + wp-includes static assets → ALSO network-first.
 *     Combined with filemtime-based ?v URLs (see anandiitaa_bust in
 *     functions.php), the URL changes whenever the file changes, so
 *     network-first guarantees deployed CSS is what every visitor sees.
 *   - Cross-origin (fonts) + wp-admin → passed through untouched.
 *
 * Activate handler PURGES EVERY CACHE (current version included) so any SW
 * update gives clients a clean slate. No stale entry can survive across SW
 * versions. Filemtime ?v makes this a no-op cost (each asset refetches on
 * its first request anyway).
 *
 * CACHE_VERSION: bumping it ships a new SW → install → activate → purge.
 * Use for emergency global flushes. Routine asset changes don't need it —
 * filemtime in the URL handles those automatically.
 */

const CACHE_VERSION = 'v32';
const HTML_CACHE    = `anandiitaa-html-${CACHE_VERSION}`;
const ASSET_CACHE   = `anandiitaa-assets-${CACHE_VERSION}`;

self.addEventListener('install', (event) => {
    // Activate this SW as soon as it finishes installing, even if older
    // versions are still controlling tabs.
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil((async () => {
        // Purge EVERY cache (current namespace included) on each SW activation.
        // Guarantees no stale entry from before this activation can be served.
        // With filemtime ?v URLs + network-first below, the only "cost" is
        // each asset's first request going to network (which is the goal).
        const names = await caches.keys();
        await Promise.all(names.map((n) => caches.delete(n)));
        // Claim open clients so the SW starts handling fetches immediately.
        await self.clients.claim();
    })());
});

self.addEventListener('fetch', (event) => {
    const req = event.request;

    // SW only handles GETs. Skip POST/PUT/etc.
    if (req.method !== 'GET') return;

    const url = new URL(req.url);

    // Skip cross-origin (Google Fonts API etc) — pass to network unchanged.
    if (url.origin !== self.location.origin) return;

    // Skip wp-admin + wp-login — admin needs fresh data.
    if (url.pathname.startsWith('/wp-admin') || url.pathname.startsWith('/wp-login')) return;

    // Theme/plugin/wp-includes assets: network-first (was stale-while-revalidate).
    // Always tries network; cache is offline fallback only. Combined with the
    // filemtime ?v URLs, this guarantees clients see the deployed bytes.
    if (
        url.pathname.startsWith('/wp-content/themes/') ||
        url.pathname.startsWith('/wp-content/plugins/') ||
        url.pathname.startsWith('/wp-includes/')
    ) {
        event.respondWith(networkFirst(req, ASSET_CACHE));
        return;
    }

    // HTML routes: network-first.
    if (req.mode === 'navigate' || req.headers.get('accept')?.includes('text/html')) {
        event.respondWith(networkFirst(req, HTML_CACHE));
        return;
    }
});

async function networkFirst(req, cacheName) {
    const cache = await caches.open(cacheName);
    try {
        // cache: 'reload' bypasses the BROWSER HTTP cache and forces a real
        // network fetch. Combined with Fix A (server-side no-cache), this gets
        // currently-trapped visitors unstuck immediately — their browser's
        // stale HTML cache entry is ignored on the very next request instead
        // of waiting up to 7 days for it to expire.
        const res = await fetch(req, { cache: 'reload' });
        if (res && res.status === 200 && res.type === 'basic') {
            cache.put(req, res.clone());
        }
        return res;
    } catch (err) {
        const cached = await cache.match(req);
        if (cached) return cached;
        throw err;
    }
}
