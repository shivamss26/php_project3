<?php
if ( ! get_theme_mod( 'instant_news_enable_banner_section', false ) ) {
	return;
}

$main_content_ids           = $editor_content_ids = $trending_content_ids = array();
$main_news_content_type     = get_theme_mod( 'instant_news_main_news_content_type', 'post' );
$editor_news_content_type   = get_theme_mod( 'instant_news_editor_pick_content_type', 'post' );
$trending_news_content_type = get_theme_mod( 'instant_news_trending_news_content_type', 'post' );

if ( $main_news_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$main_content_ids[] = get_theme_mod( 'instant_news_main_news_content_post_' . $i );
	}
	$main_news_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $main_content_ids ) ) ) {
		$main_news_args['post__in'] = array_filter( $main_content_ids );
		$main_news_args['orderby']  = 'post__in';
	} else {
		$main_news_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'instant_news_main_news_content_category' );
	$main_news_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}

$main_news_args = apply_filters( 'instant_news_main_banner_section_args', $main_news_args );

if ( $editor_news_content_type === 'post' ) {
	for ( $i = 1; $i <= 2; $i++ ) {
		$editor_content_ids[] = get_theme_mod( 'instant_news_editor_pick_content_post_' . $i );
	}
	$editor_news_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 2 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $editor_content_ids ) ) ) {
		$editor_news_args['post__in'] = array_filter( $editor_content_ids );
		$editor_news_args['orderby']  = 'post__in';
	} else {
		$editor_news_args['orderby'] = 'date';
	}
} else {
	$cat_content_id   = get_theme_mod( 'instant_news_editor_pick_content_category' );
	$editor_news_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 2 ),
	);
}
$editor_news_args = apply_filters( 'instant_news_main_banner_section_args', $editor_news_args );

if ( $trending_news_content_type === 'post' ) {
	for ( $i = 1; $i <= 6; $i++ ) {
		$trending_content_ids[] = get_theme_mod( 'instant_news_trending_news_content_post_' . $i );
	}
	$trending_news_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $trending_content_ids ) ) ) {
		$trending_news_args['post__in'] = array_filter( $trending_content_ids );
		$trending_news_args['orderby']  = 'post__in';
	} else {
		$trending_news_args['orderby'] = 'date';
	}
} else {
	$cat_content_id     = get_theme_mod( 'instant_news_trending_news_content_category' );
	$trending_news_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}
$trending_news_args = apply_filters( 'instant_news_main_banner_section_args', $trending_news_args );

instant_news_render_banner_section( $main_news_args, $editor_news_args, $trending_news_args );

/**
 * Render Banner Section.
 */
function instant_news_render_banner_section( $main_news_args, $editor_news_args, $trending_news_args ) {
	?>

	<section id="instant_news_banner_section" class="banner-section banner-section-with-trending-editor">
		<?php
		if ( is_customize_preview() ) :
			instant_news_section_link( 'instant_news_banner_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="banner-section-wrapper">
				<?php
				require get_template_directory() . '/template-parts/sections/banner/editors-pick.php';
				require get_template_directory() . '/template-parts/sections/banner/main-news.php';
				require get_template_directory() . '/template-parts/sections/banner/trending-news.php';
				?>
			</div>
		</div>
	</section>

	<?php

}
