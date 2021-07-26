<?php
/**
 * Custom comments template
 *
 * @package bptbusinessline
 */
if ( ! function_exists( 'bpt_comments' ) ){
	function bpt_comments( $comment, $args, $depth ) {
		global $post;
		$author_id = $post->post_author;
		// $GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments. ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
			<div class="pingback-entry"><span class="pingback-heading"><?php echo esc_html__( 'Pingback:', 'bptbusinessline' ); ?></span> <?php comment_author_link(); ?></div>
		<?php
			break;
			default :
			// Proceed with normal comments. ?>
		<li id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment-wrapper clearfix">
			<div class="comment-box">
				<?php echo get_avatar( $comment, 75 ); ?>
				<div class="comment-content">
					<h4>
						<?php comment_author_link(); ?>
						<?php comment_reply_link( array_merge( $args, array(
							'reply_text' => esc_html__( 'Reply', 'bptbusinessline' ),
							'class' => 'comment-reply',
							'depth'      => $depth,
							'max_depth'	 => $args['max_depth'] )
						) ); ?>
					</h4>
					<span><?php  comment_time('F j, Y \a\t h:i A');?></span>
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'bptbusinessline' ); ?></p>
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
			</div>
		</article>
		<?php
			break;
		endswitch; // End comment_type check.
	}
}

// Unset default input field from comment form
if ( ! function_exists( 'bpt_comment_form_below' ) ){
	function bpt_comment_form_below( $fields ) { 
	    $comment_field = $fields['comment']; 
	    unset( $fields['comment'] ); 
	    $fields['comment'] = $comment_field; 
	    return $fields; 
	} 
	add_filter( 'comment_form_fields', 'bpt_comment_form_below' ); 
}

// Add placeholder for Name and Email
if ( ! function_exists( 'bpt_modify_comment_form_fields' ) ){
	function bpt_modify_comment_form_fields($fields){
		$req = get_option('require_name_email');
		$commenter = wp_get_current_commenter();
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
	    $fields['author'] = '<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<input class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" id="author" ' . $aria_req . ' placeholder="' . esc_attr__( 'Your Name *', 'bptbusinessline' ) . '">
				</div>
			</div>';
	    $fields['email'] = '<div class="col-md-4">
				<div class="form-group">
					<input class="form-control" name="email" type="email" placeholder="' . esc_attr__( 'Your Email *', 'bptbusinessline' ) . '"  value="' . esc_attr(  $commenter['comment_author_email'] ) .'" ' . $aria_req . '>
				</div>
			</div>';
		$fields['url'] = '<div class="col-md-4">
				<div class="form-group">
					<input class="form-control" id="url" name="url" placeholder="' . esc_attr__( 'http://your-site-name.com', 'bptbusinessline' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
				</div>
			</div>
		</div>';

	    return $fields;
	}
	add_filter('comment_form_default_fields','bpt_modify_comment_form_fields');
}

/**
* Remove the original comment button
*/
if ( ! function_exists( 'bpt_comment_form_submit_button' ) ){
	function bpt_comment_form_submit_button($button) {
		$arg['class_submit'] = 'btn btn-primary';
    	return $arg;
	}
	add_filter('comment_form_defaults', 'bpt_comment_form_submit_button');
}