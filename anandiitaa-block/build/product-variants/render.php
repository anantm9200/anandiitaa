<?php
/**
 * Dynamic render — anandiitaa/product-variants (classic jaggery/sugar variants slide).
 * Layout locked; each card's image / sizes / title editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$variants = ( isset( $attributes['variants'] ) && is_array( $attributes['variants'] ) ) ? $attributes['variants'] : array();
?>
<section class="product-slide product-slide--variants" data-reveal>
	<div class="variants-grid">
		<?php foreach ( $variants as $v ) :
			$title = $v['title'] ?? '';
		?>
			<article class="variant-card">
				<img class="variant-card__image" src="<?php echo esc_url( anandiitaa_img_url( $v['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
				<div class="variant-card__body">
					<p class="variant-card__avail">
						<span class="variant-card__avail-label">AVAILABLE IN:</span>
						<span class="variant-card__avail-value"><?php echo esc_html( $v['available'] ?? '' ); ?></span>
					</p>
					<h3 class="variant-card__title"><?php echo esc_html( $title ); ?></h3>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
