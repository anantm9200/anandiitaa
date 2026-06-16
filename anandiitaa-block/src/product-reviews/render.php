<?php
/**
 * Dynamic render — anandiitaa/product-reviews (classic jaggery/sugar reviews slide).
 * Same review cards as the homepage but over a background image. Layout locked;
 * background, title and each review editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bg      = $attributes['bgImage'] ?? '';
$title   = $attributes['title'] ?? '';
$reviews = ( isset( $attributes['reviews'] ) && is_array( $attributes['reviews'] ) ) ? $attributes['reviews'] : array();
?>
<section class="product-slide product-slide--reviews hero-slide" data-reveal>
	<?php if ( $bg ) : ?>
		<div class="hero-slide__bg">
			<img src="<?php echo esc_url( anandiitaa_img_url( $bg ) ); ?>" alt="" loading="lazy">
		</div>
	<?php endif; ?>
	<h2 class="reviews-title"><?php echo esc_html( $title ); ?></h2>
	<div class="reviews-grid">
		<?php foreach ( $reviews as $r ) :
			$name = $r['name'] ?? '';
		?>
			<article class="review-card">
				<div class="review-card__image">
					<img src="<?php echo esc_url( anandiitaa_img_url( $r['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
					<span class="review-card__quote-mark" aria-hidden="true">&rdquo;</span>
				</div>
				<div class="review-card__body">
					<div class="review-card__meta">
						<span class="review-card__name"><?php echo esc_html( $name ); ?></span>
						<span class="review-card__role"><?php echo esc_html( $r['role'] ?? '' ); ?></span>
					</div>
					<p class="review-card__quote"><?php echo esc_html( $r['quote'] ?? '' ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
