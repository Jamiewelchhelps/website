<?php
/**
 * Customizer settings.
 *
 * Every piece of homepage copy is registered here so the site can be edited
 * from Appearance > Customize without touching template files. Defaults are
 * the live Cloudforce copy, so a fresh activation renders the real site.
 *
 * @package Cloudforce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default homepage copy, keyed by setting id.
 *
 * Kept in one place so templates and the Customizer cannot drift apart.
 *
 * @return array<string, string>
 */
function cloudforce_defaults() {
	return array(
		// Hero.
		'hero_eyebrow'        => __( 'Cloudforce', 'cloudforce' ),
		'hero_title'          => __( 'The Frontier Force.', 'cloudforce' ),
		'hero_lead'           => __( 'Cloudforce is the Frontier Firm behind nebulaONE®, the leading AI platform for public-sector organizations. For over a decade we’ve designed and deployed cloud and AI solutions that empower our clients to achieve more.', 'cloudforce' ),
		'hero_cta_label'      => __( 'Contact Us', 'cloudforce' ),
		'hero_cta_url'        => '/contact-us',
		'hero_cta2_label'     => __( 'Explore Our Approach', 'cloudforce' ),
		'hero_cta2_url'       => '/our-approach/',

		// Promo banner.
		'promo_title'         => __( 'Microsoft’s 2025 Education Partner of the Year', 'cloudforce' ),
		'promo_text'          => __( 'Empowering universities worldwide through equitable, secure AI with nebulaONE®.', 'cloudforce' ),
		'promo_url'           => '',

		// Approach section.
		'approach_title'      => __( 'Systems Thinking.', 'cloudforce' ),
		'approach_body'       => __( 'We may be tech experts, but our process takes far more than technology into account. We start with your long-term business goals, focus next on the people using your systems, and only then turn our attention to your architecture and applications. It takes a little longer up-front, but saves time and headaches down the line – because even the most elegantly designed system is only as good as the people using it day-to-day.', 'cloudforce' ),
		'approach_cta_label'  => __( 'Explore Our Smart Process', 'cloudforce' ),
		'approach_cta_url'    => '/our-approach/',

		// Focus section.
		'focus_title'         => __( 'Areas of (Hyper)focus.', 'cloudforce' ),
		'focus_body'          => __( 'If you’re looking for generalists, look elsewhere. We live and breathe Microsoft’s Cloud and AI offerings, and we know everything there is to know about them (seriously, quiz us). In an industry that’s evolving at hyper speed, we stay neck-to-neck with every new cloud service and GenAI evolution — not just because it’s our job, but because it satisfies the deepest hunger for knowledge in our technophile hearts.', 'cloudforce' ),
		'focus_cta_label'     => __( 'See What We Do', 'cloudforce' ),
		'focus_cta_url'       => '/solutions/',

		// Capabilities.
		'cap_1_title'         => __( 'Build', 'cloudforce' ),
		'cap_1_text'          => __( 'We build systems within the Microsoft Cloud that are nimble, scalable and responsive, starting from scratch and radically rethinking what it takes to build a solution that serves you.', 'cloudforce' ),
		'cap_2_title'         => __( 'Migrate', 'cloudforce' ),
		'cap_2_text'          => __( 'We migrate existing systems into the cloud, freeing you from the tyranny of local servers and giving your workforce the flexibility to work anywhere from airports and client offices to treehouses and beachside bungalows.', 'cloudforce' ),
		'cap_3_title'         => __( 'Maintain', 'cloudforce' ),
		'cap_3_text'          => __( 'We maintain cloud-based systems, handling every aspect of security, scalability, responsiveness, compliance, and reporting so you can focus on growing your company instead of taming your tech.', 'cloudforce' ),
		'cap_4_title'         => __( 'Optimize', 'cloudforce' ),
		'cap_4_text'          => __( 'We continuously dial in every resource in your environment to balance capability with costs, because an optimized environment is the only way to realize the true promise of the cloud.', 'cloudforce' ),
		'cap_5_title'         => __( 'Imagine', 'cloudforce' ),
		'cap_5_text'          => __( 'We help you imagine the Art of the Possible with bleeding-edge AI services, moving from ideas to reality in record time with our revolutionary nebulaONE® AI Gateway.', 'cloudforce' ),

		// Team section.
		'team_title'          => __( 'Technologists on Call.', 'cloudforce' ),
		'team_body'           => __( 'You shouldn’t have to sit on hold with someone halfway across the world just to get results. We understand the value of having direct access to the right resource at the right time: the person who deployed your solution is the one who’ll be there to support you, whether it’s face-to-face or over the phone. And you can count on that person to know their stuff: we only hire Microsoft-certified administrators, engineers and architects.', 'cloudforce' ),
		'team_cta_label'      => __( 'Meet Our Staff', 'cloudforce' ),
		'team_cta_url'        => '/about-us/',

		// Contact section.
		'contact_title'       => __( 'Your turn.', 'cloudforce' ),
		'contact_body'        => __( 'So enough about us, let’s talk about you! Submit this form and we’ll reach out to discuss how cloud solutions can make your business work faster, safer, and smarter.', 'cloudforce' ),
		'contact_form'        => '',
		'contact_cta_label'   => __( 'Talk To A Human', 'cloudforce' ),
		'contact_cta_url'     => '/contact-us',

		// Awards strip.
		'awards_title'        => __( 'Recognized for the work and the workplace.', 'cloudforce' ),

		// Contact details, used in the footer and contact section.
		'address'             => __( '120 Waterfront Street, 5th floor National Harbor, MD 20745', 'cloudforce' ),
		'phone'               => '202.803.6500',
		'social_facebook'     => '',
		'social_linkedin'     => '',
		'copyright'           => __( 'All Rights Reserved', 'cloudforce' ),
	);
}

