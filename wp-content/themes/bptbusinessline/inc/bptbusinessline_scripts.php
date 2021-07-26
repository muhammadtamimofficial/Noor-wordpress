<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @package BusinessLine
 */

function bptbusinessline_scripts() {
	$version = wp_get_theme()->get('Version');
	
	wp_enqueue_style( 'Bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, $version, 'all');
	wp_enqueue_style( 'Font-Awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', false, $version, 'all');
	wp_enqueue_style( 'ET-Lineicon', get_template_directory_uri() . '/assets/css/lineicon.css', false, $version, 'all');
	wp_enqueue_style( 'BusinessLine-Animate', get_template_directory_uri() . '/assets/css/animate.css', false, $version, 'all');
	wp_enqueue_style( 'BusinessLine-main-css', get_template_directory_uri() . '/assets/css/bptbusinessline.css', false, $version, 'all');
	wp_enqueue_style( 'BusinessLine-Responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, $version, 'all');
	wp_enqueue_style( 'BusinessLine-Loader', get_template_directory_uri() . '/assets/css/loader.css', false, $version, 'all');
	wp_enqueue_style( 'BusinessLine-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
	wp_enqueue_style( 'BusinessLine-styles', get_stylesheet_uri() );

	// js
	wp_enqueue_script( 'Bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'), $version, true );
	wp_enqueue_script( 'Wow', get_template_directory_uri().'/assets/js/wow.js', array(), $version, true );
	wp_enqueue_script( 'BusinessLine-script.js', get_template_directory_uri().'/assets/js/businessline.js', array(), $version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bptbusinessline_scripts' );
