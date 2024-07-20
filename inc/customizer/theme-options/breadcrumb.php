<?php
/**
 * Breadcrumb
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'instant-news' ),
		'panel' => 'instant_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'instant_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'instant_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'instant-news' ),
			'section' => 'instant_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'instant_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'instant_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'instant-news' ),
		'active_callback' => 'instant_news_is_breadcrumb_enabled',
		'section'         => 'instant_news_breadcrumb',
	)
);
