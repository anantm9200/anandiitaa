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
        // Slide 8: Product grid (2x2 cards on cream bg)
        array(
            'type'     => 'products-grid',
            'image'    => $tpl . '/images/home/laptop/sections/8.png',
            'alt'      => 'Anandiitaa Product Range',
            'products' => array(
                array(
                    'title' => 'Desi Jaggery Powder',
                    'desc'  => 'Natural Mineral rich sweetness made for your everyday convenience.',
                    'sizes' => '500 GM',
                    'href'  => '/products-jaggery',
                    'image' => $tpl . '/assets/images/lifestyle/lifestyle-2.png',
                    'color' => '#6b0f1a',
                ),
                array(
                    'title' => 'Bold Grain Sugar',
                    'desc'  => 'Sweetness that stands out based on purity.',
                    'sizes' => '1 KG | 5 KG | 25 KG',
                    'href'  => '/products-sugar',
                    'image' => $tpl . '/assets/images/lifestyle/lifestyle-3.png',
                    'color' => '#1d5e2e',
                ),
                array(
                    'title' => 'Fine Grain Sugar',
                    'desc'  => 'It dissolves smoothly, leaving a balanced sweetness behind.',
                    'sizes' => '1 KG | 5 KG | 25 KG',
                    'href'  => '/products-sugar',
                    'image' => $tpl . '/assets/images/lifestyle/lifestyle-6.png',
                    'color' => '#1f3a8e',
                ),
                array(
                    'title' => 'Desi Jaggery',
                    'desc'  => 'Cooked low &amp; slow, the way jaggery has always been made.',
                    'sizes' => '900 GM',
                    'href'  => '/products-jaggery',
                    'image' => $tpl . '/assets/images/products/jaggery/jaggery-900g.png',
                    'color' => '#6b0f1a',
                ),
            ),
        ),
        // Slide 9: The Benefits of Jaggery (4 benefit cards on dark wood bg)
        array(
            'type'     => 'benefits',
            'image'    => $tpl . '/images/home/laptop/sections/9.png',
            'alt'      => 'The Benefits of Jaggery',
            'title'    => 'The Benefits of Jaggery',
            'benefits' => array(
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2.5"></circle><circle cx="4" cy="6" r="1.5"></circle><circle cx="20" cy="6" r="1.5"></circle><circle cx="4" cy="18" r="1.5"></circle><circle cx="20" cy="18" r="1.5"></circle><path d="M5.3 6.8 L9.6 10.7"></path><path d="M18.7 6.8 L14.4 10.7"></path><path d="M5.3 17.2 L9.6 13.3"></path><path d="M18.7 17.2 L14.4 13.3"></path></svg>',
                    'title' => 'Rich in<br>Iron',
                    'body'  => '100g of jaggery provides 61% of your daily iron needs.',
                ),
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 4v3.5C7 8 5.5 9.5 5.5 12c0 3.5 2.8 6.5 6 6.5 2.6 0 4.5-1.5 5-4 0.4-2-1-3.5-2.5-3.5-1 0-1.8 0.6-2 1.5"></path><path d="M9 4h6v3.5"></path><circle cx="14" cy="13" r="0.5"></circle></svg>',
                    'title' => 'Boosts<br>Digestion',
                    'body'  => 'Jaggery acts as a natural detoxifier, promoting healthy digestion.',
                ),
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"></circle><ellipse cx="12" cy="12" rx="9" ry="3.5"></ellipse><ellipse cx="12" cy="12" rx="9" ry="3.5" transform="rotate(60 12 12)"></ellipse><ellipse cx="12" cy="12" rx="9" ry="3.5" transform="rotate(120 12 12)"></ellipse></svg>',
                    'title' => 'Antioxidant-<br>Rich',
                    'body'  => 'Jaggery is packed with antioxidants, offering more benefits than sugar.',
                ),
                array(
                    'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 8c0-2 2-4 5-4h7c3 0 5 1 6 4 1 4-1 9-5 11-3 1.5-7 1-10-1-3-2-3-6-3-10z"></path><path d="M9 11l1.5 1.5L13 10"></path><path d="M17 5l1 1M19 7l1-1"></path></svg>',
                    'title' => 'Helps<br>Liver Health',
                    'body'  => 'Jaggery helps cleanse the digestive system and supports liver function.',
                ),
            ),
        ),
        // Slide 10: Words that matter (2 U-shaped review cards on cream bg)
        array(
            'type'    => 'reviews',
            'image'   => $tpl . '/images/home/laptop/sections/10.png',
            'alt'     => 'Words that matter',
            'title'   => 'Words that matter',
            'reviews' => array(
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
            ),
        ),
        // Slide 11: Community / Social CTA
        array(
            'type'  => 'social',
            'image' => $tpl . '/images/home/laptop/sections/11.png',
            'alt'   => 'For Those Who Choose Better — Anandiitaa Community',
        ),
    );

    // Split: first 5 stay in the carousel, the rest become standalone scroll-revealed sections.
    $carousel_slides = array_slice( $slides, 0, 5 );
    $section_slides  = array_slice( $slides, 5 );

    $icons = array(
        'shield'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
        'clipboard' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="M9 14h6"></path><path d="M9 10h6"></path><path d="M9 18h6"></path></svg>',
        'spoon'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"></path><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"></path><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"></path><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"></path></svg>',
    );

    // Maps a laptop bg URL → equivalent mac URL. Slide 1 uses /laptop/slider/slide-1.png
    // which maps to /mac/1.png; everything else mirrors path 1:1 under /mac/.
    $mac_url_for = function ( $laptop_url ) use ( $tpl ) {
        if ( strpos( $laptop_url, '/images/home/laptop/slider/slide-1.png' ) !== false ) {
            return $tpl . '/images/home/mac/1.png';
        }
        return str_replace( '/images/home/laptop/', '/images/home/mac/', $laptop_url );
    };
    // Returns true only when the mac variant file actually exists on disk.
    $mac_exists = function ( $mac_url ) use ( $tpl ) {
        $rel = str_replace( $tpl, '', $mac_url );
        return file_exists( get_template_directory() . $rel );
    };
    // Appends ?v=mtime to bust browser caches when an image's bytes change but its filename doesn't.
    $bust = function ( $url ) use ( $tpl ) {
        $rel = str_replace( $tpl, '', $url );
        $abs = get_template_directory() . $rel;
        return file_exists( $abs ) ? $url . '?v=' . filemtime( $abs ) : $url;
    };
    // Renders a slide's bg + inner content. Used by carousel AND standalone sections.
    // Bg uses <picture> with a viewport-based <source> so the browser picks the
    // mac variant on screens >=1440px and the laptop variant otherwise. This is
    // CDN/Pantheon-cache safe (no UA-dependent HTML), unlike server-side UA
    // detection which Varnish strips at the cache key.
    $render_slide = function ( $slide, $is_priority = false ) use ( $tpl, $icons, $mac_url_for, $mac_exists, $bust ) {
        $laptop_url = $slide['image'];
        $mac_url    = $mac_url_for( $laptop_url );
        $has_mac    = $mac_exists( $mac_url );
        ?>
        <div class="hero-slide__bg">
            <picture>
                <?php if ( $has_mac ) : ?>
                    <source media="(min-width: 1440px)" srcset="<?php echo esc_url( $bust( $mac_url ) ); ?>">
                <?php endif; ?>
                <img src="<?php echo esc_url( $bust( $laptop_url ) ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>" <?php echo $is_priority ? 'fetchpriority="high"' : 'loading="lazy"'; ?>>
            </picture>
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
        <?php elseif ( ! empty( $slide['type'] ) && $slide['type'] === 'benefits' ) : ?>
            <h2 class="benefits-title"><?php echo esc_html( $slide['title'] ); ?></h2>
            <div class="benefits-grid">
                <?php foreach ( $slide['benefits'] as $b ) : ?>
                    <div class="benefit-card">
                        <span class="benefit-card__icon"><?php echo $b['icon']; ?></span>
                        <h3 class="benefit-card__title"><?php echo wp_kses( $b['title'], array( 'br' => array() ) ); ?></h3>
                        <p class="benefit-card__body"><?php echo esc_html( $b['body'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif ( ! empty( $slide['type'] ) && $slide['type'] === 'reviews' ) : ?>
            <h2 class="reviews-title"><?php echo esc_html( $slide['title'] ); ?></h2>
            <div class="reviews-grid">
                <?php foreach ( $slide['reviews'] as $r ) : ?>
                    <article class="review-card">
                        <div class="review-card__image">
                            <img src="<?php echo esc_url( $r['image'] ); ?>" alt="<?php echo esc_attr( $r['name'] ); ?>" loading="lazy">
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
        <?php elseif ( ! empty( $slide['type'] ) && $slide['type'] === 'products-grid' ) : ?>
            <div class="products-grid">
                <?php foreach ( $slide['products'] as $product ) : ?>
                    <article class="product-card" style="--card-accent: <?php echo esc_attr( $product['color'] ); ?>">
                        <div class="product-card__body">
                            <div class="product-card__top">
                                <h3 class="product-card__title"><?php echo esc_html( $product['title'] ); ?></h3>
                                <p class="product-card__desc"><?php echo wp_kses( $product['desc'], array() ); ?></p>
                            </div>
                            <div class="product-card__bottom">
                                <div class="product-card__sizes">
                                    <span class="product-card__sizes-label">AVAILABLE IN:</span>
                                    <span class="product-card__sizes-value"><?php echo esc_html( $product['sizes'] ); ?></span>
                                </div>
                                <a class="product-card__arrow" href="<?php echo esc_url( $product['href'] ); ?>" aria-label="<?php echo esc_attr( $product['title'] ); ?>">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="13 6 19 12 13 18"></polyline></svg>
                                </a>
                            </div>
                        </div>
                        <?php
                            $img_rel = str_replace( $tpl, '', $product['image'] );
                            $img_abs = get_template_directory() . $img_rel;
                            $img_ver = file_exists( $img_abs ) ? filemtime( $img_abs ) : '';
                            $img_url = $img_ver ? $product['image'] . '?v=' . $img_ver : $product['image'];
                        ?>
                        <img class="product-card__image" src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $product['title'] ); ?>" loading="lazy">
                    </article>
                <?php endforeach; ?>
            </div>
        <?php elseif ( ! empty( $slide['type'] ) && $slide['type'] === 'social' ) : ?>
            <div class="social-slide">
                <img class="social-slide__wordmark" src="<?php echo $tpl; ?>/assets/images/logo/anandiitaa-wordmark.png" alt="ANANDIITAA">
                <h2 class="social-slide__heading">For Those Who<br>Choose Better.</h2>
                <p class="social-slide__subtitle">A growing community that believes everyday<br>food deserves higher standards.</p>
                <div class="social-slide__pills">
                    <a href="https://instagram.com" class="social-pill" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="3"></line></svg>
                        Instagram
                    </a>
                    <a href="https://facebook.com" class="social-pill" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        Facebook
                    </a>
                    <a href="https://youtube.com" class="social-pill" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.4 19.54C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon fill="#6b0f1a" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
                        YouTube
                    </a>
                </div>
            </div>
        <?php else : ?>
            <?php if ( ! empty( $slide['caption_top'] ) ) : ?>
                <div class="hero-slide__content hero-slide__content--top-caption">
                    <h2><?php echo esc_html( $slide['caption_top'] ); ?></h2>
                </div>
            <?php endif; ?>
            <div class="hero-slide__content<?php echo ! empty( $slide['position'] ) ? ' hero-slide__content--' . esc_attr( $slide['position'] ) : ''; ?>">
                <?php if ( ! empty( $slide['heading'] ) ) : ?>
                    <h2><?php echo wp_kses( $slide['heading'], array( 'br' => array() ) ); ?></h2>
                <?php endif; ?>
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
        <?php
    };
    ?>

    <section class="hero-carousel" aria-roledescription="carousel" aria-label="Anandiitaa highlights">
        <div class="hero-track" data-hero-track>
            <?php foreach ( $carousel_slides as $i => $slide ) : ?>
                <article
                    class="hero-slide"
                    role="group"
                    aria-roledescription="slide"
                    aria-label="<?php echo esc_attr( ($i + 1) . ' of ' . count( $carousel_slides ) ); ?>"
                    aria-hidden="<?php echo $i === 0 ? 'false' : 'true'; ?>">
                    <?php $render_slide( $slide, $i === 0 ); ?>
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
            <?php foreach ( $carousel_slides as $i => $_ ) : ?>
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

    <?php foreach ( $section_slides as $i => $slide ) :
        $type_class = ! empty( $slide['type'] ) ? ' page-section--' . esc_attr( $slide['type'] ) : '';
    ?>
        <section class="page-section hero-slide<?php echo $type_class; ?>" data-reveal>
            <?php $render_slide( $slide ); ?>
        </section>
    <?php endforeach; ?>

</main>

<?php get_footer(); ?>
