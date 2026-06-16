<?php
/**
 * Dynamic render — anandiitaa/products-grid (classic home-page slide 8).
 * Layout, arrow icon and per-card accent colors are LOCKED here; each card's
 * title / description / sizes / link / image come from attributes.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$products = ( isset( $attributes['products'] ) && is_array( $attributes['products'] ) ) ? $attributes['products'] : array();
// Accent colors are design — fixed by position (dev-owned).
$accents  = array( '#6b0f1a', '#1d5e2e', '#1f3a8e', '#6b0f1a' );
?>
<section class="page-section hero-slide page-section--products-grid" data-reveal>
	<div class="products-grid">
		<?php foreach ( $products as $i => $product ) :
			$accent = isset( $accents[ $i ] ) ? $accents[ $i ] : '#6b0f1a';
			$title  = $product['title'] ?? '';
		?>
			<article class="product-card" style="--card-accent: <?php echo esc_attr( $accent ); ?>">
				<div class="product-card__body">
					<div class="product-card__top">
						<h3 class="product-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="product-card__desc"><?php echo esc_html( $product['desc'] ?? '' ); ?></p>
					</div>
					<div class="product-card__bottom">
						<div class="product-card__sizes">
							<span class="product-card__sizes-label">AVAILABLE IN:</span>
							<span class="product-card__sizes-value"><?php echo esc_html( $product['sizes'] ?? '' ); ?></span>
						</div>
						<a class="product-card__arrow" href="<?php echo esc_url( $product['href'] ?? '' ); ?>" aria-label="<?php echo esc_attr( $title ); ?>">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="13 6 19 12 13 18"></polyline></svg>
						</a>
					</div>
				</div>
				<img class="product-card__image" src="<?php echo esc_url( anandiitaa_img_url( $product['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
			</article>
		<?php endforeach; ?>
	</div>
</section>
