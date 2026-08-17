<?php
/**
 * Single page template.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'section' ); ?>>
		<div class="container">
			<header class="entry-header">
				<?php the_title( '<h1>', '</h1>' ); ?>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="post-thumbnail">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<nav class="page-links">',
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
