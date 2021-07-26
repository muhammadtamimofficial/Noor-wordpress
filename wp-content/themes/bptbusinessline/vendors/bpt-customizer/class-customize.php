<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class bpt_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {
		// Load custom sections.
		locate_template( 'vendors/bpt-customizer/section-pro.php', TRUE, TRUE );

		$manager->add_section( 'bpt_theme_options', array(
			 'title'    => esc_attr__( 'Theme Options', 'bptbusinessline' ),
			 'priority' => 2,
		) );

		$manager->add_setting('bptloading', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_checkbox',
			'default'    => '1'
		) );
		$manager->add_control('bptloading', array(
			'label'      => __( 'Preloaders', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'bptloading',
			'type'       => 'checkbox',
		));

		$manager->add_setting('fb_link', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('fb_link', array(
			'label'      => __( 'Facebook', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'fb_link',
			'type'       => 'url',
		));
		
		$manager->add_setting('tw_link', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('tw_link', array(
			'label'      => __( 'Twitter', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'tw_link',
			'type'       => 'url',
		));
		
		$manager->add_setting('google_plus', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('google_plus', array(
			'label'      => __( 'Google Plus', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'google_plus',
			'type'       => 'url',
		));
		
		$manager->add_setting('linkedin', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('linkedin', array(
			'label'      => __( 'Linkedin', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'linkedin',
			'type'       => 'url',
		));

		$manager->add_setting('bpt_phone', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$manager->add_control('bpt_phone', array(
			'label'      => __( 'Phone Number', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'bpt_phone',
			'type'       => 'text',
		));

		$manager->add_setting('bpt_email', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_email',
		) );
		$manager->add_control('bpt_email', array(
			'label'      => __( 'Email', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'bpt_email',
			'type'       => 'text',
		));

		$manager->add_setting('bpt_skype', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$manager->add_control('bpt_skype', array(
			'label'      => __( 'Skype', 'bptbusinessline' ),
			'section'    => 'bpt_theme_options',
			'settings'   => 'bpt_skype',
			'type'       => 'text',
		));

		// Register custom section types.
		$manager->register_section_type( 'bpt_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new bpt_Customize_Section_Pro(
				$manager,
				'bpt-type',
				array(
					'title'    => esc_html__( 'Pro Version', 'bptbusinessline' ),
					'pro_text' => esc_html__( 'Go Pro',         'bptbusinessline' ),
					'pro_url'  => 'http://www.buyprotheme.com/product/bptbusinessline',
			 		'priority' => 1,
				)
			)
		);
		//select sanitization function
		function slug_sanitize_select( $input, $setting ) {
			$input = sanitize_key( $input );
			$choices = $setting->manager->get_control( $setting->id )->choices;
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
		function sanitize_checkbox( $checked ) {
			// Boolean check.
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'bpt-customize-controls', trailingslashit( get_template_directory_uri() ) . 'vendors/bpt-customizer/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bpt-customize-controls', trailingslashit( get_template_directory_uri() ) . 'vendors/bpt-customizer/customize-controls.css' );
	}
}

// Doing this customizer thang!
bpt_Customize::get_instance();
