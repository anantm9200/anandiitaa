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
    wp_enqueue_style( 'main-styles', get_stylesheet_uri(), array( 'google-fonts-montserrat' ), '4.1' );

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
        '1.4',
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

    // Single-open behavior for the jaggery health-benefits accordion
    wp_enqueue_script(
        'benefits-accordion',
        get_template_directory_uri() . '/assets/js/benefits-accordion.js',
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

/**
 * Map theme-owned URLs directly to template files so we don't need a WP page
 * created in the admin for each one. Add new routes to $routes as you build them.
 */
function anandiitaa_route_templates( $template ) {
    $routes = array(
        'products/jaggery' => 'page-products-jaggery.php',
        'products/sugar'   => 'page-products-sugar.php',
    );

    $request = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ) ?? '', '/' );

    if ( isset( $routes[ $request ] ) ) {
        $candidate = get_template_directory() . '/' . $routes[ $request ];
        if ( file_exists( $candidate ) ) {
            status_header( 200 );
            return $candidate;
        }
    }
    return $template;
}
add_filter( 'template_include', 'anandiitaa_route_templates', 99 );
