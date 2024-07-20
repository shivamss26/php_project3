<?php

// Posts Grid Widget.
require get_template_directory() . '/inc/widgets/posts-grid-widget.php';

// Posts List Widget.
require get_template_directory() . '/inc/widgets/posts-list-widget.php';

// Posts Small List Widget.
require get_template_directory() . '/inc/widgets/posts-small-list-widget.php';

// Posts Tile Widget.
require get_template_directory() . '/inc/widgets/posts-tile-widget.php';

// Posts Grid and List Widget.
require get_template_directory() . '/inc/widgets/posts-grid-and-list-widget.php';

// Trending Posts Carousel Widget.
require get_template_directory() . '/inc/widgets/trending-posts-carousel-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function instant_news_pro_register_widgets() {

	register_widget( 'Instant_News_Posts_Grid_Widget' );

	register_widget( 'Instant_News_Posts_List_Widget' );

	register_widget( 'Instant_News_Posts_Small_List_Widget' );

	register_widget( 'Instant_News_Posts_Tile_Widget' );

	register_widget( 'Instant_News_Posts_Grid_And_List_Widget' );

	register_widget( 'Instant_News_Trending_Posts_Carousel_Widget' );

	register_widget( 'Instant_News_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'instant_news_pro_register_widgets' );
