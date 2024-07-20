<?php
$trending_news_query = new WP_Query( $trending_news_args );
if ( $trending_news_query->have_posts() ) {

	$trending_news_title = get_theme_mod( 'instant_news_trending_news_title', __( 'Trending News', 'instant-news' ) );
	?>

	<div class="trending-part">
		<div class="section-header">
			<h3 class="section-title"><?php echo esc_html( $trending_news_title ); ?></h3>
			<div class="banner-trending-arrows magazine-carousel-slider-navigation header-carousel-nav"></div>
		</div>
		<div class="trending-wrapper banner-trending-carousel">
			<?php
			$i = 1;
			while ( $trending_news_query->have_posts() ) :
				$trending_news_query->the_post();
				?>
				<div class="mag-post-single banner-gird-single has-image list-design">
					<div class="mag-post-img">
						<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'full' ); ?>
						</a>
						<span class="trending-no"><?php echo absint( $i ); ?></span>
					</div>
					<div class="mag-post-detail">
						<h4 class="mag-post-title">
							<?php the_title(); ?>
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
				$i++;
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>

	<?php
}
