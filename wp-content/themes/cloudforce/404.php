<?php
/**
 * 404 template.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="section">
	<div class="container">
		<header class="section__header">
			<span class="eyebrow"><?php esc_html_e( 'Error 404', 'cloudforce' ); ?></span>
			<h1><?php esc_html_e( 'That page has drifted off course.', 'cloudforce' ); ?></h1>
			<p class="section__lead">
				<?php esc_html_e( 'The page you were looking for isn’t here. Try a search, or head back to the homepage.', 'cloudforce' ); ?>
			</p>
		</header>

		<?php get_search_form(); ?>

		<p>
			<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Back to home', 'cloudforce' ); ?>
			</a>
		</p>
	</div>
</section>

<?php
get_footer();
