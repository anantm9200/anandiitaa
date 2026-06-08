<?php
/**
 * Template Name: Nutrition Table (combined)
 * Slug-based: routed to /nutritional-facts via anandiitaa_route_templates().
 *
 * One page, two groups: JAGGERY first (single-packet rows), then SUGAR
 * (paired green/blue packets + RDA footnote). Each group is wrapped so the
 * shared .nut-* layout rules (nth-of-type alternation, .nut-page--pair sizing)
 * resolve per-group exactly as they did on the original two pages.
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';
$pk   = $tpl . '/assets/images/products/packets';

// ---- JAGGERY (single packet per product) ----
$jaggery = array(
	array(
		'name'  => 'Desi Jaggery',
		'serve' => 'Serve size 5 g  |  No. of serves – 180',
		'image' => $pk . '/desi-jaggery.png',
		'alt'   => 'Anandiitaa Desi Jaggery packet',
		'rows'  => array(
			array( 'Energy (Kcal)', '375.98', '18.80' ),
			array( 'Carbohydrates (g)', '91.79', '4.59' ),
			array( 'Protein (g)', '0.90', '0.04' ),
			array( 'Fat (g)', '0.58', '0.03' ),
			array( 'Added Sugar (g)', '0.00', '0.00' ),
			array( 'Iron (mg)', '9.03', '0.45' ),
			array( 'Calcium (mg)', '72.61', '3.63' ),
			array( 'Potassium (mg)', '579.32', '28.97' ),
			array( 'Sodium (mg)', '12.35', '0.62' ),
			array( 'Phosphorus (mg)', '90.04', '4.50' ),
		),
	),
	array(
		'name'  => 'Jaggery Powder',
		'serve' => 'Serve size 5 g  |  No. of serves – 100',
		'image' => $pk . '/jaggery-powder.png',
		'alt'   => 'Anandiitaa Jaggery Powder packet',
		'rows'  => array(
			array( 'Energy (Kcal)', '374.98', '18.75' ),
			array( 'Carbohydrates (g)', '91.78', '4.59' ),
			array( 'Protein (g)', '0.84', '0.04' ),
			array( 'Fat (g)', '0.50', '0.02' ),
			array( 'Added Sugar (g)', '0.00', '0.00' ),
			array( 'Iron (mg)', '9.12', '0.46' ),
			array( 'Calcium (mg)', '75.16', '3.76' ),
			array( 'Potassium (mg)', '583.26', '29.16' ),
			array( 'Sodium (mg)', '16.52', '0.83' ),
			array( 'Phosphorus (mg)', '84.98', '4.25' ),
		),
	),
);

// ---- SUGAR (paired green/blue packets + RDA footnote) ----
$sugar_note = 'Per serve % contribution to RDA based on a 2000 Kcal energy diet for an average adult per day.';
$sugar = array(
	array(
		'name'    => 'Sugar 1 Kg',
		'serve'   => 'Serving size 5 g  |  No. of serves – 200',
		'packets' => array(
			array( 'src' => $pk . '/sugar-1kg-green.png', 'alt' => 'Anandiitaa Sugar 1 Kg — Bold Grain (green pack)' ),
			array( 'src' => $pk . '/sugar-1kg-blue.png', 'alt' => 'Anandiitaa Sugar 1 Kg — Fine Grain (blue pack)' ),
		),
		'rows'    => array(
			array( 'Energy (Kcal)', '400', '20' ),
			array( 'Carbohydrates (g)', '99.9', '4.9' ),
			array( 'Total Sugar (g)', '99.8', '4.9' ),
			array( 'Added Sugar (g)', '0.00', '0.00' ),
			array( 'Protein (g)', '0.00', '0.00' ),
			array( 'Total Fat (g)', '0.00', '0.00' ),
			array( 'Cholesterol (mg)', '0.00', '0.00' ),
			array( 'Sodium (mg)', '0.00', '0.00' ),
		),
	),
	array(
		'name'    => 'Sugar 5 Kg',
		'serve'   => 'Serving size 5 g  |  No. of serves – 1000',
		'packets' => array(
			array( 'src' => $pk . '/sugar-5kg-green.png', 'alt' => 'Anandiitaa Sugar 5 Kg — Bold Grain (green pack)' ),
			array( 'src' => $pk . '/sugar-5kg-blue.png', 'alt' => 'Anandiitaa Sugar 5 Kg — Fine Grain (blue pack)' ),
		),
		'rows'    => array(
			array( 'Energy (Kcal)', '400', '1.99' ),
			array( 'Carbohydrates (g)', '99.9', '4.9' ),
			array( 'Total Sugar (g)', '99.8', '4.9' ),
			array( 'Added Sugar (g)', '0.00', '0.00' ),
			array( 'Protein (g)', '0.00', '0.00' ),
			array( 'Total Fat (g)', '0.00', '0.00' ),
			array( 'Cholesterol (mg)', '0.00', '0.00' ),
			array( 'Sodium (mg)', '0.00', '0.00' ),
		),
	),
	array(
		'name'    => 'Sugar 25 Kg',
		'serve'   => 'Serving size 5 g  |  No. of serves – 5000',
		'packets' => array(
			array( 'src' => $pk . '/sugar-25kg-green.png', 'alt' => 'Anandiitaa Sugar 25 Kg — Bold Grain (green pack)' ),
			array( 'src' => $pk . '/sugar-25kg-blue.png', 'alt' => 'Anandiitaa Sugar 25 Kg — Fine Grain (blue pack)' ),
		),
		'rows'    => array(
			array( 'Energy (Kcal)', '400', '20' ),
			array( 'Carbohydrates (g)', '99.9', '4.9' ),
			array( 'Total Sugar (g)', '99.8', '4.9' ),
			array( 'Added Sugar (g)', '0.00', '0.00' ),
			array( 'Protein (g)', '0.00', '0.00' ),
			array( 'Total Fat (g)', '0.00', '0.00' ),
			array( 'Cholesterol (mg)', '0.00', '0.00' ),
			array( 'Sodium (mg)', '0.00', '0.00' ),
		),
	),
);

/** Renders one nutrition table's <thead> + <tbody> from a rows array. */
function anandiitaa_nut_table( $rows ) {
	ob_start(); ?>
	<div class="nut-table-wrap">
		<table class="nut-table">
			<thead>
				<tr>
					<th scope="col">Nutrients</th>
					<th scope="col">Per 100g</th>
					<th scope="col">Per Serve<span class="nut-table__sub">% Contribution to RDA</span></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $rows as $r ) : ?>
					<tr>
						<th scope="row"><?php echo esc_html( $r[0] ); ?></th>
						<td><?php echo esc_html( $r[1] ); ?></td>
						<td><?php echo esc_html( $r[2] ); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php return ob_get_clean();
}
?>

