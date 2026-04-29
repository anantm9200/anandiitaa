<?php
/**
 * Template Name: Products — Jaggery
 * Slug-based: applies to a page with slug "products-jaggery"
 */
get_header();
$tpl = get_template_directory_uri();
?>

<main class="products-page">
    <h1>Pure Desi Jaggery</h1>
    <p class="lead">Slow-cooked, mineral-rich, and crafted from the finest sugarcane. Anandiitaa Jaggery brings tradition home.</p>

    <div class="product-grid">
        <article class="product-card">
            <img src="<?php echo $tpl; ?>/assets/images/products/jaggery/jaggery-900g.png" alt="Anandiitaa Desi Jaggery 900g">
            <h3>Desi Jaggery — 900g</h3>
            <p>100% natural, no chemicals, no additives.</p>
            <a href="#" class="btn btn-primary">Buy Now</a>
        </article>
    </div>
</main>

<?php get_footer(); ?>
