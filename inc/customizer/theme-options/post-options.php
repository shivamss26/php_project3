<?php
/**
 * Post Options
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'instant-news' ),
		'panel' => 'instant_news_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'instant_news_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'instant_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'instant-news' ),
			'section' => 'instant_news_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'instant_news_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'instant_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'instant-news' ),
			'section' => 'instant_news_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'instant_news_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'instant_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'instant-news' ),
			'section' => 'instant_news_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'instant_news_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'instant_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'instant-news' ),
			'section' => 'instant_news_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'instant_news_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'instant-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'instant_news_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'instant-news' ),
		'section'  => 'instant_news_post_options',
		'settings' => 'instant_news_post_related_post_label',
		'type'     => 'text',
	)
);
