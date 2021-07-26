<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BusinessLine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="blog-post wow fadeInUp" data-wow-duration="1s">
	<div class="blog-img">
		<?php bptbusinessline_post_thumbnail(); ?>
		<div class="img-overlay">
			<a href="<?php esc_url(the_permalink());?>"><i class="fa fa-link"></i></a>
		</div>
	</div>
	<div class="post-content">
		<div class="left-part">
			<div class="blog-date">
				<span class="blog_date">
				   <i class="fa fa-bullhorn" aria-hidden="true"></i>
				</span>
				<div class="clr"></div>
				<span class="blog_icon">
					<i class="icon-pencil" aria-hidden="true"></i>
				</span>
			</div>
		</div>
		<div class="right-part">
			<div class="post-title">
				<?php
				if ( is_singular() ) :
					the_title( '<h2 class="entry-title">', '</h2>' );
				else :
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				endif;
				?>
			</div>
			<div class="post-text">
				<?php the_excerpt(); ?>
			</div>
			<div class="post-footer">
				<?php bptbusinessline_posted_on();?>
				<div class="read-more">
					<a href="<?php esc_url(the_permalink());?>" class="btn-read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
