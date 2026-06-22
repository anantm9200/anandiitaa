<?php
/**
 * Anandiitaa Block — theme bootstrap.
 *
 * Block themes need little PHP; theme.json + templates do most of the work.
 * The homepage, header and footer are reproduced 1:1 from the classic
 * my-custom-theme via PHP block patterns (see patterns/) so the rendered
 * markup matches what prod ships, and prod-styles.css (the exact classic
 * style.css) styles it identically.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fallback cache-bust version. Real busting is per-file via filemtime()
 * (anandiitaa_asset_ver / anandiitaa_bust). Ported from classic functions.php.
 */
if ( ! defined( 'ANANDIITAA_VER' ) ) {
	define( 'ANANDIITAA_VER', '31' );
}

/**
 * Returns the cache-bust version string for a theme-relative asset path.
 * Uses the file's mtime so each edit auto-busts; falls back to ANANDIITAA_VER.
 * Ported verbatim from the classic theme.
 */
if ( ! function_exists( 'anandiitaa_asset_ver' ) ) {
	function anandiitaa_asset_ver( $rel ) {
		$abs = get_template_directory() . ( strlen( $rel ) && $rel[0] === '/' ? $rel : '/' . $rel );
		$mt  = @filemtime( $abs );
		return $mt ? (string) $mt : ANANDIITAA_VER;
	}
}

/**
 * Global asset cache-buster. Appends ?v=<filemtime> to a full theme URL or a
 * theme-relative path so URLs auto-bust on every file change. Ported verbatim
 * from the classic theme.
 */
if ( ! function_exists( 'anandiitaa_bust' ) ) {
	function anandiitaa_bust( $url_or_rel ) {
		$tpl_uri = get_template_directory_uri();
		$tpl_dir = get_template_directory();
		$rel     = ( strpos( $url_or_rel, $tpl_uri ) === 0 )
				   ? substr( $url_or_rel, strlen( $tpl_uri ) )
				   : $url_or_rel;
		if ( $rel === '' || $rel[0] !== '/' ) $rel = '/' . $rel;
		$abs  = $tpl_dir . $rel;
		$full = $tpl_uri . $rel;
		if ( ! file_exists( $abs ) ) return $full;
		$mt = @filemtime( $abs );
		return $mt ? $full . '?v=' . $mt : $full . '?v=' . ANANDIITAA_VER;
	}
}

/**
 * Feature-bullet SVG icons used by the hero slides. Ported from the classic
 * front-page.php $icons array so the home-hero pattern can reuse them.
 */
if ( ! function_exists( 'anandiitaa_feature_icons' ) ) {
	function anandiitaa_feature_icons() {
		return array(
			'shield'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
			'clipboard' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="M9 14h6"></path><path d="M9 10h6"></path><path d="M9 18h6"></path></svg>',
			'spoon'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"></path><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"></path><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"></path><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"></path></svg>',
		);
	}
}

/**
 * Renders a slide/section background `<div class="hero-slide__bg"><picture>…`
 * with the exact responsive <source> tiers prod uses (mac ≥1440, d1366, d1280,
 * tablet, phone) — derived from the laptop path + on-disk existence, identical
 * to the classic front-page.php logic. Theme-relative paths resolve to the theme
 * URI + filemtime bust; full media-library URLs are used as-is (and skip tier
 * derivation, so a client-uploaded image just renders as a single <img>).
 * Shared by every Anandiitaa section block's render.php so the markup stays 1:1.
 */
