<?php
/**
 * Dynamic render — anandiitaa/about-vision (classic about slide 2).
 * Background is a theme style (prod-styles.css). Title + body editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="about-slide about-slide--vision" data-reveal>
	<div class="about-vision__grid">
		<div class="about-vision__copy">
			<h2 class="about-vision__title"><?php echo esc_html( $attributes['title'] ?? '' ); ?></h2>
			<p class="about-vision__body"><?php echo wp_kses( $attributes['body'] ?? '', array( 'br' => array() ) ); ?></p>
		</div>
	</div>
</section>
