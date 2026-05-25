<?php
/**
 * Template Name: Products — Jaggery
 * Slug-based: applies to a page with slug "products-jaggery"
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';
?>

<main class="product-page product-page--jaggery">

    <!-- Slide 1: hero. Pink semi-circle (rising sun) + green badge + left-rail feature
         list are CSS chrome around the central product image. -->
    <section class="product-slide product-slide--hero" data-reveal>

        <ul class="product-features">
            <li>
                <span class="product-features__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"></path><circle cx="12" cy="12" r="9"></circle></svg>
                </span>
                Each batch tested<br>professionally
            </li>
            <li>
                <span class="product-features__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3.5a4.5 4.5 0 0 1 9 0v4.2c2.4 1 4 3.4 4 6.1A6.2 6.2 0 1 1 3 13.8c0-2.7 1.6-5.1 4-6.1z"></path><line x1="4" y1="4" x2="20" y2="20" stroke-width="2"></line></svg>
                </span>
                No added chemicals or<br>preservatives
            </li>
            <li>
                <span class="product-features__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 L4 6 v6 c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10 V6 z"></path><path d="M9 12 l2 2 l4-4"></path></svg>
                </span>
                Contains Vital<br>Minerals
            </li>
        </ul>

        <h1 class="product-hero__title">
            <img src="<?php echo esc_url( $bust( $tpl . '/assets/images/logo/anandiitaa-wordmark.png' ) ); ?>" alt="Anandiitaa">
            <span>Jaggery</span>
        </h1>

        <div class="product-hero__stage">
            <picture>
                <?php // SEAMLESS_BG_TEST: mac hero swapped → jaggery-slide-1-new.png (transparent bg). Restore '/mac/jaggery-slide-1.png' to revert. ?>
                <source media="(min-width: 1440px)" srcset="<?php echo esc_url( $bust( $tpl . '/assets/images/products/jaggery/mac/jaggery-slide-1-new.png' ) ); ?>">
                <?php // SEAMLESS_BG_TEST: 1366 tier (1281–1439px) hero. ?>
                <source media="(min-width: 1281px) and (max-width: 1439px)" srcset="<?php echo esc_url( $bust( $tpl . '/assets/images/products/jaggery/d1366/jaggery-slide-1.png' ) ); ?>">
                <?php // SEAMLESS_BG_TEST: 1280 tier (1101–1280px) hero. ?>
                <source media="(min-width: 1101px) and (max-width: 1280px)" srcset="<?php echo esc_url( $bust( $tpl . '/assets/images/products/jaggery/d1280/jaggery-slide-1.png' ) ); ?>">
                <img
                    class="product-hero__image"
                    src="<?php echo esc_url( $bust( $tpl . '/assets/images/products/jaggery/jaggery-slide-1.png' ) ); ?>"
                    alt="Anandiitaa Desi Jaggery — full product composition"
                    fetchpriority="high">
            </picture>
        </div>

        <img
            class="natural-seal"
            src="<?php echo esc_url( $bust( $tpl . '/assets/images/products/jaggery/100-natural.png' ) ); ?>"
            alt="100% Natural">

    </section>

    <!-- Slide 2: Process timeline. 5 alternating-position steps with arc-borders
         (the "lid + holder" silhouette), number knobs, image circles, and dashed
         connectors. Step content is data-driven so it's easy to refactor to ACF later. -->
    <?php
        $process_steps = array(
            array(
                'number'    => '01',
                'bold'      => 'Fresh sugarcane juice extraction –',
                'rest'      => 'Pure juice extraction to preserve natural minerals.',
                'image'     => $tpl . '/assets/images/products/jaggery/process/step-1.png',
            ),
            array(
                'number'    => '02',
                'bold'      => 'Clarification –',
                'rest'      => 'Natural filteration. No Chemicals. No bleaching agent.',
                'image'     => $tpl . '/assets/images/products/jaggery/process/step-2.png',
            ),
            array(
                'number'    => '03',
                'bold'      => 'Slow Cooking –',
                'rest'      => 'Cooked slow and slow using Traditional method',
                'image'     => $tpl . '/assets/images/products/jaggery/process/step-3.png',
            ),
            array(
                'number'    => '04',
                'bold'      => 'Moulding &amp; Setting –',
                'rest'      => 'Naturally cooled &amp; set. Shape &amp; Texture locked in',
                'image'     => $tpl . '/assets/images/products/jaggery/process/step-4.png',
            ),
            array(
                'number'    => '05',
                'bold'      => 'Testing &amp; Packing –',
                'rest'      => 'Each Batch tested by Professionals. Sealed. Clean. Ready',
                'image'     => $tpl . '/assets/images/products/jaggery/process/step-5.png',
            ),
        );
    ?>
    <section class="product-slide product-slide--process" data-reveal>

        <h2 class="process-title">Process Defines Purity</h2>

        <ol class="process-timeline">

            <!-- Connector layer: dashed diagonal lines connecting each circle's
                 arc-end (right side of one) to the next circle's arc-end (left side).
                 Using percentage coordinates so the lines scale with the timeline. -->
            <svg class="process-connectors" width="100%" height="100%" preserveAspectRatio="none" aria-hidden="true">
                <g fill="none" stroke="#b89c70" stroke-width="2.5" stroke-dasharray="8 8" stroke-linecap="round">
                    <!-- 1 → 2 : top-right of circle 1 to bottom-left of circle 2 -->
                    <line x1="17%" y1="27%" x2="23%" y2="73%" />
                    <!-- 2 → 3 : bottom-right of circle 2 to top-left of circle 3 -->
                    <line x1="37%" y1="73%" x2="43%" y2="27%" />
                    <!-- 3 → 4 -->
                    <line x1="57%" y1="27%" x2="63%" y2="73%" />
                    <!-- 4 → 5 -->
                    <line x1="77%" y1="73%" x2="83%" y2="27%" />
                </g>
            </svg>

            <?php foreach ( $process_steps as $i => $step ) :
                $is_top = ( $i % 2 === 0 ); // 1, 3, 5 (indices 0,2,4) sit up; 2, 4 (1,3) sit down
                $variant = $is_top ? 'top' : 'bottom';
            ?>
                <li class="process-step process-step--<?php echo $variant; ?>">

                    <div class="process-step__circle">
                        <?php if ( ! empty( $step['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $bust( $step['image'] ) ); ?>" alt="<?php echo esc_attr( strip_tags( $step['bold'] ) ); ?>" loading="lazy" decoding="async">
                        <?php else : ?>
                            <span class="process-step__placeholder" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="11" r="1.5"></circle><path d="M21 17l-5-5-5 5-3-3-5 5"></path></svg>
                            </span>
                        <?php endif; ?>

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

    <!-- Slide 3: Health Benefits of Jaggery — accordion of 5 collapsible items.
         Uses native <details>/<summary> so it's accessible + works without JS.
         Image inside each item is a placeholder until photos are dropped in. -->
    <?php
        $benefits = array(
            array(
                'number' => '01',
                'title'  => 'Rich in Iron — Prevents Anaemia',
                'image'  => $tpl . '/assets/images/products/jaggery/benefits/iron.png',
                'body'   => 'Jaggery is an excellent source of plant-based iron. Some studies suggest that the iron found in jaggery is more easily absorbed by the body than other types of plant-based iron.',
                'open'   => true,
            ),
            array(
                'number' => '02',
                'title'  => 'Rich in Vital Minerals',
                'image'  => $tpl . '/assets/images/products/jaggery/benefits/minerals.png',
                'body'   => 'Naturally rich in calcium, magnesium, potassium and phosphorus — minerals that support bone strength, steady energy, and overall wellness.',
            ),
            array(
                'number' => '03',
                'title'  => 'Boosts Immunity',
                'image'  => $tpl . '/assets/images/products/jaggery/benefits/immunity.png',
                'body'   => 'Loaded with antioxidants and zinc, jaggery helps strengthen the body&rsquo;s natural defenses and combat oxidative stress.',
            ),
            array(
                'number' => '04',
                'title'  => 'Respiratory Health',
                'image'  => $tpl . '/assets/images/products/jaggery/benefits/respiratory.png',
                'body'   => 'Traditionally used to ease coughs, colds and congestion. Its warming nature helps clear airways and soothe the throat.',
            ),
            array(
                'number' => '05',
                'title'  => 'Aids Digestion',
                'image'  => $tpl . '/assets/images/products/jaggery/benefits/digestion.png',
                'body'   => 'Acts as a natural digestive — stimulates digestive enzymes and supports a healthy gut, which is why it&rsquo;s often eaten after meals.',
            ),
        );
    ?>
    <section class="product-slide product-slide--benefits" data-reveal>

        <h2 class="benefits-title">Health Benefits of Jaggery</h2>

        <ol class="benefits-list">
            <?php foreach ( $benefits as $b ) : ?>
                <li class="benefit-item">
                    <details<?php echo ! empty( $b['open'] ) ? ' open' : ''; ?>>
                        <summary class="benefit-summary">
                            <span class="benefit-summary__number"><?php echo esc_html( $b['number'] ); ?></span>
                            <span class="benefit-summary__title"><?php echo esc_html( $b['title'] ); ?></span>
                            <span class="benefit-summary__caret" aria-hidden="true">
                                <svg viewBox="0 0 16 10" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2 2 8 8 14 2"></polyline></svg>
                            </span>
                        </summary>
                        <div class="benefit-reveal">
                            <div class="benefit-content">
                                <div class="benefit-content__image">
                                    <?php if ( ! empty( $b['image'] ) ) : ?>
                                        <img src="<?php echo esc_url( $bust( $b['image'] ) ); ?>" alt="<?php echo esc_attr( $b['title'] ); ?>" loading="lazy" decoding="async">
                                    <?php else : ?>
                                        <span class="benefit-content__placeholder" aria-hidden="true">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="11" r="1.5"></circle><path d="M21 17l-5-5-5 5-3-3-5 5"></path></svg>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <p class="benefit-content__body"><?php echo wp_kses_post( $b['body'] ); ?></p>
                            </div>
                        </div>
                    </details>
                </li>
            <?php endforeach; ?>
        </ol>

        <p class="benefits-footer">These benefits come from keeping jaggery closer to its original form, less processed, more complete.</p>

    </section>

    <!-- Slide 4: Variants — two product cards (Powder + Block) side by side.
         Packet image overlaps the top edge of each card. Drop real powder pack
         image at the path below; for now both use jaggery-900g.png as placeholder. -->
    <?php
        $variants = array(
            array(
                'image'      => $tpl . '/assets/images/products/packets/jaggery-powder.png',
                'available'  => '500 GM',
                'title'      => 'Jaggery Powder',
            ),
            array(
                'image'      => $tpl . '/assets/images/products/packets/desi-jaggery.png',
                'available'  => '900 GM',
                'title'      => 'Jaggery Block',
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

    <!-- Slide 5 (last): "Words that matter" — duplicate of the home reviews slide.
         Identical markup + classes so the existing CSS (.reviews-title,
         .reviews-grid, .review-card, .review-card__quote-mark) styles it. -->
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