if ( ! function_exists( 'anandiitaa_bg_picture' ) ) {
	function anandiitaa_bg_picture( $laptop, $explicit_mac = '', $explicit_tablet = '', $explicit_phone = '', $alt = '', $is_priority = false ) {
		if ( ! $laptop ) {
			return '';
		}
		$tpl = get_template_directory_uri();
		$dir = get_template_directory();
		$resolve = function ( $v ) use ( $tpl ) {
			if ( ! $v ) { return ''; }
			if ( preg_match( '#^https?://#i', $v ) ) { return $v; }
			return function_exists( 'anandiitaa_bust' ) ? anandiitaa_bust( $v ) : $tpl . $v;
		};
		$has = function ( $rel ) use ( $dir ) {
			if ( ! $rel || preg_match( '#^https?://#i', $rel ) ) { return false; }
			return file_exists( $dir . $rel );
		};

		if ( $explicit_mac ) {
			$mac = $explicit_mac; $has_mac = true;
		} else {
			$mac     = ( strpos( $laptop, '/images/home/laptop/slider/slide-1.png' ) !== false ) ? '/images/home/mac/1.png' : str_replace( '/images/home/laptop/', '/images/home/mac/', $laptop );
			$has_mac = $has( $mac );
		}
		$d1366 = str_replace( '/images/home/laptop/', '/images/home/d1366/', $laptop ); $has_d1366 = $has( $d1366 );
		$d1280 = str_replace( '/images/home/laptop/', '/images/home/d1280/', $laptop ); $has_d1280 = $has( $d1280 );
		if ( $explicit_tablet ) {
			$tablet = $explicit_tablet; $has_tablet = true;
		} else {
			$tablet = str_replace( '/images/home/laptop/', '/images/home/tablet/', $laptop ); $has_tablet = $has( $tablet );
		}
		if ( $explicit_phone ) {
			$phone = $explicit_phone; $has_phone = true;
		} else {
			$phone = str_replace( '/images/home/laptop/', '/images/home/phone/', $laptop ); $has_phone = $has( $phone );
		}

		ob_start();
		?>
		<div class="hero-slide__bg">
			<picture>
				<?php if ( $has_mac ) : ?>
					<source media="(min-width: 1440px)" srcset="<?php echo esc_url( $resolve( $mac ) ); ?>">
				<?php endif; ?>
				<?php if ( $has_d1366 ) : ?>
					<source media="(min-width: 1281px) and (max-width: 1439px)" srcset="<?php echo esc_url( $resolve( $d1366 ) ); ?>">
				<?php endif; ?>
				<?php if ( $has_d1280 ) : ?>
					<source media="(min-width: 1101px) and (max-width: 1280px)" srcset="<?php echo esc_url( $resolve( $d1280 ) ); ?>">
				<?php endif; ?>
				<?php if ( $has_tablet ) : ?>
					<source media="(min-width: 701px) and (max-width: 1100px)" srcset="<?php echo esc_url( $resolve( $tablet ) ); ?>">
				<?php endif; ?>
				<?php if ( $has_phone ) : ?>
					<source media="(max-width: 700px)" srcset="<?php echo esc_url( $resolve( $phone ) ); ?>">
				<?php endif; ?>
				<img src="<?php echo esc_url( $resolve( $laptop ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>" <?php echo $is_priority ? 'fetchpriority="high"' : 'loading="lazy"'; ?>>
			</picture>
		</div>
		<?php
		return ob_get_clean();
	}
}

/** Resolve a single image value (media-library URL as-is, theme-relative → URI + bust). */
if ( ! function_exists( 'anandiitaa_img_url' ) ) {
	function anandiitaa_img_url( $val ) {
		if ( ! $val ) { return ''; }
		if ( preg_match( '#^https?://#i', $val ) ) { return $val; }
		return function_exists( 'anandiitaa_bust' ) ? anandiitaa_bust( $val ) : get_template_directory_uri() . $val;
	}
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
	// EXACT-REPLICA: the full classic theme CSS. Depends on 'global-styles' so it
	// prints AFTER WordPress' theme.json inline styles and therefore wins the
	// cascade 1:1 — prod-styles.css is byte-identical to the classic style.css.
	wp_enqueue_style(
		'anandiitaa-prod',
		get_theme_file_uri( 'prod-styles.css' ),
		array( 'anandiitaa-block-style', 'global-styles' ),
		anandiitaa_asset_ver( '/prod-styles.css' )
	);
	// New UI that isn't a 1:1 prod reproduction (fluid extensions, e.g. the
	// testimonials grid). Depends on prod-styles so it loads after and can rely
	// on the brand CSS variables.
	wp_enqueue_style(
		'anandiitaa-extensions',
		get_theme_file_uri( 'assets/css/extensions.css' ),
		array( 'anandiitaa-prod' ),
		anandiitaa_asset_ver( '/assets/css/extensions.css' )
	);

	// Classic front-end scripts — same set/order as prod. (No header-scroll:
	// the classic theme never enqueues it.)
	foreach ( array( 'hero-carousel', 'scroll-reveal', 'benefits-accordion', 'mobile-menu', 'reviews-carousel' ) as $js ) {
		if ( file_exists( get_theme_file_path( "assets/js/$js.js" ) ) ) {
			wp_enqueue_script(
				"anandiitaa-$js",
				get_theme_file_uri( "assets/js/$js.js" ),
				array(),
				anandiitaa_asset_ver( "/assets/js/$js.js" ),
				true
			);
		}
	}
} );

