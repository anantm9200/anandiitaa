<?php
/**
 * Dynamic render — anandiitaa/recipe-intro (classic recipe slide 1).
 * Layout + eyebrow label LOCKED; photo, title, intro and meta editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = $attributes['title'] ?? '';
?>
<section class="recipe-detail-slide recipe-detail-slide--intro" data-reveal>
	<div class="recipe-intro">
		<div class="recipe-intro__media">
			<img src="<?php echo esc_url( anandiitaa_img_url( $attributes['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $title ); ?>" fetchpriority="high">
		</div>
		<div class="recipe-intro__copy">
			<p class="recipe-detail__eyebrow">Home Delicacies Recipe</p>
			<h1 class="recipe-detail__title"><?php echo esc_html( $title ); ?></h1>
			<p class="recipe-detail__intro-body"><?php echo esc_html( $attributes['intro'] ?? '' ); ?></p>
			<ul class="recipe-detail__meta">
				<li><span class="recipe-detail__meta-label">Time</span><span class="recipe-detail__meta-value"><?php echo esc_html( $attributes['time'] ?? '' ); ?></span></li>
				<li><span class="recipe-detail__meta-label">Level</span><span class="recipe-detail__meta-value"><?php echo esc_html( $attributes['level'] ?? '' ); ?></span></li>
				<li><span class="recipe-detail__meta-label">Serves</span><span class="recipe-detail__meta-value"><?php echo esc_html( $attributes['serves'] ?? '' ); ?></span></li>
			</ul>
		</div>
	</div>
</section>
