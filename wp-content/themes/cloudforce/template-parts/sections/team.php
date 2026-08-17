<?php
/**
 * Homepage team section ("Technologists on Call.").
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = cloudforce_get( 'team_title' );
$body  = cloudforce_get( 'team_body' );

if ( '' === $title && '' === $body ) {
	return;
}
?>
<section class="section section--subtle">
	<div class="container container--wide split">
		<div>
			<?php if ( '' !== $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
		</div>

		<div>
			<?php if ( '' !== $body ) : ?>
				<div class="section__lead"><?php echo wp_kses_post( wpautop( $body ) ); ?></div>
			<?php endif; ?>

			<?php cloudforce_cta( 'team_cta_label', 'team_cta_url' ); ?>
		</div>
	</div>
</section>
