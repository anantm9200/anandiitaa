(function () {
    'use strict';

    const header    = document.querySelector('.site-header');
    const hoverZone = document.querySelector('.site-header-hover-zone');
    if (!header) return;

    const SHOW_THRESHOLD   = 60;    // px of scroll before scroll-triggered show kicks in
    const IDLE_MS          = 3000;  // hide N ms after last scroll
    const INTRO_MS         = 4000;  // header is visible for N ms on initial load / page nav

    let raf       = null;
    let idleTimer = null;
    let introTimer = null;
    let hovering  = false;

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
        // Once the user has actually scrolled, the intro window is irrelevant.
        clearTimeout(introTimer);
        if (raf !== null) return;
        raf = window.requestAnimationFrame(tick);
    }

    function onPointerEnter() {
        hovering = true;
        clearTimeout(idleTimer);
        clearTimeout(introTimer);
        show();
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

    // Intro: show the header for INTRO_MS on every page load (first visit + every nav).
    // No scroll required. After the timeout it fades out, and from then on only
    // scroll/hover bring it back.
    show();
    introTimer = setTimeout(function () {
        if (!hovering) hide();
    }, INTRO_MS);
})();
