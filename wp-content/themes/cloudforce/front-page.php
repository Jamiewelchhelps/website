<?php
/**
 * The homepage template.
 *
 * Renders the marketing sections in order. All copy comes from the Customizer
 * (Appearance > Customize > Homepage Content), so this file rarely needs edits.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part( 'template-parts/sections/hero' );
get_template_part( 'template-parts/sections/approach' );
get_template_part( 'template-parts/sections/focus' );
get_template_part( 'template-parts/sections/team' );
get_template_part( 'template-parts/sections/awards' );
get_template_part( 'template-parts/sections/contact' );

get_footer();
