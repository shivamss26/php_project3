<?php
/**
 * Typography
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_typography',
	array(
		'panel' => 'instant_news_theme_options',
		'title' => esc_html__( 'Typography', 'instant-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'instant_news_site_title_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'instant_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'instant_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'instant-news' ),
		'section'  => 'instant_news_typography',
		'settings' => 'instant_news_site_title_font',
		'type'     => 'select',
		'choices'  => instant_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'instant_news_site_description_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'instant_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'instant_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'instant-news' ),
		'section'  => 'instant_news_typography',
		'settings' => 'instant_news_site_description_font',
		'type'     => 'select',
		'choices'  => instant_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'instant_news_header_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'instant_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'instant_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'instant-news' ),
		'section'  => 'instant_news_typography',
		'settings' => 'instant_news_header_font',
		'type'     => 'select',
		'choices'  => instant_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'instant_news_body_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'instant_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'instant_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'instant-news' ),
		'section'  => 'instant_news_typography',
		'settings' => 'instant_news_body_font',
		'type'     => 'select',
		'choices'  => instant_news_get_all_google_font_families(),
	)
);