/**
 * Defer non-critical scripts (parity with classic). mobile-menu stays
 * non-deferred, exactly like prod.
 */
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	$defer = array( 'anandiitaa-hero-carousel', 'anandiitaa-scroll-reveal', 'anandiitaa-benefits-accordion' );
	if ( in_array( $handle, $defer, true ) && false === strpos( $tag, ' defer' ) ) {
		$tag = str_replace( '<script ', '<script defer ', $tag );
	}
	return $tag;
}, 10, 2 );

/**
 * Register custom dynamic blocks built with @wordpress/scripts. Each block's
 * render.php emits the exact prod markup; only text/image values are editable
 * (block attributes, stored in the page content in the DB).
 */
add_action( 'init', function () {
	foreach ( glob( get_template_directory() . '/build/*/block.json' ) as $block_json ) {
		register_block_type( dirname( $block_json ) );
	}
} );

/**
 * Custom block category so the Anandiitaa section blocks group together in the
 * inserter.
 */
add_filter( 'block_categories_all', function ( $categories ) {
	array_unshift( $categories, array(
		'slug'  => 'anandiitaa',
		'title' => 'Anandiitaa',
		'icon'  => null,
	) );
	return $categories;
} );

/**
 * Expose the theme URI to the block editor so edit.js can preview the
 * theme-relative default images (media-library images are absolute already).
 */
add_action( 'enqueue_block_editor_assets', function () {
	wp_register_script( 'anandiitaa-editor-data', '', array(), null, false );
	wp_enqueue_script( 'anandiitaa-editor-data' );
	wp_add_inline_script(
		'anandiitaa-editor-data',
		'window.anandiitaaThemeUri = ' . wp_json_encode( get_template_directory_uri() ) . ';',
		'before'
	);
} );

/**
 * Route theme-owned URLs (no WP page exists for them) to file-based block
 * templates, mirroring the classic theme's anandiitaa_route_templates(). Runs
 * after core's locate_block_template (priority 99): it swaps the resolved
 * block-template content for the matched template and renders via the standard
 * template-canvas, so /products, /products/jaggery and /products/sugar resolve
 * to templates/page-products*.html with a 200.
 */
add_filter( 'template_include', function ( $template ) {
	// route => array( block-template slug, editable page slug ). The page holds
	// the section blocks (editable in wp-admin); the routed template wraps that
	// page's wp:post-content in the correct <main> class for the prod CSS.
	$routes = array(
		'about-us'                  => array( 'page-about',                   'about-us-content' ),
		'nutritional-facts'         => array( 'page-nutrition',               'nutrition-content' ),
		'manufacturing-details'     => array( 'page-mfg',                     'mfg-content' ),
		'products'                  => array( 'page-products',                'products' ),
		'products/jaggery'          => array( 'page-products-jaggery',        'products-jaggery' ),
		'products/sugar'            => array( 'page-products-sugar',          'products-sugar' ),
		'recipes/home-made-cookies' => array( 'page-recipes-cookies',        'recipes-cookies' ),
		'recipes/gulab-jamun'       => array( 'page-recipes-gulab-jamun',    'recipes-gulab-jamun' ),
		'recipes/choco-lava-cake'   => array( 'page-recipes-choco-lava-cake', 'recipes-choco-lava-cake' ),
		'recipes/gajar-ka-halwa'    => array( 'page-recipes-gajar-ka-halwa',  'recipes-gajar-ka-halwa' ),
	);
	$req = trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( ! isset( $routes[ $req ] ) ) {
		return $template;
	}
	list( $tmpl_slug, $page_slug ) = $routes[ $req ];

	$block_template = get_block_template( get_stylesheet() . '//' . $tmpl_slug, 'wp_template' );
	if ( ! $block_template || empty( $block_template->content ) ) {
		return $template;
	}

	// Point the main query at the editable page so wp:post-content renders its blocks.
	$page = get_page_by_path( $page_slug, OBJECT, 'page' );
	global $wp_query, $post, $_wp_current_template_content, $_wp_current_template_id;
	if ( $page ) {
		$post                        = $page;
		$wp_query->post              = $page;
		$wp_query->posts             = array( $page );
		$wp_query->queried_object    = $page;
		$wp_query->queried_object_id = $page->ID;
		$wp_query->post_count        = 1;
		$wp_query->found_posts       = 1;
		$wp_query->is_page           = true;
		$wp_query->is_singular       = true;
		$wp_query->is_404            = false;
		setup_postdata( $page );
	} elseif ( $wp_query instanceof WP_Query ) {
		$wp_query->is_404 = false;
	}

	$_wp_current_template_id      = $block_template->id;
	$_wp_current_template_content = $block_template->content;
	status_header( 200 );
	return ABSPATH . WPINC . '/template-canvas.php';
}, 99 );
