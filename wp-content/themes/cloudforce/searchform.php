<?php
/**
 * Search form.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cloudforce_search_id = wp_unique_id( 'search-field-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $cloudforce_search_id ); ?>">
		<?php esc_html_e( 'Search', 'cloudforce' ); ?>
	</label>
	<input
		type="search"
		id="<?php echo esc_attr( $cloudforce_search_id ); ?>"
		class="search-field"
		placeholder="<?php esc_attr_e( 'Search…', 'cloudforce' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		name="s"
	>
	<button type="submit" class="search-submit">
		<?php esc_html_e( 'Search', 'cloudforce' ); ?>
	</button>
</form>
