<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$looks = new WP_Query( array(
	'post_type'      => 'juvyri_look',
	'posts_per_page' => 6,
	'no_found_rows'  => true,
) );

$fallback = array(
	array( 'caption' => 'The Layered Set', 'swatch' => 5, 'tall' => true ),
	array( 'caption' => 'Studio Edit', 'swatch' => 2, 'tall' => false ),
	array( 'caption' => 'Evening Drape', 'swatch' => 3, 'tall' => false ),
	array( 'caption' => 'Street Modest', 'swatch' => 6, 'tall' => true ),
	array( 'caption' => 'Golden Hour', 'swatch' => 1, 'tall' => false ),
	array( 'caption' => 'Tailored Ease', 'swatch' => 4, 'tall' => false ),
);
?>
<section class="section" id="lookbook">
	<div class="section-head">
		<p class="eyebrow reveal"><?php esc_html_e( 'Lookbook', 'juvyri' ); ?></p>
		<h2 class="reveal"><?php esc_html_e( 'Styled By JUVYRI', 'juvyri' ); ?></h2>
		<p class="section-lede reveal"><?php esc_html_e( 'A glimpse of the mood — layered fabrics, warm neutrals, and quiet drama.', 'juvyri' ); ?></p>
	</div>

	<div class="look-grid">
	<?php if ( $looks->have_posts() ) : $i = 0; ?>
		<?php while ( $looks->have_posts() ) : $looks->the_post(); ?>
			<?php
			$tall    = get_field( 'tall' );
			$caption = get_field( 'caption' ) ?: get_the_title();
			$class   = 'look reveal' . ( $tall ? ' look-tall' : '' );
			?>
			<figure class="<?php echo esc_attr( $class ); ?>" <?php echo $i ? 'style="--d:' . (int) min( $i, 4 ) . '"' : ''; ?>>
				<div class="look-media <?php echo has_post_thumbnail() ? '' : esc_attr( juvyri_swatch_class( $i ) ); ?>"<?php echo juvyri_media_style( get_the_ID() ); ?>></div>
				<figcaption><?php echo esc_html( $caption ); ?></figcaption>
			</figure>
			<?php $i++; ?>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php else : ?>
		<?php foreach ( $fallback as $i => $item ) : ?>
			<figure class="look reveal<?php echo $item['tall'] ? ' look-tall' : ''; ?>" <?php echo $i ? 'style="--d:' . (int) min( $i, 4 ) . '"' : ''; ?>>
				<div class="look-media swatch-<?php echo (int) $item['swatch']; ?>"></div>
				<figcaption><?php echo esc_html( $item['caption'] ); ?></figcaption>
			</figure>
		<?php endforeach; ?>
	<?php endif; ?>
	</div>
</section>
