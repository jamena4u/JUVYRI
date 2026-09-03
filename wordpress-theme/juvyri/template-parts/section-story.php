<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image = juvyri_setting( 'story_image', '' );
?>
<section class="section story" id="story">
	<div class="story-media reveal">
		<div class="story-swatch"<?php echo $image ? ' style="background-image:url(' . esc_url( $image ) . ')"' : ''; ?>></div>
		<div class="story-stat-card">
			<span class="stat-number" data-count="<?php echo esc_attr( juvyri_setting( 'years_number', 6 ) ); ?>">0</span>
			<span class="stat-label"><?php echo esc_html( juvyri_setting( 'years_label', 'Years of Craft' ) ); ?></span>
		</div>
	</div>
	<div class="story-copy">
		<p class="eyebrow reveal"><?php echo esc_html( juvyri_setting( 'story_eyebrow', 'Our Story' ) ); ?></p>
		<h2 class="reveal"><?php echo esc_html( juvyri_setting( 'story_heading', 'Rooted in Accra, worn everywhere.' ) ); ?></h2>
		<p class="reveal" style="--d:1"><?php echo esc_html( juvyri_setting( 'story_paragraph_1' ) ); ?></p>
		<p class="reveal" style="--d:2"><?php echo esc_html( juvyri_setting( 'story_paragraph_2' ) ); ?></p>

		<div class="stats reveal" style="--d:3">
			<div class="stat">
				<span class="stat-number" data-count="<?php echo esc_attr( juvyri_setting( 'stat_1_number', 1200 ) ); ?>">0</span>
				<span class="stat-label"><?php echo esc_html( juvyri_setting( 'stat_1_label', 'Pieces Handmade' ) ); ?></span>
			</div>
			<div class="stat">
				<span class="stat-number" data-count="<?php echo esc_attr( juvyri_setting( 'stat_2_number', 14 ) ); ?>">0</span>
				<span class="stat-label"><?php echo esc_html( juvyri_setting( 'stat_2_label', 'Countries Shipped To' ) ); ?></span>
			</div>
			<div class="stat">
				<span class="stat-number" data-count="<?php echo esc_attr( juvyri_setting( 'stat_3_number', 98 ) ); ?>">0</span>
				<span class="stat-label"><?php echo esc_html( juvyri_setting( 'stat_3_label', '% Loved It' ) ); ?></span>
			</div>
		</div>
		<a href="#contact" class="btn btn-primary"><?php esc_html_e( 'Get In Touch', 'juvyri' ); ?></a>
	</div>
</section>
