<?php
/**
 * Dynamic render — anandiitaa/standards.
 * Exact classic "The Anandiitaa Standards" section (home-page slide 6). Layout,
 * the 4 column icons and the wordmark lockup are LOCKED here; only the bg image
 * and each column's title + body come from attributes.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tpl     = get_template_directory_uri();
$image   = isset( $attributes['image'] ) ? $attributes['image'] : '';
$tablet  = isset( $attributes['tabletImage'] ) ? $attributes['tabletImage'] : '';
$phone   = isset( $attributes['phoneImage'] ) ? $attributes['phoneImage'] : '';
$alt     = isset( $attributes['alt'] ) ? $attributes['alt'] : 'The Anandiitaa Standards';
$columns = ( isset( $attributes['columns'] ) && is_array( $attributes['columns'] ) ) ? $attributes['columns'] : array();

// Column icons are fixed (dev-owned), matched to columns by position.
$col_icons = array(
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.5C12 2.5 6 9 6 14a6 6 0 0 0 12 0c0-5-6-11.5-6-11.5z"></path><path d="M9.5 13.5l1.8 1.8 3.5-3.5"></path></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18c2-2 5-3 9-3s7 1 9 3"></path><circle cx="12" cy="9" r="3"></circle><path d="M16 5l1 1M19 7l1 1M5 5L4 6M2 7l-1 1"></path></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.5L4 5.5v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10v-6L12 2.5z"></path><path d="M9 12l2.2 2.2L15.5 10"></path></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="12" r="6"></circle><path d="M9 12l2.2 2.2L15.5 10"></path></svg>',
);

$wordmark = function_exists( 'anandiitaa_bust' ) ? anandiitaa_bust( $tpl . '/assets/images/logo/anandiitaa-wordmark.png' ) : $tpl . '/assets/images/logo/anandiitaa-wordmark.png';
?>
<section class="page-section hero-slide page-section--standards" data-reveal>
	<?php echo anandiitaa_bg_picture( $image, '', $tablet, $phone, $alt ); ?>
	<div class="standards-title">
		<span class="standards-title__small">The</span>
		<img class="standards-title__wordmark" src="<?php echo esc_url( $wordmark ); ?>" alt="ANANDIITAA" loading="lazy" decoding="async">
		<span class="standards-title__small">Standards</span>
	</div>
	<div class="standards-grid">
		<?php foreach ( $columns as $i => $col ) : ?>
			<div class="standards-col">
				<span class="standards-col__icon"><?php echo isset( $col_icons[ $i ] ) ? $col_icons[ $i ] : ''; ?></span>
				<h3 class="standards-col__title"><?php echo esc_html( $col['title'] ?? '' ); ?></h3>
				<p class="standards-col__body"><?php echo esc_html( $col['body'] ?? '' ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>