/**
 * Fetch a homepage setting, falling back to the shipped default.
 *
 * @param string $key Setting id, without the cloudforce_ prefix.
 * @return string
 */
function cloudforce_get( $key ) {
	$defaults = cloudforce_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

	return get_theme_mod( 'cloudforce_' . $key, $default );
}

/**
 * Register Customizer sections, settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function cloudforce_customize_register( $wp_customize ) {
	$defaults = cloudforce_defaults();

	// Make the core blogname/blogdescription update live.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Panel holding every homepage section.
	 */
	$wp_customize->add_panel(
		'cloudforce_homepage',
		array(
			'title'       => __( 'Homepage Content', 'cloudforce' ),
			'description' => __( 'Copy for each section of the homepage. Leave a field empty to hide that element.', 'cloudforce' ),
			'priority'    => 30,
		)
	);

	/**
	 * Section definitions: id => [title, [field => control type]].
	 *
	 * Control types used: text, textarea, url, image.
	 */
	$sections = array(
		'hero'     => array(
			'title'  => __( 'Hero', 'cloudforce' ),
			'fields' => array(
				'hero_eyebrow'    => 'text',
				'hero_title'      => 'text',
				'hero_lead'       => 'textarea',
				'hero_cta_label'  => 'text',
				'hero_cta_url'    => 'url',
				'hero_cta2_label' => 'text',
				'hero_cta2_url'   => 'url',
			),
		),
		'promo'    => array(
			'title'  => __( 'Hero Promo Banner', 'cloudforce' ),
			'fields' => array(
				'promo_title' => 'text',
				'promo_text'  => 'textarea',
				'promo_url'   => 'url',
				'promo_image' => 'image',
			),
		),
		'approach' => array(
			'title'  => __( 'Approach', 'cloudforce' ),
			'fields' => array(
				'approach_title'     => 'text',
				'approach_body'      => 'textarea',
				'approach_cta_label' => 'text',
				'approach_cta_url'   => 'url',
			),
		),
		'focus'    => array(
			'title'  => __( 'Areas of Focus', 'cloudforce' ),
			'fields' => array(
				'focus_title'     => 'text',
				'focus_body'      => 'textarea',
				'focus_cta_label' => 'text',
				'focus_cta_url'   => 'url',
			),
		),
		'caps'     => array(
			'title'  => __( 'Capabilities', 'cloudforce' ),
			'fields' => array(
				'cap_1_title' => 'text',
				'cap_1_text'  => 'textarea',
				'cap_2_title' => 'text',
				'cap_2_text'  => 'textarea',
				'cap_3_title' => 'text',
				'cap_3_text'  => 'textarea',
				'cap_4_title' => 'text',
				'cap_4_text'  => 'textarea',
				'cap_5_title' => 'text',
				'cap_5_text'  => 'textarea',
			),
		),
		'team'     => array(
			'title'  => __( 'Team', 'cloudforce' ),
			'fields' => array(
				'team_title'     => 'text',
				'team_body'      => 'textarea',
				'team_cta_label' => 'text',
				'team_cta_url'   => 'url',
			),
		),
		'contact'  => array(
			'title'  => __( 'Contact', 'cloudforce' ),
			'fields' => array(
				'contact_title'     => 'text',
				'contact_body'      => 'textarea',
				'contact_form'      => 'textarea',
				'contact_cta_label' => 'text',
				'contact_cta_url'   => 'url',
			),
		),
		'awards'   => array(
			'title'  => __( 'Awards & Badges', 'cloudforce' ),
			'fields' => array(
				'awards_title'   => 'text',
				'awards_image_1' => 'image',
				'awards_image_2' => 'image',
				'awards_image_3' => 'image',
				'awards_image_4' => 'image',
			),
		),
	);

	foreach ( $sections as $section_id => $section ) {
		$wp_customize->add_section(
			'cloudforce_' . $section_id,
			array(
				'title' => $section['title'],
				'panel' => 'cloudforce_homepage',
			)
		);

		foreach ( $section['fields'] as $field => $type ) {
			cloudforce_add_field( $wp_customize, 'cloudforce_' . $section_id, $field, $type, $defaults );
		}
	}

	/**
	 * Contact details section, used by the footer on every page.
	 */
	$wp_customize->add_section(
		'cloudforce_details',
		array(
			'title'       => __( 'Contact Details & Footer', 'cloudforce' ),
			'description' => __( 'Address, phone and social links shown in the footer sitewide.', 'cloudforce' ),
			'priority'    => 31,
		)
	);

	$detail_fields = array(
		'address'         => 'textarea',
		'phone'           => 'text',
		'social_facebook' => 'url',
		'social_linkedin' => 'url',
		'copyright'       => 'text',
	);

	foreach ( $detail_fields as $field => $type ) {
		cloudforce_add_field( $wp_customize, 'cloudforce_details', $field, $type, $defaults );
	}
}
add_action( 'customize_register', 'cloudforce_customize_register' );

