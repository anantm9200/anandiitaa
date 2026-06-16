<?php
/**
 * Dynamic render — anandiitaa/recipe-ingredients (classic recipe slide 2).
 * Renders a flat list (single untitled group) or grouped lists (titled groups),
 * matching the classic markup. Layout + the two labels are LOCKED.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$groups = ( isset( $attributes['groups'] ) && is_array( $attributes['groups'] ) ) ? $attributes['groups'] : array();
$is_flat = ( 1 === count( $groups ) && empty( $groups[0]['title'] ) );

$render_list = function ( $items ) {
	echo '<ul class="recipe-ingredients">';
	foreach ( (array) $items as $item ) {
		echo '<li class="recipe-ingredients__item">' . esc_html( $item ) . '</li>';
	}
	echo '</ul>';
};
?>
<section class="recipe-detail-slide recipe-detail-slide--ingredients" data-reveal>
	<p class="recipe-detail__eyebrow">What you&#039;ll need</p>
	<h2 class="recipe-detail__section-title">Ingredients</h2>
	<?php if ( $is_flat ) : ?>
		<?php $render_list( $groups[0]['items'] ?? array() ); ?>
	<?php else : ?>
		<div class="recipe-ingredients-groups">
			<?php foreach ( $groups as $group ) : ?>
				<div class="recipe-ingredients-group">
					<h3 class="recipe-ingredients-group__title"><?php echo esc_html( $group['title'] ?? '' ); ?></h3>
					<?php $render_list( $group['items'] ?? array() ); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
