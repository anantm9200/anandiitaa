<?php
/**
 * Dynamic render — anandiitaa/about-purpose (classic about slide 5).
 * Layout locked; image, title and body editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="about-slide about-slide--purpose" data-reveal>
	<div class="about-purpose__container">
		<div class="about-purpose__image">
			<img src="<?php echo esc_url( anandiitaa_img_url( $attributes['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $attributes['alt'] ?? '' ); ?>" loading="lazy">
		</div>
		<div class="about-purpose__band">
			<h2 class="about-purpose__title"><?php echo esc_html( $attributes['title'] ?? '' ); ?></h2>
			<p class="about-purpose__body"><?php echo esc_html( $attributes['body'] ?? '' ); ?></p>
		</div>
	</div>
</section>
