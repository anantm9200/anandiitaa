<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

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
                <?php // Close button inside the drawer — visible only on mobile. ?>
                <button class="nav-close" data-nav-close type="button" aria-label="Close menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
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
