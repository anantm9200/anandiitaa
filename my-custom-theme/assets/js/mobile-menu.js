/**
 * Mobile hamburger menu — toggles the slide-in nav drawer + backdrop.
 * - Active only on mobile (CSS scopes the drawer/hamburger via @media max-width: 700px).
 * - JS runs on all viewports but is harmless on desktop (drawer doesn't render there).
 * - Closes on: hamburger toggle, close button, backdrop click, nav-link click, Escape key.
 * - Locks body scroll while drawer is open.
 */
(function () {
    'use strict';

    var toggle   = document.querySelector('[data-nav-toggle]');
    var closeBtn = document.querySelector('[data-nav-close]');
    var nav      = document.querySelector('[data-nav]');
    var backdrop = document.querySelector('[data-nav-backdrop]');
    var body     = document.body;

    if (!toggle || !nav || !backdrop) return;

    function openNav() {
        nav.classList.add('is-open');
        backdrop.classList.add('is-open');
        body.classList.add('nav-locked');
        toggle.setAttribute('aria-expanded', 'true');
    }

    function closeNav() {
        nav.classList.remove('is-open');
        backdrop.classList.remove('is-open');
        body.classList.remove('nav-locked');
        toggle.setAttribute('aria-expanded', 'false');
    }

    toggle.addEventListener('click', function () {
        if (nav.classList.contains('is-open')) {
            closeNav();
        } else {
            openNav();
        }
    });

    if (closeBtn) closeBtn.addEventListener('click', closeNav);
    backdrop.addEventListener('click', closeNav);

    // Close when a nav link is tapped (so the drawer doesn't linger after navigation).
    nav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', closeNav);
    });

    // Escape key closes the drawer.
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && nav.classList.contains('is-open')) {
            closeNav();
        }
    });
})();
