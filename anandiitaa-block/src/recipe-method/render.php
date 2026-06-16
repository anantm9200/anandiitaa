<?php
/**
 * Dynamic render — anandiitaa/recipe-method (classic recipe method slides).
 * Emits one .recipe-detail-slide--step section per step (alternating L/R).
 * Numbers and positions LOCKED; each step's heading / text / image editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = ( isset( $attributes['steps'] ) && is_array( $attributes['steps'] ) ) ? $attributes['steps'] : array();

foreach ( $steps as $i => $step ) :
	$num     = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
	$reverse = ( $i % 2 === 1 );
	$title   = $step['title'] ?? '';
	?>
	<section class="recipe-detail-slide recipe-detail-slide--step<?php echo $reverse ? ' recipe-detail-slide--reverse' : ''; ?>" data-reveal>
		<div class="recipe-step">
			<div class="recipe-step__copy">
				<span class="recipe-step__number"><?php echo esc_html( $num ); ?></span>
				<h2 class="recipe-step__title"><?php echo esc_html( $title ); ?></h2>
				<p class="recipe-step__body"><?php echo esc_html( $step['body'] ?? '' ); ?></p>
			</div>
			<div class="recipe-step__media">
				<?php if ( ! empty( $step['image'] ) ) : ?>
					<img src="<?php echo esc_url( anandiitaa_img_url( $step['image'] ) ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
				<?php else : ?>
					<div class="recipe-step__placeholder" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="11" r="1.6"></circle><path d="M21 16l-5-5-7 7"></path></svg>
						<span>Step <?php echo (int) ( $i + 1 ); ?> photo</span>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
endforeach;
