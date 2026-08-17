<?php
/**
 * The site header.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'cloudforce' ); ?></a>

<header class="site-header">
	<div class="container container--wide site-header__inner">
		<div class="site-branding">
			<?php cloudforce_branding(); ?>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<button
				class="menu-toggle"
				aria-controls="primary-menu"
				aria-expanded="false"
				aria-label="<?php esc_attr_e( 'Toggle menu', 'cloudforce' ); ?>"
			>
				<span></span><span></span><span></span>
			</button>

			<nav class="main-navigation" id="primary-menu" aria-label="<?php esc_attr_e( 'Primary', 'cloudforce' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'depth'          => 2,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<?php
		$header_cta_label = cloudforce_get( 'hero_cta_label' );
		$header_cta_url   = cloudforce_get( 'hero_cta_url' );

		if ( '' !== $header_cta_label && '' !== $header_cta_url ) :
			?>
			<a class="button header-cta" href="<?php echo esc_url( $header_cta_url ); ?>">
				<?php echo esc_html( $header_cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</header>

<main id="main">
