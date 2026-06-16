<?php
/**
 * Dynamic render — anandiitaa/feature-banner (classic home-page slide 7, "news").
 * Layout/position locked; bg image + the two text lines come from attributes.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image      = $attributes['image'] ?? '';
$tablet     = $attributes['tabletImage'] ?? '';
$phone      = $attributes['phoneImage'] ?? '';
$alt        = $attributes['alt'] ?? '';
$caption    = $attributes['captionTop'] ?? '';
$heading    = $attributes['heading'] ?? '';
?>
<section class="page-section hero-slide page-section--news" data-reveal>
	<?php echo anandiitaa_bg_picture( $image, '', $tablet, $phone, $alt ); ?>
	<?php if ( $caption ) : ?>
		<div class="hero-slide__content hero-slide__content--top-caption">
			<h2><?php echo esc_html( $caption ); ?></h2>
		</div>
	<?php endif; ?>
	<div class="hero-slide__content hero-slide__content--bottom-center">
		<?php if ( $heading ) : ?>
			<h2><?php echo wp_kses( $heading, array( 'br' => array() ) ); ?></h2>
		<?php endif; ?>
	</div>
</section>
