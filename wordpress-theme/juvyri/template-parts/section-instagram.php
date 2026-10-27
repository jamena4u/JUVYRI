<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ig_url = juvyri_setting( 'instagram_url', 'https://instagram.com/ju.vy.ri' );

$posts = new WP_Query( array(
	'post_type'      => 'juvyri_ig_post',
	'posts_per_page' => 5,
	'no_found_rows'  => true,
) );

$fallback_swatches = array( 2, 4, 6, 3, 1 );

$heart = '<svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12 21s-6.7-4.35-9.3-8.1C.6 9.9 1.3 6.4 4.2 5c2.3-1.1 4.6-.2 5.9 1.4a.7.7 0 0 0 1.8 0C13.2 4.8 15.5 3.9 17.8 5c2.9 1.4 3.6 4.9 1.5 7.9C18.7 16.65 12 21 12 21z"/></svg>';
?>
<section class="section instagram-section" id="instagram">
	<div class="section-head">
		<p class="eyebrow reveal"><?php echo esc_html( juvyri_setting( 'instagram_eyebrow', '@ju.vy.ri' ) ); ?></p>
		<h2 class="reveal"><?php echo esc_html( juvyri_setting( 'instagram_heading', 'Follow The Edit' ) ); ?></h2>
		<p class="section-lede reveal"><?php echo esc_html( juvyri_setting( 'instagram_subtext', 'Daily styling, behind-the-scenes stitching and new drops — live on Instagram.' ) ); ?></p>
	</div>

	<div class="ig-grid">
	<?php if ( $posts->have_posts() ) : $i = 0; ?>
		<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<?php
			$link    = get_field( 'permalink' ) ?: $ig_url;
			$likes   = get_field( 'likes' );
			$bg_url  = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'juvyri-square' ) : '';
			$style   = '--d:' . (int) min( $i, 5 ) . ';' . ( $bg_url ? 'background-image:url(' . esc_url( $bg_url ) . ')' : '' );
			?>
			<a class="ig-tile reveal <?php echo $bg_url ? '' : esc_attr( juvyri_swatch_class( $i ) ); ?>" style="<?php echo esc_attr( $style ); ?>" href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener">
				<div class="ig-overlay"><?php echo $heart; // phpcs:ignore WordPress.Security.EscapeOutput -- static trusted SVG ?><?php if ( $likes ) : ?><span><?php echo esc_html( $likes ); ?></span><?php endif; ?></div>
			</a>
			<?php $i++; ?>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php else : ?>
		<?php foreach ( $fallback_swatches as $i => $swatch ) : ?>
			<a class="ig-tile reveal swatch-<?php echo (int) $swatch; ?>" style="--d:<?php echo (int) $i; ?>" href="<?php echo esc_url( $ig_url ); ?>" target="_blank" rel="noopener">
				<div class="ig-overlay"><?php echo $heart; // phpcs:ignore WordPress.Security.EscapeOutput -- static trusted SVG ?></div>
			</a>
		<?php endforeach; ?>
	<?php endif; ?>
		<a class="ig-tile ig-follow reveal" style="--d:5" href="<?php echo esc_url( $ig_url ); ?>" target="_blank" rel="noopener">
			<svg viewBox="0 0 24 24" width="26" height="26" aria-hidden="true"><path fill="currentColor" d="M12 2.2c3.2 0 3.6 0 4.85.07 1.25.06 2.1.25 2.85.55.77.3 1.42.7 2.07 1.35.65.65 1.05 1.3 1.35 2.07.3.75.49 1.6.55 2.85.06 1.25.07 1.65.07 4.85s0 3.6-.07 4.85c-.06 1.25-.25 2.1-.55 2.85a5.7 5.7 0 0 1-1.35 2.07 5.7 5.7 0 0 1-2.07 1.35c-.75.3-1.6.49-2.85.55-1.25.06-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.25-.06-2.1-.25-2.85-.55a5.7 5.7 0 0 1-2.07-1.35 5.7 5.7 0 0 1-1.35-2.07c-.3-.75-.49-1.6-.55-2.85C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.06-1.25.25-2.1.55-2.85.3-.77.7-1.42 1.35-2.07A5.7 5.7 0 0 1 6.24.88c.75-.3 1.6-.49 2.85-.55C10.34.27 10.74.26 12 .26zm0 3.13a6.67 6.67 0 1 0 0 13.34 6.67 6.67 0 0 0 0-13.34zm0 11a4.33 4.33 0 1 1 0-8.66 4.33 4.33 0 0 1 0 8.66zm7.24-11.24a1.56 1.56 0 1 1-3.12 0 1.56 1.56 0 0 1 3.12 0z"/></svg>
			<span><?php echo esc_html( juvyri_setting( 'instagram_handle', '@ju.vy.ri' ) ); ?></span>
			<small><?php esc_html_e( 'Follow', 'juvyri' ); ?></small>
		</a>
	</div>
</section>
