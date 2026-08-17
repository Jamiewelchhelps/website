<?php
/**
 * Archive template for categories, tags, authors and dates.
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
			<?php
			the_archive_title( '<h1>', '</h1>' );
			the_archive_description( '<div class="section__lead">', '</div>' );
			?>
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
					'class'     => 'pagination',
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'cloudforce' ),
					'next_text' => __( 'Next', 'cloudforce' ),
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
