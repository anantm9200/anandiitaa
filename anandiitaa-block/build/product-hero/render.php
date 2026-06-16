<?php
/**
 * Dynamic render — anandiitaa/product-hero (classic jaggery/sugar slide 1).
 * Layout + feature icons LOCKED; product name, feature lines and images editable.
 * Responsive hero tiers are explicit attributes (defaults match prod); a
 * client-swapped image just renders as a single <img>.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tpl  = get_template_directory_uri();
$name = $attributes['productName'] ?? '';
$alt  = $attributes['heroAlt'] ?? '';
$feats = ( isset( $attributes['features'] ) && is_array( $attributes['features'] ) ) ? $attributes['features'] : array();

// Locked icon set (dev-owned), keyed by name.
$icons = array(
	'tested'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"></path><circle cx="12" cy="12" r="9"></circle></svg>',
	'noChem'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3.5a4.5 4.5 0 0 1 9 0v4.2c2.4 1 4 3.4 4 6.1A6.2 6.2 0 1 1 3 13.8c0-2.7 1.6-5.1 4-6.1z"></path><line x1="4" y1="4" x2="20" y2="20" stroke-width="2"></line></svg>',
	'minerals' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 L4 6 v6 c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10 V6 z"></path><path d="M9 12 l2 2 l4-4"></path></svg>',
	'clean'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M5 7h14"></path><path d="M5 17h14"></path><circle cx="12" cy="12" r="9"></circle></svg>',
);

$src = function ( $v ) { return anandiitaa_img_url( $v ); };
$wordmark = function_exists( 'anandiitaa_bust' ) ? anandiitaa_bust( $tpl . '/assets/images/logo/anandiitaa-wordmark.png' ) : $tpl . '/assets/images/logo/anandiitaa-wordmark.png';
?>
<section class="product-slide product-slide--hero" data-reveal>

	<ul class="product-features">
		<?php foreach ( $feats as $f ) : ?>
			<li>
				<span class="product-features__icon" aria-hidden="true"><?php echo isset( $icons[ $f['icon'] ] ) ? $icons[ $f['icon'] ] : ''; ?></span>
				<?php echo wp_kses( $f['text'] ?? '', array( 'br' => array() ) ); ?>
			</li>
		<?php endforeach; ?>
	</ul>

	<h1 class="product-hero__title">
		<img src="<?php echo esc_url( $wordmark ); ?>" alt="Anandiitaa">
		<span><?php echo esc_html( $name ); ?></span>
	</h1>

	<div class="product-hero__stage">
		<picture>
			<?php if ( ! empty( $attributes['heroMac'] ) ) : ?>
				<source media="(min-width: 1440px)" srcset="<?php echo esc_url( $src( $attributes['heroMac'] ) ); ?>">
			<?php endif; ?>
			<?php if ( ! empty( $attributes['heroD1366'] ) ) : ?>
				<source media="(min-width: 1281px) and (max-width: 1439px)" srcset="<?php echo esc_url( $src( $attributes['heroD1366'] ) ); ?>">
			<?php endif; ?>
			<?php if ( ! empty( $attributes['heroD1280'] ) ) : ?>
				<source media="(min-width: 1101px) and (max-width: 1280px)" srcset="<?php echo esc_url( $src( $attributes['heroD1280'] ) ); ?>">
			<?php endif; ?>
			<?php if ( ! empty( $attributes['heroTablet'] ) ) : ?>
				<source media="(min-width: 701px) and (max-width: 1100px)" srcset="<?php echo esc_url( $src( $attributes['heroTablet'] ) ); ?>">
			<?php endif; ?>
			<?php if ( ! empty( $attributes['heroPhone'] ) ) : ?>
				<source media="(max-width: 700px)" srcset="<?php echo esc_url( $src( $attributes['heroPhone'] ) ); ?>">
			<?php endif; ?>
			<img class="product-hero__image" src="<?php echo esc_url( $src( $attributes['heroImage'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>" fetchpriority="high">
		</picture>
	</div>

	<img class="natural-seal" src="<?php echo esc_url( $src( $attributes['sealImage'] ?? '' ) ); ?>" alt="100% Natural">

</section>
