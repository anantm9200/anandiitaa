<?php
/**
 * Title: Home Hero Carousel
 * Slug: anandiitaa-block/home-hero
 * Inserter: no
 *
 * The homepage hero — anandiitaa/hero-carousel with real composite slides.
 * A PHP pattern (not an .html template) so theme-asset image URLs resolve via
 * get_theme_file_uri(). v1: 2 full composites + heading + CTA. Per-slide
 * feature overlays + multi-res tiers are a later refinement.
 */
$hero1 = esc_url( get_theme_file_uri( 'assets/hero-1.png' ) );
$hero3 = esc_url( get_theme_file_uri( 'assets/hero-3.png' ) );
?>
<!-- wp:anandiitaa/hero-carousel {"align":"full"} -->
<div class="wp-block-anandiitaa-hero-carousel alignfull anandiitaa-hero-carousel" data-autoplay="true" data-interval="5500"><div class="anandiitaa-hero-carousel__track">
<!-- wp:cover {"url":"<?php echo $hero1; ?>","dimRatio":20,"minHeight":86,"minHeightUnit":"vh","align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:86vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $hero1; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(36px, 6vw, 68px)","lineHeight":"1.08"}},"textColor":"maroon","fontFamily":"display"} -->
<h1 class="wp-block-heading has-text-align-center has-maroon-color has-text-color has-display-font-family" style="font-size:clamp(36px, 6vw, 68px);line-height:1.08">Choose Pure.<br>Choose Anandiitaa.</h1>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"24px"}}}} -->
<div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"maroon","textColor":"cream","style":{"border":{"radius":"6px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-cream-color has-maroon-background-color has-text-color has-background wp-element-button" style="border-radius:6px" href="/about-us">Explore More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo $hero3; ?>","dimRatio":20,"minHeight":86,"minHeightUnit":"vh","align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:86vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $hero3; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(36px, 6vw, 68px)","lineHeight":"1.08"}},"textColor":"maroon","fontFamily":"display"} -->
<h1 class="wp-block-heading has-text-align-center has-maroon-color has-text-color has-display-font-family" style="font-size:clamp(36px, 6vw, 68px);line-height:1.08">Choose Pure.<br>Choose Anandiitaa.</h1>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"24px"}}}} -->
<div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"maroon","textColor":"cream","style":{"border":{"radius":"6px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-cream-color has-maroon-background-color has-text-color has-background wp-element-button" style="border-radius:6px" href="/about-us">Explore More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:anandiitaa/hero-carousel -->
