<?php
/**
 * Dynamic render — anandiitaa/about-standards (classic about slide 4).
 * Layout & wordmark LOCKED; each item's image / title / body editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$tpl   = get_template_directory_uri();
$items = ( isset( $attributes['items'] ) && is_array( $attributes['items'] ) ) ? $attributes['items'] : array();
$wordmark = function_exists( 'anandiitaa_bust' ) ? anandiitaa_bust( $tpl . '/assets/images/logo/anandiitaa-wordmark.png' ) : $tpl . '/assets/images/logo/anandiitaa-wordmark.png';
?>
<section class="about-slide about-slide--standards" data-reveal>

	<h2 class="about-standards__title">
		The
		<img class="about-standards__wordmark" src="<?php echo esc_url( $wordmark ); ?>" alt="Anandiitaa" loading="lazy" decoding="async">
		Standards
	</h2>

	<div class="about-standards__grid">
		<?php foreach ( $items as $s ) : ?>
			<article class="standard-item">
				<div class="standard-item__image">
					<img src="<?php echo esc_url( anandiitaa_img_url( $s['image'] ?? '' ) ); ?>" alt="<?php echo esc_attr( $s['alt'] ?? '' ); ?>" loading="lazy">
				</div>
				<div class="standard-item__card">
					<h3 class="standard-item__title"><?php echo nl2br( esc_html( $s['title'] ?? '' ) ); ?></h3>
					<p class="standard-item__body"><?php echo wp_kses( $s['body'] ?? '', array( 'br' => array() ) ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	</div>

</section>
