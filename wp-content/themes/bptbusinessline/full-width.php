<?php
/**
 * Template Name: Full Width Template
 *
 * @package BusinessLine
 */

get_header(); ?>
<section class="pad-t60 pad-b30">
<div class="container-fluid full-width-content">
	<div class="row">
		<div class="col-md-12">
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
	</div>
</div>
</section>
<?php
get_footer();
