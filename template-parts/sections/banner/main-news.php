<?php
$main_news_query = new WP_Query( $main_news_args );
if ( $main_news_query->have_posts() ) {

	$main_news_title = get_theme_mod( 'instant_news_main_news_title', __( 'Main News', 'instant-news' ) );
	?>

	<div class="slider-part">
		<div class="section-header">
			<h3 class="section-title"><?php echo esc_html( $main_news_title ); ?></h3>
			<div class="banner-slider-arrows magazine-carousel-slider-navigation header-carousel-nav"></div>
		</div>
		<div class="magazine-slider-wrapper banner-slider magazine-carousel-slider-navigation">
			<?php
			while ( $main_news_query->have_posts() ) :
				$main_news_query->the_post();
				?>
				<div class="mag-post-single banner-gird-single has-image tile-design">
					<div class="mag-post-img">
						<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'full' ); ?>
						</a>
					</div>
					<div class="mag-post-detail">
						<div class="mag-post-category with-background">
							<?php instant_news_categories_list( true ); ?>
						</div>
						<h4 class="mag-post-title">
							<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h4>
						<div class="mag-post-meta">
							<?php
							instant_news_posted_by();
							instant_news_posted_on();
							?>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>

	<?php
}
