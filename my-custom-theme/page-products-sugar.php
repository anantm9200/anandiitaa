<?php
/**
 * Template Name: Products — Sugar
 * Slug-based: applies to a page with slug "products-sugar"
 */
get_header();
$tpl = get_template_directory_uri();
?>

<main class="products-page">
    <h1>Refined Sugar</h1>
    <p class="lead">Premium-grade refined sugar for your everyday sweetness — clean, consistent, and pure.</p>

    <div class="product-grid">
        <article class="product-card">
            <img src="<?php echo $tpl; ?>/assets/images/products/sugar/m30-1kg-front.png" alt="Anandiitaa M30 Sugar 1kg">
            <h3>M30 — 1kg</h3>
            <p>Medium-grain refined sugar, perfect for daily use.</p>
            <a href="#" class="btn btn-primary">Buy Now</a>
        </article>
        <article class="product-card">
            <img src="<?php echo $tpl; ?>/assets/images/products/sugar/s30-1kg-front.png" alt="Anandiitaa S30 Sugar 1kg">
            <h3>S30 — 1kg</h3>
            <p>Fine-grain refined sugar, ideal for baking and beverages.</p>
            <a href="#" class="btn btn-primary">Buy Now</a>
        </article>
    </div>
</main>

<?php get_footer(); ?>
