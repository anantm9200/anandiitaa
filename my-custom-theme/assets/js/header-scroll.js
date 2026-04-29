(function () {
    'use strict';

    const header = document.querySelector('.site-header');
    if (!header) return;

    const threshold = 60; // px scrolled before bg appears
    let raf = null;

    function update() {
        raf = null;
        header.classList.toggle('is-scrolled', window.scrollY > threshold);
    }

    function onScroll() {
        if (raf !== null) return;
        raf = window.requestAnimationFrame(update);
    }

    update();
    window.addEventListener('scroll', onScroll, { passive: true });
})();
