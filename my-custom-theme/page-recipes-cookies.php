<?php
/**
 * Template Name: Recipe — Home Made Cookies
 * Slug-based: routed to /recipes/home-made-cookies via anandiitaa_route_templates()
 *
 * Layout: 9 slides. Each is a `.recipe-detail-slide` with the brand cream→amber
 * gradient as the background. Slide 1 = intro, slide 2 = ingredients,
 * slides 3-8 = method (one step per slide), slide 9 = tip.
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';

$dish_image = $tpl . '/assets/images/products/sugar/recipes/cookies.png';

$intro = 'Home Made Cookies are simple, comforting, and perfect for tea-time snacking. Their buttery aroma, crisp edges, and soft centre make them a favourite for both children and adults. Made with everyday ingredients and sweetened with pure Anandiitaa Sugar, these cookies are easy to prepare at home and perfect for gifting, festive trays, or daily treats.';

$ingredients = array(
    '1 cup all-purpose flour / maida',
    '½ cup butter, softened',
    '½ cup Anandiitaa Sugar, powdered',
    '¼ tsp baking powder',
    '¼ tsp baking soda',
    '½ tsp vanilla essence',
    '2–3 tbsp milk, as needed',
    '2 tbsp chocolate chips or chopped nuts (optional)',
);

// Per-step images. Leave '' to render a styled placeholder; populate with a
// real URL (under /assets/images/products/sugar/recipes/cookies/) when ready.
$method = array(
    array(
        'title' => 'Cream the butter and Anandiitaa Sugar',
        'body'  => 'In a bowl, add softened butter and powdered Anandiitaa Sugar. Beat until the mixture becomes light and creamy.',
        'image' => '',
    ),
    array(
        'title' => 'Prepare the dry mix',
        'body'  => 'Sieve maida, baking powder, and baking soda together. Add this dry mixture to the butter and Anandiitaa Sugar mixture.',
        'image' => '',
    ),
    array(
        'title' => 'Make the dough',
        'body'  => 'Add vanilla essence and mix gently. Add milk little by little to form a soft cookie dough. Do not over-knead.',
        'image' => '',
    ),
    array(
        'title' => 'Shape the cookies',
        'body'  => 'Take small portions of dough and shape them into round cookies. Place them on a baking tray lined with parchment paper.',
        'image' => '',
    ),
    array(
        'title' => 'Bake',
        'body'  => 'Bake in a preheated oven at 170°C for 12–15 minutes or until the edges turn light golden.',
        'image' => '',
    ),
    array(
        'title' => 'Cool and serve',
        'body'  => 'Let the cookies cool completely before serving. They will become firmer and crispier as they cool.',
        'image' => '',
    ),
);

$tip = 'For better texture, chill the cookie dough for 15–20 minutes before baking. This helps the cookies hold their shape.';
?>

<main class="recipe-detail recipe-detail--cookies">

    <!-- Slide 1: Intro -->
    <section class="recipe-detail-slide recipe-detail-slide--intro" data-reveal>
        <div class="recipe-intro">
            <div class="recipe-intro__media">
                <img src="<?php echo esc_url( $bust( $dish_image ) ); ?>" alt="Home Made Cookies" fetchpriority="high">
            </div>
            <div class="recipe-intro__copy">
                <p class="recipe-detail__eyebrow">Home Delicacies Recipe</p>
                <h1 class="recipe-detail__title">Home Made Cookies</h1>
                <p class="recipe-detail__intro-body"><?php echo esc_html( $intro ); ?></p>
                <ul class="recipe-detail__meta">
                    <li><span class="recipe-detail__meta-label">Time</span><span class="recipe-detail__meta-value">30–40 mins</span></li>
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

    <!-- Slides 3–8: Method (one per step). Layout alternates: odd steps (1,3,5)
         render content-left/image-right; even steps (2,4,6) render image-left/
         content-right via the --reverse modifier. -->
    <?php foreach ( $method as $i => $step ) :
        $num     = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
        $reverse = ( $i % 2 === 1 ); // step 2, 4, 6 → image on left
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

    <!-- Slide 9: Tip -->
    <section class="recipe-detail-slide recipe-detail-slide--tip" data-reveal>
        <div class="recipe-tip">
            <span class="recipe-tip__badge" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"></path><path d="M10 21h4"></path><path d="M12 3a6 6 0 0 0-4 10.5c.9.9 1.5 1.9 1.5 3V15h5v-1.5c0-1.1.6-2.1 1.5-3A6 6 0 0 0 12 3z"></path></svg>
            </span>
            <p class="recipe-detail__eyebrow">Pro tip</p>
            <h2 class="recipe-detail__section-title">For perfect cookies</h2>
            <p class="recipe-tip__body"><?php echo esc_html( $tip ); ?></p>
            <a class="recipe-detail__back" href="<?php echo esc_url( home_url( '/products/sugar' ) ); ?>">&larr; Back to Sugar</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
