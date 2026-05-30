<?php
/**
 * Template Name: Products — Sugar
 * Slug-based: applies to a page with slug "products-sugar"
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';
?>

<main class="product-page product-page--sugar">

    <!-- Slide 1: hero. Full-bleed sugar lineup composite + left-rail features +
         center wordmark lockup + right-side 100% Natural badge. Mirrors the
         jaggery hero so the existing .product-slide--hero CSS styles it. -->
    <section class="product-slide product-slide--hero" data-reveal>

        <ul class="product-features">
            <li>
                <span class="product-features__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"></path><circle cx="12" cy="12" r="9"></circle></svg>
                </span>
                Each batch tested<br>professionally.
            </li>
            <li>
                <span class="product-features__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3.5a4.5 4.5 0 0 1 9 0v4.2c2.4 1 4 3.4 4 6.1A6.2 6.2 0 1 1 3 13.8c0-2.7 1.6-5.1 4-6.1z"></path><line x1="4" y1="4" x2="20" y2="20" stroke-width="2"></line></svg>
                </span>
                No harmful chemical<br>additives.
            </li>
            <li>
                <span class="product-features__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M5 7h14"></path><path d="M5 17h14"></path><circle cx="12" cy="12" r="9"></circle></svg>
                </span>
                Clean, controlled<br>processing.
            </li>
        </ul>

        <h1 class="product-hero__title">
            <img src="<?php echo esc_url( $bust( $tpl . '/assets/images/logo/anandiitaa-wordmark.png' ) ); ?>" alt="Anandiitaa">
            <span>Sugar</span>
        </h1>

        <div class="product-hero__stage">
            <picture>
                <?php // SEAMLESS_BG_TEST: mac hero swapped → sugar-slide-1-new.png (transparent bg). Restore '/mac/sugar-slide-1.png' to revert. ?>
                <source media="(min-width: 1440px)" srcset="<?php echo esc_url( $bust( $tpl . '/assets/images/products/sugar/mac/sugar-slide-1-new.png' ) ); ?>">
                <?php // SEAMLESS_BG_TEST: 1366 tier (1281–1439px) hero. ?>
                <source media="(min-width: 1281px) and (max-width: 1439px)" srcset="<?php echo esc_url( $bust( $tpl . '/assets/images/products/sugar/d1366/sugar-slide-1.png' ) ); ?>">
                <?php // SEAMLESS_BG_TEST: 1280 tier (1101–1280px) hero. ?>
                <source media="(min-width: 1101px) and (max-width: 1280px)" srcset="<?php echo esc_url( $bust( $tpl . '/assets/images/products/sugar/d1280/sugar-slide-1.png' ) ); ?>">
                <img
                    class="product-hero__image"
                    src="<?php echo esc_url( $bust( $tpl . '/assets/images/products/sugar/sugar-slide-1.png' ) ); ?>"
                    alt="Anandiitaa Premium Refined Sugar — Bold Grain &amp; Fine Grain"
                    fetchpriority="high">
            </picture>
        </div>

        <img
            class="natural-seal"
            src="<?php echo esc_url( $bust( $tpl . '/assets/images/products/sugar/100-natural.png' ) ); ?>"
            alt="100% Natural">

    </section>

    <!-- Slide 2: Process timeline. Identical structure to jaggery slide 2 — five
         alternating circles with arc-borders, number knobs, and dashed connectors.
         Steps 1, 2, 4 are sugar-specific photos; step 3 borrows jaggery's step-2
         photo; step 5 reuses jaggery's step-5 photo. -->
    <?php
        $process_steps = array(
            array(
                'number' => '01',
                'bold'   => 'Sugarcane Selection',
                'rest'   => 'Carefully sourced sugarcane, selected for quality, maturity and consistency.',
                'image'  => $tpl . '/assets/images/products/sugar/process/cane-selection.png',
            ),
            array(
                'number' => '02',
                'bold'   => 'Juice Extraction &amp; Filtration',
                'rest'   => 'Fresh cane juice is crushed and filtered to remove impurities for a cleaner process.',
                'image'  => $tpl . '/assets/images/products/sugar/process/extraction.png',
            ),
            array(
                'number' => '03',
                'bold'   => 'Refinement Process',
                'rest'   => 'The juice is gently clarified and evaporated to achieve purity, clarity and consistency.',
                'image'  => $tpl . '/assets/images/products/sugar/process/refinement.png',
            ),
            array(
                'number' => '04',
                'bold'   => 'Crystallisation',
                'rest'   => 'Controlled crystallisation ensures uniform grain size, brightness and high purity in every batch.',
                'image'  => $tpl . '/assets/images/products/sugar/process/crystallisation.png',
            ),
            array(
                'number' => '05',
                'bold'   => 'Testing &amp; Packing',
                'rest'   => 'Every batch is tested for quality, then packed, sealed and stored under hygienic conditions.',
                'image'  => $tpl . '/assets/images/products/sugar/process/packed.png',
            ),
        );
    ?>
    <section class="product-slide product-slide--process" data-reveal>

        <h2 class="process-title">Process Defines Purity</h2>

        <ol class="process-timeline">

            <svg class="process-connectors" width="100%" height="100%" preserveAspectRatio="none" aria-hidden="true">
                <g fill="none" stroke="#b89c70" stroke-width="2.5" stroke-dasharray="8 8" stroke-linecap="round">
                    <line x1="17%" y1="27%" x2="23%" y2="73%" />
                    <line x1="37%" y1="73%" x2="43%" y2="27%" />
                    <line x1="57%" y1="27%" x2="63%" y2="73%" />
                    <line x1="77%" y1="73%" x2="83%" y2="27%" />
                </g>
            </svg>

            <?php foreach ( $process_steps as $i => $step ) :
                $is_top  = ( $i % 2 === 0 );
                $variant = $is_top ? 'top' : 'bottom';
            ?>
                <li class="process-step process-step--<?php echo $variant; ?>">

                    <div class="process-step__circle">
                        <img src="<?php echo esc_url( $bust( $step['image'] ) ); ?>" alt="<?php echo esc_attr( strip_tags( $step['bold'] ) ); ?>" loading="lazy">

                        <span class="process-step__arc" aria-hidden="true"></span>

                        <span class="process-step__lid" aria-hidden="true">
                            <span class="process-step__number"><?php echo esc_html( $step['number'] ); ?></span>
                        </span>
                    </div>

                    <p class="process-step__text">
                        <strong><?php echo wp_kses( $step['bold'], array() ); ?></strong>
                        <?php echo wp_kses( $step['rest'], array() ); ?>
                    </p>

                </li>
            <?php endforeach; ?>
        </ol>

    </section>

    <!-- Slide 3 (was slide 4): Variants — duplicate of jaggery slide 4. Two product
         cards (Bold Grain green pack + Fine Grain blue pack) using existing
         .product-slide--variants / .variants-grid / .variant-card styles.
         Swapped above Recipes per client (variants come first, recipes after). -->
    <?php
        $variants = array(
            array(
                'image'     => $tpl . '/assets/images/products/packets/bold-grain.png',
                'available' => '1kg | 5kg | 20kg',
                'title'     => 'Bold Grain Sugar',
            ),
            array(
                'image'     => $tpl . '/assets/images/products/packets/fine-grain.png',
                'available' => '1kg | 5kg | 25kg',
                'title'     => 'Fine Grain Sugar',
            ),
        );
    ?>
    <section class="product-slide product-slide--variants" data-reveal>
        <div class="variants-grid">
            <?php foreach ( $variants as $v ) : ?>
                <article class="variant-card">
                    <img class="variant-card__image" src="<?php echo esc_url( $bust( $v['image'] ) ); ?>" alt="<?php echo esc_attr( $v['title'] ); ?>" loading="lazy">
                    <div class="variant-card__body">
                        <p class="variant-card__avail">
                            <span class="variant-card__avail-label">AVAILABLE IN:</span>
                            <span class="variant-card__avail-value"><?php echo esc_html( $v['available'] ); ?></span>
                        </p>
                        <h3 class="variant-card__title"><?php echo esc_html( $v['title'] ); ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Slide 4 (was slide 3): Home Delicacies Recipes — 2x2 grid of recipe cards.
         Each card: square photo on the left, copy + meta on the right, recipe
         title under the photo. Horizontal rules separate rows. -->
    <?php
        $recipes = array(
            array(
                'title' => 'Home Made Cookies',
                'image' => $tpl . '/assets/images/products/sugar/recipes/cookies.png',
                'body'  => 'Home Made Cookies are simple, comforting, and perfect for tea-time snacking. Their buttery aroma, crisp edges, and soft centre make them a favourite for both children and adults&hellip;',
                'time'  => '30-40mins',
                'level' => 'Easy',
                'serves'=> '3-4 people',
                'url'   => home_url( '/recipes/home-made-cookies' ),
            ),
            array(
                'title' => 'Gajar Ka Halwa',
                'image' => $tpl . '/assets/images/products/sugar/recipes/gulab-jamun.png',
                'body'  => 'Gajar Ka Halwa is a classic North Indian dessert that brings warmth, richness, and festive flavour to every celebration. Made with fresh carrots, milk, and pure Anandiitaa Sugar&hellip;',
                'time'  => '45-60mins',
                'level' => 'Easy',
                'serves'=> '4-5 people',
                'url'   => home_url( '/recipes/gajar-ka-halwa' ),
            ),
            array(
                'title' => 'Gulab Jamun',
                'image' => $tpl . '/assets/images/products/sugar/recipes/battasa.png',
                'body'  => 'Gulab Jamun is one of India&rsquo;s most loved festive desserts, known for its soft, melt-in-the-mouth texture and rich, aromatic syrup&hellip;',
                'time'  => '1-2 hours',
                'level' => 'Medium',
                'serves'=> '4-5 people',
                'url'   => home_url( '/recipes/gulab-jamun' ),
            ),
            array(
                'title' => 'Choco Lava Cake',
                'image' => $tpl . '/assets/images/products/sugar/recipes/chocolate-dessert.png',
                'body'  => 'Choco Lava Cake is a rich, indulgent dessert loved for its soft cake outside and warm molten chocolate centre inside&hellip;',
                'time'  => '25-30mins',
                'level' => 'Easy',
                'serves'=> '3-4 people',
                'url'   => home_url( '/recipes/choco-lava-cake' ),
            ),
        );
    ?>
    <section class="product-slide product-slide--recipes" data-reveal>

        <h2 class="recipes-title">Home Delicacies Recipes</h2>

        <ul class="recipes-grid">
            <?php foreach ( $recipes as $r ) :
                $has_url = ! empty( $r['url'] );
            ?>
                <li class="recipe-card<?php echo $has_url ? ' recipe-card--linked' : ''; ?>">
                    <?php if ( $has_url ) : ?>
                        <a class="recipe-card__overlay" href="<?php echo esc_url( $r['url'] ); ?>" aria-label="Read recipe: <?php echo esc_attr( $r['title'] ); ?>"></a>
                    <?php endif; ?>
                    <div class="recipe-card__media">
                        <img src="<?php echo esc_url( $bust( $r['image'] ) ); ?>" alt="<?php echo esc_attr( $r['title'] ); ?>" loading="lazy">
                    </div>

                    <div class="recipe-card__content">
                        <p class="recipe-card__body">
                            <?php echo wp_kses_post( $r['body'] ); ?>
                            <?php if ( $has_url ) : ?>
                                <span class="recipe-card__cta">Read recipe &rarr;</span>
                            <?php endif; ?>
                        </p>
                        <ul class="recipe-meta">
                            <li class="recipe-meta__item">
                                <span class="recipe-meta__icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 14"></polyline></svg>
                                </span>
                                <span class="recipe-meta__label"><?php echo esc_html( $r['time'] ); ?></span>
                            </li>
                            <li class="recipe-meta__item">
                                <span class="recipe-meta__icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 11v9H4a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h3z"></path><path d="M7 11l4-7c1.4 0 2.5 1.1 2.5 2.5V10h5a2 2 0 0 1 2 2.3l-1.2 6.5a2 2 0 0 1-2 1.7H7"></path></svg>
                                </span>
                                <span class="recipe-meta__label"><?php echo esc_html( $r['level'] ); ?></span>
                            </li>
                            <li class="recipe-meta__item">
                                <span class="recipe-meta__icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 19h18"></path><path d="M3 16a9 9 0 0 1 18 0"></path><circle cx="12" cy="6" r="1.2"></circle><line x1="12" y1="7.4" x2="12" y2="9"></line></svg>
                                </span>
                                <span class="recipe-meta__label"><?php echo esc_html( $r['serves'] ); ?></span>
                            </li>
                        </ul>
                    </div>

                    <h3 class="recipe-card__title"><?php echo esc_html( $r['title'] ); ?></h3>
                </li>
            <?php endforeach; ?>
        </ul>

    </section>

    <!-- Slide 5 (last): "Words that matter" — exact duplicate of jaggery slide 5.
         Same markup, classes, BG image and review data so the existing
         .reviews-* / .review-card styles pick it up identically. -->
    <?php
        $reviews = array(
            array(
                'image' => $tpl . '/assets/images/reviews/review1.png',
                'name'  => 'Aditi Parekh, 28',
                'role'  => '(Ahmedabad)',
                'quote' => 'In a busy life, convenience matters, but so does quality. Anandiitaa jaggery powder gives me both.',
            ),
            array(
                'image' => $tpl . '/assets/images/reviews/review2.png',
                'name'  => 'Kavya Bhosle, 34',
                'role'  => '(Mumbai)',
                'quote' => 'I switched to Anandiittaa jaggery powder for my morning chai. The taste is richer, and I don\'t need to worry about my Jaggery\'s Purity.',
            ),
        );
    ?>
    <section class="product-slide product-slide--reviews hero-slide" data-reveal>
        <div class="hero-slide__bg">
            <img src="<?php echo esc_url( $bust( $tpl . '/images/home/laptop/sections/10.png' ) ); ?>" alt="" loading="lazy">
        </div>
        <h2 class="reviews-title">Words that matter</h2>
        <div class="reviews-grid">
            <?php foreach ( $reviews as $r ) : ?>
                <article class="review-card">
                    <div class="review-card__image">
                        <img src="<?php echo esc_url( $bust( $r['image'] ) ); ?>" alt="<?php echo esc_attr( $r['name'] ); ?>" loading="lazy">
                        <span class="review-card__quote-mark" aria-hidden="true">&rdquo;</span>
                    </div>
                    <div class="review-card__body">
                        <div class="review-card__meta">
                            <span class="review-card__name"><?php echo esc_html( $r['name'] ); ?></span>
                            <span class="review-card__role"><?php echo esc_html( $r['role'] ); ?></span>
                        </div>
                        <p class="review-card__quote"><?php echo esc_html( $r['quote'] ); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
