<?php


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Zerif_Customizer_Upsell {

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
		require_once( trailingslashit( get_template_directory() ) . 'inc/customize-pro/class-zerif-customize-upsell-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Zerif_Customizer_Upsell_Pro' );

		// Register sections.
		$manager->add_section( new Zerif_Customizer_Upsell_Pro( $manager, 'zerif-upsell',
				array(
					'label_url' => 'http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/',
					'label_text' => __('View PRO version', 'zerif-lite'),

					'btn1_url' => 'http://themeisle.com/documentation-zerif-lite',
					'btn1_text' => __('View Documentation','zerif-lite'),

					'btn2_url' => admin_url( 'themes.php?page=zerif-lite-welcome#actions_required' ),
					'btn2_text' => __('View Theme Info','zerif-lite'),

					'priority' => -1
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'zerif-upsell-js', trailingslashit( get_template_directory_uri() ) . 'inc/customize-pro/zerif-upsell-customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'zerif-upsell-style', trailingslashit( get_template_directory_uri() ) . 'inc/customize-pro/zerif-upsell-customize-controls.css' );
	}
}

// Doing this customizer thang!
Zerif_Customizer_Upsell::get_instance();
