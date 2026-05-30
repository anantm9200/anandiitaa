<?php
/**
 * Template Name: Recipe — Gulab Jamun
 * Slug-based: routed to /recipes/gulab-jamun via anandiitaa_route_templates()
 *
 * Layout mirrors the Home Made Cookies template: intro → ingredients →
 * method (one step per slide, alternating L/R) → tip.
 * Ingredients here have two sub-sections (For Gulab Jamun, For Syrup),
 * handled via grouped headers in the rendered list.
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';

// NOTE: files in /recipes/ got mis-named at some point — `battasa.png`
// actually contains the Gulab Jamun photo, and `gulab-jamun.png` contains
// the Battasa photo. Pointing at the file that has the correct visual.
$dish_image = $tpl . '/assets/images/products/sugar/recipes/battasa.png';

$intro = 'Gulab Jamun is one of India\'s most loved festive desserts, known for its soft, melt-in-the-mouth texture and rich, aromatic syrup. Whether it is a celebration, family gathering, wedding, or festive meal, Gulab Jamun instantly adds sweetness to the occasion. In this recipe, the syrup is prepared using hygienically manufactured Anandiitaa Sugar, giving the dessert a rich sweetness and perfect festive flavour.';

$ingredients_groups = array(
    'For Gulab Jamun' => array(
        '1 cup khoya / mawa',
        '¼ cup all-purpose flour / maida',
        '2 tbsp semolina / rava (optional)',
        '¼ tsp baking soda',
        '2–3 tbsp milk, as needed',
        'Ghee or oil, for frying',
    ),
    'For Syrup' => array(
        '1½ cups Anandiitaa Sugar',
        '1½ cups water',
        '3–4 cardamom pods, lightly crushed',
        '1 tsp rose water',
        'A few saffron strands (optional)',
        '½ tsp lemon juice',
    ),
);

$gj_steps_dir = $tpl . '/assets/images/products/sugar/recipes/gulab-jamun';
$method = array(
    array(
        'title' => 'Prepare the syrup',
        'body'  => 'In a pan, add Anandiitaa Sugar and water. Heat until the Anandiitaa Sugar dissolves completely. Add cardamom, saffron, and lemon juice. Simmer for 6–8 minutes until the syrup becomes slightly sticky. Switch off the flame and add rose water.',
        'image' => $gj_steps_dir . '/gj1.png',
    ),
    array(
        'title' => 'Make the dough',
        'body'  => 'In a bowl, crumble the khoya until smooth. Add maida, baking soda, and rava. Mix gently. Add milk little by little and knead into a soft, smooth dough. Do not over-knead.',
        'image' => $gj_steps_dir . '/gj2.png',
    ),
    array(
        'title' => 'Shape the jamuns',
        'body'  => 'Grease your palms and make small, smooth balls without cracks. Keep them slightly small because they will expand after frying and soaking.',
        'image' => $gj_steps_dir . '/gj3.png',
    ),
    array(
        'title' => 'Fry slowly',
        'body'  => 'Heat ghee or oil on low to medium flame. Fry the balls slowly until they turn golden brown from all sides. Keep stirring gently for even colour.',
        'image' => $gj_steps_dir . '/gj4.png',
    ),
    array(
        'title' => 'Soak in syrup',
        'body'  => 'Add the warm fried gulab jamuns into the warm Anandiitaa Sugar syrup. Let them soak for at least 1–2 hours.',
        'image' => $gj_steps_dir . '/gj5.png',
    ),
    array(
        'title' => 'Serve',
        'body'  => 'Serve warm or at room temperature. Garnish with chopped pistachios or almonds.',
        'image' => $gj_steps_dir . '/gj6.png',
    ),
);

$tip = 'For soft and juicy Gulab Jamuns, keep both the fried balls and the Anandiitaa Sugar syrup warm while soaking. Avoid adding hot jamuns into boiling syrup, as this can make them hard or break them.';
?>

<main class="recipe-detail recipe-detail--gulab-jamun">

    <!-- Slide 1: Intro -->
    <section class="recipe-detail-slide recipe-detail-slide--intro" data-reveal>
        <div class="recipe-intro">
            <div class="recipe-intro__media">
                <img src="<?php echo esc_url( $bust( $dish_image ) ); ?>" alt="Gulab Jamun" fetchpriority="high">
            </div>
            <div class="recipe-intro__copy">
                <p class="recipe-detail__eyebrow">Home Delicacies Recipe</p>
                <h1 class="recipe-detail__title">Gulab Jamun</h1>
                <p class="recipe-detail__intro-body"><?php echo esc_html( $intro ); ?></p>
                <ul class="recipe-detail__meta">
                    <li><span class="recipe-detail__meta-label">Time</span><span class="recipe-detail__meta-value">1–2 hours</span></li>
                    <li><span class="recipe-detail__meta-label">Level</span><span class="recipe-detail__meta-value">Medium</span></li>
                    <li><span class="recipe-detail__meta-label">Serves</span><span class="recipe-detail__meta-value">4–5 people</span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Slide 2: Ingredients (grouped: For Gulab Jamun + For Syrup) -->
    <section class="recipe-detail-slide recipe-detail-slide--ingredients" data-reveal>
        <p class="recipe-detail__eyebrow">What you'll need</p>
        <h2 class="recipe-detail__section-title">Ingredients</h2>
        <div class="recipe-ingredients-groups">
            <?php foreach ( $ingredients_groups as $group_title => $items ) : ?>
                <div class="recipe-ingredients-group">
                    <h3 class="recipe-ingredients-group__title"><?php echo esc_html( $group_title ); ?></h3>
                    <ul class="recipe-ingredients">
                        <?php foreach ( $items as $item ) : ?>
                            <li class="recipe-ingredients__item"><?php echo esc_html( $item ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
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
            <h2 class="recipe-detail__section-title">For perfect Gulab Jamun</h2>
            <p class="recipe-tip__body"><?php echo esc_html( $tip ); ?></p>
            <a class="recipe-detail__back" href="<?php echo esc_url( home_url( '/products/sugar' ) ); ?>">&larr; Back to Sugar</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
