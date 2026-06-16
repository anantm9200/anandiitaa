<?php
/**
 * Dynamic render — anandiitaa/products-landing (classic page-products.php).
 * Renders the inner intro + category grid (the surrounding <main class="products-landing">
 * is provided by the page's group wrapper). Layout, accent colors and the arrow
 * icon are LOCKED; intro text + each card's title/tagline/link/image come from attributes.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$intro_title = $attributes['introTitle'] ?? '';
$intro_text  = $attributes['introText'] ?? '';
$categories  = ( isset( $attributes['categories'] ) && is_array( $attributes['categories'] ) ) ? $attributes['categories'] : array();
$accents     = array( '#6b0f1a', '#1d5e2e' );
?>
<main class="products-landing">
<header class="products-landing__intro">
	<h1><?php echo esc_html( $intro_title ); ?></h1>
	<p><?php echo esc_html( $intro_text ); ?></p>
</header>

<div class="products-landing__grid">
	<?php foreach ( $categories as $i => $c ) :
		$accent = $accents[ $i ] ?? '#6b0f1a';
		$title  = $c['title'] ?? '';
	?>
		<a class="category-card" href="<?php echo esc_url( $c['href'] ?? '' ); ?>" style="--card-accent: <?php echo esc_attr( $accent ); ?>">
			<div class="category-card__media">
				<img src="<?php echo esc_url( anandiitaa_img_url( $c['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
			</div>
			<div class="category-card__body">
				<h2 class="category-card__title"><?php echo esc_html( $title ); ?></h2>
				<p class="category-card__tagline"><?php echo esc_html( $c['tagline'] ?? '' ); ?></p>
				<span class="category-card__cta" aria-hidden="true">
					Explore
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="13 6 19 12 13 18"></polyline></svg>
				</span>
			</div>
		</a>
	<?php endforeach; ?>
</div>
</main>
