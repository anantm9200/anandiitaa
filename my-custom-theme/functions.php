<?php
function anandiitaa_enqueue_assets() {
    // Google Fonts: Montserrat (buttons + nav)
    wp_enqueue_style(
        'google-fonts-montserrat',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme stylesheet (self-hosts AppetitePro + DM Sans via @font-face)
    wp_enqueue_style( 'main-styles', get_stylesheet_uri(), array( 'google-fonts-montserrat' ), '1.4' );

    // Hero carousel script
    wp_enqueue_script(
        'hero-carousel',
        get_template_directory_uri() . '/assets/js/hero-carousel.js',
        array(),
        '1.0',
        true
    );

    // Header scroll-state toggle
    wp_enqueue_script(
        'header-scroll',
        get_template_directory_uri() . '/assets/js/header-scroll.js',
        array(),
        '1.0',
        true
    );

    // Scroll-triggered fade/slide reveal for standalone sections
    wp_enqueue_script(
        'scroll-reveal',
        get_template_directory_uri() . '/assets/js/scroll-reveal.js',
        array(),
        '1.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'anandiitaa_enqueue_assets' );

function anandiitaa_preconnect_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'anandiitaa_preconnect_fonts', 1 );
