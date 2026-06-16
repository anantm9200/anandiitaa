<?php
/**
 * Dynamic render — anandiitaa/about-mission (classic about slide 3).
 * Layout locked; background, title and body editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$img = function ( $v ) { return anandiitaa_img_url( $v ); };
?>
<section class="about-slide about-slide--mission" data-reveal>
	<div class="about-slide__bg">
		<picture>
			<source media="(max-width: 700px)" srcset="<?php echo esc_url( $img( $attributes['bgPhone'] ?? '' ) ); ?>">
			<source media="(max-width: 1100px)" srcset="<?php echo esc_url( $img( $attributes['bgTablet'] ?? '' ) ); ?>">
			<img src="<?php echo esc_url( $img( $attributes['bgImage'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $attributes['alt'] ?? '' ); ?>" loading="lazy">
		</picture>
	</div>
	<div class="about-mission__copy">
		<h2 class="about-mission__title"><?php echo esc_html( $attributes['title'] ?? '' ); ?></h2>
		<p class="about-mission__body"><?php echo wp_kses( $attributes['body'] ?? '', array( 'br' => array() ) ); ?></p>
	</div>
</section>
