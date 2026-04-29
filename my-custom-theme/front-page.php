<?php get_header(); ?>

<main class="home-page">

    <?php
    $tpl = get_template_directory_uri();
    // Slide 1 = new client-provided 1920x1080 home image. Slides 2-5 = placeholders
    // (using existing section bgs) until client supplies remaining 4 slides.
    $slides = array(
        array(
            'image'    => $tpl . '/images/home/laptop/slider/slide-1.png',
            'alt'      => 'Anandiitaa — Choose Pure',
            'heading'  => 'Choose Pure.<br>Choose Anandiitaa.',
            'cta'      => array( 'label' => 'Explore More', 'href' => '/about-us', 'class' => 'btn-primary' ),
            'position' => 'top-center',
        ),
        array(
            'image'    => $tpl . '/images/home/laptop/2.png',
            'alt'      => 'Choose Pure. Choose Anandiitaa.',
            'heading'  => 'Choose Pure.<br>Choose Anandiitaa.',
            'cta'      => array( 'label' => 'Explore More', 'href' => '/about-us', 'class' => 'btn-primary' ),
            'features' => array(
                array( 'icon' => 'shield', 'text' => '100% Natural Taste and Aroma' ),
                array( 'icon' => 'clipboard', 'text' => 'Contains Vital Minerals' ),
                array( 'icon' => 'spoon', 'text' => 'Easy to Use' ),
            ),
        ),
        array(
            'image'    => $tpl . '/images/home/laptop/3.png',
            'alt'      => 'Choose Pure. Choose Anandiitaa.',
            'heading'  => 'Choose Pure.<br>Choose Anandiitaa.',
            'cta'      => array( 'label' => 'Explore More', 'href' => '/about-us', 'class' => 'btn-primary' ),
            'features' => array(
                array( 'icon' => 'shield', 'text' => 'Sulphur Less' ),
                array( 'icon' => 'clipboard', 'text' => 'Zero Adulteration' ),
                array( 'icon' => 'spoon', 'text' => 'Pure and Hygienic' ),
            ),
        ),
        array(
            'image'    => $tpl . '/images/home/laptop/4.png',
            'alt'      => 'Choose Pure. Choose Anandiitaa.',
            'heading'  => 'Choose Pure.<br>Choose Anandiitaa.',
            'cta'      => array( 'label' => 'Explore More', 'href' => '/about-us', 'class' => 'btn-primary' ),
            'features' => array(
                array( 'icon' => 'shield', 'text' => '100% Natural Taste and Aroma' ),
                array( 'icon' => 'clipboard', 'text' => 'Contains Vital Minerals' ),
                array( 'icon' => 'spoon', 'text' => 'Traditionally Made' ),
            ),
        ),
        array(
            'image'    => $tpl . '/images/home/laptop/5.png',
            'alt'      => 'Choose Pure. Choose Anandiitaa.',
            'heading'  => 'Choose Pure.<br>Choose Anandiitaa.',
            'cta'      => array( 'label' => 'Explore More', 'href' => '/about-us', 'class' => 'btn-primary' ),
            'features' => array(
                array( 'icon' => 'shield', 'text' => 'Sulphur Less' ),
                array( 'icon' => 'clipboard', 'text' => 'Zero Adulteration' ),
                array( 'icon' => 'spoon', 'text' => 'Dissolves Easily' ),
            ),
        ),
        // Slide 6: The Anandiitaa Standards (custom 4-column layout)
        array(
            'type'      => 'standards',
            'image'     => $tpl . '/images/home/laptop/sections/6.png',
            'alt'       => 'The Anandiitaa Standards',
            'standards' => array(
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.5C12 2.5 6 9 6 14a6 6 0 0 0 12 0c0-5-6-11.5-6-11.5z"></path><path d="M9.5 13.5l1.8 1.8 3.5-3.5"></path></svg>',
                    'title' => 'Purity First, Always',
                    'body'  => 'No Sugar, No Bleach, No harmful Adulterants',
                ),
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18c2-2 5-3 9-3s7 1 9 3"></path><circle cx="12" cy="9" r="3"></circle><path d="M16 5l1 1M19 7l1 1M5 5L4 6M2 7l-1 1"></path></svg>',
                    'title' => 'Hygiene without compromise',
                    'body'  => 'The Highest Hygiene Standards. Period.',
                ),
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.5L4 5.5v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10v-6L12 2.5z"></path><path d="M9 12l2.2 2.2L15.5 10"></path></svg>',
                    'title' => 'Food Safety. Non-Negotiable',
                    'body'  => 'World Class food safety Standards',
                ),
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="12" r="6"></circle><path d="M9 12l2.2 2.2L15.5 10"></path></svg>',
                    'title' => 'Quality Without Doubt',
                    'body'  => 'Each Batch Quality tested by Professionals',
                ),
            ),
        ),
        // Slide 7: News-clippings bg, caption near top + caption near bottom
        array(
            'image'       => $tpl . '/images/home/laptop/sections/7.png',
            'alt'         => 'In the era of food adulteration',
            'caption_top' => 'Not all jaggery is made the same.',
            'heading'     => 'Choose Pure, Choose Anandiitaa',
            'position'    => 'bottom-center',
        ),
    );

    $icons = array(
        'shield'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
        'clipboard' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="M9 14h6"></path><path d="M9 10h6"></path><path d="M9 18h6"></path></svg>',
        'spoon'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"></path><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"></path><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"></path><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"></path></svg>',
    );
    ?>

    <section class="hero-carousel" aria-roledescription="carousel" aria-label="Anandiitaa highlights">
        <div class="hero-track" data-hero-track>
            <?php foreach ( $slides as $i => $slide ) : ?>
                <article
                    class="hero-slide"
                    role="group"
                    aria-roledescription="slide"
                    aria-label="<?php echo esc_attr( ($i + 1) . ' of ' . count( $slides ) ); ?>"
                    aria-hidden="<?php echo $i === 0 ? 'false' : 'true'; ?>">
                    <div class="hero-slide__bg">
                        <img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>" <?php echo $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"'; ?>>
                    </div>

                    <?php if ( ! empty( $slide['type'] ) && $slide['type'] === 'standards' ) : ?>
                        <div class="standards-title">
                            <span class="standards-title__small">The</span>
                            <img class="standards-title__wordmark" src="<?php echo $tpl; ?>/assets/images/logo/anandiitaa-wordmark.png" alt="ANANDIITAA">
                            <span class="standards-title__small">Standards</span>
                        </div>
                        <div class="standards-grid">
                            <?php foreach ( $slide['standards'] as $std ) : ?>
                                <div class="standards-col">
                                    <span class="standards-col__icon"><?php echo $std['icon']; ?></span>
                                    <h3 class="standards-col__title"><?php echo esc_html( $std['title'] ); ?></h3>
                                    <p class="standards-col__body"><?php echo esc_html( $std['body'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <?php if ( ! empty( $slide['caption_top'] ) ) : ?>
                            <div class="hero-slide__content hero-slide__content--top-caption">
                                <h2><?php echo esc_html( $slide['caption_top'] ); ?></h2>
                            </div>
                        <?php endif; ?>
                        <div class="hero-slide__content<?php echo ! empty( $slide['position'] ) ? ' hero-slide__content--' . esc_attr( $slide['position'] ) : ''; ?>">
                            <h2><?php echo wp_kses( $slide['heading'], array( 'br' => array() ) ); ?></h2>
                            <?php if ( ! empty( $slide['cta'] ) ) : ?>
                                <a href="<?php echo esc_url( $slide['cta']['href'] ); ?>" class="btn <?php echo esc_attr( $slide['cta']['class'] ); ?>">
                                    <?php echo esc_html( $slide['cta']['label'] ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $slide['features'] ) ) : ?>
                                <ul class="hero-features">
                                    <?php foreach ( $slide['features'] as $feat ) : ?>
                                        <li>
                                            <span class="icon"><?php echo $icons[ $feat['icon'] ]; ?></span>
                                            <?php echo esc_html( $feat['text'] ); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <button class="hero-carousel__arrow hero-carousel__arrow--prev" data-hero-prev aria-label="Previous slide" type="button">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
        </button>
        <button class="hero-carousel__arrow hero-carousel__arrow--next" data-hero-next aria-label="Next slide" type="button">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </button>

        <div class="hero-carousel__dots" role="tablist" aria-label="Choose slide" data-hero-dots>
            <?php foreach ( $slides as $i => $_ ) : ?>
                <button
                    class="hero-carousel__dot<?php echo $i === 0 ? ' is-active' : ''; ?>"
                    role="tab"
                    aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                    aria-label="Go to slide <?php echo ($i + 1); ?>"
                    data-hero-go="<?php echo (int) $i; ?>"
                    type="button"></button>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
