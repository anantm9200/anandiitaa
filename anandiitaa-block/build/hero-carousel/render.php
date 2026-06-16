<?php
/**
 * Dynamic render — anandiitaa/hero-carousel.
 *
 * Emits the exact classic `.hero-carousel` markup (same classes / mechanics as
 * my-custom-theme/front-page.php) so prod-styles.css styles it pixel-identically
 * and assets/js/hero-carousel.js drives it. Layout, classes, the <picture> tier
 * logic, arrows and dots are LOCKED here (dev-owned). Only per-slide text + image
 * values come from the block's `slides` attribute (client-owned, stored in the
 * page content in the DB).
 *
 * @var array    $attributes
 * @var string   $content
 * @var WP_Block $block
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$slides = ( isset( $attributes['slides'] ) && is_array( $attributes['slides'] ) ) ? $attributes['slides'] : array();
if ( empty( $slides ) ) {
	return;
}

$tpl     = get_template_directory_uri();
$tpl_dir = get_template_directory();
$icons   = function_exists( 'anandiitaa_feature_icons' ) ? anandiitaa_feature_icons() : array();

/** Full media-library URL → used as-is; theme-relative path → theme URI + filemtime bust (exactly like prod). */
$resolve = function ( $val ) use ( $tpl ) {
	if ( ! $val ) {
		return '';
	}
	if ( preg_match( '#^https?://#i', $val ) ) {
		return $val;
	}
	return function_exists( 'anandiitaa_bust' ) ? anandiitaa_bust( $val ) : $tpl . $val;
};
/** True only for an in-theme (relative) file that exists on disk — decides which responsive <source> tiers to emit, matching prod 1:1 for the default images. */
$theme_has = function ( $rel ) use ( $tpl_dir ) {
	if ( ! $rel || preg_match( '#^https?://#i', $rel ) ) {
		return false;
	}
	return file_exists( $tpl_dir . $rel );
};
/** Mirror prod's $mac_url_for: slide-1 maps to /mac/1.png, everything else mirrors the laptop path under /mac/. */
$mac_url_for    = function ( $u ) { return ( strpos( $u, '/images/home/laptop/slider/slide-1.png' ) !== false ) ? '/images/home/mac/1.png' : str_replace( '/images/home/laptop/', '/images/home/mac/', $u ); };
$d1366_url_for  = function ( $u ) { return str_replace( '/images/home/laptop/', '/images/home/d1366/', $u ); };
$d1280_url_for  = function ( $u ) { return str_replace( '/images/home/laptop/', '/images/home/d1280/', $u ); };
$tablet_url_for = function ( $u ) { return str_replace( '/images/home/laptop/', '/images/home/tablet/', $u ); };
$phone_url_for  = function ( $u ) { return str_replace( '/images/home/laptop/', '/images/home/phone/', $u ); };

