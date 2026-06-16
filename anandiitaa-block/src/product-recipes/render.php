<?php
/**
 * Dynamic render — anandiitaa/product-recipes (classic sugar recipes slide).
 * Layout & the 3 meta icons LOCKED; title and each recipe card editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title   = $attributes['title'] ?? '';
$recipes = ( isset( $attributes['recipes'] ) && is_array( $attributes['recipes'] ) ) ? $attributes['recipes'] : array();
?>
<section id="recipes" class="product-slide product-slide--recipes" data-reveal>

	<h2 class="recipes-title"><?php echo esc_html( $title ); ?></h2>

	<ul class="recipes-grid">
		<?php foreach ( $recipes as $r ) :
			$rtitle  = $r['title'] ?? '';
			$has_url = ! empty( $r['url'] );
		?>
			<li class="recipe-card<?php echo $has_url ? ' recipe-card--linked' : ''; ?>">
				<?php if ( $has_url ) : ?>
					<a class="recipe-card__overlay" href="<?php echo esc_url( $r['url'] ); ?>" aria-label="Read recipe: <?php echo esc_attr( $rtitle ); ?>"></a>
				<?php endif; ?>
				<div class="recipe-card__media">
					<img src="<?php echo esc_url( anandiitaa_img_url( $r['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $rtitle ); ?>" loading="lazy">
				</div>

				<div class="recipe-card__content">
					<p class="recipe-card__body">
						<?php echo wp_kses_post( $r['body'] ?? '' ); ?>
						<?php if ( $has_url ) : ?>
							<span class="recipe-card__cta">Read recipe &rarr;</span>
						<?php endif; ?>
					</p>
					<ul class="recipe-meta">
						<li class="recipe-meta__item">
							<span class="recipe-meta__icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 14"></polyline></svg>
							</span>
							<span class="recipe-meta__label"><?php echo esc_html( $r['time'] ?? '' ); ?></span>
						</li>
						<li class="recipe-meta__item">
							<span class="recipe-meta__icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 11v9H4a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h3z"></path><path d="M7 11l4-7c1.4 0 2.5 1.1 2.5 2.5V10h5a2 2 0 0 1 2 2.3l-1.2 6.5a2 2 0 0 1-2 1.7H7"></path></svg>
							</span>
							<span class="recipe-meta__label"><?php echo esc_html( $r['level'] ?? '' ); ?></span>
						</li>
						<li class="recipe-meta__item">
							<span class="recipe-meta__icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 19h18"></path><path d="M3 16a9 9 0 0 1 18 0"></path><circle cx="12" cy="6" r="1.2"></circle><line x1="12" y1="7.4" x2="12" y2="9"></line></svg>
							</span>
							<span class="recipe-meta__label"><?php echo esc_html( $r['serves'] ?? '' ); ?></span>
						</li>
					</ul>
				</div>

				<h3 class="recipe-card__title"><?php echo esc_html( $rtitle ); ?></h3>
			</li>
		<?php endforeach; ?>
	</ul>

</section>
