<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <span class="site-header-line" aria-hidden="true"></span>
    <span class="site-header-hover-zone" aria-hidden="true"></span>
    <header class="site-header">
        <div class="navbar">
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Anandiitaa Home">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/anandiitaa-wordmark.png" alt="Anandiitaa">
                </a>
            </div>
            <nav class="main-navigation" aria-label="Primary">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <div class="nav-item nav-item--has-dropdown">
                    <a href="<?php echo esc_url( home_url( '/products' ) ); ?>" class="nav-item__trigger" aria-haspopup="true" aria-expanded="false">
                        Products
                        <svg class="nav-item__caret" viewBox="0 0 12 8" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="2 2 6 6 10 2"></polyline></svg>
                    </a>
                    <div class="nav-dropdown" role="menu">
                        <a href="<?php echo esc_url( home_url( '/products/jaggery' ) ); ?>" role="menuitem">Jaggery</a>
                        <a href="<?php echo esc_url( home_url( '/products/sugar' ) ); ?>" role="menuitem">Sugar</a>
                    </div>
                </div>
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
