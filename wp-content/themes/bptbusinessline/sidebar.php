<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BusinessLine
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area">
	<!-- Start Sidebar Area -->
	<div class="col-md-3">
		<div class="right-sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
	<!-- End Sidebar Area -->
</aside><!-- #secondary -->
