<?php
/**
 * Template helper functions.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Echo a homepage setting, escaped for HTML text.
 *
 * @param string $key Setting key.
 */
function cloudforce_text( $key ) {
	echo esc_html( cloudforce_get( $key ) );
}

/**
 * Echo a homepage setting as a paragraph-formatted block.
 *
 * @param string $key Setting key.
 */
function cloudforce_rich( $key ) {
	echo wp_kses_post( wpautop( cloudforce_get( $key ) ) );
}

/**
 * Render a call-to-action link if both label and URL are set.
 *
 * @param string $label_key Setting key holding the label.
 * @param string $url_key   Setting key holding the URL.
 * @param string $class     CSS class for the link.
 */
function cloudforce_cta( $label_key, $url_key, $class = 'button--ghost' ) {
	$label = cloudforce_get( $label_key );
	$url   = cloudforce_get( $url_key );

	if ( '' === $label || '' === $url ) {
		return;
	}

	printf(
		'<a class="button %1$s" href="%2$s">%3$s</a>',
		esc_attr( $class ),
		esc_url( $url ),
		esc_html( $label )
	);
}

/**
 * Print the post date and author for a blog post.
 */
function cloudforce_entry_meta() {
	if ( 'post' !== get_post_type() ) {
		return;
	}

	printf(
		'<p class="entry-meta"><time datetime="%1$s">%2$s</time> &middot; %3$s</p>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_html( get_the_author() )
	);
}

/**
 * Render the numbered capability list from the Customizer settings.
 */
function cloudforce_capabilities() {
	$items = array();

	for ( $i = 1; $i <= 5; $i++ ) {
		$title = cloudforce_get( "cap_{$i}_title" );
		$text  = cloudforce_get( "cap_{$i}_text" );

		if ( '' === $title && '' === $text ) {
			continue;
		}

		$items[] = array(
			'title' => $title,
			'text'  => $text,
		);
	}

	if ( empty( $items ) ) {
		return;
	}

	echo '<ul class="capabilities">';

	foreach ( $items as $item ) {
		echo '<li class="capability">';

		if ( '' !== $item['title'] ) {
			printf( '<h3 class="capability__title">%s</h3>', esc_html( $item['title'] ) );
		}

		if ( '' !== $item['text'] ) {
			printf( '<p class="capability__text">%s</p>', esc_html( $item['text'] ) );
		}

		echo '</li>';
	}

	echo '</ul>';
}

/**
 * Render a footer menu column.
 *
 * @param string $location Registered nav menu location.
 * @param string $title    Column heading.
 */
function cloudforce_footer_column( $location, $title ) {
	if ( ! has_nav_menu( $location ) ) {
		return;
	}

	echo '<div class="footer-column">';
	printf( '<h2 class="footer-column__title">%s</h2>', esc_html( $title ) );

	wp_nav_menu(
		array(
			'theme_location' => $location,
			'container'      => false,
			'depth'          => 1,
			'fallback_cb'    => false,
		)
	);

	echo '</div>';
}

/**
 * Render the social links list.
 */
function cloudforce_social_links() {
	$links = array(
		'social_facebook' => __( 'Facebook', 'cloudforce' ),
		'social_linkedin' => __( 'LinkedIn', 'cloudforce' ),
	);

	$output = '';

	foreach ( $links as $key => $label ) {
		$url = cloudforce_get( $key );

		if ( '' === $url ) {
			continue;
		}

		$output .= sprintf(
			'<li><a href="%1$s" rel="noopener noreferrer" target="_blank"><span class="screen-reader-text">%2$s</span><span aria-hidden="true">%3$s</span></a></li>',
			esc_url( $url ),
			esc_html( $label ),
			esc_html( substr( $label, 0, 2 ) )
		);
	}

	if ( '' === $output ) {
		return;
	}

	echo '<ul class="social-links">' . $output . '</ul>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built from escaped parts above.
}

/**
 * Print the site logo, falling back to the site name as text.
 */
function cloudforce_branding() {
	if ( has_custom_logo() ) {
		the_custom_logo();

		return;
	}

	printf(
		'<a href="%1$s" rel="home">%2$s</a>',
		esc_url( home_url( '/' ) ),
		esc_html( get_bloginfo( 'name' ) )
	);
}
