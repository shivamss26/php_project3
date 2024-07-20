<?php

/**
 * Active Callbacks
 *
 * @package Instant News
 */

// Theme Options.
function instant_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'instant_news_enable_pagination' )->value() );
}
function instant_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'instant_news_enable_breadcrumb' )->value() );
}

// Flash News Section.
function instant_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'instant_news_enable_flash_news_section' )->value() );
}
function instant_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_flash_news_content_type' )->value();
	return ( instant_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function instant_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_flash_news_content_type' )->value();
	return ( instant_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section.
function instant_news_is_banner_posts_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'instant_news_enable_banner_section' )->value() );
}
// Main News
function instant_news_is_main_news_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_main_news_content_type' )->value();
	return ( instant_news_is_banner_posts_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function instant_news_is_main_news_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_main_news_content_type' )->value();
	return ( instant_news_is_banner_posts_section_enabled( $control ) && ( 'category' === $content_type ) );
}
// Editor Pick
function instant_news_is_editor_pick_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_editor_pick_content_type' )->value();
	return ( instant_news_is_banner_posts_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function instant_news_is_editor_pick_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_editor_pick_content_type' )->value();
	return ( instant_news_is_banner_posts_section_enabled( $control ) && ( 'category' === $content_type ) );
}
// Trending News
function instant_news_is_trending_news_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_trending_news_content_type' )->value();
	return ( instant_news_is_banner_posts_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function instant_news_is_trending_news_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'instant_news_trending_news_content_type' )->value();
	return ( instant_news_is_banner_posts_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function instant_news_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
