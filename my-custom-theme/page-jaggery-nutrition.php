<?php
/**
 * Template Name: Jaggery Nutrition Table
 * Slug-based: routed to /jaggery-nutrition-table via anandiitaa_route_templates().
 *
 * Replicates the approved design at anandiitaa.norework.in/jaggery-nutrition-table/.
 * Two product blocks (Desi Jaggery, Jaggery Powder); each = local packet image
 * + a 3-column nutrition table (Nutrients / Per 100g / Per Serve % RDA).
 * Brand gradient surface (inherited from body), design-system tokens throughout.
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';

// Each row: [ nutrient, per100g, rda_percent ]. Data verbatim from the design.
$products = array(
    array(
        'name'  => 'Desi Jaggery',
        'serve' => 'Serve size 5 g  |  No. of serves – 180',
        'image' => $tpl . '/assets/images/products/packets/desi-jaggery.png',
        'alt'   => 'Anandiitaa Desi Jaggery packet',
        'rows'  => array(
            array( 'Energy (Kcal)',     '375.98', '18.80' ),
            array( 'Carbohydrates (g)', '91.79',  '4.59' ),
            array( 'Protein (g)',       '0.90',   '0.04' ),
            array( 'Fat (g)',           '0.58',   '0.03' ),
            array( 'Added Sugar (g)',   '0.00',   '0.00' ),
            array( 'Iron (mg)',         '9.03',   '0.45' ),
            array( 'Calcium (mg)',      '72.61',  '3.63' ),
            array( 'Potassium (mg)',    '579.32', '28.97' ),
            array( 'Sodium (mg)',       '12.35',  '0.62' ),
            array( 'Phosphorus (mg)',   '90.04',  '4.50' ),
        ),
    ),
    array(
        'name'  => 'Jaggery Powder',
        'serve' => 'Serve size 5 g  |  No. of serves – 100',
        'image' => $tpl . '/assets/images/products/packets/jaggery-powder.png',
        'alt'   => 'Anandiitaa Jaggery Powder packet',
        'rows'  => array(
            array( 'Energy (Kcal)',     '374.98', '18.75' ),
            array( 'Carbohydrates (g)', '91.78',  '4.59' ),
            array( 'Protein (g)',       '0.84',   '0.04' ),
            array( 'Fat (g)',           '0.50',   '0.02' ),
            array( 'Added Sugar (g)',   '0.00',   '0.00' ),
            array( 'Iron (mg)',         '9.12',   '0.46' ),
            array( 'Calcium (mg)',      '75.16',  '3.76' ),
            array( 'Potassium (mg)',    '583.26', '29.16' ),
            array( 'Sodium (mg)',       '16.52',  '0.83' ),
            array( 'Phosphorus (mg)',   '84.98',  '4.25' ),
        ),
    ),
);
?>

<main class="nut-page">

    <header class="nut-head">
        <h1 class="nut-title">Nutrition Table</h1>
        <p class="nut-subtitle">Desi Jaggery &amp; Jaggery Powder</p>
    </header>

    <?php foreach ( $products as $p ) : ?>
        <section class="nut-section">

            <h2 class="nut-section__name"><?php echo esc_html( $p['name'] ); ?></h2>
            <?php if ( ! empty( $p['serve'] ) ) : ?>
                <p class="nut-section__serve"><?php echo esc_html( $p['serve'] ); ?></p>
            <?php endif; ?>

            <div class="nut-block">

                <figure class="nut-figure">
                    <img src="<?php echo esc_url( $bust( $p['image'] ) ); ?>"
                         alt="<?php echo esc_attr( $p['alt'] ); ?>"
                         loading="lazy" decoding="async">
                </figure>

                <div class="nut-table-wrap">
                    <table class="nut-table">
                        <thead>
                            <tr>
                                <th scope="col">Nutrients</th>
                                <th scope="col">Per 100g</th>
                                <th scope="col">
                                    Per Serve
                                    <span class="nut-table__sub">% Contribution to RDA</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $p['rows'] as $r ) : ?>
                                <tr>
                                    <th scope="row"><?php echo esc_html( $r[0] ); ?></th>
                                    <td><?php echo esc_html( $r[1] ); ?></td>
                                    <td><?php echo esc_html( $r[2] ); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </section>
    <?php endforeach; ?>

</main>

<?php get_footer(); ?>
