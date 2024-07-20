<?php
if ( ! is_active_sidebar( 'secondary-widgets-section' ) && ! is_active_sidebar( 'tertiary-widgets-section' ) ) {
	$sidebar_classes = 'full-width';
} elseif ( ! is_active_sidebar( 'tertiary-widgets-section' ) ) {
	$sidebar_classes = 'left-content one-sidebar';
} elseif ( ! is_active_sidebar( 'secondary-widgets-section' ) ) {
	$sidebar_classes = 'right-content one-sidebar';
} elseif ( is_active_sidebar( 'primary-widgets-section' ) && is_active_sidebar( 'secondary-widgets-section' ) && is_active_sidebar( 'tertiary-widgets-section' ) ) {
	$sidebar_classes = 'two-sidebars';
} elseif ( ! is_active_sidebar( 'primary-widgets-section' ) ) {
	$sidebar_classes = 'no-primary';
}

if ( is_active_sidebar( 'primary-widgets-section' ) || is_active_sidebar( 'secondary-widgets-section' ) || is_active_sidebar( 'tertiary-widgets-section' ) ) {
	?>
	<div class="main-widget-section">
		<div class="ascendoor-wrapper">
			<div class="main-widget-section-wrap <?php echo esc_attr( $sidebar_classes ); ?>">
				<?php if ( is_active_sidebar( 'primary-widgets-section' ) ) { ?>
					<div class="primary-widgets-section ascendoor-widget-area">
						<?php dynamic_sidebar( 'primary-widgets-section' ); ?>
					</div>
					<?php
				}
				if ( is_active_sidebar( 'secondary-widgets-section' ) ) {
					?>
					<div class="secondary-widgets-section ascendoor-widget-area">
						<?php dynamic_sidebar( 'secondary-widgets-section' ); ?>
					</div>
					<?php
				}
				if ( is_active_sidebar( 'tertiary-widgets-section' ) ) {
					?>
					<div class="tertiary-widgets-section ascendoor-widget-area">
						<?php dynamic_sidebar( 'tertiary-widgets-section' ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
