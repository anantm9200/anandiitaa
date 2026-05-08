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
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/anandiitaa-wordmark.png" alt="Anandiitaa">
                </a>
            </div>
            <nav class="main-navigation" aria-label="Primary">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <a href="<?php echo esc_url( home_url( '/products' ) ); ?>">Products</a>
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
