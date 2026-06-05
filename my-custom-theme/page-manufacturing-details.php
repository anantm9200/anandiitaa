<?php
/**
 * Template Name: Manufacturing Details
 * Slug-based: routed to /manufacturing-details via anandiitaa_route_templates().
 *
 * Static info page (no images) — mirrors the approved design at
 * anandiitaa.norework.in/manufacturing-details/. Brand cream→amber gradient,
 * a page title, then two "address" cards (Marketed By / Manufactured by) and
 * a contact card. All type/colour pulled from the design-system tokens.
 */
get_header();

// Data kept in arrays so copy edits don't touch markup.
$addresses = array(
    array(
        'label' => 'Marketed By',
        'body'  => 'BARAMATI AGRO LTD<br>AP Shetphalgade, Tal. Indapur,<br>Indapur, Pune, Maharashtra 413130',
    ),
    array(
        'label' => 'Manufactured By',
        'body'  => 'Alfanzyme Life Science,<br>Plot no. 628, 3rd Cross, 7th Main,<br>K.I.A.D.B Auto Nagar, Kanabargi Industrial Area,<br>Belagavi 590016, Karnataka.',
    ),
);
?>

<main class="mfg-page">

    <section class="mfg-section">

        <header class="mfg-head">
            <h1 class="mfg-title">Manufacturing Details</h1>
        </header>

        <div class="mfg-cards">
            <?php foreach ( $addresses as $a ) : ?>
                <article class="mfg-card">
                    <h2 class="mfg-card__label"><?php echo esc_html( $a['label'] ); ?></h2>
                    <p class="mfg-card__body"><?php echo wp_kses( $a['body'], array( 'br' => array() ) ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <article class="mfg-contact">
            <h2 class="mfg-contact__label">Please Contact Us At</h2>
            <p class="mfg-contact__lead">For Customer Queries / Suggestions / Complaints / Feedback</p>
            <p class="mfg-contact__address">
                Baramati Agro Limited, 4th Floor, Farena Corporate Park,<br>
                Magarpatta Road, Hadapsar, District: Pune 411013, Maharashtra.
            </p>

            <dl class="mfg-contact__rows">
                <div class="mfg-contact__row">
                    <dt>Contact No.</dt>
                    <dd><a href="tel:+912067482800">020-67482800</a></dd>
                </div>
                <div class="mfg-contact__row">
                    <dt>Email ID</dt>
                    <dd><a href="mailto:care@baramatiagro.com">care@baramatiagro.com</a></dd>
                </div>
                <div class="mfg-contact__row">
                    <dt>Website</dt>
                    <dd><a href="<?php echo esc_url( home_url( '/' ) ); ?>">www.anandiitaa.com</a></dd>
                </div>
            </dl>
        </article>

    </section>

</main>

<?php get_footer(); ?>
