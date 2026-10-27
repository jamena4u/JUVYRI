<?php
/**
 * Friendly admin nudges instead of silent missing content.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function juvyri_admin_notices() {
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	if ( ! function_exists( 'get_field' ) ) {
		echo '<div class="notice notice-error"><p><strong>JUVYRI theme:</strong> the free <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank" rel="noopener">Advanced Custom Fields</a> plugin is required for the Collection, Lookbook, Testimonials, Events and Site Settings fields to appear. Please install and activate it.</p></div>';
	}

	if ( ! wp_get_nav_menu_object( 'primary' ) && ! has_nav_menu( 'primary' ) ) {
		echo '<div class="notice notice-warning is-dismissible"><p><strong>JUVYRI theme:</strong> no header menu is assigned yet — the site is showing a built-in default menu. Create one under <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">Appearance → Menus</a> and assign it to "Primary Menu (header)" whenever you want to customise it.</p></div>';
	}
}
add_action( 'admin_notices', 'juvyri_admin_notices' );
