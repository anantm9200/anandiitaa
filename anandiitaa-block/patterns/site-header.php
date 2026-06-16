<?php
/**
 * Title: Site Header
 * Slug: anandiitaa-block/site-header
 * Inserter: no
 *
 * EXACT-REPLICA of classic my-custom-theme/header.php (the markup below
 * <body>): fixed cream navbar + mobile hamburger drawer + full-viewport
 * backdrop. Referenced by parts/header.html so PHP (anandiitaa_bust /
 * home_url) resolves at pattern-registration time.
 */
?>
<header class="site-header">
    <div class="navbar">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Anandiitaa Home">
                <img src="<?php echo esc_url( anandiitaa_bust( '/assets/images/logo/anandiitaa-wordmark.png' ) ); ?>" alt="Anandiitaa">
            </a>
        </div>
        <?php // Hamburger toggle — visible only on mobile (CSS-scoped). Opens the slide-in drawer. ?>
        <button class="nav-toggle" data-nav-toggle type="button" aria-label="Open menu" aria-expanded="false" aria-controls="primary-navigation">
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
        </button>
        <nav class="main-navigation" id="primary-navigation" data-nav aria-label="Primary">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <a href="<?php echo esc_url( home_url( '/products' ) ); ?>">Products</a>
            <a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>">About Us</a>
            <?php // Temporarily hidden — flip false to true to restore. ?>
            <?php if ( false ) : ?>
                <a href="<?php echo esc_url( home_url( '/recipes' ) ); ?>">Recipes</a>
                <a href="<?php echo esc_url( home_url( '/blogs' ) ); ?>">Blogs</a>
                <a href="<?php echo esc_url( home_url( '/processing' ) ); ?>">Processing</a>
                <a href="<?php echo esc_url( home_url( '/community' ) ); ?>">Community</a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<?php // Backdrop sits OUTSIDE the header so it can cover the whole viewport. Blurs page content when drawer is open. ?>
<div class="nav-backdrop" data-nav-backdrop aria-hidden="true"></div>
