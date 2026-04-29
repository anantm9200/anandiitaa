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
            'image'   => $tpl . '/images/home/laptop/2.png',
            'alt'     => 'Our Process',
            'heading' => 'Crafted with Care.',
            'cta'     => array( 'label' => 'Our Process', 'href' => '/about-us', 'class' => 'btn-primary' ),
        ),
        array(
            'image'   => $tpl . '/images/home/laptop/3.png',
            'alt'     => 'Pure Desi Jaggery',
            'heading' => 'Pure Desi Jaggery.',
            'cta'     => array( 'label' => 'Shop Jaggery', 'href' => '/products-jaggery', 'class' => 'btn-primary' ),
        ),
        array(
            'image'   => $tpl . '/images/home/laptop/4.png',
            'alt'     => 'Refined Sugar',
            'heading' => 'Refined Sugar.',
            'cta'     => array( 'label' => 'Shop Sugar', 'href' => '/products-sugar', 'class' => 'btn-primary' ),
        ),
        array(
            'image'   => $tpl . '/images/home/laptop/5.png',
            'alt'     => 'Taste the Purity',
            'heading' => 'Taste the Purity.',
            'cta'     => array( 'label' => 'Contact Us', 'href' => '/contact', 'class' => 'btn-primary' ),
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
