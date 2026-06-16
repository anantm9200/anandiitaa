<?php
/**
 * Dynamic render — anandiitaa/product-benefits (classic jaggery benefits accordion).
 * Layout, numbers and first-open are LOCKED; title, footer and each item's
 * title/body/image are editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title  = $attributes['title'] ?? '';
$footer = $attributes['footer'] ?? '';
$items  = ( isset( $attributes['items'] ) && is_array( $attributes['items'] ) ) ? $attributes['items'] : array();
?>
<section class="product-slide product-slide--benefits" data-reveal>

	<h2 class="benefits-title"><?php echo esc_html( $title ); ?></h2>

	<ol class="benefits-list">
		<?php foreach ( $items as $i => $b ) :
			$num   = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
			$ititle = $b['title'] ?? '';
		?>
			<li class="benefit-item">
				<details<?php echo 0 === $i ? ' open' : ''; ?>>
					<summary class="benefit-summary">
						<span class="benefit-summary__number"><?php echo esc_html( $num ); ?></span>
						<span class="benefit-summary__title"><?php echo esc_html( $ititle ); ?></span>
						<span class="benefit-summary__caret" aria-hidden="true">
							<svg viewBox="0 0 16 10" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2 2 8 8 14 2"></polyline></svg>
						</span>
					</summary>
					<div class="benefit-reveal">
						<div class="benefit-content">
							<div class="benefit-content__image">
								<?php if ( ! empty( $b['image'] ) ) : ?>
									<img src="<?php echo esc_url( anandiitaa_img_url( $b['image'] ) ); ?>" alt="<?php echo esc_attr( $ititle ); ?>" loading="lazy" decoding="async">
								<?php else : ?>
									<span class="benefit-content__placeholder" aria-hidden="true">
										<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="11" r="1.5"></circle><path d="M21 17l-5-5-5 5-3-3-5 5"></path></svg>
									</span>
								<?php endif; ?>
							</div>
							<p class="benefit-content__body"><?php echo wp_kses_post( $b['body'] ?? '' ); ?></p>
						</div>
					</div>
				</details>
			</li>
		<?php endforeach; ?>
	</ol>

	<p class="benefits-footer"><?php echo esc_html( $footer ); ?></p>

</section>
