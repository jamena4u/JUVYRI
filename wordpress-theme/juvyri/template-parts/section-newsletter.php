<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$action_url = juvyri_setting( 'newsletter_action_url', '' );
?>
<section class="newsletter">
	<div class="newsletter-inner reveal">
		<h2><?php echo esc_html( juvyri_setting( 'newsletter_heading', 'Join The Inner Circle' ) ); ?></h2>
		<p><?php echo esc_html( juvyri_setting( 'newsletter_subtext', 'New drops, styling notes and early access — straight to your inbox.' ) ); ?></p>
		<form class="newsletter-form" id="newsletterForm" novalidate
			<?php if ( $action_url ) : ?>
				action="<?php echo esc_url( $action_url ); ?>" method="post" target="_blank"
			<?php endif; ?>
		>
			<label class="visually-hidden" for="newsletterEmail"><?php esc_html_e( 'Email address', 'juvyri' ); ?></label>
			<input type="email" id="newsletterEmail" name="<?php echo $action_url ? 'EMAIL' : 'email'; ?>" placeholder="<?php esc_attr_e( 'Your email address', 'juvyri' ); ?>" required>
			<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Subscribe', 'juvyri' ); ?></button>
		</form>
		<p class="form-message" id="formMessage" role="status" aria-live="polite"></p>
		<?php if ( ! $action_url ) : ?>
			<p class="visually-hidden" data-juvyri-note="1"><?php esc_html_e( 'No email service is connected yet — set one under Site Settings → Newsletter Section to actually collect subscribers.', 'juvyri' ); ?></p>
		<?php endif; ?>
	</div>
</section>
