<?php
/**
 * JUVYRI theme bootstrap.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'JUVYRI_VERSION', '1.0.0' );
define( 'JUVYRI_DIR', get_template_directory() );
define( 'JUVYRI_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
function juvyri_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 90,
		'width'       => 260,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary'       => __( 'Primary Menu (header)', 'juvyri' ),
		'footer-shop'   => __( 'Footer — Shop column', 'juvyri' ),
		'footer-company'=> __( 'Footer — Company column', 'juvyri' ),
	) );

	add_image_size( 'juvyri-portrait', 900, 1200, true );  // Product / lookbook cards
	add_image_size( 'juvyri-square', 800, 800, true );     // Instagram grid tiles
	add_image_size( 'juvyri-wide', 1000, 1250, true );     // Brand story image
	add_image_size( 'juvyri-event', 800, 600, true );      // Event cards
}
add_action( 'after_setup_theme', 'juvyri_setup' );

/**
 * Styles & scripts.
 */
function juvyri_assets() {
	wp_enqueue_style(
		'juvyri-fonts',
		'https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400;0,6..96,500;0,6..96,700;0,6..96,800;1,6..96,500&family=Jost:wght@300;400;500;600&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'juvyri-style', get_stylesheet_uri(), array(), JUVYRI_VERSION );
	wp_enqueue_script( 'juvyri-main', JUVYRI_URI . '/js/main.js', array(), JUVYRI_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'juvyri_assets' );

/**
 * Includes.
 */
require JUVYRI_DIR . '/inc/helpers.php';
require JUVYRI_DIR . '/inc/cpts.php';
require JUVYRI_DIR . '/inc/settings-page.php';
require JUVYRI_DIR . '/inc/acf-fields.php';
require JUVYRI_DIR . '/inc/admin-notices.php';

/**
 * Nav menu fallback so the header still renders sensible links before an
 * admin has created a menu under Appearance > Menus.
 */
function juvyri_primary_nav_fallback() {
	echo '<ul>';
	$links = array(
		'#collection' => __( 'Collection', 'juvyri' ),
		'#story'      => __( 'Our Story', 'juvyri' ),
		'#lookbook'   => __( 'Lookbook', 'juvyri' ),
		'#events'     => __( 'Events', 'juvyri' ),
		'#instagram'  => __( 'Instagram', 'juvyri' ),
		'#contact'    => __( 'Contact', 'juvyri' ),
	);
	foreach ( $links as $href => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $href ), esc_html( $label ) );
	}
	echo '</ul>';
}

function juvyri_footer_shop_fallback() {
	echo '<ul>';
	$links = array(
		'#collection' => __( 'New Arrivals', 'juvyri' ),
		'#lookbook'   => __( 'Lookbook', 'juvyri' ),
		'#events'     => __( 'Events', 'juvyri' ),
	);
	foreach ( $links as $href => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $href ), esc_html( $label ) );
	}
	echo '</ul>';
}

function juvyri_footer_company_fallback() {
	echo '<ul>';
	$links = array(
		'#story'      => __( 'Our Story', 'juvyri' ),
		'#instagram'  => __( 'Instagram', 'juvyri' ),
	);
	foreach ( $links as $href => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $href ), esc_html( $label ) );
	}
	echo '</ul>';
}
