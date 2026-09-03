<?php
/**
 * The homepage. Sections are pulled in from template-parts/ — each one
 * queries its own custom post type (or reads Site Settings) and falls
 * back to sample content when nothing has been added yet.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main">
	<?php
	get_template_part( 'template-parts/section', 'hero' );
	get_template_part( 'template-parts/section', 'marquee-alt' );
	get_template_part( 'template-parts/section', 'collection' );
	get_template_part( 'template-parts/section', 'story' );
	get_template_part( 'template-parts/section', 'lookbook' );
	get_template_part( 'template-parts/section', 'events' );
	get_template_part( 'template-parts/section', 'instagram' );
	get_template_part( 'template-parts/section', 'testimonials' );
	get_template_part( 'template-parts/section', 'newsletter' );
	?>
</main>

<?php
get_footer();
