<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$testimonials = new WP_Query( array(
	'post_type'      => 'juvyri_testimonial',
	'posts_per_page' => 8,
	'no_found_rows'  => true,
) );

$fallback = array(
	array( 'quote' => 'The fit, the fabric, the finishing — it feels like it was made just for me. JUVYRI made modest dressing feel exciting again.', 'author' => 'Abena K., Accra' ),
	array( 'quote' => 'I get stopped on the street every time I wear my Aya wrap dress. Effortless, elegant, and still fully me.', 'author' => 'Naomi T., London' ),
	array( 'quote' => "Finally a brand that understands modest doesn't mean boring. The tailoring is honestly next level.", 'author' => 'Fatima A., Dubai' ),
);
?>
<section class="section testimonials">
	<div class="section-head">
		<p class="eyebrow reveal"><?php esc_html_e( 'Kind Words', 'juvyri' ); ?></p>
		<h2 class="reveal"><?php esc_html_e( 'From the JUVYRI Woman', 'juvyri' ); ?></h2>
	</div>
	<div class="testimonial-carousel reveal" id="testimonialCarousel">
		<div class="testimonial-track" id="testimonialTrack">
		<?php if ( $testimonials->have_posts() ) : ?>
			<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
				<blockquote class="testimonial">
					<p>&ldquo;<?php echo esc_html( get_field( 'quote' ) ); ?>&rdquo;</p>
					<cite>&mdash; <?php echo esc_html( get_field( 'author' ) ); ?></cite>
				</blockquote>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php else : ?>
			<?php foreach ( $fallback as $item ) : ?>
				<blockquote class="testimonial">
					<p>&ldquo;<?php echo esc_html( $item['quote'] ); ?>&rdquo;</p>
					<cite>&mdash; <?php echo esc_html( $item['author'] ); ?></cite>
				</blockquote>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
		<div class="carousel-dots" id="carouselDots"></div>
	</div>
</section>
