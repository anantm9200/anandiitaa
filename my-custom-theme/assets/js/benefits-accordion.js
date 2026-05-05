(function () {
    'use strict';

    const items = document.querySelectorAll('.benefit-item details');
    if (!items.length) return;

    items.forEach(function (current) {
        current.addEventListener('toggle', function () {
            if (!current.open) return;
            // Close any sibling that's also open so only one is expanded at a time.
            items.forEach(function (other) {
                if (other !== current && other.open) {
                    other.open = false;
                }
            });
        });
    });
})();
