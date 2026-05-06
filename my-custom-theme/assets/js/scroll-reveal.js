(function () {
    var targets = document.querySelectorAll('[data-reveal]');
    if (!targets.length) return;

    if (!('IntersectionObserver' in window) ||
        window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        targets.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    /* Toggle .is-visible on every viewport entry/exit so content animates
       every time the user revisits a section, not just the first time. */
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            entry.target.classList.toggle('is-visible', entry.isIntersecting);
        });
    }, {
        root: null,
        rootMargin: '0px 0px -10% 0px',
        threshold: 0.15,
    });

    targets.forEach(function (el) { observer.observe(el); });
})();
