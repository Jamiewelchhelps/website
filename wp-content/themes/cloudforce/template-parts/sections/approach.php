<?php
/**
 * Homepage approach section ("Systems Thinking.").
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = cloudforce_get( 'approach_title' );
$body  = cloudforce_get( 'approach_body' );

if ( '' === $title && '' === $body ) {
	return;
}
?>
<section class="section">
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

			<?php cloudforce_cta( 'approach_cta_label', 'approach_cta_url' ); ?>
		</div>
	</div>
</section>
