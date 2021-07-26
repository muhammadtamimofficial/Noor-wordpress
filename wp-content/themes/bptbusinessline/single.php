<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			
			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation( array(
					'next_text' => '<span class="screen-reader-text">' . __( 'Next post', 'bptbusinessline' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous post', 'bptbusinessline' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
</div>
<!-- End Single News Area -->

<?php
get_sidebar();
get_footer();
