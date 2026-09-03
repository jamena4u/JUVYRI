<?php
/**
 * All editable fields, registered in code (not the ACF-JSON auto-export)
 * so they ship with the theme and are guaranteed to exist as soon as the
 * theme + the free Advanced Custom Fields plugin are active — nothing to
 * click together by hand in wp-admin.
 *
 * Deliberately avoids Repeater / Flexible Content / Gallery / Options Page
 * field types: those are ACF PRO-only. Everything here works on the free
 * ACF plugin. (Double-check this against the current ACF pricing page
 * before relying on it long-term — free/PRO feature splits can change.)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function juvyri_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	/* ---------------------------------------------------------------
	 * Collection (Product) fields
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_juvyri_product',
		'title'    => 'Product Details',
		'fields'   => array(
			array(
				'key'           => 'field_juvyri_product_price',
				'label'         => 'Price',
				'name'          => 'price',
				'type'          => 'text',
				'instructions'  => 'Shown under the product name, e.g. "GH₵ 480.00".',
				'placeholder'   => 'GH₵ 0.00',
			),
			array(
				'key'          => 'field_juvyri_product_tag',
				'label'        => 'Badge (optional)',
				'name'         => 'tag',
				'type'         => 'text',
				'instructions' => 'Small label on the photo, e.g. "New", "Best Seller", "Limited". Leave blank for none.',
			),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'juvyri_product' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Lookbook fields
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_juvyri_look',
		'title'    => 'Look Details',
		'fields'   => array(
			array(
				'key'          => 'field_juvyri_look_caption',
				'label'        => 'Caption',
				'name'         => 'caption',
				'type'         => 'text',
				'instructions' => 'Shown over the photo on hover. Leave blank to use the title instead.',
			),
			array(
				'key'          => 'field_juvyri_look_tall',
				'label'        => 'Large tile',
				'name'         => 'tall',
				'type'         => 'true_false',
				'instructions' => 'Show this photo as a taller, more prominent tile in the grid.',
				'ui'           => 1,
				'default_value'=> 0,
			),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'juvyri_look' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Testimonial fields
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_juvyri_testimonial',
		'title'    => 'Testimonial',
		'fields'   => array(
			array(
				'key'          => 'field_juvyri_testimonial_quote',
				'label'        => 'Quote',
				'name'         => 'quote',
				'type'         => 'textarea',
				'required'     => 1,
				'rows'         => 3,
			),
			array(
				'key'          => 'field_juvyri_testimonial_author',
				'label'        => 'Attribution',
				'name'         => 'author',
				'type'         => 'text',
				'required'     => 1,
				'placeholder'  => 'Abena K., Accra',
				'instructions' => 'The post title is just for your reference in the admin list — this is what shows on the site.',
			),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'juvyri_testimonial' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Event fields
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_juvyri_event',
		'title'    => 'Event Details',
		'fields'   => array(
			array(
				'key'            => 'field_juvyri_event_date',
				'label'          => 'Date',
				'name'           => 'event_date',
				'type'           => 'date_picker',
				'required'       => 1,
				'display_format' => 'D, j M Y',
				'return_format'  => 'Ymd',
				'instructions'   => 'Past events automatically disappear from the homepage the day after this date.',
			),
			array(
				'key'   => 'field_juvyri_event_location',
				'label' => 'Location',
				'name'  => 'location',
				'type'  => 'text',
				'placeholder' => 'Accra Mall, Ghana',
			),
			array(
				'key'   => 'field_juvyri_event_description',
				'label' => 'Description',
				'name'  => 'description',
				'type'  => 'textarea',
				'rows'  => 3,
			),
			array(
				'key'          => 'field_juvyri_event_cta_label',
				'label'        => 'Button text',
				'name'         => 'cta_label',
				'type'         => 'text',
				'default_value'=> 'RSVP',
			),
			array(
				'key'          => 'field_juvyri_event_cta_url',
				'label'        => 'Button link',
				'name'         => 'cta_url',
				'type'         => 'url',
				'instructions' => 'Where the button should go — a WhatsApp link, form, or Instagram post. Leave blank to hide the button.',
			),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'juvyri_event' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Instagram grid fields
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_juvyri_ig',
		'title'    => 'Instagram Post',
		'fields'   => array(
			array(
				'key'          => 'field_juvyri_ig_permalink',
				'label'        => 'Link to the real Instagram post',
				'name'         => 'permalink',
				'type'         => 'url',
				'instructions' => 'Paste the "Copy Link" URL from the actual post on @ju.vy.ri. Leave blank to link to the profile instead.',
			),
			array(
				'key'          => 'field_juvyri_ig_likes',
				'label'        => 'Like count (optional)',
				'name'         => 'likes',
				'type'         => 'number',
				'instructions' => 'Purely decorative — shown on hover. Leave blank to hide it.',
			),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'juvyri_ig_post' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Site Settings — header / social / contact
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'        => 'group_juvyri_settings_contact',
		'title'      => 'Social & Contact',
		'menu_order' => 0,
		'fields'     => array(
			array( 'key' => 'field_juvyri_instagram_handle', 'label' => 'Instagram handle', 'name' => 'instagram_handle', 'type' => 'text', 'default_value' => '@ju.vy.ri' ),
			array( 'key' => 'field_juvyri_instagram_url', 'label' => 'Instagram URL', 'name' => 'instagram_url', 'type' => 'url', 'default_value' => 'https://instagram.com/ju.vy.ri' ),
			array( 'key' => 'field_juvyri_whatsapp_url', 'label' => 'WhatsApp link', 'name' => 'whatsapp_url', 'type' => 'url', 'instructions' => 'e.g. https://wa.me/233XXXXXXXXX' ),
			array( 'key' => 'field_juvyri_contact_email', 'label' => 'Contact email', 'name' => 'contact_email', 'type' => 'email', 'default_value' => 'hello@juvyri.com' ),
			array( 'key' => 'field_juvyri_contact_phone', 'label' => 'Contact phone', 'name' => 'contact_phone', 'type' => 'text' ),
			array( 'key' => 'field_juvyri_address', 'label' => 'Address', 'name' => 'address', 'type' => 'text', 'default_value' => 'Accra, Ghana' ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'juvyri-settings' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Site Settings — scrolling marquee bars
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'        => 'group_juvyri_settings_marquee',
		'title'      => 'Scrolling Announcement Bars',
		'menu_order' => 1,
		'fields'     => array(
			array(
				'key'          => 'field_juvyri_marquee_top',
				'label'        => 'Top bar messages',
				'name'         => 'marquee_top',
				'type'         => 'textarea',
				'rows'         => 4,
				'instructions' => 'One message per line, shown in the dark scrolling bar at the very top.',
				'default_value'=> "NEW EDIT NOW LIVE\nFREE DELIVERY ACROSS GHANA ON ORDERS OVER GH₵500\nHANDCRAFTED, MODEST, CONTEMPORARY\nFOLLOW @JU.VY.RI",
			),
			array(
				'key'          => 'field_juvyri_marquee_words',
				'label'        => 'Rust bar words',
				'name'         => 'marquee_words',
				'type'         => 'textarea',
				'rows'         => 4,
				'instructions' => 'One word or short phrase per line, shown in the orange scrolling strip below the hero.',
				'default_value'=> "MODEST\nCONTEMPORARY\nREADY-TO-WEAR\nHANDCRAFTED IN GHANA",
			),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'juvyri-settings' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Site Settings — hero
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'        => 'group_juvyri_settings_hero',
		'title'      => 'Hero Section',
		'menu_order' => 2,
		'fields'     => array(
			array( 'key' => 'field_juvyri_hero_eyebrow', 'label' => 'Small label above the headline', 'name' => 'hero_eyebrow', 'type' => 'text', 'default_value' => 'Accra, Ghana — Ready-to-Wear' ),
			array( 'key' => 'field_juvyri_hero_line_1', 'label' => 'Headline — line 1', 'name' => 'hero_line_1', 'type' => 'text', 'default_value' => 'Modesty,' ),
			array( 'key' => 'field_juvyri_hero_line_2', 'label' => 'Headline — line 2', 'name' => 'hero_line_2', 'type' => 'text', 'default_value' => 'Made' ),
			array( 'key' => 'field_juvyri_hero_line_3', 'label' => 'Headline — line 3', 'name' => 'hero_line_3', 'type' => 'text', 'default_value' => 'Contemporary.' ),
			array( 'key' => 'field_juvyri_hero_subtext', 'label' => 'Subtext', 'name' => 'hero_subtext', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Stylish, modest, ready-to-wear pieces designed for the woman who moves through the world with quiet confidence.' ),
			array( 'key' => 'field_juvyri_hero_primary_label', 'label' => 'Primary button text', 'name' => 'hero_primary_label', 'type' => 'text', 'default_value' => 'Shop The Edit' ),
			array( 'key' => 'field_juvyri_hero_primary_link', 'label' => 'Primary button link', 'name' => 'hero_primary_link', 'type' => 'text', 'default_value' => '#collection', 'instructions' => 'A page anchor like #collection, or a full https:// URL.' ),
			array( 'key' => 'field_juvyri_hero_secondary_label', 'label' => 'Secondary button text', 'name' => 'hero_secondary_label', 'type' => 'text', 'default_value' => 'Our Story' ),
			array( 'key' => 'field_juvyri_hero_secondary_link', 'label' => 'Secondary button link', 'name' => 'hero_secondary_link', 'type' => 'text', 'default_value' => '#story' ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'juvyri-settings' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Site Settings — brand story & stats
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'        => 'group_juvyri_settings_story',
		'title'      => 'Our Story Section',
		'menu_order' => 3,
		'fields'     => array(
			array( 'key' => 'field_juvyri_story_eyebrow', 'label' => 'Small label', 'name' => 'story_eyebrow', 'type' => 'text', 'default_value' => 'Our Story' ),
			array( 'key' => 'field_juvyri_story_heading', 'label' => 'Heading', 'name' => 'story_heading', 'type' => 'text', 'default_value' => 'Rooted in Accra, worn everywhere.' ),
			array( 'key' => 'field_juvyri_story_paragraph_1', 'label' => 'Paragraph 1', 'name' => 'story_paragraph_1', 'type' => 'textarea', 'rows' => 3, 'default_value' => "JUVYRI began as a small Accra atelier with one belief: modest dressing deserves the same craft, colour and confidence as any runway look. Every piece is cut, fitted and finished by hand, blending West African textile traditions with contemporary tailoring." ),
			array( 'key' => 'field_juvyri_story_paragraph_2', 'label' => 'Paragraph 2', 'name' => 'story_paragraph_2', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Today the JUVYRI woman is global — but the stitching is still local.' ),
			array( 'key' => 'field_juvyri_story_image', 'label' => 'Photo', 'name' => 'story_image', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium' ),
			array( 'key' => 'field_juvyri_years_number', 'label' => 'Floating stat — number', 'name' => 'years_number', 'type' => 'number', 'default_value' => 6 ),
			array( 'key' => 'field_juvyri_years_label', 'label' => 'Floating stat — label', 'name' => 'years_label', 'type' => 'text', 'default_value' => 'Years of Craft' ),
			array( 'key' => 'field_juvyri_stat1_number', 'label' => 'Stat 1 — number', 'name' => 'stat_1_number', 'type' => 'number', 'default_value' => 1200 ),
			array( 'key' => 'field_juvyri_stat1_label', 'label' => 'Stat 1 — label', 'name' => 'stat_1_label', 'type' => 'text', 'default_value' => 'Pieces Handmade' ),
			array( 'key' => 'field_juvyri_stat2_number', 'label' => 'Stat 2 — number', 'name' => 'stat_2_number', 'type' => 'number', 'default_value' => 14 ),
			array( 'key' => 'field_juvyri_stat2_label', 'label' => 'Stat 2 — label', 'name' => 'stat_2_label', 'type' => 'text', 'default_value' => 'Countries Shipped To' ),
			array( 'key' => 'field_juvyri_stat3_number', 'label' => 'Stat 3 — number', 'name' => 'stat_3_number', 'type' => 'number', 'default_value' => 98 ),
			array( 'key' => 'field_juvyri_stat3_label', 'label' => 'Stat 3 — label', 'name' => 'stat_3_label', 'type' => 'text', 'default_value' => '% Loved It' ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'juvyri-settings' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Site Settings — Instagram section copy
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'        => 'group_juvyri_settings_ig',
		'title'      => 'Instagram Section',
		'menu_order' => 4,
		'fields'     => array(
			array( 'key' => 'field_juvyri_ig_eyebrow', 'label' => 'Small label', 'name' => 'instagram_eyebrow', 'type' => 'text', 'default_value' => '@ju.vy.ri' ),
			array( 'key' => 'field_juvyri_ig_heading', 'label' => 'Heading', 'name' => 'instagram_heading', 'type' => 'text', 'default_value' => 'Follow The Edit' ),
			array( 'key' => 'field_juvyri_ig_subtext', 'label' => 'Subtext', 'name' => 'instagram_subtext', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Daily styling, behind-the-scenes stitching and new drops — live on Instagram.' ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'juvyri-settings' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Site Settings — newsletter
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'        => 'group_juvyri_settings_newsletter',
		'title'      => 'Newsletter Section',
		'menu_order' => 5,
		'fields'     => array(
			array( 'key' => 'field_juvyri_newsletter_heading', 'label' => 'Heading', 'name' => 'newsletter_heading', 'type' => 'text', 'default_value' => 'Join The Inner Circle' ),
			array( 'key' => 'field_juvyri_newsletter_subtext', 'label' => 'Subtext', 'name' => 'newsletter_subtext', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'New drops, styling notes and early access — straight to your inbox.' ),
			array(
				'key'          => 'field_juvyri_newsletter_action_url',
				'label'        => 'Email service sign-up URL (optional)',
				'name'         => 'newsletter_action_url',
				'type'         => 'url',
				'instructions' => 'Paste the form "action" URL from Mailchimp/Brevo/etc. Leave blank to keep the simple built-in form (it won\'t actually collect emails anywhere until you connect a real service).',
			),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'juvyri-settings' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * Site Settings — footer
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'        => 'group_juvyri_settings_footer',
		'title'      => 'Footer',
		'menu_order' => 6,
		'fields'     => array(
			array( 'key' => 'field_juvyri_footer_blurb', 'label' => 'Blurb', 'name' => 'footer_blurb', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Stylish, modest, contemporary ready-to-wear — designed and stitched in Accra, Ghana.' ),
			array( 'key' => 'field_juvyri_copyright_name', 'label' => 'Copyright name', 'name' => 'copyright_name', 'type' => 'text', 'default_value' => 'JUVYRI' ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'juvyri-settings' ) ) ),
	) );
}
add_action( 'acf/init', 'juvyri_register_acf_fields' );
