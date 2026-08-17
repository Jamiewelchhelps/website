<?php
/**
 * Search results template.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="section">
	<div class="container container--wide">
		<header class="section__header">
			<h1>
				<?php
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Results for “%s”', 'cloudforce' ),
					esc_html( get_search_query() )
				);
				?>
			</h1>
			<?php get_search_form(); ?>
		</header>

		<?php if ( have_posts() ) : ?>
			<ul class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</ul>

			<?php
			the_posts_pagination(
				array(
					'class'    => 'pagination',
					'mid_size' => 2,
				)
			);
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
