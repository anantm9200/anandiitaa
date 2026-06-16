<?php
/**
 * Dynamic render — anandiitaa/product-process (classic jaggery/sugar process slide).
 * Layout, step numbers, top/bottom positions and the dashed connectors are LOCKED;
 * the title and each step's heading / text / image are editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = $attributes['title'] ?? '';
$steps = ( isset( $attributes['steps'] ) && is_array( $attributes['steps'] ) ) ? $attributes['steps'] : array();
?>
<section class="product-slide product-slide--process" data-reveal>

	<h2 class="process-title"><?php echo esc_html( $title ); ?></h2>

	<ol class="process-timeline">

		<svg class="process-connectors" width="100%" height="100%" preserveAspectRatio="none" aria-hidden="true">
			<g fill="none" stroke="#b89c70" stroke-width="2.5" stroke-dasharray="8 8" stroke-linecap="round">
				<line x1="17%" y1="27%" x2="23%" y2="73%" />
				<line x1="37%" y1="73%" x2="43%" y2="27%" />
				<line x1="57%" y1="27%" x2="63%" y2="73%" />
				<line x1="77%" y1="73%" x2="83%" y2="27%" />
			</g>
		</svg>

		<?php foreach ( $steps as $i => $step ) :
			$num     = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
			$variant = ( $i % 2 === 0 ) ? 'top' : 'bottom';
			$bold    = $step['bold'] ?? '';
		?>
			<li class="process-step process-step--<?php echo $variant; ?>">

				<div class="process-step__circle">
					<?php if ( ! empty( $step['image'] ) ) : ?>
						<img src="<?php echo esc_url( anandiitaa_img_url( $step['image'] ) ); ?>" alt="<?php echo esc_attr( strip_tags( $bold ) ); ?>" loading="lazy" decoding="async">
					<?php else : ?>
						<span class="process-step__placeholder" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="11" r="1.5"></circle><path d="M21 17l-5-5-5 5-3-3-5 5"></path></svg>
						</span>
					<?php endif; ?>

					<span class="process-step__arc" aria-hidden="true"></span>

					<span class="process-step__lid" aria-hidden="true">
						<span class="process-step__number"><?php echo esc_html( $num ); ?></span>
					</span>
				</div>

				<p class="process-step__text">
					<strong><?php echo wp_kses( $bold, array() ); ?></strong>
					<?php echo wp_kses( $step['rest'] ?? '', array() ); ?>
				</p>

			</li>
		<?php endforeach; ?>
	</ol>

</section>
