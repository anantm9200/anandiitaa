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
	wp_enqueue_style(
		'anandiitaa-block-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
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
