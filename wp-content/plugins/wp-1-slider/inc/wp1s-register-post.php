<?php 
defined('ABSPATH') or die("No script kiddies please!");
$labels = array(
		'name'               => _x( 'WP 1 Sliders', 'post type general name', 'wp-1-slider' ),
		'singular_name'      => _x( 'WP 1 Slider', 'post type singular name', 'wp-1-slider' ),
		'menu_name'          => _x( 'WP 1 Sliders', 'admin menu', 'wp-1-slider' ),
		'name_admin_bar'     => _x( 'WP 1 Slider', 'add new on admin bar', 'wp-1-slider' ),
		'add_new'            => _x( 'Add New', 'WP 1 Slider', 'wp-1-slider' ),
		'add_new_item'       => __( 'Add New WP 1 Slider', 'wp-1-slider' ),
		'new_item'           => __( 'New WP 1 Slider', 'wp-1-slider' ),
		'edit_item'          => __( 'Edit WP 1 Slider', 'wp-1-slider' ),
		'view_item'          => __( 'View WP 1 Slider', 'wp-1-slider' ),
		'all_items'          => __( 'All WP 1 Sliders', 'wp-1-slider' ),
		'search_items'       => __( 'Search WP 1 Sliders', 'wp-1-slider' ),
		'parent_item_colon'  => __( 'Parent WP 1 Sliders:', 'wp-1-slider' ),
		'not_found'          => __( 'No WP 1 Sliders found.', 'wp-1-slider' ),
		'not_found_in_trash' => __( 'No WP 1 Sliders found in Trash.', 'wp-1-slider' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'wp-1-slider' ),
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'   		 => 'dashicons-slides',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'wp-1-slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

	