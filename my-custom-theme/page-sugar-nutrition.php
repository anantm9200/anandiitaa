<?php
/**
 * Template Name: Sugar Nutrition Table
 * Slug-based: routed to /nutrition-table-sugar via anandiitaa_route_templates().
 *
 * Replicates anandiitaa.norework.in/nutrition-table-sugar/. Three product
 * blocks (Sugar 1 Kg / 5 Kg / 25 Kg); each = a PAIR of local packet images
 * (blue + green) beside a 3-column nutrition table. Shares the .nut-* styles
 * with the jaggery page (image|table layout, zebra rows, alternating sides).
 */
get_header();
$tpl  = get_template_directory_uri();
$bust = 'anandiitaa_bust';
$pk   = $tpl . '/assets/images/products/packets';

// rows: [ nutrient, per100g, rda_percent ] — verbatim from the approved design.
$products = array(
    array(
        'name'    => 'Sugar 1 Kg',
        'serve'   => 'Serving size 5 g  |  No. of serves – 200',
        'packets' => array(
            array( 'src' => $pk . '/sugar-1kg-green.png', 'alt' => 'Anandiitaa Sugar 1 Kg — Bold Grain (green pack)' ),
            array( 'src' => $pk . '/sugar-1kg-blue.png',  'alt' => 'Anandiitaa Sugar 1 Kg — Fine Grain (blue pack)' ),
        ),
        'rows'    => array(
            array( 'Energy (Kcal)',     '400',  '20' ),
            array( 'Carbohydrates (g)', '99.9', '4.9' ),
            array( 'Total Sugar (g)',   '99.8', '4.9' ),
            array( 'Added Sugar (g)',   '0.00', '0.00' ),
            array( 'Protein (g)',       '0.00', '0.00' ),
            array( 'Total Fat (g)',     '0.00', '0.00' ),
            array( 'Cholesterol (mg)',  '0.00', '0.00' ),
            array( 'Sodium (mg)',       '0.00', '0.00' ),
        ),
    ),
    array(
        'name'    => 'Sugar 5 Kg',
        'serve'   => 'Serving size 5 g  |  No. of serves – 1000',
        'packets' => array(
            array( 'src' => $pk . '/sugar-5kg-green.png', 'alt' => 'Anandiitaa Sugar 5 Kg — Bold Grain (green pack)' ),
            array( 'src' => $pk . '/sugar-5kg-blue.png',  'alt' => 'Anandiitaa Sugar 5 Kg — Fine Grain (blue pack)' ),
        ),
        'rows'    => array(
            array( 'Energy (Kcal)',     '400',  '1.99' ),
            array( 'Carbohydrates (g)', '99.9', '4.9' ),
            array( 'Total Sugar (g)',   '99.8', '4.9' ),
            array( 'Added Sugar (g)',   '0.00', '0.00' ),
            array( 'Protein (g)',       '0.00', '0.00' ),
            array( 'Total Fat (g)',     '0.00', '0.00' ),
            array( 'Cholesterol (mg)',  '0.00', '0.00' ),
            array( 'Sodium (mg)',       '0.00', '0.00' ),
        ),
    ),
    array(
        'name'    => 'Sugar 25 Kg',
        'serve'   => 'Serving size 5 g  |  No. of serves – 5000',
        'packets' => array(
            array( 'src' => $pk . '/sugar-25kg-green.png', 'alt' => 'Anandiitaa Sugar 25 Kg — Bold Grain (green pack)' ),
            array( 'src' => $pk . '/sugar-25kg-blue.png',  'alt' => 'Anandiitaa Sugar 25 Kg — Fine Grain (blue pack)' ),
        ),
        'rows'    => array(
            array( 'Energy (Kcal)',     '400',  '20' ),
            array( 'Carbohydrates (g)', '99.9', '4.9' ),
            array( 'Total Sugar (g)',   '99.8', '4.9' ),
            array( 'Added Sugar (g)',   '0.00', '0.00' ),
            array( 'Protein (g)',       '0.00', '0.00' ),
            array( 'Total Fat (g)',     '0.00', '0.00' ),
            array( 'Cholesterol (mg)',  '0.00', '0.00' ),
            array( 'Sodium (mg)',       '0.00', '0.00' ),
        ),
    ),
);
?>

<main class="nut-page nut-page--pair">

    <header class="nut-head">
        <h1 class="nut-title">Nutrition Table</h1>
        <p class="nut-subtitle">Sugar &mdash; 1 Kg, 5 Kg &amp; 25 Kg</p>
    </header>

    <?php foreach ( $products as $p ) : ?>
        <section class="nut-section">

            <h2 class="nut-section__name"><?php echo esc_html( $p['name'] ); ?></h2>
            <?php if ( ! empty( $p['serve'] ) ) : ?>
                <p class="nut-section__serve"><?php echo esc_html( $p['serve'] ); ?></p>
            <?php endif; ?>

            <div class="nut-block">

                <figure class="nut-figure nut-figure--pair">
                    <?php foreach ( $p['packets'] as $img ) : ?>
                        <img src="<?php echo esc_url( $bust( $img['src'] ) ); ?>"
                             alt="<?php echo esc_attr( $img['alt'] ); ?>"
                             loading="lazy" decoding="async">
                    <?php endforeach; ?>
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

            <p class="nut-section__note">Per serve % contribution to RDA based on a 2000 Kcal energy diet for an average adult per day.</p>

        </section>
    <?php endforeach; ?>

</main>

<?php get_footer(); ?>
