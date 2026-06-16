<?php
/**
 * Title: Not Found
 * Slug: anandiitaa-block/not-found
 * Inserter: no
 *
 * Branded "page not found" body used by the 404 and index (catch-all)
 * templates so a stray/mistyped URL shows a clean on-brand message with a
 * route home — never the WordPress starter placeholder. Styled with the
 * prod button classes (.btn .btn-primary); layout is inline since the classic
 * theme shipped no 404 stylesheet.
 */
?>
<main class="home-page">
    <section class="error-404" style="min-height:68vh;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:clamp(150px,22vh,230px) 6% 90px;box-sizing:border-box;">
        <p style="font-family:'Montserrat',system-ui,sans-serif;letter-spacing:.18em;text-transform:uppercase;font-size:13px;font-weight:600;color:#6b0f1a;margin:0 0 12px;">Error 404</p>
        <h1 style="font-family:'Appetite Pro',Georgia,serif;color:#6b0f1a;font-weight:500;font-size:clamp(40px,7vw,72px);line-height:1.05;margin:0 0 16px;">Page not found</h1>
        <p style="font-size:18px;color:#333;max-width:540px;margin:0 0 32px;">The page you&rsquo;re looking for doesn&rsquo;t exist or may have moved. Let&rsquo;s get you back on track.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Home</a>
    </section>
</main>
