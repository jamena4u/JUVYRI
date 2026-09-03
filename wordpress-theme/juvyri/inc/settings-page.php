<?php
/**
 * "Site Settings" — a single hidden WP Page that carries all the
 * site-wide ACF fields (hero copy, stats, footer info, marquee text...).
 *
 * We use a plain Page + a virtual page template instead of an ACF Options
 * Page because Options Pages are an ACF PRO feature; this approach works
 * fully on the free version of Advanced Custom Fields. The page is
 * created automatically on theme activation, kept out of menus/search via
 * post_status "private", and any direct visit is redirected home.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const JUVYRI_SETTINGS_TEMPLATE = 'juvyri-settings';
const JUVYRI_SETTINGS_SLUG     = 'site-settings';

function juvyri_register_settings_template( $templates ) {
	$templates[ JUVYRI_SETTINGS_TEMPLATE ] = __( 'JUVYRI: Site Settings (do not delete this page)', 'juvyri' );
	return $templates;
}
add_filter( 'theme_page_templates', 'juvyri_register_settings_template' );

/**
 * Never actually render the settings page on the front end.
 */
function juvyri_redirect_settings_page( $template ) {
	if ( is_page_template( JUVYRI_SETTINGS_TEMPLATE ) ) {
		wp_safe_redirect( home_url( '/' ) );
		exit;
	}
	return $template;
}
add_filter( 'template_include', 'juvyri_redirect_settings_page' );

/**
 * Create the Site Settings page once, on theme activation, so the admin
 * finds a ready-made "Site Settings" entry under Pages with nothing to
 * configure manually.
 */
function juvyri_create_settings_page() {
	$existing = get_page_by_path( JUVYRI_SETTINGS_SLUG );

	if ( $existing ) {
		update_post_meta( $existing->ID, '_wp_page_template', JUVYRI_SETTINGS_TEMPLATE );
		return;
	}

	$id = wp_insert_post( array(
		'post_title'   => __( 'Site Settings', 'juvyri' ),
		'post_name'    => JUVYRI_SETTINGS_SLUG,
		'post_status'  => 'private',
		'post_type'    => 'page',
		'post_content' => __( 'This page holds the homepage\'s editable text and settings (hero copy, stats, footer info, social links...). It is not a public page — editing it updates the homepage.', 'juvyri' ),
	) );

	if ( $id && ! is_wp_error( $id ) ) {
		update_post_meta( $id, '_wp_page_template', JUVYRI_SETTINGS_TEMPLATE );
	}
}
add_action( 'after_switch_theme', 'juvyri_create_settings_page' );

/**
 * Belt-and-braces: if the page is somehow missing (e.g. restored from an
 * export without it), recreate it once per admin page load instead of
 * throwing notices everywhere fields are read.
 */
function juvyri_ensure_settings_page() {
	if ( is_admin() && ! get_page_by_path( JUVYRI_SETTINGS_SLUG ) ) {
		juvyri_create_settings_page();
	}
}
add_action( 'admin_init', 'juvyri_ensure_settings_page' );
