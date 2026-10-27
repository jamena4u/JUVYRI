<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$words = juvyri_lines( juvyri_setting( 'marquee_words', "MODEST\nCONTEMPORARY\nREADY-TO-WEAR\nHANDCRAFTED IN GHANA" ) );
if ( empty( $words ) ) {
	return;
}
$repeated = array_merge( $words, $words );
?>
<div class="marquee-bar marquee-alt" aria-hidden="true">
	<div class="marquee-track">
		<?php foreach ( $repeated as $word ) : ?>
			<span><?php echo esc_html( $word ); ?></span><span>✦</span>
		<?php endforeach; ?>
	</div>
</div>