$count = count( $slides );
ob_start();
?>
<section class="hero-carousel" aria-roledescription="carousel" aria-label="Anandiitaa highlights">
	<div class="hero-track" data-hero-track>
		<?php foreach ( $slides as $i => $slide ) :
			$laptop = isset( $slide['image'] ) ? $slide['image'] : '';

			// mac: explicit override wins, else derive + verify (theme files only).
			if ( ! empty( $slide['macImage'] ) ) {
				$mac_url = $slide['macImage']; $has_mac = true;
			} elseif ( $laptop ) {
				$mac_url = $mac_url_for( $laptop ); $has_mac = $theme_has( $mac_url );
			} else { $mac_url = ''; $has_mac = false; }

			$d1366_url = $laptop ? $d1366_url_for( $laptop ) : ''; $has_d1366 = $d1366_url && $theme_has( $d1366_url );
			$d1280_url = $laptop ? $d1280_url_for( $laptop ) : ''; $has_d1280 = $d1280_url && $theme_has( $d1280_url );

			if ( ! empty( $slide['tabletImage'] ) ) {
				$tablet_url = $slide['tabletImage']; $has_tablet = true;
			} elseif ( $laptop ) {
				$tablet_url = $tablet_url_for( $laptop ); $has_tablet = $theme_has( $tablet_url );
			} else { $tablet_url = ''; $has_tablet = false; }

			if ( ! empty( $slide['phoneImage'] ) ) {
				$phone_url = $slide['phoneImage']; $has_phone = true;
			} elseif ( $laptop ) {
				$phone_url = $phone_url_for( $laptop ); $has_phone = $theme_has( $phone_url );
			} else { $phone_url = ''; $has_phone = false; }

			$alt      = isset( $slide['alt'] ) ? $slide['alt'] : '';
			$position = isset( $slide['position'] ) ? $slide['position'] : '';
			$is_priority = ( 0 === $i );
		?>
			<article class="hero-slide" role="group" aria-roledescription="slide" aria-label="<?php echo esc_attr( ( $i + 1 ) . ' of ' . $count ); ?>" aria-hidden="<?php echo 0 === $i ? 'false' : 'true'; ?>">
				<?php if ( $laptop ) : ?>
				<div class="hero-slide__bg">
					<picture>
						<?php if ( $has_mac ) : ?>
							<source media="(min-width: 1440px)" srcset="<?php echo esc_url( $resolve( $mac_url ) ); ?>">
						<?php endif; ?>
						<?php if ( $has_d1366 ) : ?>
							<source media="(min-width: 1281px) and (max-width: 1439px)" srcset="<?php echo esc_url( $resolve( $d1366_url ) ); ?>">
						<?php endif; ?>
						<?php if ( $has_d1280 ) : ?>
							<source media="(min-width: 1101px) and (max-width: 1280px)" srcset="<?php echo esc_url( $resolve( $d1280_url ) ); ?>">
						<?php endif; ?>
						<?php if ( $has_tablet ) : ?>
							<source media="(min-width: 701px) and (max-width: 1100px)" srcset="<?php echo esc_url( $resolve( $tablet_url ) ); ?>">
						<?php endif; ?>
						<?php if ( $has_phone ) : ?>
							<source media="(max-width: 700px)" srcset="<?php echo esc_url( $resolve( $phone_url ) ); ?>">
						<?php endif; ?>
						<img src="<?php echo esc_url( $resolve( $laptop ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>" <?php echo $is_priority ? 'fetchpriority="high"' : 'loading="lazy"'; ?>>
					</picture>
				</div>
				<?php endif; ?>

				<div class="hero-slide__content<?php echo $position ? ' hero-slide__content--' . esc_attr( $position ) : ''; ?>">
					<?php if ( ! empty( $slide['heading'] ) ) : ?>
						<h2><?php echo wp_kses( $slide['heading'], array( 'br' => array() ) ); ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $slide['ctaLabel'] ) ) : ?>
						<a href="<?php echo esc_url( $slide['ctaHref'] ?? '' ); ?>" class="btn btn-primary"><?php echo esc_html( $slide['ctaLabel'] ); ?></a>
					<?php endif; ?>
					<?php if ( ! empty( $slide['features'] ) && is_array( $slide['features'] ) ) : ?>
						<ul class="hero-features">
							<?php foreach ( $slide['features'] as $feat ) : ?>
								<li>
									<span class="icon"><?php echo isset( $icons[ $feat['icon'] ] ) ? $icons[ $feat['icon'] ] : ''; ?></span>
									<?php echo esc_html( $feat['text'] ?? '' ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</article>
		<?php endforeach; ?>
	</div>

	<button class="hero-carousel__arrow hero-carousel__arrow--prev" data-hero-prev aria-label="Previous slide" type="button">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
	</button>
	<button class="hero-carousel__arrow hero-carousel__arrow--next" data-hero-next aria-label="Next slide" type="button">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
	</button>

	<div class="hero-carousel__dots" role="tablist" aria-label="Choose slide" data-hero-dots>
		<?php foreach ( $slides as $i => $_ ) : ?>
			<button class="hero-carousel__dot<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-label="Go to slide <?php echo (int) ( $i + 1 ); ?>" data-hero-go="<?php echo (int) $i; ?>" type="button"></button>
		<?php endforeach; ?>
	</div>
</section>
<?php
echo ob_get_clean();
