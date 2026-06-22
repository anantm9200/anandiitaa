<?php
/**
 * Dynamic render — anandiitaa/product-reviews.
 *
 * `variant`:
 *  - "photo" (default): exact classic 2-up review cards over a bg image (jaggery) — pixel-exact.
 *  - "carousel": the same U-shaped review cards, but as a fluid carousel of slides,
 *    2 cards per slide (sugar page). Reviews are chunked into pairs → one slide each.
 *    Cards without a photo get a brand placeholder panel (editable later). Styles in
 *    assets/css/extensions.css; driven by assets/js/reviews-carousel.js.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$variant = $attributes['variant'] ?? 'photo';
$title   = $attributes['title'] ?? '';
$reviews = ( isset( $attributes['reviews'] ) && is_array( $attributes['reviews'] ) ) ? $attributes['reviews'] : array();

/** One U-shaped review card (shared by both variants). */
$u_card = function ( $r ) {
	$name  = $r['name'] ?? '';
	$image = $r['image'] ?? '';
	ob_start();
	?>
	<article class="review-card">
		<div class="review-card__image<?php echo $image ? '' : ' review-card__image--placeholder'; ?>">
			<?php if ( $image ) : ?>
				<img src="<?php echo esc_url( anandiitaa_img_url( $image ) ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
			<?php endif; ?>
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
	<?php
	return ob_get_clean();
};

if ( 'carousel' === $variant ) :
	$pairs = array_chunk( $reviews, 2 );
	$multi = count( $pairs ) > 1;
	?>
	<section class="anandiitaa-reviews" data-reveal>
		<h2 class="anandiitaa-reviews__title"><?php echo esc_html( $title ); ?></h2>
		<div class="rcar" data-rcar>
			<div class="rcar__viewport">
				<div class="rcar__track" data-rcar-track>
					<?php foreach ( $pairs as $pair ) : ?>
						<div class="rcar__slide">
							<div class="rcar__pair">
								<?php foreach ( $pair as $r ) { echo $u_card( $r ); } ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ( $multi ) : ?>
				<button class="rcar__arrow rcar__arrow--prev" data-rcar-prev type="button" aria-label="Previous reviews">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
				</button>
				<button class="rcar__arrow rcar__arrow--next" data-rcar-next type="button" aria-label="Next reviews">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
				</button>
				<div class="rcar__dots" role="tablist" aria-label="Choose review slide">
					<?php foreach ( $pairs as $i => $_ ) : ?>
						<button class="rcar__dot<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-label="Reviews slide <?php echo (int) ( $i + 1 ); ?>" data-rcar-go="<?php echo (int) $i; ?>" type="button"></button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
	return;
endif;

// ---- "photo" variant: exact classic markup (unchanged) ----
$bg = $attributes['bgImage'] ?? '';
?>
<section class="product-slide product-slide--reviews hero-slide" data-reveal>
	<?php if ( $bg ) : ?>
		<div class="hero-slide__bg">
			<img src="<?php echo esc_url( anandiitaa_img_url( $bg ) ); ?>" alt="" loading="lazy">
		</div>
	<?php endif; ?>
	<h2 class="reviews-title"><?php echo esc_html( $title ); ?></h2>
	<div class="reviews-grid">
		<?php foreach ( $reviews as $r ) { echo $u_card( $r ); } ?>
	</div>
</section>
