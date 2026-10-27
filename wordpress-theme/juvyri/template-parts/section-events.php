<?php
/**
 * Upcoming events. The whole section is hidden automatically when there
 * are none — nothing for the admin to toggle, they just add an Event
 * (or let past ones age out) and this section appears/updates itself.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$events = new WP_Query( array(
	'post_type'      => 'juvyri_event',
	'posts_per_page' => 6,
	'no_found_rows'  => true,
	'meta_key'       => 'event_date',
	'orderby'        => 'meta_value',
	'order'          => 'ASC',
	'meta_query'     => array(
		array(
			'key'     => 'event_date',
			'value'   => current_time( 'Ymd' ),
			'compare' => '>=',
			'type'    => 'NUMERIC',
		),
	),
) );

if ( ! $events->have_posts() ) {
	wp_reset_postdata();
	return;
}
?>
<section class="section" id="events">
	<div class="section-head">
		<p class="eyebrow reveal"><?php esc_html_e( 'What\'s On', 'juvyri' ); ?></p>
		<h2 class="reveal"><?php esc_html_e( 'Upcoming Events', 'juvyri' ); ?></h2>
		<p class="section-lede reveal"><?php esc_html_e( 'Pop-up shops, trunk shows and new-drop launches — come say hello in person.', 'juvyri' ); ?></p>
	</div>

	<div class="event-grid">
	<?php $i = 0; ?>
	<?php while ( $events->have_posts() ) : $events->the_post(); ?>
		<?php
		$raw_date = get_field( 'event_date' );
		$date_obj = $raw_date ? DateTime::createFromFormat( 'Ymd', $raw_date ) : false;
		$location = get_field( 'location' );
		$desc     = get_field( 'description' );
		$cta_url  = get_field( 'cta_url' );
		$cta_label= get_field( 'cta_label' ) ?: __( 'RSVP', 'juvyri' );
		?>
		<article class="event-card reveal" <?php echo $i ? 'style="--d:' . (int) min( $i, 4 ) . '"' : ''; ?>>
			<div class="event-media <?php echo has_post_thumbnail() ? '' : esc_attr( juvyri_swatch_class( $i ) ); ?>"<?php echo juvyri_media_style( get_the_ID(), 'juvyri-event' ); ?>>
				<?php if ( $date_obj ) : ?>
				<div class="event-date-badge">
					<span class="day"><?php echo esc_html( $date_obj->format( 'j' ) ); ?></span>
					<span class="month"><?php echo esc_html( $date_obj->format( 'M' ) ); ?></span>
				</div>
				<?php endif; ?>
			</div>
			<div class="event-body">
				<h3><?php the_title(); ?></h3>
				<?php if ( $location ) : ?><p class="event-location"><?php echo esc_html( $location ); ?></p><?php endif; ?>
				<?php if ( $desc ) : ?><p class="event-desc"><?php echo esc_html( $desc ); ?></p><?php endif; ?>
				<?php if ( $cta_url ) : ?>
					<a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn-outline" target="_blank" rel="noopener"><?php echo esc_html( $cta_label ); ?></a>
				<?php endif; ?>
			</div>
		</article>
		<?php $i++; ?>
	<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
