<?php
/**
 * Template Name: Products — Landing
 * Auto-applied to the page with slug "products" via WP template hierarchy
 * (page-products.php). Shows two category cards leading to the detail pages.
 */
get_header();
$tpl = get_template_directory_uri();

$categories = array(
    array(
        'title'   => 'Jaggery',
        'tagline' => 'Slow-cooked. Mineral-rich. Pure tradition.',
        'href'    => home_url( '/products/jaggery' ),
        'image'   => $tpl . '/assets/images/products/jaggery/jaggery-900g.png',
        'accent'  => '#6b0f1a',
    ),
    array(
        'title'   => 'Sugar',
        'tagline' => 'Bold or fine grain. Clean, hygienic, dependable.',
        'href'    => home_url( '/products/sugar' ),
        'image'   => $tpl . '/assets/images/products/sugar/m30-1kg-front.png',
        'accent'  => '#1d5e2e',
    ),
);
?>

<main class="products-landing">

    <header class="products-landing__intro">
        <h1>Our Products</h1>
        <p>Choose a range to explore.</p>
    </header>

    <div class="products-landing__grid">
        <?php foreach ( $categories as $c ) : ?>
            <a class="category-card" href="<?php echo esc_url( $c['href'] ); ?>" style="--card-accent: <?php echo esc_attr( $c['accent'] ); ?>">
                <div class="category-card__media">
                    <img src="<?php echo esc_url( $c['image'] ); ?>" alt="<?php echo esc_attr( $c['title'] ); ?>" loading="lazy">
                </div>
                <div class="category-card__body">
                    <h2 class="category-card__title"><?php echo esc_html( $c['title'] ); ?></h2>
                    <p class="category-card__tagline"><?php echo esc_html( $c['tagline'] ); ?></p>
                    <span class="category-card__cta" aria-hidden="true">
                        Explore
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="13 6 19 12 13 18"></polyline></svg>
                    </span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

</main>

<?php get_footer(); ?>
