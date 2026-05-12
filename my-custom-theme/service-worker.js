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
 *     /wp-content/themes/) → cache-first, fall back to network on miss.
 *     These rarely change between visits; when they do, the URL gets a
 *     `?v=mtime` cache-buster (added by the bust() helper in front-page.php
 *     and wp_enqueue_style's $ver argument), so a new URL = a fresh fetch.
 *   - Everything else (cross-origin fonts, wp-admin, etc.) is passed through
 *     to the network unchanged.
 *
 * Versioning: bump CACHE_VERSION to force all clients to dump and rebuild
 * caches (e.g. after a major redesign or layout change). On activate, we
 * delete any caches whose name doesn't match the current version.
 */

const CACHE_VERSION = 'v1';
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

    // Theme assets: cache-first.
    if (
        url.pathname.startsWith('/wp-content/themes/') ||
        url.pathname.startsWith('/wp-content/plugins/') ||
        url.pathname.startsWith('/wp-includes/')
    ) {
        event.respondWith(cacheFirst(req));
        return;
    }

    // HTML routes: network-first.
    if (req.mode === 'navigate' || req.headers.get('accept')?.includes('text/html')) {
        event.respondWith(networkFirst(req));
        return;
    }
});

async function cacheFirst(req) {
    const cache = await caches.open(ASSET_CACHE);
    const cached = await cache.match(req);
    if (cached) return cached;
    try {
        const res = await fetch(req);
        // Only cache successful, same-origin responses.
        if (res && res.status === 200 && res.type === 'basic') {
            cache.put(req, res.clone());
        }
        return res;
    } catch (err) {
        // Offline + no cache. Let the browser surface the failure.
        throw err;
    }
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
