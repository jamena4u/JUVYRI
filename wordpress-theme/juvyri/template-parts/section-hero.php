<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="hero" id="top">
	<div class="hero-media" aria-hidden="true">
		<div class="hero-gradient"></div>
		<div class="hero-texture"></div>
	</div>
	<div class="hero-content">
		<p class="eyebrow reveal"><?php echo esc_html( juvyri_setting( 'hero_eyebrow', 'Accra, Ghana — Ready-to-Wear' ) ); ?></p>
		<h1 class="hero-title">
			<span class="line reveal"><?php echo esc_html( juvyri_setting( 'hero_line_1', 'Modesty,' ) ); ?></span>
			<span class="line reveal" style="--d:1"><?php echo esc_html( juvyri_setting( 'hero_line_2', 'Made' ) ); ?></span>
			<span class="line reveal" style="--d:2"><?php echo esc_html( juvyri_setting( 'hero_line_3', 'Contemporary.' ) ); ?></span>
		</h1>
		<p class="hero-sub reveal" style="--d:3"><?php echo esc_html( juvyri_setting( 'hero_subtext', 'Stylish, modest, ready-to-wear pieces designed for the woman who moves through the world with quiet confidence.' ) ); ?></p>
		<div class="hero-actions reveal" style="--d:4">
			<a href="<?php echo esc_url( juvyri_setting( 'hero_primary_link', '#collection' ) ); ?>" class="btn btn-primary"><?php echo esc_html( juvyri_setting( 'hero_primary_label', 'Shop The Edit' ) ); ?></a>
			<a href="<?php echo esc_url( juvyri_setting( 'hero_secondary_link', '#story' ) ); ?>" class="btn btn-ghost"><?php echo esc_html( juvyri_setting( 'hero_secondary_label', 'Our Story' ) ); ?></a>
		</div>
	</div>
	<a href="#collection" class="scroll-cue" aria-label="<?php esc_attr_e( 'Scroll to collection', 'juvyri' ); ?>">
		<span></span>
	</a>
</section>
