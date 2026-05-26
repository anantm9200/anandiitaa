<?php
/**
 * SEAMLESS_BG_TEST: single manual cache-busting version for ALL theme assets
 * (CSS / JS / images). Replaces per-file filemtime() busting site-wide.
 * BUMP this string whenever you want every client to refetch assets.
 * Keep it in step with CACHE_VERSION in service-worker.js for a full refresh.
 */
define( 'ANANDIITAA_VER', '23' );

function anandiitaa_enqueue_assets() {
    // Google Fonts: Montserrat (buttons + nav)
    wp_enqueue_style(
        'google-fonts-montserrat',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme stylesheet (self-hosts AppetitePro + DM Sans via @font-face)
    wp_enqueue_style( 'main-styles', get_stylesheet_uri(), array( 'google-fonts-montserrat' ), ANANDIITAA_VER );

    // Hero carousel script
    wp_enqueue_script(
        'hero-carousel',
        get_template_directory_uri() . '/assets/js/hero-carousel.js',
        array(),
        ANANDIITAA_VER,
        true
    );

    // Scroll-triggered fade/slide reveal for standalone sections
    wp_enqueue_script(
        'scroll-reveal',
        get_template_directory_uri() . '/assets/js/scroll-reveal.js',
        array(),
        ANANDIITAA_VER,
        true
    );

    // Single-open behavior for the jaggery health-benefits accordion
    wp_enqueue_script(
        'benefits-accordion',
        get_template_directory_uri() . '/assets/js/benefits-accordion.js',
        array(),
        ANANDIITAA_VER,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'anandiitaa_enqueue_assets' );

/**
 * Global asset cache-buster. Appends ?v=ANANDIITAA_VER so the SW + browser
 * caches refetch whenever you bump that single version constant (replaces the
 * old per-file filemtime busting).
 *
 * Accepts either a full theme URL (e.g. get_template_directory_uri() . '/x.png')
 * or a theme-relative path (e.g. '/assets/images/x.png'). Returns the URL with
 * ?v=<ver> appended if the file exists, otherwise the URL unchanged.
 */
if ( ! function_exists( 'anandiitaa_bust' ) ) {
    function anandiitaa_bust( $url_or_rel ) {
        $tpl_uri = get_template_directory_uri();
        $tpl_dir = get_template_directory();
        $rel     = ( strpos( $url_or_rel, $tpl_uri ) === 0 )
                   ? substr( $url_or_rel, strlen( $tpl_uri ) )
                   : $url_or_rel;
        if ( $rel === '' || $rel[0] !== '/' ) $rel = '/' . $rel;
        $abs = $tpl_dir . $rel;
        $full = $tpl_uri . $rel;
        return file_exists( $abs ) ? $full . '?v=' . ANANDIITAA_VER : $full;
    }
}

/**
 * Defer all our custom theme scripts. None of them are critical-path —
 * carousel, scroll-reveal, benefits-accordion all hook to
 * DOMContentLoaded internally — so `defer` is safe and gets the parser
 * unblocked sooner. Filter only touches our own handles to avoid
 * surprising any future WP/plugin scripts.
 */
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
    $defer_handles = array( 'hero-carousel', 'scroll-reveal', 'benefits-accordion' );
    if ( in_array( $handle, $defer_handles, true ) && false === strpos( $tag, ' defer' ) ) {
        $tag = str_replace( '<script ', '<script defer ', $tag );
    }
    return $tag;
}, 10, 2 );

function anandiitaa_preconnect_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'anandiitaa_preconnect_fonts', 1 );

/**
 * Mac UA detection → adds `is-mac` to <html class> client-side.
 * Done in JS (not PHP) because Pantheon's Varnish edge cache strips
 * User-Agent from the cache key, so server-side UA logic gets cache-poisoned.
 * Inlined in <head> with `documentElement` so the class is applied before
 * the body renders — no FOUC on Mac visitors.
 */
add_action( 'wp_head', function () {
    echo '<script>(function(){if(/Macintosh|Mac OS X/i.test(navigator.userAgent))document.documentElement.classList.add("is-mac");})();</script>' . "\n";
}, 2 );

/**
 * Home-page perf hints:
 *   - Preload the LCP hero image (laptop variant; mac viewers get a separate
 *     imagesrcset path so the browser picks correctly without download waste).
 *   - Prefetch the most likely next pages so click-to-paint feels instant.
 * Only emits on the front page — other pages don't need these hints.
 */
