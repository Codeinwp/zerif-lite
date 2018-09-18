<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  2.0.5
 * @access public
 *
 * @package zerif-lite
 */

/**
 * Class Zerif_Customizer_Upsell
 */
final class Zerif_Customizer_Upsell {
	/**
	 * Returns the instance.
	 *
	 * @since  2.0.5
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
	 * @since  2.0.5
	 * @access private
	 * @return void
	 */
	private function __construct() {}
	/**
	 * Sets up initial actions.
	 *
	 * @since  2.0.5
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
	 * @since  2.0.5
	 * @access public
	 * @return void
	 */
	public function sections( $manager ) {

		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer-info/class/class-zerif-customize-upsell-pro.php' );
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer-info/class/class-zerif-customize-upsell-features.php' );

		$manager->register_section_type( 'Zerif_Customizer_Upsell_Pro' );
		$manager->register_section_type( 'Zerif_Customizer_Upsell_Features' );

		$manager->add_section(
			new Zerif_Customizer_Upsell_Pro(
				$manager,
				'zerif-upsell-pro',
				array(
					'upsell_title' => __( 'View PRO version', 'zerif-lite' ),
					'label_url'    => 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/upgrade/',
					'label_text'   => __( 'Get it', 'zerif-lite' ),
				)
			)
		);

		$manager->add_section(
			new Zerif_Customizer_Upsell_Features(
				$manager,
				'zerif-upsell-features-1',
				array(
					'upsell_text' => sprintf( '<a href="' . esc_url( 'http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/' ) . '" target="_blank">%s</a>', __( 'View PRO version', 'zerif-lite' ) ) . '. ' . __( 'It adds a background video and a background slider.', 'zerif-lite' ),
					'panel'       => 'panel_big_title',
					'priority'    => 500,
				)
			)
		);

		$manager->add_section(
			new Zerif_Customizer_Upsell_Features(
				$manager,
				'zerif-upsell-features-2',
				array(
					'upsell_text' => sprintf( '<a href="' . esc_url( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/upgrade/' ) . '" target="_blank">%s</a>', __( 'View PRO version', 'zerif-lite' ) ) . '. ' . __( 'It adds 5 new sections, the ability to re-order existing ones and easily add custom content to frontpage.', 'zerif-lite' ),
					'panel'       => 'panel_general',
					'priority'    => 500,
				)
			)
		);
	}
	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  2.0.5
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'zerif-lite-upsell-js', trailingslashit( get_template_directory_uri() ) . 'inc/customizer-info/js/customizer-info-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'zerif-lite-upsell-style', trailingslashit( get_template_directory_uri() ) . 'inc/customizer-info/css/customizer-info.css' );
	}
}
Zerif_Customizer_Upsell::get_instance();
