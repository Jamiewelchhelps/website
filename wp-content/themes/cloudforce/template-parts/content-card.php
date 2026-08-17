<?php
/**
 * A post card used in grids and archives.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li>
	<article <?php post_class( 'card' ); ?>>
		<?php if ( has_post_thumbnail() ) : ?>
			<a class="card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
				<?php the_post_thumbnail( 'medium_large' ); ?>
			</a>
		<?php endif; ?>

		<div class="card__body">
			<h2 class="card__title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>

			<?php cloudforce_entry_meta(); ?>

			<p class="card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
		</div>
	</article>
</li>
