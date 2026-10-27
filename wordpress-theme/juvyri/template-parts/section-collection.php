<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$products = new WP_Query( array(
	'post_type'      => 'juvyri_product',
	'posts_per_page' => 8,
	'no_found_rows'  => true,
) );

$fallback = array(
	array( 'title' => 'Aya Wrap Dress', 'price' => 'GH₵ 480.00', 'tag' => 'New' ),
	array( 'title' => 'Nyame Tailored Set', 'price' => 'GH₵ 620.00', 'tag' => 'Best Seller' ),
	array( 'title' => 'Adom Maxi Skirt', 'price' => 'GH₵ 350.00', 'tag' => '' ),
	array( 'title' => 'Serwaa Kaftan', 'price' => 'GH₵ 540.00', 'tag' => 'Limited' ),
);
?>
<section class="section" id="collection">
	<div class="section-head">
		<p class="eyebrow reveal"><?php esc_html_e( 'The Edit', 'juvyri' ); ?></p>
		<h2 class="reveal"><?php esc_html_e( 'New Arrivals', 'juvyri' ); ?></h2>
		<p class="section-lede reveal"><?php esc_html_e( 'Considered silhouettes, rich textiles and clean lines — pieces built to layer, drape and last.', 'juvyri' ); ?></p>
	</div>

	<div class="product-grid">
	<?php if ( $products->have_posts() ) : $i = 0; ?>
		<?php while ( $products->have_posts() ) : $products->the_post(); ?>
			<article class="product-card reveal" <?php echo $i ? 'style="--d:' . (int) min( $i, 4 ) . '"' : ''; ?>>
				<div class="product-media <?php echo has_post_thumbnail() ? '' : esc_attr( juvyri_swatch_class( $i ) ); ?>"<?php echo juvyri_media_style( get_the_ID() ); ?>>
					<?php $tag = get_field( 'tag' ); ?>
					<?php if ( $tag ) : ?><span class="product-tag"><?php echo esc_html( $tag ); ?></span><?php endif; ?>
				</div>
				<div class="product-info">
					<h3><?php the_title(); ?></h3>
					<p><?php echo esc_html( get_field( 'price' ) ); ?></p>
				</div>
			</article>
			<?php $i++; ?>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php else : ?>
		<?php foreach ( $fallback as $i => $item ) : ?>
			<article class="product-card reveal" <?php echo $i ? 'style="--d:' . (int) min( $i, 4 ) . '"' : ''; ?>>
				<div class="product-media <?php echo esc_attr( juvyri_swatch_class( $i ) ); ?>">
					<?php if ( $item['tag'] ) : ?><span class="product-tag"><?php echo esc_html( $item['tag'] ); ?></span><?php endif; ?>
				</div>
				<div class="product-info">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['price'] ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	<?php endif; ?>
	</div>

	<div class="section-cta reveal">
		<a href="#collection" class="btn btn-outline"><?php esc_html_e( 'View Full Collection', 'juvyri' ); ?></a>
	</div>
</section>
