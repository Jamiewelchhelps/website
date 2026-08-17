<?php
/**
 * Awards and certification badge strip.
 *
 * Renders nothing until at least one badge image is set in the Customizer
 * (Homepage Content > Awards & Badges), so a fresh install shows no gap.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$images = array();

for ( $i = 1; $i <= 4; $i++ ) {
	$id = (int) get_theme_mod( "cloudforce_awards_image_{$i}", 0 );

	if ( $id ) {
		$images[] = $id;
	}
}

if ( empty( $images ) ) {
	return;
}

$title = cloudforce_get( 'awards_title' );
?>
<section class="section section--tight section--subtle">
	<div class="container container--wide">
		<?php if ( '' !== $title ) : ?>
			<h2 class="awards__title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<ul class="awards">
			<?php foreach ( $images as $image_id ) : ?>
				<li>
					<?php
					echo wp_get_attachment_image(
						$image_id,
						'medium',
						false,
						array( 'loading' => 'lazy' )
					);
					?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
