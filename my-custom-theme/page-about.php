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

</main>

<?php get_footer(); ?>
