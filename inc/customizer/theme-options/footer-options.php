<?php
/**
 * Footer Options
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_footer_options',
	array(
		'panel' => 'instant_news_theme_options',
		'title' => esc_html__( 'Footer Options', 'instant-news' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'instant-news' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'instant_news_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'instant_news_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'instant-news' ),
		'section'  => 'instant_news_footer_options',
		'settings' => 'instant_news_footer_copyright_text',
		'type'     => 'textarea',
	)
);
