<?php
/**
 * Excerpt
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_excerpt_options',
	array(
		'panel' => 'instant_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'instant-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'instant_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'instant_news_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'instant_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'instant-news' ),
		'section'     => 'instant_news_excerpt_options',
		'settings'    => 'instant_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);