/**
 * Register one setting plus its control.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 * @param string               $section      Section id to attach to.
 * @param string               $field        Field key.
 * @param string               $type         One of text, textarea, url, image.
 * @param array                $defaults     Default values keyed by field.
 */
function cloudforce_add_field( $wp_customize, $section, $field, $type, $defaults ) {
	$setting_id = 'cloudforce_' . $field;
	$default    = isset( $defaults[ $field ] ) ? $defaults[ $field ] : '';

	switch ( $type ) {
		case 'url':
			$sanitize = 'esc_url_raw';
			break;
		case 'textarea':
			$sanitize = 'wp_kses_post';
			break;
		case 'image':
			$sanitize = 'absint';
			break;
		default:
			$sanitize = 'sanitize_text_field';
	}

	$wp_customize->add_setting(
		$setting_id,
		array(
			'default'           => $default,
			'sanitize_callback' => $sanitize,
			'transport'         => 'refresh',
		)
	);

	$label = ucwords( str_replace( '_', ' ', $field ) );

	if ( 'image' === $type ) {
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'     => $label,
					'section'   => $section,
					'mime_type' => 'image',
				)
			)
		);

		return;
	}

	$wp_customize->add_control(
		$setting_id,
		array(
			'label'   => $label,
			'section' => $section,
			'type'    => 'textarea' === $type ? 'textarea' : ( 'url' === $type ? 'url' : 'text' ),
		)
	);
}

/**
 * Live-preview JS for the title and tagline.
 */
function cloudforce_customize_preview_js() {
	wp_enqueue_script(
		'cloudforce-customizer',
		get_template_directory_uri() . '/assets/js/customizer.js',
		array( 'customize-preview' ),
		CLOUDFORCE_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'cloudforce_customize_preview_js' );
