<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BusinessLine
 */

get_header();
?>

<!-- Start Blog Area -->
<div class="col-md-9">
	<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		the_posts_pagination();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div>
<!-- End Blog Area -->

<?php
get_sidebar();
get_footer();
