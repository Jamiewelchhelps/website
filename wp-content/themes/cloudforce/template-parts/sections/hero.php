<?php
/**
 * Homepage hero, including the optional promo banner.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = cloudforce_get( 'hero_eyebrow' );
$title   = cloudforce_get( 'hero_title' );
$lead    = cloudforce_get( 'hero_lead' );

if ( '' === $title && '' === $lead ) {
	return;
}

$promo_title = cloudforce_get( 'promo_title' );
$promo_text  = cloudforce_get( 'promo_text' );
$promo_url   = cloudforce_get( 'promo_url' );
$promo_image = (int) get_theme_mod( 'cloudforce_promo_image', 0 );
?>
<section class="hero">
	<div class="container container--wide">
		<?php if ( '' !== $eyebrow ) : ?>
			<span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>

		<?php if ( '' !== $title ) : ?>
			<h1><?php echo esc_html( $title ); ?></h1>
		<?php endif; ?>

		<?php if ( '' !== $lead ) : ?>
			<p class="hero__lead"><?php echo esc_html( $lead ); ?></p>
		<?php endif; ?>

		<div class="hero__actions">
			<?php
			cloudforce_cta( 'hero_cta_label', 'hero_cta_url', '' );
			cloudforce_cta( 'hero_cta2_label', 'hero_cta2_url', 'button--secondary' );
			?>
		</div>

		<?php if ( '' !== $promo_title || '' !== $promo_text ) : ?>
			<div class="promo-banner">
				<div class="promo-banner__body">
					<?php if ( '' !== $promo_title ) : ?>
						<h2 class="promo-banner__title">
							<?php if ( '' !== $promo_url ) : ?>
								<a class="promo-banner__link" href="<?php echo esc_url( $promo_url ); ?>">
									<?php echo esc_html( $promo_title ); ?>
								</a>
							<?php else : ?>
								<?php echo esc_html( $promo_title ); ?>
							<?php endif; ?>
						</h2>
					<?php endif; ?>

					<?php if ( '' !== $promo_text ) : ?>
						<p class="promo-banner__text"><?php echo esc_html( $promo_text ); ?></p>
					<?php endif; ?>
				</div>

				<?php
				if ( $promo_image ) {
					echo wp_get_attachment_image( $promo_image, 'medium', false, array( 'loading' => 'eager' ) );
				}
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
