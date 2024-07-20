<?php
/**
 * Archive Layout
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'instant-news' ),
		'panel' => 'instant_news_theme_options',
	)
);

// Archive Layout - Grid Style.
$wp_customize->add_setting(
	'instant_news_archive_grid_column',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_archive_grid_column',
	array(
		'label'   => esc_html__( 'Grid Style', 'instant-news' ),
		'section' => 'instant_news_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'grid-column-2' => __( 'Column 2', 'instant-news' ),
			'grid-column-3' => __( 'Column 3', 'instant-news' ),
		),
	)
);
