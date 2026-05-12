<?php
/**
 * Template Name: About Us
 * Slug-based: applies to a page with slug "about-us" (also routed via
 * anandiitaa_route_templates() in functions.php as a fallback).
 *
 * Six-slide narrative. Slide 1 = product wall + dashed callouts pointing
 * to each packet. Background composition (paper, plants, salt, jaggery,
 * four packets) is baked into the bg image — this template overlays the
 * page title and a single SVG callout layer.
 *
 * Coordinate strategy: the callout SVG uses the bg image's native pixel
 * dimensions (2560 × 1664) as its viewBox and preserveAspectRatio="xMidYMid
 * slice" — same alignment as `object-fit: cover` on the bg <img>. So every
 * label, line and arrow head is authored in image-pixel space and stays
 * locked to the packets regardless of viewport aspect ratio.
 */
get_header();
$tpl = get_template_directory_uri();
?>

<main class="about-page">

    <!-- Slide 1: Product wall. Title + four labelled callouts on the bg. -->
    <section class="about-slide about-slide--products" data-reveal>

        <div class="about-slide__bg">
            <img
                src="<?php echo $tpl; ?>/images/about-us/mac/about-slide-1.png"
                alt="Anandiitaa product range — Desi Jaggery, Jaggery Powder, Bold Grain Sugar, Fine Grain Sugar"
                fetchpriority="high">
        </div>

        <h1 class="about-slide__title">About us</h1>

        <svg
            class="about-callouts"
            viewBox="0 0 2560 1664"
            preserveAspectRatio="xMidYMid slice"
            aria-hidden="true">

            <defs>
                <!-- Single arrowhead marker; auto-orient rotates it to match
                     each path's direction so we don't hand-rotate per arrow. -->
                <marker
                    id="about-arrowhead"
                    viewBox="0 0 12 12"
                    refX="10" refY="6"
                    markerWidth="22" markerHeight="22"
                    orient="auto-start-reverse"
                    markerUnits="userSpaceOnUse">
                    <path d="M 1 1 L 10 6 L 1 11"
                          fill="none" stroke="#1f1f1f"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </marker>
            </defs>

            <!-- DESI JAGGERY (top-left) → vertical arrow, slight bend near tip,
                 head lands just above the leftmost purple packet's handle.
                 Title sits above the arrow's tail (small gap). -->
            <text x="200" y="465"
                  font-family="'DM Sans', system-ui, sans-serif"
                  font-weight="700" font-size="46" fill="#1f1f1f"
                  letter-spacing="2">
                <tspan x="200" dy="0">DESI</tspan>
                <tspan x="200" dy="56">JAGGERY</tspan>
            </text>
            <path d="M 525 590 L 525 530 C 525 490, 495 470, 435 465"
                  fill="none" stroke="#1f1f1f"
                  stroke-width="3" stroke-dasharray="10 10" stroke-linecap="round"
                  marker-end="url(#about-arrowhead)"/>

            <!-- JAGGERY POWDER (gap, upper-mid) → tip at top of 2nd purple packet -->
            <text x="1080" y="605"
                  font-family="'DM Sans', system-ui, sans-serif"
                  font-weight="700" font-size="46" fill="#1f1f1f"
                  letter-spacing="2">
                <tspan x="1080" dy="0">JAGGERY</tspan>
                <tspan x="1080" dy="56">POWDER</tspan>
            </text>
            <path d="M 1055 876 C 1115 880, 1158 770, 1160 679"
                  fill="none" stroke="#1f1f1f"
                  stroke-width="3" stroke-dasharray="10 10" stroke-linecap="round"
                  marker-end="url(#about-arrowhead)"/>

            <!-- FINE GRAIN SUGAR (top-right) → tip at top of rightmost blue packet -->
            <text x="2380" y="600"
                  font-family="'DM Sans', system-ui, sans-serif"
                  font-weight="700" font-size="46" fill="#1f1f1f"
                  text-anchor="end" letter-spacing="2">
                <tspan x="2380" dy="0">FINE GRAIN</tspan>
                <tspan x="2380" dy="56">SUGAR</tspan>
            </text>
            <path d="M 1930 705 C 1970 615, 2040 635, 2090 630"
                  fill="none" stroke="#1f1f1f"
                  stroke-width="3" stroke-dasharray="10 10" stroke-linecap="round"
                  marker-end="url(#about-arrowhead)"/>

            <!-- BOLD GRAIN SUGAR (gap, lower-mid) → tip at top of green packet -->
            <text x="1110" y="1110"
                  font-family="'DM Sans', system-ui, sans-serif"
                  font-weight="700" font-size="46" fill="#1f1f1f"
                  letter-spacing="2">
                <tspan x="1110" dy="0">BOLD GRAIN</tspan>
                <tspan x="1110" dy="56">SUGAR</tspan>
            </text>
            <path d="M 1403 1204 C 1347 1275, 1304 1268, 1274 1182"
                  fill="none" stroke="#1f1f1f"
                  stroke-width="3" stroke-dasharray="10 10" stroke-linecap="round"
                  marker-end="url(#about-arrowhead)"/>

        </svg>

    </section>

    <!-- Slide 2: Our Vision. Split layout — left = giant quote glyph backdrop +
         title + body; right = product photo. Vertical dashed maroon divider. -->
    <section class="about-slide about-slide--vision" data-reveal>

        <div class="about-vision__grid">

            <div class="about-vision__copy">
                <span class="about-vision__quotemark" aria-hidden="true">&ldquo;</span>
                <h2 class="about-vision__title">Our Vision</h2>
                <p class="about-vision__body">
                    To redefine everyday food<br>
                    with uncompromised<br>
                    purity &amp; trust.
                </p>
            </div>

            <div class="about-vision__divider" aria-hidden="true"></div>

            <div class="about-vision__photo">
                <img src="<?php echo $tpl; ?>/images/about-us/mac/vision.png"
                     alt="Anandiitaa jaggery"
                     loading="lazy">
            </div>

        </div>

    </section>

    <!-- Slide 3: Our Mission. Full-bleed photo bg (sugarcane + sugar bowl on
         maroon wood) with copy in the right half over the dark area. -->
    <section class="about-slide about-slide--mission" data-reveal>
        <div class="about-slide__bg">
            <img
                src="<?php echo $tpl; ?>/images/about-us/mac/about-slide-3.png"
                alt="Sugarcane stalks and a bowl of sugar on a maroon wooden surface"
                loading="lazy">
        </div>

        <div class="about-mission__copy">
            <h2 class="about-mission__title">Our Mission</h2>
            <p class="about-mission__body">
                We bring pure, uncompromised<br>
                food to every Indian home &mdash;<br>
                crafted with the highest quality,<br>
                handled with absolute hygiene,<br>
                &amp; delivered with complete<br>
                confidence. Only the best.
            </p>
        </div>
    </section>

    <?php
        $standards = array(
            array(
                'image' => $tpl . '/images/about-us/mac/standards/purity.png',
                'title' => "Purity First,\nAlways",
                'body'  => 'No Sugar, No Bleach,<br>No harmful Adulterants',
                'alt'   => 'Workers shaping pure jaggery in a traditional setting mould',
            ),
            array(
                'image' => $tpl . '/images/about-us/mac/standards/hygiene.png',
                'title' => "Hygiene without\ncompromise",
                'body'  => 'The Highest Hygiene<br>Standards. Period.',
                'alt'   => 'Jaggery being cooked in a clean traditional kitchen',
            ),
            array(
                'image' => $tpl . '/images/about-us/mac/standards/safety.png',
                'title' => "Food Safety.\nNon-Negotiable",
                'body'  => 'World Class food<br>safety Standards',
                'alt'   => 'Finished jaggery blocks plated on a wooden board',
            ),
            array(
                'image' => $tpl . '/images/about-us/mac/standards/quality.png',
                'title' => "Quality Without\nDoubt",
                'body'  => 'Each Batch Quality<br>tested by Professionals',
                'alt'   => 'Bowl of jaggery powder beside jaggery lumps',
            ),
        );
    ?>
    <!-- Slide 4: The Anandiitaa Standards. Header with inline wordmark logo +
         2x2 grid of (square image + content card) pairs. Cream bg. -->
    <section class="about-slide about-slide--standards" data-reveal>

        <h2 class="about-standards__title">
            The
            <img class="about-standards__wordmark"
                 src="<?php echo $tpl; ?>/assets/images/logo/anandiitaa-wordmark.png"
                 alt="Anandiitaa"
                 loading="lazy"
                 decoding="async">
            Standards
        </h2>

        <div class="about-standards__grid">
            <?php foreach ( $standards as $s ) : ?>
                <article class="standard-item">
                    <div class="standard-item__image">
                        <img src="<?php echo esc_url( $s['image'] ); ?>"
                             alt="<?php echo esc_attr( $s['alt'] ); ?>"
                             loading="lazy">
                    </div>
                    <div class="standard-item__card">
                        <h3 class="standard-item__title"><?php echo nl2br( esc_html( $s['title'] ) ); ?></h3>
                        <p class="standard-item__body"><?php echo wp_kses( $s['body'], array( 'br' => array() ) ); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

    </section>

    <!-- Slide 5: Our Purpose. Single rounded container — photo on top,
         maroon band beneath with title + body in cream. -->
    <section class="about-slide about-slide--purpose" data-reveal>
        <div class="about-purpose__container">
            <div class="about-purpose__image">
                <img src="<?php echo $tpl; ?>/images/about-us/mac/purpose.png"
                     alt="Anandiitaa jaggery powder and jaggery lumps"
                     loading="lazy">
            </div>
            <div class="about-purpose__band">
                <h2 class="about-purpose__title">Our Purpose</h2>
                <p class="about-purpose__body">
                    It is to deliver sweetness in its truest form, unadulterated, safe, &amp; transparent, enriching lives with products that you can trust, from source to shelf, because purity shouldn&rsquo;t be optional.
                </p>
            </div>
        </div>
    </section>

    <!-- Slide 6 (last): "For Those Who Choose Better" — literal duplicate of
         the home page's social CTA. Same classes so the existing styles apply. -->
    <section class="page-section hero-slide page-section--social" data-reveal>
        <div class="hero-slide__bg">
            <picture>
                <source media="(min-width: 1440px)" srcset="<?php echo $tpl; ?>/images/home/mac/sections/11.png">
                <img src="<?php echo $tpl; ?>/images/home/laptop/sections/11.png" alt="For Those Who Choose Better — Anandiitaa Community" loading="lazy">
            </picture>
        </div>
        <div class="social-slide">
            <img class="social-slide__wordmark" src="<?php echo $tpl; ?>/assets/images/logo/anandiitaa-wordmark.png" alt="ANANDIITAA" loading="lazy" decoding="async">
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
    </section>

</main>

<?php get_footer(); ?>