add_action( 'wp_head', function () {
    if ( ! is_front_page() ) return;
    $tpl = get_template_directory_uri();
    $laptop_lcp = anandiitaa_bust( '/images/home/laptop/slider/slide-1.png' );
    $mac_lcp    = anandiitaa_bust( '/images/home/mac/1.png' );

    // Preload LCP hero. Browser picks the right variant via media query +
    // imagesrcset. fetchpriority=high tells the browser this is the LCP.
    echo '<link rel="preload" as="image" href="' . esc_url( $laptop_lcp ) . '" imagesrcset="' . esc_url( $mac_lcp ) . ' 1440w, ' . esc_url( $laptop_lcp ) . ' 1200w" imagesizes="100vw" fetchpriority="high">' . "\n";

    // Prefetch sibling pages — browser pulls them during idle time so nav
    // clicks render instantly. as="document" keeps prefetch from being
    // mistreated as a stylesheet/script preload.
    $prefetch_paths = array( '/products/jaggery', '/products/sugar', '/about-us', '/products' );
    foreach ( $prefetch_paths as $p ) {
        echo '<link rel="prefetch" href="' . esc_url( home_url( $p ) ) . '" as="document">' . "\n";
    }
}, 3 );

/**
 * Document <title> handling.
 * 1) `add_theme_support('title-tag')` lets WP emit the <title> automatically;
 *    we removed the manual one in header.php so WP is now the single source.
 * 2) `pre_get_document_title` overrides per-route so theme-routed URLs (e.g.
 *    /products/jaggery) get a clean human title instead of WP's "Page not found"
 *    fallback (the URL doesn't match a real Page, but our template_include
 *    filter still renders the right template).
 */
add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
} );

add_filter( 'pre_get_document_title', function ( $title ) {
    $site = get_bloginfo( 'name' );
    $req  = isset( $_SERVER['REQUEST_URI'] ) ? trim( strtok( $_SERVER['REQUEST_URI'], '?' ), '/' ) : '';

    $titles = array(
        ''                 => 'Anandiitaa — Premium Refined Sugar & Desi Jaggery',
        'products'         => 'Our Products | ' . $site,
        'products/jaggery' => 'Desi Jaggery | ' . $site,
        'products/sugar'   => 'Premium Refined Sugar | ' . $site,
        'about-us'         => 'About Us | ' . $site,
    );

    if ( isset( $titles[ $req ] ) ) {
        return $titles[ $req ];
    }
    return $title; // let WP build the default for any other route
} );

/* ========================================================================
   Carbon Fields migration — Step 1: Home carousel (slides 1–5)
   Carbon Fields gives us a true repeater (Complex field) for free, so we
   register one Theme Options page "Home Content" with a Complex field
   "home_carousel_slides" + nested Complex "features". Admin can add /
   remove / reorder slides freely. front-page.php reads the saved value
   via anandiitaa_get_carousel_slides() and falls back to the hardcoded
   $slides array when nothing is configured yet.
   ======================================================================== */

add_action( 'after_setup_theme', function () {
    require_once get_template_directory() . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
} );

add_action( 'carbon_fields_register_fields', function () {
    \Carbon_Fields\Container::make( 'theme_options', __( 'Home Content' ) )
        ->set_icon( 'dashicons-images-alt2' )
        ->add_fields( array(
            \Carbon_Fields\Field::make( 'complex', 'home_carousel_slides', __( 'Carousel Slides' ) )
                ->set_layout( 'tabbed-vertical' )
                ->set_header_template( '<%- heading || "Slide" %>' )
                ->add_fields( array(
                    \Carbon_Fields\Field::make( 'image', 'image', 'Background image (laptop / default)' )
                        ->set_value_type( 'url' )
                        ->set_help_text( 'Default bg. Used everywhere except very large (1440+) Mac retina screens when a mac variant is provided.' ),
                    \Carbon_Fields\Field::make( 'image', 'mac_image', 'Mac / retina background (optional)' )
                        ->set_value_type( 'url' )
                        ->set_help_text( 'High-res variant served on viewports ≥1440px. Leave empty to fall back to the default image.' ),
                    \Carbon_Fields\Field::make( 'text', 'alt', 'Alt text' ),
                    \Carbon_Fields\Field::make( 'textarea', 'heading', 'Heading' )
                        ->set_rows( 2 )
                        ->set_help_text( 'HTML allowed: use <br> for line breaks.' ),
                    \Carbon_Fields\Field::make( 'select', 'position', 'Heading position' )
                        ->set_options( array(
                            ''               => 'Default (left, vertical center)',
                            'top-center'     => 'Top center',
                            'bottom-center'  => 'Bottom center',
                            'top-caption'    => 'Top caption (small line)',
                        ) ),
                    \Carbon_Fields\Field::make( 'text', 'cta_label', 'CTA label' )
                        ->set_help_text( 'Leave empty to hide the button.' ),
                    \Carbon_Fields\Field::make( 'text', 'cta_href', 'CTA link' )
                        ->set_default_value( '/about-us' ),
                    \Carbon_Fields\Field::make( 'complex', 'features', 'Features (max 3)' )
                        ->set_max( 3 )
                        ->set_layout( 'tabbed-horizontal' )
                        ->set_header_template( '<%- text || "feature" %>' )
                        ->add_fields( array(
                            \Carbon_Fields\Field::make( 'select', 'icon', 'Icon' )
                                ->set_options( array(
                                    'shield'    => 'Shield',
                                    'clipboard' => 'Clipboard',
                                    'spoon'     => 'Spoon',
                                ) ),
                            \Carbon_Fields\Field::make( 'text', 'text', 'Text' ),
                        ) ),
                ) ),
        ) );
} );

