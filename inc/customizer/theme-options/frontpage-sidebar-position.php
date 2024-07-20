<?php
/**
 * Frontpage Sidebar Position
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_frontpage_sidebar',
	array(
		'panel' => 'instant_news_theme_options',
		'title' => esc_html__( 'Frontpage Sidebar Position', 'instant-news' ),
	)
);
