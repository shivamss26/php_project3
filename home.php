<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Instant News
 */

get_header();
$grid_column = get_theme_mod( 'instant_news_archive_grid_column', 'grid-column-3' );
?>
<main id="primary" class="site-main">
	<div class="magazine-inside-wrap">

		<?php
		do_action( 'instant_news_breadcrumb' );

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>

			<div class="magazine-archive-layout grid-layout <?php echo esc_attr( $grid_column ); ?>">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				?>
			</div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
	<?php echo do_action( 'instant_news_posts_pagination' ); ?>
</main><!-- #main -->

<?php
if ( instant_news_is_sidebar_enabled() ) {
	get_sidebar();
}

get_footer();
