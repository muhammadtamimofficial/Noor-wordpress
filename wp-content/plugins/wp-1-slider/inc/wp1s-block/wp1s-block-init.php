<?php
/**
 * Handler for [etl_guten_block] shortcode
 *
 * @param $atts
 *
 * @return string
 */
function wp1s_block_handler($atts)
{
	$atts = shortcode_atts([
		'heading' => __('WP-1-Slider Title'),
		'heading_tag' => 'h2',
		'wp1s_id' => '',
	], $atts, 'wp1s_guten_block');

	return wp1s_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'wp1s_id' ]);
}

add_shortcode('wp1s_guten_block', 'wp1s_block_handler');

/**
 * Handler for post title block
 * @param $atts
 *
 * @return string
 */
function wp1s_block_render_handler($atts)
{
	return wp1s_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'wp1s_id' ]);
}

/**
 * Output the post title wrapped in a heading
 *
 * @param int $etl_id The post ID
 * @param string $heading Allows : h2,h3,h4 only
 *
 * @return string
 */
function wp1s_block_renderer($heading,$heading_tag,$wp1s_id)
{	
	$ret = '';
	if(!empty($heading)){
		$ret .= "<$heading_tag>$heading</$heading_tag>";
	}

	if($wp1s_id!=null){
		$sht = "[wp1s id='$wp1s_id']";
		$title = do_shortcode($sht);
		$ret .= "$title";
	}

	return $ret;
}

/**
 * Register block
 */
add_action('init', function () {
	// Skip block registration if Gutenberg is not enabled/merged.
	if (!function_exists('register_block_type')) {
		return;
	}
	$dir = dirname(__FILE__);

			wp_enqueue_style( 'wp1s-frontend-style', WP1S_CSS_DIR . '/wp1s-frontend-style.css', false, WP1S_VERSION );
            wp_enqueue_style( 'wp1s-bxslider-style', WP1S_CSS_DIR . '/jquery.bxslider.css', false, WP1S_VERSION );
            wp_enqueue_style( 'wp1s-responsive-style', WP1S_CSS_DIR . '/wp1s-responsive.css', false, WP1S_VERSION );
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'wp1s-jquery-video', WP1S_JS_DIR . '/jquery.fitvids.js', array( 'jquery' ), WP1S_VERSION );
            wp_enqueue_script( 'wp1s-jquery-bxslider-min', WP1S_JS_DIR . '/jquery.bxslider.min.js', array( 'jquery' ), WP1S_VERSION );
            wp_enqueue_script( 'wp1s-frontend-script', WP1S_JS_DIR . '/wp1s-frontend-script.js', array( 'jquery', 'wp1s-jquery-bxslider-min' ), WP1S_VERSION );


	$index_js = 'wp1s-block.js';
	wp_register_script(
		'wp1s-block-script',
		plugins_url($index_js, __FILE__),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-components',
			'wp-editor'
		),
		filemtime("$dir/$index_js")
	);

	$wp1s_logos_array = get_wp1s_logos();
	wp_localize_script( 'wp1s-block-script', 'WP1S_logos_array', $wp1s_logos_array);

	register_block_type('wp1s-display-block/wp1s-widget', array(
		'editor_script' => 'wp1s-block-script',
		'render_callback' => 'wp1s_block_render_handler',
		'attributes' => [			
			'heading' => [
				'type' => 'string',
				'default' => __('WP-1-Slider Title')
			],
			'heading_tag' => [
				'type' => 'string',
				'default' => 'h2'
			],
			'wp1s_id' => [
				'type' => 'string',
				'default' => ''
			],
		]
	));
});

function get_wp1s_logos(){
	$args = array('post_type'=>'wp1slider',
		'post_status'=>'publish',
		'posts_per_page'=>'25'
	);
    // The Query
	$the_query = new WP_Query( $args );

	$wp1s_slider = array(array('value'=>'0','label'=>__('Select Slider')));

    // The Loop
	if ( $the_query->have_posts() ) {
		while($the_query->have_posts()){
			$the_query->the_post();
			global $post;
			$wp1s_slider[] = array('value'=>get_the_ID(), 'label'=> $post->post_name);
		}
	}
	return $wp1s_slider;
}