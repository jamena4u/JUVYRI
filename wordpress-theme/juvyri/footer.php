<?php
/**
 * Site footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$juvyri_ig_url    = juvyri_setting( 'instagram_url', 'https://instagram.com/ju.vy.ri' );
$juvyri_wa_url    = juvyri_setting( 'whatsapp_url', '' );
$juvyri_email     = juvyri_setting( 'contact_email', 'hello@juvyri.com' );
$juvyri_phone     = juvyri_setting( 'contact_phone', '' );
$juvyri_address   = juvyri_setting( 'address', 'Accra, Ghana' );
$juvyri_blurb     = juvyri_setting( 'footer_blurb', 'Stylish, modest, contemporary ready-to-wear — designed and stitched in Accra, Ghana.' );
$juvyri_copyright = juvyri_setting( 'copyright_name', 'JUVYRI' );
?>
	<footer class="site-footer" id="contact">
		<div class="footer-top">
			<div class="footer-brand">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<span class="logo-text footer-logo">Ju<span>V</span>y<span>R</span>i</span>
				<?php endif; ?>
				<p><?php echo esc_html( $juvyri_blurb ); ?></p>
				<div class="social-row">
					<a href="<?php echo esc_url( $juvyri_ig_url ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Instagram', 'juvyri' ); ?>">
						<svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M12 2.2c3.2 0 3.6 0 4.85.07 1.25.06 2.1.25 2.85.55.77.3 1.42.7 2.07 1.35.65.65 1.05 1.3 1.35 2.07.3.75.49 1.6.55 2.85.06 1.25.07 1.65.07 4.85s0 3.6-.07 4.85c-.06 1.25-.25 2.1-.55 2.85a5.7 5.7 0 0 1-1.35 2.07 5.7 5.7 0 0 1-2.07 1.35c-.75.3-1.6.49-2.85.55-1.25.06-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.25-.06-2.1-.25-2.85-.55a5.7 5.7 0 0 1-2.07-1.35 5.7 5.7 0 0 1-1.35-2.07c-.3-.75-.49-1.6-.55-2.85C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.06-1.25.25-2.1.55-2.85.3-.77.7-1.42 1.35-2.07A5.7 5.7 0 0 1 6.24.88c.75-.3 1.6-.49 2.85-.55C10.34.27 10.74.26 12 .26zm0 3.13a6.67 6.67 0 1 0 0 13.34 6.67 6.67 0 0 0 0-13.34zm0 11a4.33 4.33 0 1 1 0-8.66 4.33 4.33 0 0 1 0 8.66zm7.24-11.24a1.56 1.56 0 1 1-3.12 0 1.56 1.56 0 0 1 3.12 0z"/></svg>
					</a>
					<a href="mailto:<?php echo esc_attr( $juvyri_email ); ?>" aria-label="<?php esc_attr_e( 'Email', 'juvyri' ); ?>">
						<svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6zm2.4-.5L12 11l7.6-5.5H4.4zM20 7.9l-7.4 5.36a1 1 0 0 1-1.2 0L4 7.9V18h16V7.9z"/></svg>
					</a>
					<?php if ( $juvyri_wa_url ) : ?>
					<a href="<?php echo esc_url( $juvyri_wa_url ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
						<svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.36A10 10 0 1 0 12 2zm0 18a8 8 0 0 1-4.08-1.12l-.29-.17-3.03.79.81-2.95-.19-.3A8 8 0 1 1 12 20zm4.4-5.6c-.24-.12-1.42-.7-1.64-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.2-1.44-1.34-1.68-.14-.24-.02-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.7 2.6 4.12 3.64.58.25 1.03.4 1.38.51.58.18 1.11.16 1.53.1.47-.07 1.42-.58 1.62-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28z"/></svg>
					</a>
					<?php endif; ?>
				</div>
			</div>

			<div class="footer-col">
				<h3><?php esc_html_e( 'Shop', 'juvyri' ); ?></h3>
				<?php
				if ( has_nav_menu( 'footer-shop' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer-shop', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
				} else {
					juvyri_footer_shop_fallback();
				}
				?>
			</div>
			<div class="footer-col">
				<h3><?php esc_html_e( 'Company', 'juvyri' ); ?></h3>
				<?php
				if ( has_nav_menu( 'footer-company' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer-company', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
				} else {
					juvyri_footer_company_fallback();
				}
				?>
			</div>
			<div class="footer-col">
				<h3><?php esc_html_e( 'Get In Touch', 'juvyri' ); ?></h3>
				<ul>
					<li><a href="mailto:<?php echo esc_attr( $juvyri_email ); ?>"><?php echo esc_html( $juvyri_email ); ?></a></li>
					<?php if ( $juvyri_phone ) : ?>
						<li><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $juvyri_phone ) ); ?>"><?php echo esc_html( $juvyri_phone ); ?></a></li>
					<?php endif; ?>
					<li><?php echo esc_html( $juvyri_address ); ?></li>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $juvyri_copyright ); ?>. <?php esc_html_e( 'All rights reserved.', 'juvyri' ); ?></p>
			<button class="back-to-top" id="backToTop" aria-label="<?php esc_attr_e( 'Back to top', 'juvyri' ); ?>">
				<svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12 4l-8 8h5v8h6v-8h5z"/></svg>
			</button>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
