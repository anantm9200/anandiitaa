<?php
/**
 * Template Name: Recipe — Choco Lava Cake
 * Slug-based: routed to /recipes/choco-lava-cake via anandiitaa_route_templates()
 *
 * Layout mirrors the Home Made Cookies template: intro → ingredients →
 * method (one step per slide, alternating L/R) → tip.
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';

$dish_image = $tpl . '/assets/images/products/sugar/recipes/chocolate-dessert.png';

$intro = 'Choco Lava Cake is a rich, indulgent dessert loved for its soft cake outside and warm molten chocolate centre inside. It is perfect for celebrations, dinner parties, or whenever you want a bakery-style dessert at home. Made with cocoa, chocolate, and balanced sweetness from Anandiitaa Sugar, this cake delivers a smooth, gooey, and luxurious chocolate experience in every bite.';

$ingredients = array(
    '½ cup dark chocolate, chopped',
    '¼ cup butter',
    '¼ cup Anandiitaa Sugar, powdered',
    '¼ cup all-purpose flour / maida',
    '1 tbsp cocoa powder',
    '¼ tsp baking powder',
    '¼ cup milk',
    '½ tsp vanilla essence',
    'A pinch of salt',
    'Butter, for greasing',
    'Cocoa powder or flour, for dusting',
);

$clc_steps_dir = $tpl . '/assets/images/products/sugar/recipes/choco-lava-cake';
$method = array(
    array(
        'title' => 'Prepare the moulds',
        'body'  => 'Grease small ramekins or cupcake moulds with butter and dust them lightly with cocoa powder or flour. Keep aside.',
        'image' => $clc_steps_dir . '/clc1.png',
    ),
    array(
        'title' => 'Melt chocolate and butter',
        'body'  => 'In a bowl, add chopped dark chocolate and butter. Melt using a double boiler or microwave until smooth. Let it cool slightly.',
        'image' => $clc_steps_dir . '/clc2.png',
    ),
    array(
        'title' => 'Add Anandiitaa Sugar',
        'body'  => 'Add powdered Anandiitaa Sugar to the melted chocolate mixture and mix until smooth.',
        'image' => $clc_steps_dir . '/clc3.png',
    ),
    array(
        'title' => 'Prepare the batter',
        'body'  => 'Add maida, cocoa powder, baking powder, and salt. Mix gently. Add milk and vanilla essence to make a smooth, thick batter.',
        'image' => $clc_steps_dir . '/clc4.png',
    ),
    array(
        'title' => 'Fill the moulds',
        'body'  => 'Pour the batter into the prepared moulds, filling them about ¾ full.',
        'image' => $clc_steps_dir . '/clc5.png',
    ),
    array(
        'title' => 'Bake',
        'body'  => 'Bake in a preheated oven at 200°C for 8–10 minutes. The edges should be set, while the centre should remain soft.',
        'image' => $clc_steps_dir . '/clc6.png',
    ),
    array(
        'title' => 'Serve immediately',
        'body'  => 'Let the cakes rest for 1 minute, then gently unmould and serve warm. The centre should flow out like molten chocolate when cut.',
        'image' => $clc_steps_dir . '/clc7.png',
    ),
);

$tip = 'Do not overbake the cake. The perfect choco lava texture comes from keeping the centre slightly underbaked and soft.';
?>

<main class="recipe-detail recipe-detail--choco-lava-cake">

    <!-- Slide 1: Intro -->
    <section class="recipe-detail-slide recipe-detail-slide--intro" data-reveal>
        <div class="recipe-intro">
            <div class="recipe-intro__media">
                <img src="<?php echo esc_url( $bust( $dish_image ) ); ?>" alt="Choco Lava Cake" fetchpriority="high">
            </div>
            <div class="recipe-intro__copy">
                <p class="recipe-detail__eyebrow">Home Delicacies Recipe</p>
                <h1 class="recipe-detail__title">Choco Lava Cake</h1>
                <p class="recipe-detail__intro-body"><?php echo esc_html( $intro ); ?></p>
                <ul class="recipe-detail__meta">
                    <li><span class="recipe-detail__meta-label">Time</span><span class="recipe-detail__meta-value">25–30 mins</span></li>
                    <li><span class="recipe-detail__meta-label">Level</span><span class="recipe-detail__meta-value">Easy</span></li>
                    <li><span class="recipe-detail__meta-label">Serves</span><span class="recipe-detail__meta-value">3–4 people</span></li>
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
            <h2 class="recipe-detail__section-title">For perfect Choco Lava Cake</h2>
            <p class="recipe-tip__body"><?php echo esc_html( $tip ); ?></p>
            <a class="recipe-detail__back" href="<?php echo esc_url( home_url( '/products/sugar' ) ); ?>">&larr; Back to Sugar</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
