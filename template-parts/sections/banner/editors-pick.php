<?php
$editor_query = new WP_Query( $editor_news_args );
if ( $editor_query->have_posts() ) {

	$editor_title = get_theme_mod( 'instant_news_editor_pick_title', __( 'Editors Pick', 'instant-news' ) );
	?>

	<div class="editor-picks-part">
		<?php if ( ! empty( $editor_title ) ) { ?>
			<div class="section-header">
				<h3 class="section-title"><?php echo esc_html( $editor_title ); ?></h3>
			</div>
		<?php } ?>
		<div class="editor-picks-wrapper">
			<?php
			while ( $editor_query->have_posts() ) :
				$editor_query->the_post();
				?>
				<div class="mag-post-single banner-gird-single has-image tile-design">
					<div class="mag-post-img">
						<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'post-thumbnail' ); ?>
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
