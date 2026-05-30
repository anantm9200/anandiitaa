<?php
/**
 * Template Name: Recipe — Gajar Ka Halwa
 * Slug-based: routed to /recipes/gajar-ka-halwa via anandiitaa_route_templates()
 *
 * Layout mirrors the Home Made Cookies template: intro → ingredients →
 * method (one step per slide, alternating L/R) → tip.
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';

$dish_image = $tpl . '/assets/images/products/sugar/recipes/gajar-ka-halwa.png';

$intro = 'Gajar Ka Halwa is a classic North Indian dessert that brings warmth, richness, and festive flavour to every celebration. Made with fresh carrots, milk, and pure Anandiitaa Sugar, this traditional sweet is especially popular during winter and festive occasions. Its rich aroma, soft texture, and delicious sweetness make it a favourite dessert for family gatherings, festivals, and special meals.';

$ingredients = array(
    '500 g carrots, grated',
    '500 ml full-fat milk',
    '½ cup Anandiitaa Sugar',
    '2 tbsp ghee',
    '¼ tsp cardamom powder',
    '2 tbsp chopped almonds',
    '2 tbsp chopped cashews',
    '1 tbsp raisins',
    'A few saffron strands (optional)',
);

$gkh_steps_dir = $tpl . '/assets/images/products/sugar/recipes/gajar-ka-halwa';
$method = array(
    array(
        'title' => 'Prepare the carrots',
        'body'  => 'Wash, peel, and grate the carrots. Keep them aside.',
        'image' => $gkh_steps_dir . '/gkh1.png',
    ),
    array(
        'title' => 'Cook the carrots and milk',
        'body'  => 'In a heavy-bottomed pan, add the grated carrots and milk. Cook on medium flame, stirring occasionally until the milk reduces significantly and the carrots become soft.',
        'image' => $gkh_steps_dir . '/gkh2.png',
    ),
    array(
        'title' => 'Add Anandiitaa Sugar',
        'body'  => 'Add Anandiitaa Sugar and mix well. Continue cooking until the mixture thickens and the moisture evaporates.',
        'image' => $gkh_steps_dir . '/gkh3.png',
    ),
    array(
        'title' => 'Add ghee and flavouring',
        'body'  => 'Add ghee, cardamom powder, and saffron strands. Stir continuously and cook until the halwa becomes rich, glossy, and starts leaving the sides of the pan.',
        'image' => $gkh_steps_dir . '/gkh4.png',
    ),
    array(
        'title' => 'Add dry fruits',
        'body'  => 'Add chopped almonds, cashews, and raisins. Mix well and cook for another 2–3 minutes.',
        'image' => $gkh_steps_dir . '/gkh5.png',
    ),
    array(
        'title' => 'Serve',
        'body'  => 'Serve warm and garnish with additional chopped nuts if desired.',
        'image' => $gkh_steps_dir . '/gkh6.png',
    ),
);

$tip = 'For a richer and more authentic taste, cook the carrots slowly in full-fat milk and allow the milk to reduce naturally. This enhances the flavour, texture, and overall richness of the Gajar Ka Halwa.';
?>

<main class="recipe-detail recipe-detail--gajar-ka-halwa">

    <!-- Slide 1: Intro -->
    <section class="recipe-detail-slide recipe-detail-slide--intro" data-reveal>
        <div class="recipe-intro">
            <div class="recipe-intro__media">
                <img src="<?php echo esc_url( $bust( $dish_image ) ); ?>" alt="Gajar Ka Halwa" fetchpriority="high">
            </div>
            <div class="recipe-intro__copy">
                <p class="recipe-detail__eyebrow">Home Delicacies Recipe</p>
                <h1 class="recipe-detail__title">Gajar Ka Halwa</h1>
                <p class="recipe-detail__intro-body"><?php echo esc_html( $intro ); ?></p>
                <ul class="recipe-detail__meta">
                    <li><span class="recipe-detail__meta-label">Time</span><span class="recipe-detail__meta-value">45–60 mins</span></li>
                    <li><span class="recipe-detail__meta-label">Level</span><span class="recipe-detail__meta-value">Easy</span></li>
                    <li><span class="recipe-detail__meta-label">Serves</span><span class="recipe-detail__meta-value">4–5 people</span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Slide 2: Ingredients -->
    <section class="recipe-detail-slide recipe-detail-slide--ingredients" data-reveal>
        <p class="recipe-detail__eyebrow">What you'll need</p>
        <h2 class="recipe-detail__section-title">Ingredients</h2>
        <ul class="recipe-ingredients">
            <?php foreach ( $ingredients as $item ) : ?>
                <li class="recipe-ingredients__item"><?php echo esc_html( $item ); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Slides 3+: Method (one per step, alternating L/R) -->
    <?php foreach ( $method as $i => $step ) :
        $num     = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
        $reverse = ( $i % 2 === 1 );
    ?>
        <section class="recipe-detail-slide recipe-detail-slide--step<?php echo $reverse ? ' recipe-detail-slide--reverse' : ''; ?>" data-reveal>
            <div class="recipe-step">
                <div class="recipe-step__copy">
                    <span class="recipe-step__number"><?php echo esc_html( $num ); ?></span>
                    <h2 class="recipe-step__title"><?php echo esc_html( $step['title'] ); ?></h2>
                    <p class="recipe-step__body"><?php echo esc_html( $step['body'] ); ?></p>
                </div>
                <div class="recipe-step__media">
                    <?php if ( ! empty( $step['image'] ) ) : ?>
                        <img src="<?php echo esc_url( $bust( $step['image'] ) ); ?>" alt="<?php echo esc_attr( $step['title'] ); ?>" loading="lazy">
                    <?php else : ?>
                        <div class="recipe-step__placeholder" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="11" r="1.6"></circle><path d="M21 16l-5-5-7 7"></path></svg>
                            <span>Step <?php echo (int) ( $i + 1 ); ?> photo</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <!-- Last slide: Tip -->
    <section class="recipe-detail-slide recipe-detail-slide--tip" data-reveal>
        <div class="recipe-tip">
            <span class="recipe-tip__badge" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"></path><path d="M10 21h4"></path><path d="M12 3a6 6 0 0 0-4 10.5c.9.9 1.5 1.9 1.5 3V15h5v-1.5c0-1.1.6-2.1 1.5-3A6 6 0 0 0 12 3z"></path></svg>
            </span>
            <p class="recipe-detail__eyebrow">Pro tip</p>
            <h2 class="recipe-detail__section-title">For perfect Gajar Ka Halwa</h2>
            <p class="recipe-tip__body"><?php echo esc_html( $tip ); ?></p>
            <a class="recipe-detail__back" href="<?php echo esc_url( home_url( '/products/sugar' ) ); ?>">&larr; Back to Sugar</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
