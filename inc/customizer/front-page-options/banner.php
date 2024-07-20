<?php
/**
 * Banner Section
 *
 * @package Instant News
 */

$wp_customize->add_section(
	'instant_news_banner_section',
	array(
		'panel' => 'instant_news_front_page_options',
		'title' => esc_html__( 'Banner Section', 'instant-news' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'instant_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'instant_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Instant_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'instant_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'instant-news' ),
			'section'  => 'instant_news_banner_section',
			'settings' => 'instant_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'instant_news_enable_banner_section',
		array(
			'selector' => '#instant_news_banner_section .section-link',
			'settings' => 'instant_news_enable_banner_section',
		)
	);
}

// Banner Section - Editor Pick Section Title.
$wp_customize->add_setting(
	'instant_news_editor_pick_title',
	array(
		'default'           => __( 'Editors Pick', 'instant-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'instant_news_editor_pick_title',
	array(
		'label'           => esc_html__( 'Editor\'s Pick Title', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_editor_pick_title',
		'type'            => 'text',
		'active_callback' => 'instant_news_is_banner_posts_section_enabled',
	)
);

// Banner Section - Editor Pick Content Type.
$wp_customize->add_setting(
	'instant_news_editor_pick_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_editor_pick_content_type',
	array(
		'label'           => esc_html__( 'Select Editor\'s Pick Content Type', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_editor_pick_content_type',
		'type'            => 'select',
		'active_callback' => 'instant_news_is_banner_posts_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'instant-news' ),
			'category' => esc_html__( 'Category', 'instant-news' ),
		),
	)
);

for ( $i = 1; $i <= 2; $i++ ) {
	// Banner Section - Editor Pick Select Post.
	$wp_customize->add_setting(
		'instant_news_editor_pick_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'instant_news_editor_pick_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'instant-news' ), $i ),
			'section'         => 'instant_news_banner_section',
			'settings'        => 'instant_news_editor_pick_content_post_' . $i,
			'active_callback' => 'instant_news_is_editor_pick_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => instant_news_get_post_choices(),
		)
	);

}

// Banner Section - Editor Pick Select Category.
$wp_customize->add_setting(
	'instant_news_editor_pick_content_category',
	array(
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_editor_pick_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_editor_pick_content_category',
		'active_callback' => 'instant_news_is_editor_pick_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => instant_news_get_post_cat_choices(),
	)
);

// Banner Section - Editor Pick Horizontal Line.
$wp_customize->add_setting(
	'instant_news_editor_pick_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Instant_News_Customize_Horizontal_Line(
		$wp_customize,
		'instant_news_editor_pick_horizontal_line',
		array(
			'section'         => 'instant_news_banner_section',
			'settings'        => 'instant_news_editor_pick_horizontal_line',
			'active_callback' => 'instant_news_is_banner_posts_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Section Title.
$wp_customize->add_setting(
	'instant_news_main_news_title',
	array(
		'default'           => __( 'Main News', 'instant-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'instant_news_main_news_title',
	array(
		'label'           => esc_html__( 'Main News Title', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_main_news_title',
		'type'            => 'text',
		'active_callback' => 'instant_news_is_banner_posts_section_enabled',
	)
);

// Banner Section - Banner Posts Content Type.
$wp_customize->add_setting(
	'instant_news_main_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_main_news_content_type',
	array(
		'label'           => esc_html__( 'Select Banner\'s Posts Content Type', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_main_news_content_type',
		'type'            => 'select',
		'active_callback' => 'instant_news_is_banner_posts_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'instant-news' ),
			'category' => esc_html__( 'Category', 'instant-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'instant_news_main_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'instant_news_main_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'instant-news' ), $i ),
			'section'         => 'instant_news_banner_section',
			'settings'        => 'instant_news_main_news_content_post_' . $i,
			'active_callback' => 'instant_news_is_main_news_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => instant_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'instant_news_main_news_content_category',
	array(
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_main_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_main_news_content_category',
		'active_callback' => 'instant_news_is_main_news_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => instant_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'instant_news_main_news_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Instant_News_Customize_Horizontal_Line(
		$wp_customize,
		'instant_news_main_news_horizontal_line',
		array(
			'section'         => 'instant_news_banner_section',
			'settings'        => 'instant_news_main_news_horizontal_line',
			'active_callback' => 'instant_news_is_banner_posts_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Section Title.
$wp_customize->add_setting(
	'instant_news_trending_news_title',
	array(
		'default'           => __( 'Trending News', 'instant-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'instant_news_trending_news_title',
	array(
		'label'           => esc_html__( 'Trending News Title', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_trending_news_title',
		'type'            => 'text',
		'active_callback' => 'instant_news_is_banner_posts_section_enabled',
	)
);

// Banner Section - Banner Posts Content Type.
$wp_customize->add_setting(
	'instant_news_trending_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_trending_news_content_type',
	array(
		'label'           => esc_html__( 'Select Banner\'s Posts Content Type', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_trending_news_content_type',
		'type'            => 'select',
		'active_callback' => 'instant_news_is_banner_posts_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'instant-news' ),
			'category' => esc_html__( 'Category', 'instant-news' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'instant_news_trending_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'instant_news_trending_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'instant-news' ), $i ),
			'section'         => 'instant_news_banner_section',
			'settings'        => 'instant_news_trending_news_content_post_' . $i,
			'active_callback' => 'instant_news_is_trending_news_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => instant_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'instant_news_trending_news_content_category',
	array(
		'sanitize_callback' => 'instant_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'instant_news_trending_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'instant-news' ),
		'section'         => 'instant_news_banner_section',
		'settings'        => 'instant_news_trending_news_content_category',
		'active_callback' => 'instant_news_is_trending_news_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => instant_news_get_post_cat_choices(),
	)
);
