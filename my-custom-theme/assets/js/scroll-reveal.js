(function () {
    var targets = document.querySelectorAll('[data-reveal]');
    if (!targets.length) return;

    if (!('IntersectionObserver' in window) ||
        window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        targets.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    var observer = new IntersectionObserver(function (entries, obs) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        rootMargin: '0px 0px -10% 0px',
        threshold: 0.15,
    });

    targets.forEach(function (el) { observer.observe(el); });
})();
