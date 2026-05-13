(function () {
    'use strict';

    const items = document.querySelectorAll('.benefit-item details');
    if (!items.length) return;

    // Why Web Animations API instead of CSS transitions on grid-template-rows:
    //   1. grid-template-rows interpolates fractional units (0fr → 1fr) which
    //      forces a full grid re-solve every frame — janky with heavy content
    //      (images, large text blocks).
    //   2. WAAPI runs on the browser's animation thread with native scheduling,
    //      giving smoother frame pacing.
    //   3. Animating measured pixel `height` is a single layout property,
    //      cheaper to interpolate than fractional grid math.

    const OPEN_DUR  = 700;                                  // ms
    const CLOSE_DUR = 380;                                  // ms — snappier
    const EASE      = 'cubic-bezier(0.22, 1, 0.36, 1)';     // ease-out (open)
    const EASE_CLOSE= 'cubic-bezier(0.4, 0, 0.2, 1)';       // balanced (close)

    function closeOther(other) {
        if (!other.open) return;
        const reveal = other.querySelector('.benefit-reveal');
        other.open = false;
        if (reveal) reveal.style.height = '';
    }

    items.forEach(function (current) {
        const summary = current.querySelector('summary');
        const reveal  = current.querySelector('.benefit-reveal');
        if (!summary || !reveal) return;

        const child = reveal.firstElementChild;

        summary.addEventListener('click', function (e) {
            e.preventDefault();

            // Skip if a previous animation is still in flight on this element.
            if (reveal.getAnimations().length) return;

            if (current.open) {
                // CLOSE: measure current height, animate to 0, then unset open.
                const startH = reveal.scrollHeight;
                reveal.style.height = startH + 'px';

                const anim = reveal.animate(
                    [{ height: startH + 'px' }, { height: '0px' }],
                    { duration: CLOSE_DUR, easing: EASE_CLOSE, fill: 'forwards' }
                );

                if (child) {
                    child.animate(
                        [
                            { opacity: 1, transform: 'translateY(0)' },
                            { opacity: 0, transform: 'translateY(-6px)' }
                        ],
                        { duration: CLOSE_DUR, easing: EASE_CLOSE, fill: 'forwards' }
                    );
                }

                anim.onfinish = function () {
                    current.open = false;
                    reveal.style.height = '';
                    anim.cancel();
                };
            } else {
                // Close any sibling that's open (single-open accordion).
                items.forEach(function (other) {
                    if (other !== current) closeOther(other);
                });

                // OPEN: set open so content lays out, measure target height,
                // animate 0 → measured px, then clear inline height.
                current.open = true;
                // Force native browser to skip its own snap — we control height.
                reveal.style.height = 'auto';
                const targetH = reveal.scrollHeight;
                reveal.style.height = '0px';

                const anim = reveal.animate(
                    [{ height: '0px' }, { height: targetH + 'px' }],
                    { duration: OPEN_DUR, easing: EASE, fill: 'forwards' }
                );

                if (child) {
                    child.animate(
                        [
                            { opacity: 0, transform: 'translateY(-6px)' },
                            { opacity: 1, transform: 'translateY(0)' }
                        ],
                        { duration: OPEN_DUR, easing: EASE, fill: 'forwards', delay: 80 }
                    );
                }

                anim.onfinish = function () {
                    reveal.style.height = '';
                    anim.cancel();
                };
            }
        });
    });
})();
