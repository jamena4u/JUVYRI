<?php
/**
 * Fallback template. The homepage always uses front-page.php; this only
 * ever renders for something outside that — a search, a 404, or (if
 * ever used) the blog page — so it stays simple and on-brand rather than
 * fully designed.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main" class="section">
	<div class="section-head">
		<?php if ( have_posts() ) : ?>
			<h2><?php is_search() ? esc_html_e( 'Search Results', 'juvyri' ) : esc_html_e( 'Latest', 'juvyri' ); ?></h2>
		<?php else : ?>
			<h2><?php esc_html_e( 'Nothing found', 'juvyri' ); ?></h2>
			<p class="section-lede"><?php esc_html_e( "The page you're looking for doesn't exist.", 'juvyri' ); ?></p>
			<p class="section-cta"><a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to homepage', 'juvyri' ); ?></a></p>
		<?php endif; ?>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="product-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="product-card">
					<div class="product-media <?php echo has_post_thumbnail() ? '' : 'swatch-1'; ?>"<?php echo juvyri_media_style( get_the_ID() ); ?>></div>
					<div class="product-info">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</main>
<?php
get_footer();
