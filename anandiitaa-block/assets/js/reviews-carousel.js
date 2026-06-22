/* Reviews carousel — drives the product-reviews "carousel" variant.
   Manual (arrows / dots / swipe); no autoplay. Supports multiple instances. */
(function () {
	'use strict';

	function initCarousel( root ) {
		var track = root.querySelector( '[data-rcar-track]' );
		if ( ! track ) {
			return;
		}
		var slides = track.children;
		var total = slides.length;
		if ( total < 2 ) {
			return;
		}
		var dots = root.querySelectorAll( '[data-rcar-go]' );
		var prev = root.querySelector( '[data-rcar-prev]' );
		var next = root.querySelector( '[data-rcar-next]' );
		var idx = 0;

		function render() {
			track.style.transform = 'translateX(' + ( -idx * 100 ) + '%)';
			Array.prototype.forEach.call( dots, function ( d, i ) {
				d.classList.toggle( 'is-active', i === idx );
				d.setAttribute( 'aria-selected', i === idx ? 'true' : 'false' );
			} );
		}

		function go( n ) {
			idx = ( n + total ) % total;
			render();
		}

		if ( next ) {
			next.addEventListener( 'click', function () { go( idx + 1 ); } );
		}
		if ( prev ) {
			prev.addEventListener( 'click', function () { go( idx - 1 ); } );
		}
		Array.prototype.forEach.call( dots, function ( d ) {
			d.addEventListener( 'click', function () { go( parseInt( d.dataset.rcarGo, 10 ) ); } );
		} );

		// Touch swipe
		var x0 = null;
		track.addEventListener( 'touchstart', function ( e ) { x0 = e.touches[ 0 ].clientX; }, { passive: true } );
		track.addEventListener( 'touchend', function ( e ) {
			if ( x0 === null ) {
				return;
			}
			var dx = e.changedTouches[ 0 ].clientX - x0;
			if ( Math.abs( dx ) > 40 ) {
				go( idx + ( dx < 0 ? 1 : -1 ) );
			}
			x0 = null;
		} );

		render();
	}

	function init() {
		document.querySelectorAll( '[data-rcar]' ).forEach( initCarousel );
	}

	if ( document.readyState !== 'loading' ) {
		init();
	} else {
		document.addEventListener( 'DOMContentLoaded', init );
	}
})();
