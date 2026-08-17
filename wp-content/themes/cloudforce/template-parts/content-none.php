<?php
/**
 * Shown when a query returns no posts.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="no-results">
	<h2><?php esc_html_e( 'Nothing found', 'cloudforce' ); ?></h2>
	<p><?php esc_html_e( 'We couldn’t find anything matching that. Try a different search.', 'cloudforce' ); ?></p>
	<?php get_search_form(); ?>
</div>
