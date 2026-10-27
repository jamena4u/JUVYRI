<?php
/**
 * Small helpers used by the front-page templates.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The ID of the hidden "Site Settings" page that carries the site-wide
 * ACF fields (hero copy, stats, footer info, etc). Created automatically
 * on theme activation — see inc/settings-page.php.
 */
function juvyri_settings_id() {
	static $id = null;
	if ( null === $id ) {
		$page = get_page_by_path( 'site-settings' );
		$id   = $page ? $page->ID : 0;
	}
	return $id;
}

/**
 * Read one field from the Site Settings page, with a fallback default so
 * the homepage looks complete even before an admin has filled anything in.
 */
function juvyri_setting( $key, $default = '' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}
	$value = get_field( $key, juvyri_settings_id() );
	if ( $value === null || $value === '' || $value === false ) {
		return $default;
	}
	return $value;
}

/**
 * Split a textarea (one item per line) into a clean array, dropping blank
 * lines. Used for the marquee bars so an admin can add/remove lines just
 * by editing a plain text box — no repeater field (ACF PRO) required.
 */
function juvyri_lines( $text ) {
	if ( ! $text ) {
		return array();
	}
	$lines = preg_split( '/\r\n|\r|\n/', (string) $text );
	$lines = array_map( 'trim', $lines );
	return array_values( array_filter( $lines, function ( $line ) {
		return $line !== '';
	} ) );
}

/**
 * Cycle through the fabric-gradient placeholder swatch classes so cards
 * without a featured image yet still look intentional rather than blank.
 */
function juvyri_swatch_class( $index ) {
	$n = ( (int) $index % 6 ) + 1;
	return 'swatch-' . $n;
}

/**
 * Inline background-image style for a post's featured image at a given
 * WP image size, or empty string if there isn't one (the swatch class
 * handles that case visually instead).
 */
function juvyri_media_style( $post_id, $size = 'juvyri-portrait' ) {
	if ( ! has_post_thumbnail( $post_id ) ) {
		return '';
	}
	$url = get_the_post_thumbnail_url( $post_id, $size );
	return $url ? sprintf( ' style="background-image:url(%s)"', esc_url( $url ) ) : '';
}
