<?php
/**
 * Dynamic render — anandiitaa/social (classic home-page slide 11).
 * Layout, wordmark and social icons/labels are LOCKED; the bg image, heading,
 * subtitle and the three social links come from attributes.
 *
 * @var array $attributes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tpl       = get_template_directory_uri();
$image     = $attributes['image'] ?? '';
$alt       = $attributes['alt'] ?? '';
$heading   = $attributes['heading'] ?? '';
$subtitle  = $attributes['subtitle'] ?? '';
$instagram = $attributes['instagram'] ?? '';
$facebook  = $attributes['facebook'] ?? '';
$youtube   = $attributes['youtube'] ?? '';

$wordmark = function_exists( 'anandiitaa_bust' ) ? anandiitaa_bust( $tpl . '/assets/images/logo/anandiitaa-wordmark.png' ) : $tpl . '/assets/images/logo/anandiitaa-wordmark.png';
?>
<section class="page-section hero-slide page-section--social" data-reveal>
	<?php echo anandiitaa_bg_picture( $image, '', '', '', $alt ); ?>
	<div class="social-slide">
		<img class="social-slide__wordmark" src="<?php echo esc_url( $wordmark ); ?>" alt="ANANDIITAA" loading="lazy" decoding="async">
		<h2 class="social-slide__heading"><?php echo wp_kses( $heading, array( 'br' => array() ) ); ?></h2>
		<p class="social-slide__subtitle"><?php echo wp_kses( $subtitle, array( 'br' => array() ) ); ?></p>
		<div class="social-slide__pills">
			<a href="<?php echo esc_url( $instagram ); ?>" class="social-pill" target="_blank" rel="noopener noreferrer">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="3"></line></svg>
				Instagram
			</a>
			<a href="<?php echo esc_url( $facebook ); ?>" class="social-pill" target="_blank" rel="noopener noreferrer">
				<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
				Facebook
			</a>
			<a href="<?php echo esc_url( $youtube ); ?>" class="social-pill" target="_blank" rel="noopener noreferrer">
				<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.4 19.54C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon fill="#6b0f1a" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
				YouTube
			</a>
		</div>
	</div>
</section>
