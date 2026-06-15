(function () {
    'use strict';

    const root = document.querySelector('.hero-carousel');
    if (!root) return;

    const track = root.querySelector('[data-hero-track]');
    const slides = track ? track.querySelectorAll('.hero-slide') : [];
    const dots = root.querySelectorAll('[data-hero-go]');
    const prev = root.querySelector('[data-hero-prev]');
    const next = root.querySelector('[data-hero-next]');

    if (!track || slides.length < 2) return;

    const total = slides.length;
    const intervalMs = 6000;
    let idx = 0;
    let timer = null;

    function render() {
        track.style.transform = `translateX(${-idx * 100}%)`;
        slides.forEach((s, i) => s.setAttribute('aria-hidden', i === idx ? 'false' : 'true'));
        dots.forEach((d, i) => {
            d.classList.toggle('is-active', i === idx);
            d.setAttribute('aria-selected', i === idx ? 'true' : 'false');
        });
    }

    function go(n) {
        idx = (n + total) % total;
        render();
    }

    function start() {
        stop();
        timer = setInterval(() => go(idx + 1), intervalMs);
    }

    function stop() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    next && next.addEventListener('click', () => { go(idx + 1); start(); });
    prev && prev.addEventListener('click', () => { go(idx - 1); start(); });
    dots.forEach((d) => d.addEventListener('click', () => {
        go(parseInt(d.dataset.heroGo, 10));
        start();
    }));

    root.addEventListener('mouseenter', stop);
    root.addEventListener('mouseleave', start);
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) stop(); else start();
    });

    document.addEventListener('keydown', (e) => {
        if (!root.matches(':hover') && document.activeElement && !root.contains(document.activeElement)) return;
        if (e.key === 'ArrowRight') { go(idx + 1); start(); }
        if (e.key === 'ArrowLeft')  { go(idx - 1); start(); }
    });

    render();
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) start();
})();
