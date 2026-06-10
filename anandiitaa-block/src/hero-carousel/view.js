/**
 * Front-end slider behavior for anandiitaa/hero-carousel.
 * Treats each direct child of .__track (the Cover slides) as a slide; adds
 * prev/next arrows, dots, keyboard + autoplay. Pure vanilla, no deps.
 */
function initCarousel( root ) {
	const track = root.querySelector( '.anandiitaa-hero-carousel__track' );
	if ( ! track ) return;
	const slides = Array.from( track.children );
	if ( slides.length <= 1 ) return;

	let index = 0;
	let timer = null;
	const autoplay = root.dataset.autoplay === 'true';
	const interval = parseInt( root.dataset.interval, 10 ) || 5000;

	const go = ( n ) => {
		index = ( n + slides.length ) % slides.length;
		track.style.transform = `translateX(-${ index * 100 }%)`;
		dots.forEach( ( d, i ) => d.setAttribute( 'aria-current', i === index ? 'true' : 'false' ) );
	};

	// Arrows
	const mkArrow = ( dir, label ) => {
		const b = document.createElement( 'button' );
		b.className = `anandiitaa-hero-carousel__arrow anandiitaa-hero-carousel__arrow--${ dir }`;
		b.type = 'button';
		b.setAttribute( 'aria-label', label );
		b.innerHTML = dir === 'prev' ? '&#8249;' : '&#8250;';
		b.addEventListener( 'click', () => { go( index + ( dir === 'prev' ? -1 : 1 ) ); restart(); } );
		return b;
	};
	root.appendChild( mkArrow( 'prev', 'Previous slide' ) );
	root.appendChild( mkArrow( 'next', 'Next slide' ) );

	// Dots
	const dotsWrap = document.createElement( 'div' );
	dotsWrap.className = 'anandiitaa-hero-carousel__dots';
	const dots = slides.map( ( _, i ) => {
		const d = document.createElement( 'button' );
		d.type = 'button';
		d.className = 'anandiitaa-hero-carousel__dot';
		d.setAttribute( 'aria-label', `Go to slide ${ i + 1 }` );
		d.addEventListener( 'click', () => { go( i ); restart(); } );
		dotsWrap.appendChild( d );
		return d;
	} );
	root.appendChild( dotsWrap );

	const start = () => { if ( autoplay ) timer = setInterval( () => go( index + 1 ), interval ); };
	const stop = () => { if ( timer ) clearInterval( timer ); };
	const restart = () => { stop(); start(); };

	root.addEventListener( 'mouseenter', stop );
	root.addEventListener( 'mouseleave', start );

	go( 0 );
	start();
}

document.addEventListener( 'DOMContentLoaded', () => {
	document.querySelectorAll( '.anandiitaa-hero-carousel' ).forEach( initCarousel );
} );
