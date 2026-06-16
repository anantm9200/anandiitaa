<?php
/**
 * Dynamic render — anandiitaa/mfg-details (classic page-manufacturing-details.php).
 * Renders its own <main class="mfg-page">. Layout locked; all text + contact
 * rows editable.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$addresses = ( isset( $attributes['addresses'] ) && is_array( $attributes['addresses'] ) ) ? $attributes['addresses'] : array();
$rows      = ( isset( $attributes['contactRows'] ) && is_array( $attributes['contactRows'] ) ) ? $attributes['contactRows'] : array();
?>
<main class="mfg-page">

	<section class="mfg-section">

		<header class="mfg-head">
			<h1 class="mfg-title"><?php echo esc_html( $attributes['title'] ?? '' ); ?></h1>
		</header>

		<div class="mfg-cards">
			<?php foreach ( $addresses as $a ) : ?>
				<article class="mfg-card">
					<h2 class="mfg-card__label"><?php echo esc_html( $a['label'] ?? '' ); ?></h2>
					<p class="mfg-card__body"><?php echo wp_kses( $a['body'] ?? '', array( 'br' => array() ) ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<article class="mfg-contact">
			<h2 class="mfg-contact__label"><?php echo esc_html( $attributes['contactLabel'] ?? '' ); ?></h2>
			<p class="mfg-contact__lead"><?php echo esc_html( $attributes['contactLead'] ?? '' ); ?></p>
			<p class="mfg-contact__address"><?php echo wp_kses( $attributes['contactAddress'] ?? '', array( 'br' => array() ) ); ?></p>

			<dl class="mfg-contact__rows">
				<?php foreach ( $rows as $r ) : ?>
					<div class="mfg-contact__row">
						<dt><?php echo esc_html( $r['dt'] ?? '' ); ?></dt>
						<dd><a href="<?php echo esc_url( $r['href'] ?? '' ); ?>"><?php echo esc_html( $r['text'] ?? '' ); ?></a></dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</article>

	</section>

</main>
