<?php
/**
 * Custom post types the client edits from wp-admin like ordinary posts:
 * Add New → set a featured image → fill in a couple of fields → Publish.
 *
 * These only ever get pulled into the homepage sections in
 * template-parts/ — there's no designed single/archive template for any
 * of them, so `publicly_queryable` is off to keep a stray permalink from
 * ever showing a bare, undesigned page. That doesn't affect the admin
 * list/edit screens, REST API, or the WP_Query calls the templates use.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function juvyri_register_cpts() {

	$shared = array(
		'public'              => true,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'show_in_rest'        => true,
	);

	register_post_type( 'juvyri_product', array_merge( $shared, array(
		'label'    => __( 'Collection', 'juvyri' ),
		'labels'   => array(
			'name'          => __( 'Collection', 'juvyri' ),
			'singular_name' => __( 'Product', 'juvyri' ),
			'add_new_item'  => __( 'Add New Product', 'juvyri' ),
		),
		'menu_icon' => 'dashicons-tag',
		'supports'  => array( 'title', 'thumbnail', 'page-attributes' ),
	) ) );

	register_post_type( 'juvyri_look', array_merge( $shared, array(
		'label'    => __( 'Lookbook', 'juvyri' ),
		'labels'   => array(
			'name'          => __( 'Lookbook', 'juvyri' ),
			'singular_name' => __( 'Look', 'juvyri' ),
			'add_new_item'  => __( 'Add New Look', 'juvyri' ),
		),
		'menu_icon' => 'dashicons-camera',
		'supports'  => array( 'title', 'thumbnail', 'page-attributes' ),
	) ) );

	register_post_type( 'juvyri_testimonial', array_merge( $shared, array(
		'label'    => __( 'Testimonials', 'juvyri' ),
		'labels'   => array(
			'name'          => __( 'Testimonials', 'juvyri' ),
			'singular_name' => __( 'Testimonial', 'juvyri' ),
			'add_new_item'  => __( 'Add New Testimonial', 'juvyri' ),
		),
		'menu_icon' => 'dashicons-format-quote',
		'supports'  => array( 'title', 'page-attributes' ),
	) ) );

	register_post_type( 'juvyri_event', array_merge( $shared, array(
		'label'    => __( 'Events', 'juvyri' ),
		'labels'   => array(
			'name'          => __( 'Events', 'juvyri' ),
			'singular_name' => __( 'Event', 'juvyri' ),
			'add_new_item'  => __( 'Add New Event', 'juvyri' ),
		),
		'menu_icon' => 'dashicons-calendar-alt',
		'supports'  => array( 'title', 'thumbnail' ),
	) ) );

	register_post_type( 'juvyri_ig_post', array_merge( $shared, array(
		'label'    => __( 'Instagram Grid', 'juvyri' ),
		'labels'   => array(
			'name'          => __( 'Instagram Grid', 'juvyri' ),
			'singular_name' => __( 'Instagram Post', 'juvyri' ),
			'add_new_item'  => __( 'Add New Instagram Photo', 'juvyri' ),
		),
		'menu_icon' => 'dashicons-format-image',
		'supports'  => array( 'title', 'thumbnail', 'page-attributes' ),
	) ) );
}
add_action( 'init', 'juvyri_register_cpts' );

/**
 * Order "Collection", "Lookbook" and "Instagram Grid" by the admin's
 * drag-and-drop order (page-attributes) instead of publish date, so
 * reordering the homepage grid is just dragging rows on the list screen.
 */
function juvyri_cpt_default_order( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( in_array( $query->get( 'post_type' ), array( 'juvyri_product', 'juvyri_look', 'juvyri_ig_post' ), true ) ) {
		$query->set( 'orderby', 'menu_order' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'juvyri_cpt_default_order' );
