<?php
/**
 * Singleton class file.
 *
 * @package Zerif Lite
 */

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
     * @param  object $manager Customizer manager.
     * @return void
     */
    public function sections( $manager ) {

        // Load custom sections.
        require_once( trailingslashit( get_template_directory() ) . 'inc/class/class-customizer-theme-info-control/class-zerif-customize-theme-info-main.php' );
	    require_once( trailingslashit( get_template_directory() ) . 'inc/class/class-customizer-theme-info-control/class-zerif-customize-upsell-section.php' );

        // Register custom section types.
        $manager->register_section_type( 'Zerif_Customizer_Theme_Info_Main' );

        // Main Documentation Link In Customizer Root.
        $manager->add_section( new Zerif_Customizer_Theme_Info_Main( $manager, 'zerif-theme-info', array(
            'theme_info_title' => __( 'Zerif Lite', 'zerif-lite' ),
            'label_url'        => esc_url( 'http://docs.themeisle.com/article/5-zerif-lite-documentation' ),
            'label_text'       => __( 'Documentation', 'zerif-lite' ),
        ) ) );

        // Frontpage Sections Upsell.
        $manager->add_section( new Zerif_Customizer_Upsell_Section( $manager, 'zerif-upsell-frontpage-sections', array(
            'panel'       => 'zerif_frontpage_sections_panel',
            'priority'    => 500,
            'options'     => array(
                esc_html__( 'Portfolio', 'zerif-lite' ),
                esc_html__( 'Packages section', 'zerif-lite' ),
                esc_html__( 'Subscribe section', 'zerif-lite' ),
                esc_html__( 'Ribbon Section', 'zerif-lite' ),
                esc_html__( 'Google map section', 'zerif-lite' )
            ),
            'button_url'  => esc_url( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/' ),
            'button_text' => esc_html__( 'View PRO version', 'zerif-lite' ),
        ) ) );
    }

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {

        wp_enqueue_script( 'zerif-upsell-js', trailingslashit( get_template_directory_uri() ) . 'inc/class/class-customizer-theme-info-control/js/zerif-upsell-customize-controls.js', array( 'customize-controls' ) );

        wp_enqueue_style( 'zerif-theme-info-style', trailingslashit( get_template_directory_uri() ) . 'inc/class/class-customizer-theme-info-control/css/style.css' );

    }
}

Zerif_Customizer_Upsell::get_instance();