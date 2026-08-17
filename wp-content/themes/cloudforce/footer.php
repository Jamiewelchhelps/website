<?php
/**
 * The site footer.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>

<footer class="site-footer">
	<div class="container container--wide">
		<div class="footer-grid">
			<div class="footer-brand">
				<div class="footer-brand__logo"><?php bloginfo( 'name' ); ?></div>

				<?php
				$address = cloudforce_get( 'address' );
				$phone   = cloudforce_get( 'phone' );

				if ( '' !== $address || '' !== $phone ) :
					?>
					<address>
						<?php if ( '' !== $address ) : ?>
							<?php echo esc_html( $address ); ?><br>
						<?php endif; ?>

						<?php if ( '' !== $phone ) : ?>
							<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
								<?php echo esc_html( $phone ); ?>
							</a>
						<?php endif; ?>
					</address>
				<?php endif; ?>

				<?php cloudforce_social_links(); ?>
			</div>

			<?php
			cloudforce_footer_column( 'footer-approach', __( 'Our Approach', 'cloudforce' ) );
			cloudforce_footer_column( 'footer-solutions', __( 'Solutions', 'cloudforce' ) );
			cloudforce_footer_column( 'footer-insights', __( 'Insights', 'cloudforce' ) );
			cloudforce_footer_column( 'footer-about', __( 'About Us', 'cloudforce' ) );
			?>
		</div>

		<div class="footer-bottom">
			<p>
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				<?php bloginfo( 'name' ); ?>
				<?php
				$copyright = cloudforce_get( 'copyright' );
				if ( '' !== $copyright ) {
					echo ' &mdash; ' . esc_html( $copyright );
				}
				?>
			</p>

			<?php
			if ( has_nav_menu( 'footer-legal' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer-legal',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			}
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
