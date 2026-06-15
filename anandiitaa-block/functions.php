<?php
/**
 * Anandiitaa Block (PoC) — minimal theme bootstrap.
 * Block themes need almost no PHP; theme.json + templates do the work.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'title-tag' );
} );

add_action( 'wp_enqueue_scripts', function () {
	// Montserrat (UI / nav / buttons) — same Google Fonts load as the classic theme.
	wp_enqueue_style(
		'google-fonts-montserrat',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'anandiitaa-block-style',
		get_stylesheet_uri(),
		array( 'google-fonts-montserrat' ),
		wp_get_theme()->get( 'Version' )
	);
	// EXACT-REPLICA: the full classic theme CSS, loaded last so prod styling
	// applies 1:1 to the reproduced markup (font @font-face paths resolve from
	// the theme root, where assets/fonts/ was copied).
	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'anandiitaa-prod', get_theme_file_uri( 'prod-styles.css' ), array( 'anandiitaa-block-style' ), $ver );

	// Classic front-end scripts (same behavior as prod).
	foreach ( array( 'hero-carousel', 'scroll-reveal', 'benefits-accordion', 'mobile-menu', 'header-scroll' ) as $js ) {
		if ( file_exists( get_theme_file_path( "assets/js/$js.js" ) ) ) {
			wp_enqueue_script( "anandiitaa-$js", get_theme_file_uri( "assets/js/$js.js" ), array(), $ver, true );
		}
	}
} );

/**
 * Register custom blocks built with @wordpress/scripts (each compiled into
 * /build/<block>/ with its block.json). Add new blocks to the array.
 */
add_action( 'init', function () {
	$blocks = array( 'hero-carousel' );
	foreach ( $blocks as $block ) {
		$dir = get_template_directory() . '/build/' . $block;
		if ( file_exists( $dir . '/block.json' ) ) {
			register_block_type( $dir );
		}
	}
} );
