<?php
/**
 * Instant News Theme Customizer
 *
 * @package Instant News
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function instant_news_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'instant_news_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'instant_news_customize_partial_blogdescription',
			)
		);
	}

	// Homepage Settings - Enable Homepage Content.
	$wp_customize->add_setting(
		'instant_news_enable_frontpage_content',
		array(
			'default'           => false,
			'sanitize_callback' => 'instant_news_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'instant_news_enable_frontpage_content',
		array(
			'label'           => esc_html__( 'Enable Homepage Content', 'instant-news' ),
			'description'     => esc_html__( 'Check to enable content on static homepage.', 'instant-news' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => 'instant_news_is_static_homepage_enabled',
		)
	);

	// Upsell Section.
	$wp_customize->add_section(
		new Instant_News_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Instant News Pro', 'instant-news' ),
				'button_text'      => __( 'Buy Pro', 'instant-news' ),
				'url'              => 'https://ascendoor.com/themes/instant-news-pro/',
				'background_color' => '#ea0000',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'instant_news_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function instant_news_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function instant_news_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function instant_news_customize_preview_js() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'instant-news-customizer', get_template_directory_uri() . '/assets/js/customizer' . $min . '.js', array( 'customize-preview' ), INSTANT_NEWS_VERSION, true );
}
add_action( 'customize_preview_init', 'instant_news_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function instant_news_custom_control_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'instant-news-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'instant-news-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'instant_news_custom_control_scripts' );
