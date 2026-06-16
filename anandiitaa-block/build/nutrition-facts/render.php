<?php
/**
 * Dynamic render — anandiitaa/nutrition-facts (classic page-nutrition.php).
 * Renders its own <main class="nut-page nut-page--combined"> (the table layout
 * needs direct children, so post-content's wrapper stays outside). Layout & table
 * structure LOCKED; headings, names, serve text, images and row values editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nut_table = function ( $rows ) {
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
				<?php foreach ( (array) $rows as $r ) : ?>
					<tr>
						<th scope="row"><?php echo esc_html( $r[0] ?? '' ); ?></th>
						<td><?php echo esc_html( $r[1] ?? '' ); ?></td>
						<td><?php echo esc_html( $r[2] ?? '' ); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php return ob_get_clean();
};

$jaggery = ( isset( $attributes['jaggery'] ) && is_array( $attributes['jaggery'] ) ) ? $attributes['jaggery'] : array();
$sugar   = ( isset( $attributes['sugar'] ) && is_array( $attributes['sugar'] ) ) ? $attributes['sugar'] : array();
?>
<main class="nut-page nut-page--combined">

	<header class="nut-head">
		<h1 class="nut-title"><?php echo esc_html( $attributes['title'] ?? '' ); ?></h1>
	</header>

	<h2 class="nut-group-title"><?php echo esc_html( $attributes['jaggeryTitle'] ?? '' ); ?></h2>
	<div class="nut-group">
		<?php foreach ( $jaggery as $p ) : ?>
			<section class="nut-section">
				<h3 class="nut-section__name"><?php echo esc_html( $p['name'] ?? '' ); ?></h3>
				<?php if ( ! empty( $p['serve'] ) ) : ?>
					<p class="nut-section__serve"><?php echo esc_html( $p['serve'] ); ?></p>
				<?php endif; ?>
				<div class="nut-block">
					<figure class="nut-figure">
						<img src="<?php echo esc_url( anandiitaa_img_url( $p['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $p['alt'] ?? '' ); ?>" loading="lazy" decoding="async">
					</figure>
					<?php echo $nut_table( $p['rows'] ?? array() ); ?>
				</div>
			</section>
		<?php endforeach; ?>
	</div>

	<h2 class="nut-group-title"><?php echo esc_html( $attributes['sugarTitle'] ?? '' ); ?></h2>
	<div class="nut-group nut-page--pair">
		<?php foreach ( $sugar as $p ) : ?>
			<section class="nut-section">
				<h3 class="nut-section__name"><?php echo esc_html( $p['name'] ?? '' ); ?></h3>
				<?php if ( ! empty( $p['serve'] ) ) : ?>
					<p class="nut-section__serve"><?php echo esc_html( $p['serve'] ); ?></p>
				<?php endif; ?>
				<div class="nut-block">
					<figure class="nut-figure nut-figure--pair">
						<img src="<?php echo esc_url( anandiitaa_img_url( $p['packet1'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $p['alt1'] ?? '' ); ?>" loading="lazy" decoding="async">
						<img src="<?php echo esc_url( anandiitaa_img_url( $p['packet2'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $p['alt2'] ?? '' ); ?>" loading="lazy" decoding="async">
					</figure>
					<?php echo $nut_table( $p['rows'] ?? array() ); ?>
				</div>
				<p class="nut-section__note"><?php echo esc_html( $attributes['sugarNote'] ?? '' ); ?></p>
			</section>
		<?php endforeach; ?>
	</div>

</main>
