<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package BusinessLine
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="blog-img">
	<?php bptbusinessline_post_thumbnail(); ?>
</div>
<div class="post-content">
	<div class="left-part">
		<div class="blog-date">
			<span class="blog_date">
				<i class="fa fa-cogs" aria-hidden="true"></i>
			</span>
		</div>
	</div>
	<div class="right-part">
		<div class="post-title">
			<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
		</div>
		<br>
		<div class="post-text">
			<?php 
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bptbusinessline' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bptbusinessline' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->
<div class="clearfix"></div>