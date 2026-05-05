(function () {
    'use strict';

    const header    = document.querySelector('.site-header');
    const hoverZone = document.querySelector('.site-header-hover-zone');
    if (!header) return;

    const SHOW_THRESHOLD = 60;    // require some scroll past the very top
    const IDLE_MS        = 3000;  // ms of no scroll before header hides again

    let raf       = null;
    let idleTimer = null;
    let hovering  = false;       // true while cursor is over header or its hover zone

    function show() {
        header.classList.add('is-scrolled');
    }

    function hide() {
        header.classList.remove('is-scrolled');
    }

    function scheduleHide() {
        clearTimeout(idleTimer);
        idleTimer = setTimeout(function () {
            if (!hovering) hide();
        }, IDLE_MS);
    }

    function tick() {
        raf = null;
        if (window.scrollY > SHOW_THRESHOLD) show();
        scheduleHide();
    }

    function onScroll() {
        if (raf !== null) return;
        raf = window.requestAnimationFrame(tick);
    }

    function onPointerEnter() {
        hovering = true;
        clearTimeout(idleTimer);
        show();   // wake the header even at the very top of the page
    }
    function onPointerLeave() {
        hovering = false;
        scheduleHide();
    }

    header.addEventListener('mouseenter', onPointerEnter);
    header.addEventListener('mouseleave', onPointerLeave);
    if (hoverZone) {
        hoverZone.addEventListener('mouseenter', onPointerEnter);
        hoverZone.addEventListener('mouseleave', onPointerLeave);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
})();
