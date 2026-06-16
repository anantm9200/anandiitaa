<?php
/**
 * Dynamic render — anandiitaa/about-products (classic about slide 1).
 * Background, callout positions, arrows and marker are LOCKED (authored in the
 * bg image's 2560×1664 pixel space); the bg image, page title and the 4 callout
 * label texts are editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img      = function ( $v ) { return anandiitaa_img_url( $v ); };
$callouts = ( isset( $attributes['callouts'] ) && is_array( $attributes['callouts'] ) ) ? $attributes['callouts'] : array();

// Fixed callout geometry (dev-owned), matched to labels by position.
$geo = array(
	array( 'x' => 200,  'y' => 465,  'anchor' => 'start', 'path' => 'M 525 590 L 525 530 C 525 490, 495 470, 435 465' ),
	array( 'x' => 1080, 'y' => 605,  'anchor' => 'start', 'path' => 'M 1055 876 C 1115 880, 1158 770, 1160 679' ),
	array( 'x' => 2380, 'y' => 600,  'anchor' => 'end',   'path' => 'M 1930 705 C 1970 615, 2040 635, 2090 630' ),
	array( 'x' => 1110, 'y' => 1110, 'anchor' => 'start', 'path' => 'M 1403 1204 C 1347 1275, 1304 1268, 1274 1182' ),
);
?>
<section class="about-slide about-slide--products" data-reveal>

	<div class="about-slide__bg">
		<picture>
			<source media="(max-width: 700px)" srcset="<?php echo esc_url( $img( $attributes['bgPhone'] ?? '' ) ); ?>">
			<source media="(max-width: 1100px)" srcset="<?php echo esc_url( $img( $attributes['bgTablet'] ?? '' ) ); ?>">
			<img src="<?php echo esc_url( $img( $attributes['bgImage'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $attributes['alt'] ?? '' ); ?>" fetchpriority="high">
		</picture>
	</div>

	<h1 class="about-slide__title"><?php echo esc_html( $attributes['title'] ?? '' ); ?></h1>

	<svg class="about-callouts" viewBox="0 0 2560 1664" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
		<defs>
			<marker id="about-arrowhead" viewBox="0 0 12 12" refX="10" refY="6" markerWidth="22" markerHeight="22" orient="auto-start-reverse" markerUnits="userSpaceOnUse">
				<path d="M 1 1 L 10 6 L 1 11" fill="none" stroke="#1f1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</marker>
		</defs>
		<?php foreach ( $callouts as $i => $c ) :
			if ( ! isset( $geo[ $i ] ) ) { continue; }
			$g = $geo[ $i ];
		?>
			<text x="<?php echo (int) $g['x']; ?>" y="<?php echo (int) $g['y']; ?>" font-family="'DM Sans', system-ui, sans-serif" font-weight="700" font-size="46" fill="#1f1f1f"<?php echo 'end' === $g['anchor'] ? ' text-anchor="end"' : ''; ?> letter-spacing="2">
				<tspan x="<?php echo (int) $g['x']; ?>" dy="0"><?php echo esc_html( $c['l1'] ?? '' ); ?></tspan>
				<tspan x="<?php echo (int) $g['x']; ?>" dy="56"><?php echo esc_html( $c['l2'] ?? '' ); ?></tspan>
			</text>
			<path d="<?php echo esc_attr( $g['path'] ); ?>" fill="none" stroke="#1f1f1f" stroke-width="3" stroke-dasharray="10 10" stroke-linecap="round" marker-end="url(#about-arrowhead)"/>
		<?php endforeach; ?>
	</svg>

</section>
