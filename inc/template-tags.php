<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Instant News
 */

if ( ! function_exists( 'instant_news_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function instant_news_posted_on() {
		if ( get_theme_mod( 'instant_news_post_hide_date', false ) ) {
			return;
		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $time_string . '</a>';

		echo '<span class="post-date">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'instant_news_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function instant_news_posted_by() {
		if ( get_theme_mod( 'instant_news_post_hide_author', false ) ) {
			return;
		}
		$byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

		echo '<span class="post-author"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'instant_news_categories_list' ) ) :
		/**
		 * Prints HTML with meta information for the categories.
		 */
	function instant_news_categories_list( $with_background = false ) {
		if ( 'post' === get_post_type() ) {

			$categories = get_the_category();
			$separator  = $with_background ? '' : ', ';
			$output     = '';
			if ( ! empty( $categories ) ) {
				foreach ( $categories as $category ) {
					$category_color = get_term_meta( $category->term_id, '_category_color', true );
					$style_attr     = '';
					if ( ! empty( $category_color ) ) {
						if ( $with_background ) {
							$style_attr = ' style="background-color: #' . esc_attr( $category_color ) . ';"';
						} else {
							$style_attr = ' style="color: #' . esc_attr( $category_color ) . ';"';
						}
					}
					$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '"' . $style_attr . '>' . esc_html( $category->name ) . '</a>' . $separator;
				}
				echo trim( $output, $separator );
			}
		}
	}
endif;

if ( ! function_exists( 'instant_news_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function instant_news_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
			$hide_tag = get_theme_mod( 'instant_news_post_hide_tags', false );

			if ( ! $hide_tag ) {
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'instant-news' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'instant-news' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'instant-news' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'instant_news_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function instant_news_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
