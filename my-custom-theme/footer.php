    <footer class="site-footer">
        <div class="site-footer__inner">
            <div class="site-footer__col site-footer__col--brand">
                <a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Anandiitaa Home"></a>

                <div class="site-footer__brand-base">
                    <div class="site-footer__socials" aria-label="Social links">
                        <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor" aria-hidden="true">
                                <path d="M12 2.2c3.2 0 3.6 0 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.07 1.25.07 1.65.07 4.85s0 3.6-.07 4.85c-.05 1.17-.25 1.8-.41 2.23a3.7 3.7 0 0 1-.9 1.38 3.7 3.7 0 0 1-1.38.9c-.42.16-1.06.36-2.23.41-1.25.07-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.4 2.2 8.8 2.2 12 2.2Zm0 1.8c-3.15 0-3.52 0-4.76.07-1.07.05-1.65.23-2.04.38-.51.2-.88.44-1.27.83-.39.39-.63.76-.83 1.27-.15.39-.33.97-.38 2.04C2.65 8.83 2.65 9.2 2.65 12s0 3.17.07 4.41c.05 1.07.23 1.65.38 2.04.2.51.44.88.83 1.27.39.39.76.63 1.27.83.39.15.97.33 2.04.38 1.24.07 1.61.07 4.76.07s3.52 0 4.76-.07c1.07-.05 1.65-.23 2.04-.38.51-.2.88-.44 1.27-.83.39-.39.63-.76.83-1.27.15-.39.33-.97.38-2.04.07-1.24.07-1.61.07-4.41s0-3.17-.07-4.41c-.05-1.07-.23-1.65-.38-2.04a3.4 3.4 0 0 0-.83-1.27 3.4 3.4 0 0 0-1.27-.83c-.39-.15-.97-.33-2.04-.38C15.52 4 15.15 4 12 4Zm0 3.05a4.95 4.95 0 1 1 0 9.9 4.95 4.95 0 0 1 0-9.9Zm0 1.8a3.15 3.15 0 1 0 0 6.3 3.15 3.15 0 0 0 0-6.3Zm5.15-2.05a1.15 1.15 0 1 1 0 2.3 1.15 1.15 0 0 1 0-2.3Z"/>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" rel="noopener" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor" aria-hidden="true">
                                <path d="M23.5 7.2a3 3 0 0 0-2.1-2.13C19.55 4.6 12 4.6 12 4.6s-7.55 0-9.4.47A3 3 0 0 0 .5 7.2 31.6 31.6 0 0 0 0 12a31.6 31.6 0 0 0 .5 4.8 3 3 0 0 0 2.1 2.13c1.85.47 9.4.47 9.4.47s7.55 0 9.4-.47a3 3 0 0 0 2.1-2.13c.33-1.6.5-3.2.5-4.8 0-1.6-.17-3.2-.5-4.8ZM9.6 15.6V8.4l6.3 3.6-6.3 3.6Z"/>
                            </svg>
                        </a>
                    </div>

                    <p class="site-footer__legal">
                        <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>">Privacy Policy</a>
                        <span class="site-footer__sep">|</span>
                        <a href="<?php echo esc_url( home_url( '/terms-of-use' ) ); ?>">Terms of Use</a>
                        <span class="site-footer__sep">|</span>
                        <a href="<?php echo esc_url( home_url( '/sustainability' ) ); ?>">Sustainability / ESG Report</a>
                        <span class="site-footer__sep">|</span>
                        <a href="<?php echo esc_url( home_url( '/manufacturing-details' ) ); ?>">Manufacturing Details</a>
                        <span class="site-footer__sep">|</span>
                        <a href="<?php echo esc_url( home_url( '/jaggery-nutrition-table' ) ); ?>">Nutritional Facts &ndash; Jaggery</a>
                        <span class="site-footer__sep">|</span>
                        <a href="<?php echo esc_url( home_url( '/nutrition-table-sugar' ) ); ?>">Nutritional Facts &ndash; Sugar</a>
                    </p>
                </div>
            </div>

            <nav class="site-footer__col site-footer__col--nav" aria-label="Footer">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <a href="<?php echo esc_url( home_url( '/products' ) ); ?>">Products</a>
                <a href="<?php echo esc_url( home_url( '/products/sugar' ) . '#recipes' ); ?>">Recipes</a>
                <?php // Hidden per client — pages not live yet. Restore to re-enable. ?>
                <?php /*
                <a href="<?php echo esc_url( home_url( '/blogs' ) ); ?>">Blogs</a>
                <a href="<?php echo esc_url( home_url( '/community' ) ); ?>">Community</a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a>
                */ ?>
            </nav>

            <div class="site-footer__col site-footer__col--info">
                <div class="site-footer__info-block">
                    <h4>Corporate Office</h4>
                    <p>Baramati Agro Ltd, 4th Floor, Farena Corporate Park, Magarpatta Road, Hadapsar, Pune &ndash; 411013, Maharashtra.</p>
                </div>
                <div class="site-footer__info-block">
                    <h4>Contact</h4>
                    <p>
                        <a href="mailto:care@baramatiagro.com">care@baramatiagro.com</a><br>
                        <a href="tel:+912067482800">020-67482800</a>
                    </p>
                </div>
            </div>
        </div>

        <p class="site-footer__copy">&copy; <?php echo date('Y'); ?> by Anandiitaa. Made by Invade Code.</p>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
