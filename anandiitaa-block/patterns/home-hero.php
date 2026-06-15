<?php
/**
 * Title: Home Hero Carousel
 * Slug: anandiitaa-block/home-hero
 * Inserter: no
 *
 * Homepage hero — anandiitaa/hero-carousel. Heading sits TOP-CENTER (in the
 * composite's empty cream zone) so it never collides with the packets below.
 */
$hero1 = esc_url( get_theme_file_uri( 'assets/hero-1.png' ) );
$hero3 = esc_url( get_theme_file_uri( 'assets/hero-3.png' ) );

// Inner content shared by every slide: top-anchored heading + CTA.
$inner = '<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(34px, 5vw, 62px)","lineHeight":"1.05","fontWeight":"700"}},"textColor":"maroon","fontFamily":"display"} -->
<h1 class="wp-block-heading has-text-align-center has-maroon-color has-text-color has-display-font-family" style="font-size:clamp(34px, 5vw, 62px);line-height:1.05;font-weight:700">Choose Pure.<br>Choose Anandiitaa.</h1>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"20px"}}}} -->
<div class="wp-block-buttons" style="margin-top:20px"><!-- wp:button {"backgroundColor":"maroon","textColor":"cream","style":{"border":{"radius":"6px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-cream-color has-maroon-background-color has-text-color has-background wp-element-button" style="border-radius:6px" href="/about-us">Explore More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';

/** Build one Cover slide with the image + top-anchored inner content. */
function anandiitaa_hero_slide( $url, $inner ) {
	return '<!-- wp:cover {"url":"' . $url . '","dimRatio":0,"isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","contentPosition":"top center","align":"full","style":{"spacing":{"padding":{"top":"clamp(96px, 13vh, 150px)"}}}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-top-center" style="padding-top:clamp(96px, 13vh, 150px);min-height:90vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="' . $url . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">' . $inner . '</div></div>
<!-- /wp:cover -->';
}
?>
<!-- wp:anandiitaa/hero-carousel {"align":"full"} -->
<div class="wp-block-anandiitaa-hero-carousel alignfull anandiitaa-hero-carousel" data-autoplay="true" data-interval="5500"><div class="anandiitaa-hero-carousel__track">
<?php
echo anandiitaa_hero_slide( $hero1, $inner );
echo anandiitaa_hero_slide( $hero3, $inner );
?>
</div></div>
<!-- /wp:anandiitaa/hero-carousel -->
