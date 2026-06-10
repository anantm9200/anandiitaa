<?php
/**
 * Title: Anandiitaa Hero
 * Slug: anandiitaa-block/hero
 * Categories: featured, banner
 * Description: Maroon hero band with display heading + intro + CTA.
 *
 * This is a PATTERN — default content shipped IN CODE (git). When the client
 * drops it on a page and edits the words, that edited copy lives in the
 * DATABASE, not here. This file stays as the reusable starting point.
 */
?>
<!-- wp:cover {"overlayColor":"maroon","minHeight":420,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"left":"6%","right":"6%"}}}} -->
<div class="wp-block-cover alignfull" style="padding-left:6%;padding-right:6%;min-height:420px">
	<span aria-hidden="true" class="wp-block-cover__background has-maroon-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"cream","fontFamily":"display","style":{"typography":{"fontSize":"clamp(40px, 7vw, 72px)","lineHeight":"1.05"}}} -->
		<h1 class="wp-block-heading has-text-align-center has-cream-color has-text-color has-display-font-family" style="font-size:clamp(40px, 7vw, 72px);line-height:1.05">Process Defines Purity</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"cream","style":{"typography":{"fontSize":"18px"},"spacing":{"margin":{"top":"16px"}}}} -->
		<p class="has-text-align-center has-cream-color has-text-color" style="margin-top:16px;font-size:18px">Pure jaggery and sugar, made the way it should be — nothing hidden, nothing added.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"28px"}}}} -->
		<div class="wp-block-buttons" style="margin-top:28px">
			<!-- wp:button {"backgroundColor":"cream","textColor":"maroon","style":{"border":{"radius":"8px"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-maroon-color has-cream-background-color has-text-color has-background wp-element-button" style="border-radius:8px">Explore Products</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
</div>
<!-- /wp:cover -->
