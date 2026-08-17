<?php
/**
 * Cloudforce theme functions and definitions.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CLOUDFORCE_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function cloudforce_setup() {
	load_theme_textdomain( 'cloudforce', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 40,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary'          => __( 'Primary Menu', 'cloudforce' ),
			'footer-approach'  => __( 'Footer: Our Approach', 'cloudforce' ),
			'footer-solutions' => __( 'Footer: Solutions', 'cloudforce' ),
			'footer-insights'  => __( 'Footer: Insights', 'cloudforce' ),
			'footer-about'     => __( 'Footer: About', 'cloudforce' ),
			'footer-legal'     => __( 'Footer: Legal', 'cloudforce' ),
		)
	);
}
add_action( 'after_setup_theme', 'cloudforce_setup' );

/**
 * Set the content width.
 */
function cloudforce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cloudforce_content_width', 1088 );
}
add_action( 'after_setup_theme', 'cloudforce_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function cloudforce_scripts() {
	wp_enqueue_style(
		'cloudforce-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		CLOUDFORCE_VERSION
	);

	// style.css carries the theme header; load it so child themes can override.
	wp_enqueue_style( 'cloudforce-style', get_stylesheet_uri(), array( 'cloudforce-main' ), CLOUDFORCE_VERSION );

	wp_enqueue_script(
		'cloudforce-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		CLOUDFORCE_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cloudforce_scripts' );

/**
 * Register widget areas.
 */
function cloudforce_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'cloudforce' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears alongside blog posts and archives.', 'cloudforce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cloudforce_widgets_init' );

/**
 * Add a body class marking pages that use the full-width homepage layout.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function cloudforce_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'archive-view';
	}

	if ( is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'cloudforce_body_classes' );

/**
 * Use a readable excerpt length and ellipsis.
 */
function cloudforce_excerpt_length() {
	return 28;
}
add_filter( 'excerpt_length', 'cloudforce_excerpt_length' );

function cloudforce_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'cloudforce_excerpt_more' );

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-tags.php';
