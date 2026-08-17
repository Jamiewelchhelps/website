<?php
/**
 * Homepage contact section ("Your turn.").
 *
 * The form itself is whatever the site already uses: paste the HubSpot,
 * Gravity Forms or Contact Form 7 shortcode into the Contact Form field in
 * the Customizer and it renders here. Falls back to a plain mailto prompt.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = cloudforce_get( 'contact_title' );
$body  = cloudforce_get( 'contact_body' );
$form  = cloudforce_get( 'contact_form' );
?>
<section class="section section--dark contact-section" id="contact">
	<div class="container container--wide">
		<div class="section__header">
			<?php if ( '' !== $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>

			<?php if ( '' !== $body ) : ?>
				<div class="section__lead"><?php echo wp_kses_post( wpautop( $body ) ); ?></div>
			<?php endif; ?>
		</div>

		<?php if ( '' !== $form ) : ?>
			<div class="contact-form-embed">
				<?php echo do_shortcode( wp_kses_post( $form ) ); ?>
			</div>
		<?php else : ?>
			<?php cloudforce_cta( 'contact_cta_label', 'contact_cta_url', '' ); ?>
		<?php endif; ?>
	</div>
</section>
