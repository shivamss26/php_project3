<?php
/**
 * Header Options
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_header_options',
	array(
		'panel' => 'instant_news_theme_options',
		'title' => esc_html__( 'Header Options', 'instant-news' ),
	)
);

// Header Options - Enable Topbar Section.
$wp_customize->add_setting(
	'instant_news_enable_topbar_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'instant_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_enable_topbar_section',
		array(
			'label'   => esc_html__( 'Enable Topbar Section', 'instant-news' ),
			'section' => 'instant_news_header_options',
		)
	)
);

// Header Section - Advertisement.
$wp_customize->add_setting(
	'instant_news_header_advertisement',
	array(
		'default'           => '',
		'sanitize_callback' => 'instant_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'instant_news_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement Image', 'instant-news' ),
			'section'  => 'instant_news_header_options',
			'settings' => 'instant_news_header_advertisement',
		)
	)
);

// Header Section - Advertisement URL.
$wp_customize->add_setting(
	'instant_news_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'instant_news_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'instant-news' ),
		'section'  => 'instant_news_header_options',
		'settings' => 'instant_news_header_advertisement_url',
		'type'     => 'url',
	)
);
