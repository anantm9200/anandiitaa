<?php
/**
 * Dynamic render — anandiitaa/benefits (classic home-page slide 9).
 * Layout and the 4 card icons are LOCKED; the bg image, section title and each
 * card's title (br allowed) + body come from attributes.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image    = $attributes['image'] ?? '';
$tablet   = $attributes['tabletImage'] ?? '';
$phone    = $attributes['phoneImage'] ?? '';
$alt      = $attributes['alt'] ?? '';
$title    = $attributes['title'] ?? '';
$benefits = ( isset( $attributes['benefits'] ) && is_array( $attributes['benefits'] ) ) ? $attributes['benefits'] : array();

$icons = array(
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2.5"></circle><circle cx="4" cy="6" r="1.5"></circle><circle cx="20" cy="6" r="1.5"></circle><circle cx="4" cy="18" r="1.5"></circle><circle cx="20" cy="18" r="1.5"></circle><path d="M5.3 6.8 L9.6 10.7"></path><path d="M18.7 6.8 L14.4 10.7"></path><path d="M5.3 17.2 L9.6 13.3"></path><path d="M18.7 17.2 L14.4 13.3"></path></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 4v3.5C7 8 5.5 9.5 5.5 12c0 3.5 2.8 6.5 6 6.5 2.6 0 4.5-1.5 5-4 0.4-2-1-3.5-2.5-3.5-1 0-1.8 0.6-2 1.5"></path><path d="M9 4h6v3.5"></path><circle cx="14" cy="13" r="0.5"></circle></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"></circle><ellipse cx="12" cy="12" rx="9" ry="3.5"></ellipse><ellipse cx="12" cy="12" rx="9" ry="3.5" transform="rotate(60 12 12)"></ellipse><ellipse cx="12" cy="12" rx="9" ry="3.5" transform="rotate(120 12 12)"></ellipse></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 8c0-2 2-4 5-4h7c3 0 5 1 6 4 1 4-1 9-5 11-3 1.5-7 1-10-1-3-2-3-6-3-10z"></path><path d="M9 11l1.5 1.5L13 10"></path><path d="M17 5l1 1M19 7l1-1"></path></svg>',
);
?>
<section class="page-section hero-slide page-section--benefits" data-reveal>
	<?php echo anandiitaa_bg_picture( $image, '', $tablet, $phone, $alt ); ?>
	<h2 class="benefits-title"><?php echo esc_html( $title ); ?></h2>
	<div class="benefits-grid">
		<?php foreach ( $benefits as $i => $b ) : ?>
			<div class="benefit-card">
				<span class="benefit-card__icon"><?php echo isset( $icons[ $i ] ) ? $icons[ $i ] : ''; ?></span>
				<h3 class="benefit-card__title"><?php echo wp_kses( $b['title'] ?? '', array( 'br' => array() ) ); ?></h3>
				<p class="benefit-card__body"><?php echo esc_html( $b['body'] ?? '' ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>
