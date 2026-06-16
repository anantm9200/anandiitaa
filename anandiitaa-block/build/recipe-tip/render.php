<?php
/**
 * Dynamic render — anandiitaa/recipe-tip (classic recipe last slide).
 * Badge, eyebrow and layout LOCKED; heading, tip text and back link editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="recipe-detail-slide recipe-detail-slide--tip" data-reveal>
	<div class="recipe-tip">
		<span class="recipe-tip__badge" aria-hidden="true">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"></path><path d="M10 21h4"></path><path d="M12 3a6 6 0 0 0-4 10.5c.9.9 1.5 1.9 1.5 3V15h5v-1.5c0-1.1.6-2.1 1.5-3A6 6 0 0 0 12 3z"></path></svg>
		</span>
		<p class="recipe-detail__eyebrow">Pro tip</p>
		<h2 class="recipe-detail__section-title"><?php echo esc_html( $attributes['title'] ?? '' ); ?></h2>
		<p class="recipe-tip__body"><?php echo esc_html( $attributes['body'] ?? '' ); ?></p>
		<a class="recipe-detail__back" href="<?php echo esc_url( $attributes['backHref'] ?? '' ); ?>">&larr; <?php echo esc_html( $attributes['backLabel'] ?? '' ); ?></a>
	</div>
</section>
