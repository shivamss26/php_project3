<?php
/**
 * Pagination
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_pagination',
	array(
		'panel' => 'instant_news_theme_options',
		'title' => esc_html__( 'Pagination', 'instant-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'instant_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'instant_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'instant-news' ),
			'section'  => 'instant_news_pagination',
			'settings' => 'instant_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'instant_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'instant-news' ),
		'section'         => 'instant_news_pagination',
		'settings'        => 'instant_news_pagination_type',
		'active_callback' => 'instant_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'instant-news' ),
			'numeric' => __( 'Numeric', 'instant-news' ),
		),
	)
);
