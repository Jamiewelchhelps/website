<?php
/**
 * Homepage focus section ("Areas of (Hyper)focus.") plus the capability list.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = cloudforce_get( 'focus_title' );
$body  = cloudforce_get( 'focus_body' );
?>
<section class="section section--dark">
	<div class="container container--wide">
		<div class="split section__header">
			<div>
				<?php if ( '' !== $title ) : ?>
					<h2><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
			</div>

			<div>
				<?php if ( '' !== $body ) : ?>
					<div class="section__lead"><?php echo wp_kses_post( wpautop( $body ) ); ?></div>
				<?php endif; ?>

				<?php cloudforce_cta( 'focus_cta_label', 'focus_cta_url' ); ?>
			</div>
		</div>

		<?php cloudforce_capabilities(); ?>
	</div>
</section>