<main class="nut-page nut-page--combined">

	<header class="nut-head">
		<h1 class="nut-title">Nutritional Facts</h1>
	</header>

	<!-- ===== JAGGERY ===== -->
	<h2 class="nut-group-title">Jaggery</h2>
	<div class="nut-group">
		<?php foreach ( $jaggery as $p ) : ?>
			<section class="nut-section">
				<h3 class="nut-section__name"><?php echo esc_html( $p['name'] ); ?></h3>
				<?php if ( ! empty( $p['serve'] ) ) : ?>
					<p class="nut-section__serve"><?php echo esc_html( $p['serve'] ); ?></p>
				<?php endif; ?>
				<div class="nut-block">
					<figure class="nut-figure">
						<img src="<?php echo esc_url( $bust( $p['image'] ) ); ?>" alt="<?php echo esc_attr( $p['alt'] ); ?>" loading="lazy" decoding="async">
					</figure>
					<?php echo anandiitaa_nut_table( $p['rows'] ); ?>
				</div>
			</section>
		<?php endforeach; ?>
	</div>

	<!-- ===== SUGAR ===== -->
	<h2 class="nut-group-title">Sugar</h2>
	<div class="nut-group nut-page--pair">
		<?php foreach ( $sugar as $p ) : ?>
			<section class="nut-section">
				<h3 class="nut-section__name"><?php echo esc_html( $p['name'] ); ?></h3>
				<?php if ( ! empty( $p['serve'] ) ) : ?>
					<p class="nut-section__serve"><?php echo esc_html( $p['serve'] ); ?></p>
				<?php endif; ?>
				<div class="nut-block">
					<figure class="nut-figure nut-figure--pair">
						<?php foreach ( $p['packets'] as $img ) : ?>
							<img src="<?php echo esc_url( $bust( $img['src'] ) ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" loading="lazy" decoding="async">
						<?php endforeach; ?>
					</figure>
					<?php echo anandiitaa_nut_table( $p['rows'] ); ?>
				</div>
				<p class="nut-section__note"><?php echo esc_html( $sugar_note ); ?></p>
			</section>
		<?php endforeach; ?>
	</div>

</main>

<?php get_footer(); ?>
