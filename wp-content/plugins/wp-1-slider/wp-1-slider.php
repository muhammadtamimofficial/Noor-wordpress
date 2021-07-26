<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Plugin Name: WP 1 Slider
 * Plugin URI:  http://accesspressthemes.com/wordpress-plugins/
 * Description: An ultimate WordPress slider Plugin | Many layout | Many useful features | Many configuration options | Easy to use!
 * Version:     1.2.9
 * Author:      AccessPress Themes
 * Author URI:  http://accesspressthemes.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages/
 * Text Domain: wp-1-slider
 * */
/**
 * Declartion of necessary constants for plugin
 * */
require_once('inc/wp1s-resizer.php');
defined( 'WP1S_VERSION' ) or define( 'WP1S_VERSION', '1.2.9' ); //plugin version
defined( 'WP1S_TD' ) or define( 'WP1S_TD', 'wp-1-slider' ); //plugin's text domain
defined( 'WP1S_IMG_DIR' ) or define( 'WP1S_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' ); //plugin image directory
defined( 'WP1S_JS_DIR' ) or define( 'WP1S_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );  //plugin js directory
defined( 'WP1S_CSS_DIR' ) or define( 'WP1S_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' ); // plugin css dir
defined( 'WP1S_PATH' ) or define( 'WP1S_PATH', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( 'WP1S_Class' ) ) {

    class WP1S_Class{

        var $wp1s_settings;

        /**
         * Initializes the plugin functions
         */
        function __construct(){

            add_action( 'init', array( $this, 'plugin_text_domain' ) ); //loads text domain for translation ready
            add_action( 'wp_enqueue_scripts', array( $this, 'wp1s_register_assets' ) ); //registers scripts and styles for front end
            add_action( 'init', array( $this, 'wp1s_register_post_type' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'wp1s_register_admin_assets' ) ); //register plugin scripts and css in wp-admin
            add_action( 'add_meta_boxes', array( $this, 'wp1s_add_option_metabox' ) );
            add_action( 'add_meta_boxes', array( $this, 'wp1s_add_slides_metabox' ) );
            add_action( 'add_meta_boxes', array( $this, 'wp1s_shortcode_usage_metabox' ) );
            add_action( 'add_meta_boxes', array( $this, 'wp1s_settings_metabox' ) );
            add_action( 'save_post', array( $this, 'wp1s_meta_save' ) );
            add_action( 'save_post', array( $this, 'wp1s_meta_option_save' ) );
            add_action( 'save_post', array( $this, 'wp1s_meta_setting_save' ) );
            add_action( 'admin_footer', array( $this, 'wp1s_form_footer_function' ) );
            add_shortcode( 'wp1s', array( $this, 'wp1s_generate_shortcode' ) );
            add_action( 'admin_head-post-new.php', array( $this, 'wp1s_posttype_admin_css' ) );
            add_action( 'admin_head-post.php', array( $this, 'wp1s_posttype_admin_css' ) );
            add_filter( 'post_row_actions', array( $this, 'wp1s_remove_row_actions' ), 10, 1 );
            add_filter( 'manage_wp1slider_posts_columns', array( $this, 'wp1s_columns_head' ) );
            add_action( 'manage_wp1slider_posts_custom_column', array( $this, 'wp1s_columns_content' ), 10, 2 );
            add_action( 'widgets_init', array( $this, 'wp1s_register_widget' ) );
            add_action( 'media_buttons', array( $this, 'wp1s_media_shortcode_buttons' ) );
            add_action( 'admin_footer', array( $this, 'wp1s_media_shortcode_popup' ) );
            add_action( 'add_meta_boxes', array( $this, 'wp1s_upgrade_pro_metabox' ) );
            add_action( 'admin_menu', array( $this, 'wp1s_register_stuff_page' ) ); //add submenu page
            add_filter( 'admin_footer_text', array( $this, 'wp1s_admin_footer_text' ) );
            add_filter( 'plugin_row_meta', array( $this, 'wp1s_plugin_row_meta' ), 10, 2 );
            add_action( 'admin_init', array( $this, 'wp1s_redirect_to_site' ), 1 );
                include('inc/wp1s-block/wp1s-block-init.php');
        }

        //load the text domain for language translation
        function plugin_text_domain(){
            load_plugin_textdomain( 'wp-1-slider', false, basename( dirname( __FILE__ ) ) . '/languages/' );
        }

        function wp1s_register_admin_assets( $hook ){
            global $post;
            wp_enqueue_media();
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker-alpha', WP1S_JS_DIR . '/wp-color-picker-alpha.min.js', array( 'jquery', 'wp-color-picker' ), WP1S_VERSION, true );
            if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
                if ( 'wp1slider' === $post -> post_type ) {
                    wp_enqueue_script( 'wp1s-admin-script', WP1S_JS_DIR . '/wp1s-admin-script.js', array( 'jquery' ), WP1S_VERSION );
                }
            }
            wp_enqueue_style( 'wp1s-admin-style', WP1S_CSS_DIR . '/wp1s-admin-style.css', false, WP1S_VERSION );
        }

        function wp1s_register_assets(){
            wp_enqueue_style( 'wp1s-frontend-style', WP1S_CSS_DIR . '/wp1s-frontend-style.css', false, WP1S_VERSION );
            wp_enqueue_style( 'wp1s-bxslider-style', WP1S_CSS_DIR . '/jquery.bxslider.css', false, WP1S_VERSION );
            wp_enqueue_style( 'wp1s-responsive-style', WP1S_CSS_DIR . '/wp1s-responsive.css', false, WP1S_VERSION );
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'wp1s-jquery-video', WP1S_JS_DIR . '/jquery.fitvids.js', array( 'jquery' ), WP1S_VERSION );
            wp_enqueue_script( 'wp1s-jquery-bxslider-min', WP1S_JS_DIR . '/jquery.bxslider.min.js', array( 'jquery' ), WP1S_VERSION );
            wp_enqueue_script( 'wp1s-frontend-script', WP1S_JS_DIR . '/wp1s-frontend-script.js', array( 'jquery', 'wp1s-jquery-bxslider-min' ), WP1S_VERSION );
        }

        function wp1s_register_post_type(){
            include('inc/wp1s-register-post.php');
            register_post_type( 'wp 1 slider', $args );
        }

        function wp1s_add_slides_metabox(){
            add_meta_box( 'wp1s_add_slides', __( 'Slides', 'wp-1-slider' ), array( $this, 'wp1s_add_slides_callback' ), 'wp1slider', 'normal', 'high' );
        }

        function wp1s_add_slides_callback( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wp1s_slider_image_nonce' );
            $wp1s_stored_meta = get_post_meta( $post -> ID );
            include('inc/wp1s-slide-meta.php');
        }

        function wp1s_meta_save( $post_id ){
            if ( isset( $_POST[ 'wp1s_option' ] ) ) {
                update_post_meta( $post_id, 'wp1s_option', $_POST[ 'wp1s_option' ] );
            }
            return;
            // Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'wp1s_slider_image_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp1s_slider_image_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }

            if ( isset( $_POST[ 'wp1s_option[slides][slide_1][slide_title]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_1][slide_title]' ] ) ) {
                $titles = sanitize_text_field( $_POST[ 'wp1s_option[slides][slide_1][slide_title]' ] );
                foreach ( $titles as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_1][slide_title]', sanitize_text_field( $value ) );
                }
            }


            if ( isset( $_POST[ 'wp1s_option[slides][slide_1][slide_description]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_1][slide_description]' ] ) ) {
                $descriptions = sanitize_text_field( $_POST[ 'wp1s_option[slides][slide_1][slide_description]' ] );
                foreach ( $descriptions as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_1][slide_description]', sanitize_text_field( esc_html( $value ) ) );
                }
            }


            if ( isset( $_POST[ 'wp1s_option[slides][slide_1][slide_image_url]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_1][slide_image_url]' ] ) ) {
                $image_url = esc_url_raw( $_POST[ 'wp1s_option[slides][slide_1][slide_image_url]' ] );
                foreach ( $image_url as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_1][slide_image_url]', sanitize_text_field( $value ) );
                }
            }
            if ( isset( $_POST[ 'wp1s_option[slides][slide_1][slide_show_button]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_1][slide_show_button]' ] ) ) {


                $show_button = sanitize_text_field( $_POST[ 'wp1s_option[slides][slide_1][slide_show_button]' ] );
                foreach ( $show_button as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_1][slide_show_button]', sanitize_text_field( $value ) );
                }
            }
            if ( isset( $_POST[ 'wp1s_option[slides][slide_1][slide_button_url]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_1][slide_button_url]' ] ) ) {
                $button_url = $_POST[ 'wp1s_option[slides][slide_1][slide_button_url]' ];
                foreach ( $button_url as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_1][slide_button_url]', sanitize_text_field( $value ) );
                }
            }
            if ( isset( $_POST[ 'wp1s_option[slides][slide_1][slide_button_text]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_1][slide_button_text]' ] ) ) {
                $button_text = $_POST[ 'wp1s_option[slides][slide_1][slide_button_text]' ];
                foreach ( $button_text as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_1][slide_button_text]', sanitize_text_field( $value ) );
                }
            }
            if ( isset( $_POST[ 'wp1s_option[slides][slide_2][video_type]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_2][video_type]' ] ) ) {
                $video_type = $_POST[ 'wp1s_option[slides][slide_2][video_type]' ];
                foreach ( $video_type as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_2][video_type]', sanitize_text_field( $value ) );
                }
            }
            if ( isset( $_POST[ 'wp1s_option[slides][slide_2][video_url]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_2][video_url]' ] ) ) {
                $video_url = $_POST[ 'wp1s_option[slides][slide_2][video_url]' ];
                foreach ( $video_url as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_2][video_url]', sanitize_text_field( $value ) );
                }
            }
            if ( isset( $_POST[ 'wp1s_option[slides][slide_2][youtube_url]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_2][youtube_url]' ] ) ) {
                $youtube_url = $_POST[ 'wp1s_option[slides][slide_2][youtube_url]' ];
                foreach ( $youtube_url as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_2][youtube_url]', sanitize_text_field( $value ) );
                }
            }

            if ( isset( $_POST[ 'wp1s_option[slides][slide_type]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_type]' ] ) ) {
                $type = $_POST[ 'wp1s_option[slides][slide_type]' ];
                foreach ( $type as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_type]', sanitize_text_field( $value ) );
                }
            }

            if ( isset( $_POST[ 'wp1s_option[slides][slide_3][category]' ] ) && is_array( $_POST[ 'wp1s_option[slides][slide_3][category]' ] ) ) {
                $youtube_url = $_POST[ 'wp1s_option[slides][slide_3][category]' ];
                foreach ( $youtube_url as $key => $value ) {
                    update_post_meta( $post_id, 'wp1s_option[slides][slide_3][category]', sanitize_text_field( $value ) );
                }
            }
        }

        function wp1s_add_option_metabox(){
            add_meta_box( 'wp1s_add_slides_option', __( 'Slider Options', 'wp-1-slider' ), array( $this, 'wp1s_add_slides_option_callback' ), 'wp1slider', 'side', 'default' );
        }

        function wp1s_add_slides_option_callback( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wp1s_slider_option_nonce' );
            $wp1s_stored_meta_option = get_post_meta( $post -> ID );
            include('inc/wp1s-slide-meta-option.php');
        }

        function wp1s_meta_option_save( $post_id ){
            // Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'wp1s_slider_option_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp1s_slider_option_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }
            if ( isset( $_POST[ 'wp1s_slide_option_width' ] ) ) {
                update_post_meta( $post_id, 'wp1s_slide_option_width', sanitize_text_field( $_POST[ 'wp1s_slide_option_width' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_slide_option_speed' ] ) ) {
                update_post_meta( $post_id, 'wp1s_slide_option_speed', sanitize_text_field( $_POST[ 'wp1s_slide_option_speed' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_slide_option_pause' ] ) ) {
                update_post_meta( $post_id, 'wp1s_slide_option_pause', sanitize_text_field( $_POST[ 'wp1s_slide_option_pause' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_slide_option_auto' ] ) ) {
                update_post_meta( $post_id, 'wp1s_slide_option_auto', sanitize_text_field( $_POST[ 'wp1s_slide_option_auto' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_slide_option_transition' ] ) ) {
                update_post_meta( $post_id, 'wp1s_slide_option_transition', sanitize_text_field( $_POST[ 'wp1s_slide_option_transition' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_slide_option_controls' ] ) ) {
                update_post_meta( $post_id, 'wp1s_slide_option_controls', sanitize_text_field( $_POST[ 'wp1s_slide_option_controls' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_slide_option_responsive' ] ) ) {
                update_post_meta( $post_id, 'wp1s_slide_option_responsive', sanitize_text_field( $_POST[ 'wp1s_slide_option_responsive' ] ) );
            }
        }

        function wp1s_shortcode_usage_metabox(){
            add_meta_box( 'wp1s_shortcode_usage_option', __( 'WP1S Usage', 'wp-1-slider' ), array( $this, 'wp1s_shortcode_usage_option_callback' ), 'wp1slider', 'side', 'default' );
        }

        function wp1s_shortcode_usage_option_callback( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wp1s_shortcode_usage_option_nonce' );
            $wp1s_stored_meta_usage = get_post_meta( $post -> ID );
            include('inc/wp1s-usages-option.php');
        }

        function wp1s_settings_metabox(){
            add_meta_box( 'wp1s_settings_option', __( 'General Settings', 'wp-1-slider' ), array( $this, 'wp1s_setting_callback' ), 'wp1slider', 'normal', 'default' );
        }

        function wp1s_setting_callback( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wp1s_settings_nonce' );
            $wp1s_stored_meta_setting = get_post_meta( $post -> ID );
            include('inc/wp1s-slide-general-settings.php');
        }

        function wp1s_meta_setting_save( $post_id ){
            // Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'wp1s_settings_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp1s_settings_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }
            if ( isset( $_POST[ 'wp1s_caption_type' ] ) ) {
                update_post_meta( $post_id, 'wp1s_caption_type', sanitize_text_field( $_POST[ 'wp1s_caption_type' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_title_1_font_size' ] ) ) {
                update_post_meta( $post_id, 'wp1s_title_1_font_size', sanitize_text_field( $_POST[ 'wp1s_title_1_font_size' ] ) );
            }

            if ( isset( $_POST[ 'wp1s_description_1_font_size' ] ) ) {
                update_post_meta( $post_id, 'wp1s_description_1_font_size', sanitize_text_field( $_POST[ 'wp1s_description_1_font_size' ] ) );
            }

            if ( isset( $_POST[ 'wp1s_title_text_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_title_text_color', sanitize_text_field( $_POST[ 'wp1s_title_text_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_title_back_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_title_back_color', sanitize_text_field( $_POST[ 'wp1s_title_back_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_caption_border_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_caption_border_color', sanitize_text_field( $_POST[ 'wp1s_caption_border_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_caption_back_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_caption_back_color', sanitize_text_field( $_POST[ 'wp1s_caption_back_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_description_text_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_description_text_color', sanitize_text_field( $_POST[ 'wp1s_description_text_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_caption_position' ] ) ) {
                update_post_meta( $post_id, 'wp1s_caption_position', sanitize_text_field( $_POST[ 'wp1s_caption_position' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_show_caption_widget' ] ) ) {
                update_post_meta( $post_id, 'wp1s_show_caption_widget', sanitize_text_field( $_POST[ 'wp1s_show_caption_widget' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_show_thumb_widget' ] ) ) {
                update_post_meta( $post_id, 'wp1s_show_thumb_widget', sanitize_text_field( $_POST[ 'wp1s_show_thumb_widget' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_pager_type' ] ) ) {
                update_post_meta( $post_id, 'wp1s_pager_type', sanitize_text_field( $_POST[ 'wp1s_pager_type' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_layout' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_layout', sanitize_text_field( $_POST[ 'wp1s_dot_layout' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_arrow_type' ] ) ) {
                update_post_meta( $post_id, 'wp1s_arrow_type', sanitize_text_field( $_POST[ 'wp1s_arrow_type' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_thumbnail_layout' ] ) ) {
                update_post_meta( $post_id, 'wp1s_thumbnail_layout', sanitize_text_field( $_POST[ 'wp1s_thumbnail_layout' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_back_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_back_color', sanitize_text_field( $_POST[ 'wp1s_dot_back_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_hover_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_hover_color', sanitize_text_field( $_POST[ 'wp1s_dot_hover_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_2_back_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_2_back_color', sanitize_text_field( $_POST[ 'wp1s_dot_2_back_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_2_border_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_2_border_color', sanitize_text_field( $_POST[ 'wp1s_dot_2_border_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_2_active_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_2_active_color', sanitize_text_field( $_POST[ 'wp1s_dot_2_active_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_3_border_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_3_border_color', sanitize_text_field( $_POST[ 'wp1s_dot_3_border_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_3_active_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_3_active_color', sanitize_text_field( $_POST[ 'wp1s_dot_3_active_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_4_back_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_4_back_color', sanitize_text_field( $_POST[ 'wp1s_dot_4_back_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_dot_4_active_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_dot_4_active_color', sanitize_text_field( $_POST[ 'wp1s_dot_4_active_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_pager_thumb_count' ] ) ) {
                update_post_meta( $post_id, 'wp1s_pager_thumb_count', sanitize_text_field( $_POST[ 'wp1s_pager_thumb_count' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_pager_thumb_width' ] ) ) {
                update_post_meta( $post_id, 'wp1s_pager_thumb_width', sanitize_text_field( $_POST[ 'wp1s_pager_thumb_width' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_pager_thumb_height' ] ) ) {
                update_post_meta( $post_id, 'wp1s_pager_thumb_height', sanitize_text_field( $_POST[ 'wp1s_pager_thumb_height' ] ) );
            }

            if ( isset( $_POST[ 'wp1s_button_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_button_color', sanitize_text_field( $_POST[ 'wp1s_button_color' ] ) );
            }

            if ( isset( $_POST[ 'wp1s_button_hover_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_button_hover_color', sanitize_text_field( $_POST[ 'wp1s_button_hover_color' ] ) );
            }

            if ( isset( $_POST[ 'wp1s_button_shadow_color' ] ) ) {
                update_post_meta( $post_id, 'wp1s_button_shadow_color', sanitize_text_field( $_POST[ 'wp1s_button_shadow_color' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_show_shadow' ] ) ) {
                update_post_meta( $post_id, 'wp1s_show_shadow', sanitize_text_field( $_POST[ 'wp1s_show_shadow' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_shadow_type' ] ) ) {
                update_post_meta( $post_id, 'wp1s_shadow_type', sanitize_text_field( $_POST[ 'wp1s_shadow_type' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_video_width' ] ) ) {
                update_post_meta( $post_id, 'wp1s_video_width', sanitize_text_field( $_POST[ 'wp1s_video_width' ] ) );
            }
            if ( isset( $_POST[ 'wp1s_video_height' ] ) ) {
                update_post_meta( $post_id, 'wp1s_video_height', sanitize_text_field( $_POST[ 'wp1s_video_height' ] ) );
            }
        }

        function wp1s_form_footer_function( $post ){
            global $post;

            if ( $post && $post -> post_type == 'wp1slider' ) {
                include_once(WP1S_PATH . 'inc/wp1s-form-footer.php');
            }
        }

        function print_array( $array ){
            echo "<pre>";
            print_r( $array );
            echo "</pre>";
        }

        function wp1s_generate_shortcode( $atts, $content = null ){

            global $post;
            extract( shortcode_atts( array( 'id' => '$post->ID' ), $atts ) );

            $args = array(
                'post_type' => 'wp1slider',
                'post_status' => 'publish',
                'posts_per_page' => 1
            );
            $wp1s_slider = new WP_Query( $args );

            if ( $wp1s_slider -> have_posts() ) :
                ob_start();
                include('inc/wp1s-shortcode.php');
                $slider = ob_get_contents();


            endif;
            wp_reset_query();

            ob_end_clean();
            return $slider;
        }

        function wp1s_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                /* set post types */
                'wp1slider'
            );
            if ( in_array( $post_type, $post_types ) )
                echo '<style type="text/css">#post-preview, #view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

        function wp1s_remove_row_actions( $actions ){
            if ( get_post_type() == 'wp1slider' ) { // choose the post type where you want to hide the button
                unset( $actions[ 'view' ] ); // this hides the VIEW button on your edit post screen
                unset( $actions[ 'inline hide-if-no-js' ] );
            }
            return $actions;
        }

        /* Add custom column to post list */

        function wp1s_columns_head( $columns ){
            $columns[ 'shortcodes' ] = __( 'Shortcodes', 'wp-1-slider' );
            $columns[ 'template' ] = __( 'Template Include', 'wp-1-slider' );
            return $columns;
        }

        function wp1s_columns_content( $column, $post_id ){

            if ( $column == 'shortcodes' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="15" readonly="readonly">[wp1s id="<?php echo esc_attr($post_id); ?>"]</textarea><?php
            }
            if ( $column == 'template' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="41" readonly="readonly">&lt;?php echo do_shortcode("[wp1s id='<?php echo esc_attr($post_id); ?>']"); ?&gt;</textarea><?php
            }
        }

        function wp1s_register_widget(){
            register_widget( 'wp1s_Widget' );
        }

        function wp1s_media_shortcode_buttons(){
            ?>
            <style>
                #TB_window {
                    max-width:400px;
                    max-height: 300px;
                    left: 50%;
                    position: fixed;
                    text-align: center;
                    top: 50% !important;
                    margin:0 !important;
                    transform:translate(-50%,-50%);
                    -webkit-transform:translate(-50%,-50%);
                    -moz-transform:translate(-50%,-50%);
                }
                #TB_ajaxContent {
                    max-width: 350px;
                    text-align: center;
                    padding: 10px 20px;
                }
            </style>
            <a href = "#TB_inline?width=400&height=300&inlineId=wp1s_popup_shortcode" class = "button thickbox wp_doin_media_link" id = "add_div_shortcode" title = "WP 1 Slider Shortcode">Add WP 1 Slider</a>
            <?php
        }

        function wp1s_media_shortcode_popup(){
            include('inc/wp1s-shortcode-popup.php');
        }

        //upgrade to pro metabox
        function wp1s_upgrade_pro_metabox(){
            add_meta_box( 'wp1s_upgrade_option', __( 'Upgrade To Pro', 'wp-1-slider' ), array( $this, 'wp1s_upgrade_callback' ), 'wp1slider', 'side', 'default' );
        }

        function wp1s_upgrade_callback( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wp1s_upgrade_nonce' );
            $wp1s_stored_meta_setting = get_post_meta( $post -> ID );
            include('inc/wp1s-upgrade-pro.php');
        }

        function wp1s_register_stuff_page(){
            add_submenu_page(
                    'edit.php?post_type=wp1slider', __( 'About The Plugin', WP1S_TD ), __( 'About The Plugin', WP1S_TD ), 'manage_options', 'wp1s-about-page', array( $this, 'wp1s_about_callback' ) );

            add_submenu_page( 'edit.php?post_type=wp1slider', __( 'Documentation', WP1S_TD ), __( 'Documentation', WP1S_TD ), 'manage_options', 'wp1s-documentation-wp', '__return_false', null, 9 );
        }

        function wp1s_stuff_callback(){

            include('inc/admin/wp1s-stuff-page.php');
        }

        function wp1s_about_callback(){

            include('inc/admin/wp1s-about-page.php');
        }

        function wp1s_redirect_to_site(){
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wp1s-documentation-wp' ) {
                wp_redirect( 'https://accesspressthemes.com/documentation/wp-1-slider/' );
                exit();
            }
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wp1s-premium-wp' ) {
                wp_redirect( 'https://accesspressthemes.com/wordpress-plugins/wp1-slider-pro/' );
                exit();
            }
        }

        function wp1s_admin_footer_text( $text ){
            global $post;
            if ( (isset( $_GET[ 'post_type' ] ) && $_GET[ 'post_type' ] == 'wp1slider' ) ) {
                $link = 'https://wordpress.org/support/plugin/wp-1-slider/reviews/#new-post';
                $pro_link = 'https://accesspressthemes.com/wordpress-plugins/wp1-slider-pro/';
                $text = 'Enjoyed WP 1 Slider? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">WP 1 Slider Pro</a> - more features, more power!';
                return $text;
            } else {
                return $text;
            }
        }

        function wp1s_plugin_row_meta( $links, $file ){
            if ( strpos( $file, 'wp-1-slider.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="https://demo.accesspressthemes.com/wordpress-plugins/wp-1-slider/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="https://accesspressthemes.com/documentation/wp-1-slider/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/wp1-slider-pro/" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );
                $links = array_merge( $links, $new_links );
            }
            return $links;
        }

    }

    //class termination

    $wp1s_obj = new WP1S_Class();
}//class exist check close
include('inc/wp1s-widget.php');
