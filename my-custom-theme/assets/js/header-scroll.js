(function () {
    'use strict';

    const header = document.querySelector('.site-header');
    if (!header) return;

    // Header is always fixed/visible. The .is-scrolled class only controls the
    // glassmorphic surface (bg + blur + border). Show it while actively scrolling
    // past a threshold; drop it after the user stops.
    const SHOW_THRESHOLD = 60;     // px scroll before the glass can appear
    const IDLE_MS        = 600;    // ms of no scroll before glass fades out

    let raf       = null;
    let idleTimer = null;

    function show() {
        if (window.scrollY > SHOW_THRESHOLD) header.classList.add('is-scrolled');
    }
    function hide() {
        header.classList.remove('is-scrolled');
    }
    function scheduleHide() {
        clearTimeout(idleTimer);
        idleTimer = setTimeout(hide, IDLE_MS);
    }

    function tick() {
        raf = null;
        show();
        scheduleHide();
    }

    function onScroll() {
        if (raf !== null) return;
        raf = window.requestAnimationFrame(tick);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
})();