/**
 * Returns the carousel slides as an array shaped exactly like the existing
 * front-page.php $slides[0..4]. Returns null when nothing is configured,
 * so the template falls back to its hardcoded defaults.
 */
function anandiitaa_get_carousel_slides() {
    if ( ! function_exists( 'carbon_get_theme_option' ) ) return null;
    $rows = carbon_get_theme_option( 'home_carousel_slides' );
    if ( empty( $rows ) ) return null;

    $slides = array();
    foreach ( $rows as $row ) {
        if ( empty( $row['image'] ) ) continue;  // skip rows without a bg

        $slide = array(
            'image'     => $row['image'],
            'mac_image' => ! empty( $row['mac_image'] ) ? $row['mac_image'] : '',
            'alt'       => ! empty( $row['alt'] ) ? $row['alt'] : '',
        );

        if ( ! empty( $row['heading'] ) )  $slide['heading']  = $row['heading'];
        if ( ! empty( $row['position'] ) ) $slide['position'] = $row['position'];

        if ( ! empty( $row['cta_label'] ) && ! empty( $row['cta_href'] ) ) {
            $slide['cta'] = array(
                'label' => $row['cta_label'],
                'href'  => $row['cta_href'],
                'class' => 'btn-primary',
            );
        }

        $features = array();
        if ( ! empty( $row['features'] ) && is_array( $row['features'] ) ) {
            foreach ( $row['features'] as $f ) {
                if ( ! empty( $f['icon'] ) && ! empty( $f['text'] ) ) {
                    $features[] = array( 'icon' => $f['icon'], 'text' => $f['text'] );
                }
            }
        }
        if ( $features ) $slide['features'] = $features;

        $slides[] = $slide;
    }
    return $slides ?: null;
}

/**
 * Serve the Service Worker file at the site root (/service-worker.js) so its
 * scope covers the entire origin, not just /wp-content/themes/. Pantheon's
 * Nginx doesn't let us add `Service-Worker-Allowed` to a static file response,
 * so we proxy through PHP and emit the right headers manually.
 */
add_action( 'init', function () {
    if ( '/service-worker.js' !== ( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ) ?? '' ) ) {
        return;
    }
    $file = get_template_directory() . '/service-worker.js';
    if ( ! file_exists( $file ) ) return;

    header( 'Content-Type: application/javascript; charset=UTF-8' );
    header( 'Service-Worker-Allowed: /' );
    // Short TTL so we can iterate; bump SW's own CACHE_VERSION for real changes.
    header( 'Cache-Control: no-cache, must-revalidate' );
    readfile( $file );
    exit;
} );

/**
 * Inline SW registration. Runs ASAP, doesn't block render. Uses scope '/'
 * which works because the response sets `Service-Worker-Allowed: /` above.
 * If the browser already has the SW installed, this is a no-op.
 */
add_action( 'wp_head', function () {
    ?>
    <script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function () {
            navigator.serviceWorker.register('/service-worker.js', { scope: '/' }).catch(function () {});
        });
    }
    </script>
    <?php
}, 4 );

/**
 * Map theme-owned URLs directly to template files so we don't need a WP page
 * created in the admin for each one. Add new routes to $routes as you build them.
 */
function anandiitaa_route_templates( $template ) {
    $routes = array(
        'products'         => 'page-products.php',
        'products/jaggery' => 'page-products-jaggery.php',
        'products/sugar'   => 'page-products-sugar.php',
        'about-us'         => 'page-about.php',
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
