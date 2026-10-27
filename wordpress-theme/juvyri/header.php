<?php
/**
 * Site header: top marquee, logo, nav, mobile drawer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$juvyri_ig_url = juvyri_setting( 'instagram_url', 'https://instagram.com/ju.vy.ri' );
$juvyri_top_lines = juvyri_lines( juvyri_setting( 'marquee_top',
	"NEW EDIT NOW LIVE\nFREE DELIVERY ACROSS GHANA ON ORDERS OVER GH₵500\nHANDCRAFTED, MODEST, CONTEMPORARY\nFOLLOW @JU.VY.RI"
) );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#17130f">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'juvyri' ); ?></a>

<?php if ( ! empty( $juvyri_top_lines ) ) : ?>
<div class="marquee-bar" aria-hidden="true">
	<div class="marquee-track">
		<?php
		$repeated = array_merge( $juvyri_top_lines, $juvyri_top_lines );
		foreach ( $repeated as $line ) {
			echo '<span>' . esc_html( $line ) . '</span><span>·</span>';
		}
		?>
	</div>
</div>
<?php endif; ?>

<header class="site-header" id="siteHeader">
	<div class="header-inner">
		<button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="primaryNav" aria-label="<?php esc_attr_e( 'Toggle menu', 'juvyri' ); ?>">
			<span></span><span></span><span></span>
		</button>

		<?php if ( has_custom_logo() ) : ?>
			<div class="logo">
				<?php the_custom_logo(); // Outputs its own <a> — do not wrap this in another one, nested links are invalid HTML and break sizing. ?>
			</div>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
				<span class="logo-text">Ju<span>V</span>y<span>R</span>i</span>
			</a>
		<?php endif; ?>

		<div class="nav-backdrop" id="navBackdrop"></div>

		<nav class="primary-nav" id="primaryNav">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '<ul>%3$s</ul>',
				) );
			} else {
				juvyri_primary_nav_fallback();
			}
			?>
			<a class="icon-link nav-ig" href="<?php echo esc_url( $juvyri_ig_url ); ?>" target="_blank" rel="noopener">
				<svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path fill="currentColor" d="M12 2.2c3.2 0 3.6 0 4.85.07 1.25.06 2.1.25 2.85.55.77.3 1.42.7 2.07 1.35.65.65 1.05 1.3 1.35 2.07.3.75.49 1.6.55 2.85.06 1.25.07 1.65.07 4.85s0 3.6-.07 4.85c-.06 1.25-.25 2.1-.55 2.85a5.7 5.7 0 0 1-1.35 2.07 5.7 5.7 0 0 1-2.07 1.35c-.75.3-1.6.49-2.85.55-1.25.06-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.25-.06-2.1-.25-2.85-.55a5.7 5.7 0 0 1-2.07-1.35 5.7 5.7 0 0 1-1.35-2.07c-.3-.75-.49-1.6-.55-2.85C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.06-1.25.25-2.1.55-2.85.3-.77.7-1.42 1.35-2.07A5.7 5.7 0 0 1 6.24 .88c.75-.3 1.6-.49 2.85-.55C10.34 .27 10.74.26 12 .26zm0 3.13a6.67 6.67 0 1 0 0 13.34 6.67 6.67 0 0 0 0-13.34zm0 11a4.33 4.33 0 1 1 0-8.66 4.33 4.33 0 0 1 0 8.66zm7.24-11.24a1.56 1.56 0 1 1-3.12 0 1.56 1.56 0 0 1 3.12 0z"/></svg>
				<span class="visually-hidden"><?php esc_html_e( 'Instagram', 'juvyri' ); ?></span>
			</a>
		</nav>
	</div>
</header>
