<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BusinessLine
 */

get_header();
?>
<!-- Start Single News Area -->
<div class="col-md-9">
	<div class="single-blog-post">
		<!-- Start Single News -->
		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<!-- End Single News -->
	</div>
</div>
<!-- End Single News Area -->
<?php
get_sidebar();
get_footer();
