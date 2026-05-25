/*
 * Anandiitaa demo Service Worker.
 *
 * Why: Pantheon dev environments send `Cache-Control: no-cache, must-revalidate`
 * on every static asset. That kills repeat-visit speed — every reload forces
 * a revalidation round-trip per file. This SW sidesteps it entirely by
 * intercepting fetches in the browser and serving from a local cache once
 * a file has been seen.
 *
 * Strategy
 *   - HTML (`/`, `/about-us`, `/products/...`)  → network-first, fall back to
 *     cache if offline. Keeps content fresh during dev iteration.
 *   - Theme static assets (.png / .jpg / .css / .js / .woff2 under
 *     /wp-content/themes/) → stale-while-revalidate. Cached copy is served
 *     instantly (fast), and in the background the SW refetches and updates
 *     the cache. Second visit after any change picks up the new bytes
 *     automatically — no manual CACHE_VERSION bump, no ?v=mtime needed on
 *     every URL. (Critical assets like CSS/JS still get a filemtime ?ver via
 *     wp_enqueue, so first-visit-after-change is also fresh for those.)
 *   - Everything else (cross-origin fonts, wp-admin, etc.) is passed through
 *     to the network unchanged.
 *
 * Versioning: bump CACHE_VERSION to force all clients to dump and rebuild
 * caches (e.g. after a major redesign or layout change). On activate, we
 * delete any caches whose name doesn't match the current version.
 */

const CACHE_VERSION = 'v17';
const HTML_CACHE    = `anandiitaa-html-${CACHE_VERSION}`;
const ASSET_CACHE   = `anandiitaa-assets-${CACHE_VERSION}`;

self.addEventListener('install', (event) => {
    // Activate this SW as soon as it finishes installing, even if older
    // versions are still controlling tabs.
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil((async () => {
        // Delete stale caches from prior versions.
        const names = await caches.keys();
        await Promise.all(
            names
                .filter((n) => n !== HTML_CACHE && n !== ASSET_CACHE)
                .map((n) => caches.delete(n))
        );
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

    // Theme assets: stale-while-revalidate.
    if (
        url.pathname.startsWith('/wp-content/themes/') ||
        url.pathname.startsWith('/wp-content/plugins/') ||
        url.pathname.startsWith('/wp-includes/')
    ) {
        event.respondWith(staleWhileRevalidate(req));
        return;
    }

    // HTML routes: network-first.
    if (req.mode === 'navigate' || req.headers.get('accept')?.includes('text/html')) {
        event.respondWith(networkFirst(req));
        return;
    }
});

async function staleWhileRevalidate(req) {
    const cache = await caches.open(ASSET_CACHE);
    const cached = await cache.match(req);

    // Always kick off a background refetch to update the cache for next time.
    const networkPromise = fetch(req).then((res) => {
        if (res && res.status === 200 && res.type === 'basic') {
            cache.put(req, res.clone());
        }
        return res;
    }).catch(() => null);

    // If we have a cached copy, serve it immediately (fast). Otherwise
    // wait for the network response (cold cache).
    return cached || networkPromise;
}

async function networkFirst(req) {
    const cache = await caches.open(HTML_CACHE);
    try {
        const res = await fetch(req);
        if (res && res.status === 200) {
            cache.put(req, res.clone());
        }
        return res;
    } catch (err) {
        const cached = await cache.match(req);
        if (cached) return cached;
        throw err;
    }
}
