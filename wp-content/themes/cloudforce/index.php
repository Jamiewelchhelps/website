<?php
/**
 * The main template file — used when nothing more specific matches.
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
		<?php if ( have_posts() ) : ?>
			<header class="section__header">
				<h1><?php echo esc_html( get_the_archive_title() ? wp_strip_all_tags( get_the_archive_title() ) : get_bloginfo( 'name' ) ); ?></h1>
			</header>

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
