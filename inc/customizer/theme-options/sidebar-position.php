<?php
/**
 * Sidebar Position
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'instant-news' ),
		'panel' => 'instant_news_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'instant_news_sidebar_position',
	array(
		'sanitize_callback' => 'instant_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'instant_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'instant-news' ),
		'section' => 'instant_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'instant-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'instant-news' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'instant_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'instant_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'instant_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'instant-news' ),
		'section' => 'instant_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'instant-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'instant-news' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'instant_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'instant_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'instant_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'instant-news' ),
		'section' => 'instant_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'instant-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'instant-news' ),
		),
	)
);
