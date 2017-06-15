<?php
/**
 * zerif Theme Customizer
 *
 * @package zerif
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zerif_customize_register( $wp_customize ) {

	class Zerif_Customizer_Number_Control extends WP_Customize_Control {
		public $type = 'number';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>"/>
			</label>
			<?php
		}
	}

	/* Custom panel type - used for multiple levels of panels */
	if ( class_exists( 'WP_Customize_Panel' ) ) {

		class Zerif_WP_Customize_Panel extends WP_Customize_Panel {

			public $panel;

			public $type = 'zerif_panel';

			public function json() {

				$array                   = wp_array_slice_assoc( (array) $this, array(
					'id',
					'description',
					'priority',
					'type',
					'panel',
				) );
				$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
				$array['content']        = $this->get_content();
				$array['active']         = $this->active();
				$array['instanceNumber'] = $this->instance_number;

				return $array;

			}

		}

	}

	$wp_customize->register_panel_type( 'Zerif_WP_Customize_Panel' );

    /**
     * Upsells
     */
    require_once( trailingslashit( get_template_directory() ) . 'inc/class/class-customizer-theme-info-control/class-customizer-theme-info-control.php' );

    $wp_customize->add_section( 'zerif_theme_info_main_section', array(
        'title'    => __( 'View PRO version', 'zerif-lite' ),
        'priority' => 1,
    ) );
    $wp_customize->add_setting( 'zerif_theme_info_main_control', array(
        'sanitize_callback' => 'esc_html',
    ) );

    /*
     * View Pro Version Section Control
     */
    $wp_customize->add_control( new Zerif_Control_Upsell_Theme_Info( $wp_customize, 'zerif_theme_info_main_control', array(
        'section'     => 'zerif_theme_info_main_section',
        'priority'    => 100,
        'options'     => array(
            esc_html__( 'Section Reordering', 'zerif-lite' ),
            esc_html__( 'Background video', 'zerif-lite' ),
            esc_html__( 'Portfolio', 'zerif-lite' ),
            esc_html__( 'Extra colors', 'zerif-lite' ),
            esc_html__( 'Packages section', 'zerif-lite' ),
            esc_html__( 'Subscribe section', 'zerif-lite' ),
            esc_html__( 'Google map section', 'zerif-lite' ),
            esc_html__( 'Support', 'zerif-lite' ),
        ),
        'button_url'  => esc_url( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/' ),
        'button_text' => esc_html__( 'View PRO version', 'zerif-lite' ),
    ) ) );

    /**
     * Extra Colors Notice
     */
    $wp_customize->add_setting( 'zerif_theme_info_colors_section_control', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new Zerif_Control_Upsell_Theme_Info( $wp_customize, 'zerif_theme_info_colors_section_control', array(
        'section'            => 'colors',
        'priority'           => 500,
        'options'            => array(
            esc_html__( 'Extra colors', 'zerif-lite' ),
        ),
        'explained_features' => array(
            esc_html__( 'Get full color schemes support for your site.', 'zerif-lite' ),
        ),
        'button_url'         => esc_url( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/' ),
        'button_text'        => esc_html__( 'View PRO version', 'zerif-lite' ),
    ) ) );

    /**
     * Background video notice
     */
    $wp_customize->add_setting( 'zerif_theme_info_header_section_control', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new Zerif_Control_Upsell_Theme_Info( $wp_customize, 'zerif_theme_info_header_section_control', array(
        'section'     => 'background_image',
        'priority'    => 500,
        'options'     => array(
            esc_html__( 'Background video', 'zerif-lite' ),
        ),
        'button_url'  => esc_url( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/' ),
        'button_text' => esc_html__( 'View PRO version', 'zerif-lite' ),
    ) ) );


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'custom_logo' )->transport      = 'postMessage';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
			'selector'        => '.navbar-brand',
			'settings'        => 'custom_logo',
			'render_callback' => 'zerif_custom_logo_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_bigtitle_title_2', array(
			'selector'        => '.home-header-wrap .intro-text',
			'settings'        => 'zerif_bigtitle_title_2',
			'render_callback' => 'zerif_bigtitle_title_2_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_bigtitle_redbutton_label_2', array(
			'selector'        => '.buttons a.red-btn',
			'settings'        => 'zerif_bigtitle_redbutton_label_2',
			'render_callback' => 'zerif_bigtitle_redbutton_label_2_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_bigtitle_greenbutton_label', array(
			'selector'        => '.buttons a.green-btn',
			'settings'        => 'zerif_bigtitle_greenbutton_label',
			'render_callback' => 'zerif_bigtitle_greenbutton_label_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourfocus_title_2', array(
			'selector'        => '#focus .section-header h2',
			'settings'        => 'zerif_ourfocus_title_2',
			'render_callback' => 'zerif_ourfocus_title_2_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourfocus_subtitle', array(
			'selector'        => '#focus .section-header div.section-legend',
			'settings'        => 'zerif_ourfocus_subtitle',
			'render_callback' => 'zerif_ourfocus_subtitle_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourteam_title', array(
			'selector'        => '#team .section-header h2',
			'settings'        => 'zerif_ourteam_title',
			'render_callback' => 'zerif_ourteam_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourteam_subtitle', array(
			'selector'        => '#team .section-header div.section-legend',
			'settings'        => 'zerif_ourteam_subtitle',
			'render_callback' => 'zerif_ourteam_subtitle_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_title', array(
			'selector'        => '#aboutus .section-header h2',
			'settings'        => 'zerif_aboutus_title',
			'render_callback' => 'zerif_aboutus_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_subtitle', array(
			'selector'        => '#aboutus .section-header div.section-legend',
			'settings'        => 'zerif_aboutus_subtitle',
			'render_callback' => 'zerif_aboutus_subtitle_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_biglefttitle', array(
			'selector'        => '#aboutus .big-intro',
			'settings'        => 'zerif_aboutus_biglefttitle',
			'render_callback' => 'zerif_aboutus_biglefttitle_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_text', array(
			'selector'        => '#aboutus .text_and_skills p',
			'settings'        => 'zerif_aboutus_text',
			'render_callback' => 'zerif_aboutus_text_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature1_title', array(
			'selector'        => '#aboutus .skill_1 label',
			'settings'        => 'zerif_aboutus_feature1_title',
			'render_callback' => 'zerif_aboutus_feature1_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature2_title', array(
			'selector'        => '#aboutus .skill_2 label',
			'settings'        => 'zerif_aboutus_feature2_title',
			'render_callback' => 'zerif_aboutus_feature2_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature3_title', array(
			'selector'        => '#aboutus .skill_3 label',
			'settings'        => 'zerif_aboutus_feature3_title',
			'render_callback' => 'zerif_aboutus_feature3_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature4_title', array(
			'selector'        => '#aboutus .skill_4 label',
			'settings'        => 'zerif_aboutus_feature4_title',
			'render_callback' => 'zerif_aboutus_feature4_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_testimonials_title', array(
			'selector'        => '#testimonials .section-header h2',
			'settings'        => 'zerif_testimonials_title',
			'render_callback' => 'zerif_testimonials_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_contactus_title', array(
			'selector'        => '#contact .section-header h2',
			'settings'        => 'zerif_contactus_title',
			'render_callback' => 'zerif_contactus_title_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_facebook', array(
			'selector'        => '#footer .social #facebook',
			'settings'        => 'zerif_socials_facebook',
			'render_callback' => 'zerif_socials_facebook_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_twitter', array(
			'selector'        => '#footer .social #twitter',
			'settings'        => 'zerif_socials_twitter',
			'render_callback' => 'zerif_socials_twitter_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_linkedin', array(
			'selector'        => '#footer .social #linkedin',
			'settings'        => 'zerif_socials_linkedin',
			'render_callback' => 'zerif_socials_linkedin_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_behance', array(
			'selector'        => '#footer .social #behance',
			'settings'        => 'zerif_socials_behance',
			'render_callback' => 'zerif_socials_behance_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_dribbble', array(
			'selector'        => '#footer .social #dribbble',
			'settings'        => 'zerif_socials_dribbble',
			'render_callback' => 'zerif_socials_dribbble_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_instagram', array(
			'selector'        => '#footer .social #instagram',
			'settings'        => 'zerif_socials_instagram',
			'render_callback' => 'zerif_socials_instagram_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_address', array(
			'selector'        => '.zerif-footer-address',
			'settings'        => 'zerif_address',
			'render_callback' => 'zerif_address_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_email', array(
			'selector'        => '.zerif-footer-email',
			'settings'        => 'zerif_email',
			'render_callback' => 'zerif_email_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_phone', array(
			'selector'        => '.zerif-footer-phone',
			'settings'        => 'zerif_phone',
			'render_callback' => 'zerif_phone_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_address_icon', array(
			'selector'        => '.company-details .icon-top.red-text',
			'settings'        => 'zerif_address_icon',
			'render_callback' => 'zerif_address_icon_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_email_icon', array(
			'selector'        => '.company-details .icon-top.green-text',
			'settings'        => 'zerif_email_icon',
			'render_callback' => 'zerif_email_icon_render_callback',
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_phone_icon', array(
			'selector'        => '.company-details .icon-top.blue-text',
			'settings'        => 'zerif_phone_icon',
			'render_callback' => 'zerif_phone_icon_render_callback',
		) );
	}

	/**
	 * Render callback for zerif_bigtitle_title_2
	 * @return mixed
	 */
	function zerif_bigtitle_title_2_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_bigtitle_title_2' ) );
	}

	/**
	 * Render callback for zerif_bigtitle_redbutton_label_2
	 * @return mixed
	 */
	function zerif_bigtitle_redbutton_label_2_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_bigtitle_redbutton_label_2' ) );
	}

	/**
	 * Render callback for zerif_bigtitle_greenbutton_label
	 * @return mixed
	 */
	function zerif_bigtitle_greenbutton_label_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_bigtitle_greenbutton_label' ) );
	}

	/**
	 * Render callback for zerif_ourfocus_title_2
	 * @return mixed
	 */
	function zerif_ourfocus_title_2_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_ourfocus_title_2' ) );
	}

	/**
	 * Render callback for zerif_ourfocus_subtitle
	 * @return mixed
	 */
	function zerif_ourfocus_subtitle_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_ourfocus_subtitle' ) );
	}

	/**
	 * Render callback for zerif_ourteam_title
	 * @return mixed
	 */
	function zerif_ourteam_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_ourteam_title' ) );
	}

	/**
	 * Render callback for zerif_ourteam_subtitle
	 * @return mixed
	 */
	function zerif_ourteam_subtitle_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_ourteam_subtitle' ) );
	}

	/**
	 * Render callback for zerif_aboutus_title
	 * @return mixed
	 */
	function zerif_aboutus_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_title' ) );
	}

	/**
	 * Render callback for zerif_aboutus_subtitle
	 * @return mixed
	 */
	function zerif_aboutus_subtitle_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_subtitle' ) );
	}

	/**
	 * Render callback for zerif_aboutus_biglefttitle
	 * @return mixed
	 */
	function zerif_aboutus_biglefttitle_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_biglefttitle' ) );
	}

	/**
	 * Render callback for zerif_aboutus_text
	 * @return mixed
	 */
	function zerif_aboutus_text_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_text' ) );
	}

	/**
	 * Render callback for zerif_aboutus_feature1_title
	 * @return mixed
	 */
	function zerif_aboutus_feature1_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature1_title' ) );
	}

	/**
	 * Render callback for zerif_aboutus_feature2_title
	 * @return mixed
	 */
	function zerif_aboutus_feature2_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature2_title' ) );
	}

	/**
	 * Render callback for zerif_aboutus_feature3_title
	 * @return mixed
	 */
	function zerif_aboutus_feature3_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature3_title' ) );
	}

	/**
	 * Render callback for zerif_aboutus_feature4_title
	 * @return mixed
	 */
	function zerif_aboutus_feature4_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature4_title' ) );
	}

	/**
	 * Render callback for zerif_testimonials_title
	 * @return mixed
	 */
	function zerif_testimonials_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_testimonials_title' ) );
	}

	/**
	 * Render callback for zerif_contactus_title
	 * @return mixed
	 */
	function zerif_contactus_title_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_contactus_title' ) );
	}

	/**
	 * Render callback for zerif_socials_facebook
	 * @return mixed
	 */
	function zerif_socials_facebook_render_callback() {
		return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_facebook' ) ) . '"><span class="sr-only">' . __( 'Facebook link', 'zerif-lite' ) . '</span> <i class="fa fa-facebook"></i></a>';
	}

	/**
	 * Render callback for zerif_socials_twitter
	 * @return mixed
	 */
	function zerif_socials_twitter_render_callback() {
		return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_twitter' ) ) . '"><span class="sr-only">' . __( 'Twitter link', 'zerif-lite' ) . '</span> <i class="fa fa-twitter"></i></a>';
	}

	/**
	 * Render callback for zerif_socials_linkedin
	 * @return mixed
	 */
	function zerif_socials_linkedin_render_callback() {
		return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_linkedin' ) ) . '"><span class="sr-only">' . __( 'Linkedin link', 'zerif-lite' ) . '</span> <i class="fa fa-linkedin"></i></a>';
	}

	/**
	 * Render callback for zerif_socials_behance
	 * @return mixed
	 */
	function zerif_socials_behance_render_callback() {
		return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_behance' ) ) . '"><span class="sr-only">' . __( 'Behance link', 'zerif-lite' ) . '</span> <i class="fa fa-behance"></i></a>';
	}

	/**
	 * Render callback for zerif_socials_dribbble
	 * @return mixed
	 */
	function zerif_socials_dribbble_render_callback() {
		return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_dribbble' ) ) . '"><span class="sr-only">' . __( 'Dribble link', 'zerif-lite' ) . '</span> <i class="fa fa-dribbble"></i></a>';
	}

	/**
	 * Render callback for zerif_socials_instagram
	 * @return mixed
	 */
	function zerif_socials_instagram_render_callback() {
		return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_instagram' ) ) . '"><span class="sr-only">' . __( 'Instagram link', 'zerif-lite' ) . '</span> <i class="fa fa-instagram"></i></a>';
	}

	/**
	 * Render callback for zerif_address
	 * @return mixed
	 */
	function zerif_address_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_address' ) );
	}

	/**
	 * Render callback for zerif_email
	 * @return mixed
	 */
	function zerif_email_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_email' ) );
	}

	/**
	 * Render callback for zerif_phone
	 * @return mixed
	 */
	function zerif_phone_render_callback() {
		return wp_kses_post( get_theme_mod( 'zerif_phone' ) );
	}

	/**
	 * Render callback for zerif_address_icon
	 * @return mixed
	 */
	function zerif_address_icon_render_callback() {
		return '<img src="' . esc_url( get_theme_mod( 'zerif_address_icon' ) ) . '">';
	}

	/**
	 * Render callback for zerif_email_icon
	 * @return mixed
	 */
	function zerif_email_icon_render_callback() {
		return '<img src="' . esc_url( get_theme_mod( 'zerif_email_icon' ) ) . '">';
	}

	/**
	 * Render callback for zerif_phone_icon
	 * @return mixed
	 */
	function zerif_phone_icon_render_callback() {
		return '<img src="' . esc_url( get_theme_mod( 'zerif_phone_icon' ) ) . '">';
	}

	/***********************************************/
	/************** ADVANCED OPTIONS  **************/
	/***********************************************/

	$wp_customize->add_panel( 'zerif_advanced_options_panel', array(
		'title'    => esc_html__( 'Advanced options', 'zerif-lite' ),
		'priority' => 150,
	) );

	$wp_customize->add_section( 'zerif_general_section', array(
		'title'    => __( 'General options', 'zerif-lite' ),
		'priority' => 1,
		'panel'    => 'zerif_advanced_options_panel'
	) );

	$wp_customize->add_setting( 'zerif_use_safe_font', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'zerif_use_safe_font', array(
		'type'     => 'checkbox',
		'label'    => 'Use safe font?',
		'section'  => 'zerif_general_section',
		'priority' => 1
	) );

	/* Disable preloader */
	$wp_customize->add_setting( 'zerif_disable_preloader', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'zerif_disable_preloader', array(
		'type'     => 'checkbox',
		'label'    => __( 'Disable preloader?', 'zerif-lite' ),
		'section'  => 'zerif_general_section',
		'priority' => 2,
	) );

	/* Disable smooth scroll */
	$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'zerif_disable_smooth_scroll', array(
		'type'     => 'checkbox',
		'label'    => __( 'Disable smooth scroll?', 'zerif-lite' ),
		'section'  => 'zerif_general_section',
		'priority' => 3,
	) );

	/* Enable accessibility */
	$wp_customize->add_setting( 'zerif_accessibility', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'zerif_accessibility', array(
		'type'     => 'checkbox',
		'label'    => __( 'Enable accessibility?', 'zerif-lite' ),
		'section'  => 'zerif_general_section',
		'priority' => 4,
	) );

	/* Change the template to full width for page.php */
	$wp_customize->add_setting( 'zerif_change_to_full_width', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'zerif_change_to_full_width', array(
		'type'     => 'checkbox',
		'label'    => 'Change the template to Full width for all the pages?',
		'section'  => 'zerif_general_section',
		'priority' => 6
	) );

	/**
	 * Option to get the frontpage settings to the old default template if a static frontpage is selected
	 * Only for new users
	 */
	if ( ! zerif_check_if_old_version_of_theme() ) {
		$wp_customize->add_setting( 'zerif_keep_old_fp_template', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'zerif_keep_old_fp_template', array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Keep the old static frontpage template?', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority' => 7,
		) );
	}

	$wp_customize->get_section( 'colors' )->panel           = 'zerif_advanced_options_panel';
	$wp_customize->get_section( 'background_image' )->panel = 'zerif_advanced_options_panel';

	if ( ! zerif_check_if_old_version_of_theme() ) {
		$wp_customize->add_section( 'zerif_blog_header_section', array(
			'title' => __( 'Blog Header Options', 'zerif-lite' ),
			'panel' => 'zerif_advanced_options_panel',
		) );

		/* Blog Header Title */
		$wp_customize->add_setting( 'zerif_blog_header_title', array(
			'default'           => esc_html__( 'Blog', 'zerif-lite' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_html',
		) );

		$wp_customize->add_control( 'zerif_blog_header_title', array(
			'label'    => __( 'Title', 'zerif-lite' ),
			'section'  => 'zerif_blog_header_section',
			'priority' => 1,
		) );

		/* Blog Header Subtitle */
		$wp_customize->add_setting( 'zerif_blog_header_subtitle', array(
			'default'           => esc_html__( 'Zerif supports a custom frontpage', 'zerif-lite' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_html',
		) );

		$wp_customize->add_control( 'zerif_blog_header_subtitle', array(
			'label'    => __( 'Subtitle', 'zerif-lite' ),
			'section'  => 'zerif_blog_header_section',
			'priority' => 2,
		) );

		$wp_customize->selective_refresh->add_partial( 'zerif_blog_header_title_subtitle', array(
			'selector'        => '.blog-header-wrap',
			'settings'        => array( 'zerif_blog_header_title', 'zerif_blog_header_subtitle' ),
			'render_callback' => 'zerif_blog_header_title_subtitle_callback',
		) );

		function zerif_blog_header_title_subtitle_callback() {
			$title    = get_theme_mod( 'zerif_blog_header_title' );
			$subtitle = get_theme_mod( 'zerif_blog_header_subtitle' );
			$output   = '';
			if ( ! empty( $title ) || ! empty( $subtitle ) ) {
				$output .= '<div class="blog-header-content-wrap">';

				if ( ! empty( $title ) ) {
					$output .= '<h1 class="intro-text">' . esc_html( $title ) . '</h1>';
				}

				if ( ! empty( $subtitle ) ) {
					$output .= '<p class="blog-header-subtitle">' . esc_html( $subtitle ) . '</p>';
				}

				$output .= '</div>';
			}

			return $output;
		}
	}

	/********************************************************************/
	/*************  FRONTPAGE SECTIONS PANEL ****************************/
	/********************************************************************/
	if ( zerif_check_if_wp_greater_than_4_7() ) {

		$zerif_frontpage_sections_panel = new Zerif_WP_Customize_Panel( $wp_customize, 'zerif_frontpage_sections_panel', array(
			'title'    => esc_html__( 'Frontpage sections', 'zerif-lite' ),
			'priority' => 29,
		) );

		$wp_customize->add_panel( $zerif_frontpage_sections_panel );
	}

	/*****************************************************/
	/**************    BIG TITLE SECTION *******************/
	/****************************************************/
	if ( zerif_check_if_wp_greater_than_4_7() ) {

		$panel_big_title = new Zerif_WP_Customize_Panel( $wp_customize, 'panel_big_title', array(
			'title'    => esc_html__( 'Big title section', 'zerif-lite' ),
			'priority' => 30,
			'panel'    => 'zerif_frontpage_sections_panel'
		) );

		$wp_customize->add_panel( $panel_big_title );

	} else {

		$wp_customize->add_panel( 'panel_big_title', array(
			'title'    => esc_html__( 'Big title section', 'zerif-lite' ),
			'priority' => 30,
		) );

	}

	$wp_customize->add_section( 'zerif_bigtitle_section', array(
		'title'    => __( 'Main content', 'zerif-lite' ),
		'priority' => 1,
		'panel'    => 'panel_big_title'
	) );

	/* show/hide */
	$wp_customize->add_setting( 'zerif_bigtitle_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_bigtitle_show', array(
		'type'     => 'checkbox',
		'label'    => __( 'Hide big title section?', 'zerif-lite' ),
		'section'  => 'zerif_bigtitle_section',
		'priority' => 1,
	) );

	/* title */

	/*
	 * define a new option with _2 to be used to differentiate between the old users and new ones
	 *
	 * get the old option's value and put it as default for the new _2 option
	 */

	$zerif_bigtitle_title_default = get_theme_mod( 'zerif_bigtitle_title' );

	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_bigtitle_title_2', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => ! empty( $zerif_bigtitle_title_default ) ? $zerif_bigtitle_title_default : sprintf( __( 'This piece of text can be changed in %s', 'zerif-lite' ), __( 'Big title section', 'zerif-lite' ) ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_bigtitle_title_2', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_bigtitle_title_2', array(
		'label'    => __( 'Title', 'zerif-lite' ),
		'section'  => 'zerif_bigtitle_section',
		'priority' => 2,
	) );


	/* red button */

	/*
	 * define a new option with _2 to be used to differentiate between the old users and new ones
	 *
	 * get the old option's value and put it as default for the new _2 option
	 */
	$zerif_bigtitle_redbutton_label_default = get_theme_mod( 'zerif_bigtitle_redbutton_label' );

	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_label_2', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => ! empty( $zerif_bigtitle_redbutton_label_default ) ? $zerif_bigtitle_redbutton_label_default : __( 'Customize this button', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_label_2', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_bigtitle_redbutton_label_2', array(
		'label'    => __( 'Red button label', 'zerif-lite' ),
		'section'  => 'zerif_bigtitle_section',
		'priority' => 3,
	) );

	$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => esc_url( home_url( '/' ) ) . '#focus',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(
		'label'    => __( 'Red button link', 'zerif-lite' ),
		'section'  => 'zerif_bigtitle_section',
		'priority' => 4,
	) );

	/* green button */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( "Customize this button", 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_label', array(
		'label'    => __( 'Green button label', 'zerif-lite' ),
		'section'  => 'zerif_bigtitle_section',
		'priority' => 5,
	) );

	$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => esc_url( home_url( '/' ) ) . '#focus',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(
		'label'    => __( 'Green button link', 'zerif-lite' ),
		'section'  => 'zerif_bigtitle_section',
		'priority' => 6,
	) );

	/* Slider shortcode  */
	$wp_customize->add_setting( 'zerif_bigtitle_slider_shortcode', array(
		'sanitize_callback' => 'zerif_sanitize_input',
	) );

	$wp_customize->add_control( 'zerif_bigtitle_slider_shortcode', array(
		'label'           => __( 'Slider shortcode', 'zerif-lite' ),
		'description'     => __( 'You can replace the homepage slider with any plugin you like, just copy the shortcode generated and paste it here.', 'zerif-lite' ),
		'section'         => 'zerif_bigtitle_section',
		'priority'        => 7,
	) );

	/****************************************************/
	/************    PARALLAX IMAGES *********************/
	/****************************************************/

	$wp_customize->add_section( 'zerif_parallax_section', array(
		'title'    => __( 'Parallax effect', 'zerif-lite' ),
		'priority' => 2,
		'panel'    => 'panel_big_title'
	) );

	/* show/hide */
	$wp_customize->add_setting( 'zerif_parallax_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'zerif_parallax_show', array(
		'type'     => 'checkbox',
		'label'    => __( 'Use parallax effect?', 'zerif-lite' ),
		'section'  => 'zerif_parallax_section',
		'priority' => 1,
	) );

	/* IMAGE 1*/
	$wp_customize->add_setting( 'zerif_parallax_img1', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => get_template_directory_uri() . '/images/background1.jpg'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
		'label'    => __( 'Image 1', 'zerif-lite' ),
		'section'  => 'zerif_parallax_section',
		'settings' => 'zerif_parallax_img1',
		'priority' => 1,
	) ) );

	/* IMAGE 2 */
	$wp_customize->add_setting( 'zerif_parallax_img2', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => get_template_directory_uri() . '/images/background2.png'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
		'label'    => __( 'Image 2', 'zerif-lite' ),
		'section'  => 'zerif_parallax_section',
		'settings' => 'zerif_parallax_img2',
		'priority' => 2,
	) ) );


	/********************************************************************/
	/*************  OUR FOCUS SECTION **********************************/
	/*******************************************************************/


	$wp_customize->add_section( 'zerif_ourfocus_section', array(
		'title'    => __( 'Our focus section', 'zerif-lite' ),
		'priority' => 31,
	) );

	if ( zerif_check_if_wp_greater_than_4_7() ) {
		$wp_customize->get_section( 'zerif_ourfocus_section' )->panel = 'zerif_frontpage_sections_panel';
	}

	/* show/hide */
	$wp_customize->add_setting( 'zerif_ourfocus_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_ourfocus_show', array(
		'type'     => 'checkbox',
		'label'    => __( 'Hide our focus section?', 'zerif-lite' ),
		'section'  => 'zerif_ourfocus_section',
		'priority' => - 3,
	) );

	/* our focus title */

	/*
	 * define a new option with _2 to be used to differentiate between the old users and new ones
	 *
	 * get the old option's value and put it as default for the new _2 option
	 *
	 */

	$zerif_ourfocus_title_default = get_theme_mod( 'zerif_ourfocus_title' );

	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_ourfocus_title_2', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => ! empty( $zerif_ourfocus_title_default ) ? $zerif_ourfocus_title_default : __( 'FEATURES', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_ourfocus_title_2', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}
	$wp_customize->add_control( 'zerif_ourfocus_title_2', array(
		'label'    => __( 'Title', 'zerif-lite' ),
		'section'  => 'zerif_ourfocus_section',
		'priority' => - 2,
	) );

	/* our focus subtitle */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => sprintf( __( 'Change this subtitle in %s', 'zerif-lite' ), __( 'Our focus section', 'zerif-lite' ) ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(
		'label'    => __( 'Our focus subtitle', 'zerif-lite' ),
		'section'  => 'zerif_ourfocus_section',
		'priority' => - 1,
	) );


	$our_focus_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-ourfocus' );
	if ( ! empty( $our_focus_section ) ) {
		if ( zerif_check_if_wp_greater_than_4_7() ) {
			$our_focus_section->panel = 'zerif_frontpage_sections_panel';
		} else {
			$our_focus_section->panel = '';
		}
		$our_focus_section->title                                        = __( 'Our focus section', 'zerif-lite' );
		$our_focus_section->priority                                     = 31;
		$wp_customize->get_control( 'zerif_ourfocus_show' )->section     = 'sidebar-widgets-sidebar-ourfocus';
		$wp_customize->get_control( 'zerif_ourfocus_title_2' )->section  = 'sidebar-widgets-sidebar-ourfocus';
		$wp_customize->get_control( 'zerif_ourfocus_subtitle' )->section = 'sidebar-widgets-sidebar-ourfocus';
	}

	/******************************************/
	/**********    ABOUT US SECTION **************/
	/******************************************/

	if ( zerif_check_if_wp_greater_than_4_7() ) {

		$panel_about = new Zerif_WP_Customize_Panel( $wp_customize, 'panel_about', array(
			'priority' => 32,
			'title'    => __( 'About us section', 'zerif-lite' ),
			'panel'    => 'zerif_frontpage_sections_panel'
		) );

		$wp_customize->add_panel( $panel_about );

	} else {

		$wp_customize->add_panel( 'panel_about', array(
			'priority' => 32,
			'title'    => __( 'About us section', 'zerif-lite' )
		) );

	}

	$wp_customize->add_section( 'zerif_aboutus_main_section', array(
		'title'    => __( 'Main content', 'zerif-lite' ),
		'priority' => 2,
		'panel'    => 'panel_about'
	) );

	/* about us show/hide */
	$wp_customize->add_setting( 'zerif_aboutus_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_aboutus_show', array(
		'type'     => 'checkbox',
		'label'    => __( 'Hide about us section?', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_main_section',
		'priority' => 1,
	) );

	/* title */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'About', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_aboutus_title', array(
		'label'    => __( 'Title', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_main_section',
		'priority' => 2,
	) );

	/* subtitle */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => sprintf( __( 'Change this subtitle in %s', 'zerif-lite' ), __( 'About us section', 'zerif-lite' ) ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_aboutus_subtitle', array(
		'label'    => __( 'Subtitle', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_main_section',
		'priority' => 3,
	) );

	/* big left title */
	$zerif_aboutus_biglefttitle_default = '';
	if ( defined( 'THEMEISLE_COMPANION_VERSION' ) ) {
		$zerif_aboutus_biglefttitle_default = 'Everything you see here is responsive and mobile-friendly.';
	}

	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => $zerif_aboutus_biglefttitle_default,
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
		'label'    => __( 'Big left side title', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_main_section',
		'priority' => 4,
	) );

	/* text */
	$zerif_aboutus_text_default = sprintf( __( 'Change this text in %s', 'zerif-lite' ), __( 'About us section', 'zerif-lite' ) );
	if ( defined( 'THEMEISLE_COMPANION_VERSION' ) ) {
		$zerif_aboutus_text_default = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.';
	}

	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => $zerif_aboutus_text_default,
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_aboutus_text', array(
		'type'     => 'textarea',
		'label'    => __( 'Text', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_main_section',
		'priority' => 5,
	) );

	$wp_customize->add_section( 'zerif_aboutus_feat1_section', array(
		'title'    => __( 'Feature no#1', 'zerif-lite' ),
		'priority' => 3,
		'panel'    => 'panel_about'
	) );

	/* feature no#1 */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'Edit skill', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_aboutus_feature1_title', array(
		'label'    => __( 'Feature no1 title', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat1_section',
		'priority' => 6,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(
		'label'    => __( 'Feature no1 text', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat1_section',
		'priority' => 7,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array(
		'sanitize_callback' => 'absint',
		'default'           => '80'
	) );

	$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature1_nr', array(
		'type'     => 'number',
		'label'    => __( 'Feature no1 percentage', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat1_section',
		'priority' => 8
	) ) );

	$wp_customize->add_section( 'zerif_aboutus_feat2_section', array(
		'title'    => __( 'Feature no#2', 'zerif-lite' ),
		'priority' => 4,
		'panel'    => 'panel_about'
	) );

	/* feature no#2 */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'Edit skill', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_aboutus_feature2_title', array(
		'label'    => __( 'Feature no2 title', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat2_section',
		'priority' => 9,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(
		'label'    => __( 'Feature no2 text', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat2_section',
		'priority' => 10,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array(
		'sanitize_callback' => 'absint',
		'default'           => '91'
	) );

	$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature2_nr', array(
		'type'     => 'number',
		'label'    => __( 'Feature no2 percentage', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat2_section',
		'priority' => 11
	) ) );

	$wp_customize->add_section( 'zerif_aboutus_feat3_section', array(
		'title'    => __( 'Feature no#3', 'zerif-lite' ),
		'priority' => 5,
		'panel'    => 'panel_about'
	) );

	/* feature no#3 */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'Edit skill', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_aboutus_feature3_title', array(
		'label'    => __( 'Feature no3 title', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat3_section',
		'priority' => 12,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(
		'label'    => __( 'Feature no3 text', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat3_section',
		'priority' => 13,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array(
		'sanitize_callback' => 'absint',
		'default'           => '88'
	) );

	$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature3_nr', array(
		'type'     => 'number',
		'label'    => __( 'Feature no3 percentage', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat3_section',
		'priority' => 14
	) ) );

	$wp_customize->add_section( 'zerif_aboutus_feat4_section', array(
		'title'    => __( 'Feature no#4', 'zerif-lite' ),
		'priority' => 6,
		'panel'    => 'panel_about'
	) );

	/* feature no#4 */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'Edit skill', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}
	$wp_customize->add_control( 'zerif_aboutus_feature4_title', array(
		'label'    => __( 'Feature no4 title', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat4_section',
		'priority' => 15,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(
		'label'    => __( 'Feature no4 text', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat4_section',
		'priority' => 16,
	) );

	$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array(
		'sanitize_callback' => 'absint',
		'default'           => '95'
	) );

	$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature4_nr', array(
		'type'     => 'number',
		'label'    => __( 'Feature no4 percentage', 'zerif-lite' ),
		'section'  => 'zerif_aboutus_feat4_section',
		'priority' => 17
	) ) );

	/* ABOUT US CLIENTS TITLE */

	$wp_customize->add_section( 'zerif_aboutus_clients_title_section', array(
		'title'    => 'Clients area title',
		'priority' => 7,
		'panel'    => 'panel_about'
	) );

	$wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
		'label'       => 'Title',
		'section'     => 'zerif_aboutus_clients_title_section',
		'priority'    => -1,
	) );

	$aboutus_section = $wp_customize->get_section('sidebar-widgets-sidebar-aboutus');
	if( !empty( $aboutus_section ) ) {
		if ( zerif_check_if_wp_greater_than_4_7() ) {
			$aboutus_section->panel = 'zerif_frontpage_sections_panel';
		} else {
			$aboutus_section->panel = 'panel_about';
		}
		$aboutus_section->title = __( 'Clients area', 'zerif-lite' );
		$aboutus_section->priority = 10;
		$wp_customize->get_control( 'zerif_aboutus_clients_title_text' )->section = 'sidebar-widgets-sidebar-aboutus';

	}

	/******************************************/
	/**********	OUR TEAM SECTION **************/
	/******************************************/

	$wp_customize->add_section( 'zerif_ourteam_section' , array(
		'title'       => __( 'Content', 'zerif-lite' ),
		'priority'    => 33
	) );

	if ( zerif_check_if_wp_greater_than_4_7() ) {

		$wp_customize->get_section( 'zerif_ourteam_section' )->panel = 'zerif_frontpage_sections_panel';

	}

	/* our team show/hide */
	$wp_customize->add_setting( 'zerif_ourteam_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'zerif_ourteam_show', array(
		'type' => 'checkbox',
		'label' => __('Hide our team section?','zerif-lite'),
		'section' => 'zerif_ourteam_section',
		'priority'    => -3,
	));

	/* our team title */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_ourteam_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'YOUR TEAM','zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_ourteam_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_ourteam_title', array(
		'label'    => __( 'Title', 'zerif-lite' ),
		'section'  => 'zerif_ourteam_section',
		'priority'    => -2,
	));

	/* our team subtitle */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_ourteam_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => sprintf( __( 'Change this subtitle in %s','zerif-lite' ), __( 'Our team section','zerif-lite' ) ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_ourteam_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_ourteam_subtitle', array(
		'label'    => __( 'Our team subtitle', 'zerif-lite' ),
		'section'  => 'zerif_ourteam_section',
		'priority'    => -1,
	));

	$our_team_section = $wp_customize->get_section('sidebar-widgets-sidebar-ourteam');
	if( ! empty( $our_team_section ) ) {

		if ( zerif_check_if_wp_greater_than_4_7() ) {
			$our_team_section->panel = 'zerif_frontpage_sections_panel';
		} else {
			$our_team_section->panel = '';
		}
		$our_team_section->title                                        = __( 'Our team section', 'zerif-lite' );
		$our_team_section->priority                                     = 33;
		$wp_customize->get_control( 'zerif_ourteam_show' )->section     = 'sidebar-widgets-sidebar-ourteam';
		$wp_customize->get_control( 'zerif_ourteam_title' )->section    = 'sidebar-widgets-sidebar-ourteam';
		$wp_customize->get_control( 'zerif_ourteam_subtitle' )->section = 'sidebar-widgets-sidebar-ourteam';
	}

	/**********************************************/
	/**********	TESTIMONIALS SECTION **************/
	/**********************************************/

	$wp_customize->add_section( 'zerif_testimonials_section' , array(
		'title'       => __( 'Testimonials section', 'zerif-lite' ),
		'priority'    => 34
	));

	if ( zerif_check_if_wp_greater_than_4_7() ) {
		$wp_customize->add_section( 'zerif_testimonials_section' )->panel = 'zerif_frontpage_sections_panel';
	}

	/* testimonials show/hide */
	$wp_customize->add_setting( 'zerif_testimonials_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'zerif_testimonials_show', array(
		'type' => 'checkbox',
		'label' => __('Hide testimonials section?','zerif-lite'),
		'section' => 'zerif_testimonials_section',
		'priority'    => -4,
	));

	/* testimonial pinterest layout */
	$wp_customize->add_setting( 'zerif_testimonials_pinterest_style', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	));

	$wp_customize->add_control( 'zerif_testimonials_pinterest_style', array(
		'type' 			=> 'checkbox',
		'label' 		=> __('Use pinterest layout?','zerif-lite'),
		'section' 		=> 'zerif_testimonials_section',
		'priority'    	=> -3,
	));

	/* testimonials title */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_testimonials_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default' => __( 'Testimonials','zerif-lite' ),
			'transport' => 'postMessage'
		));
	} else {
		$wp_customize->add_setting( 'zerif_testimonials_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));
	}

	$wp_customize->add_control( 'zerif_testimonials_title', array(
		'label'    => __( 'Title', 'zerif-lite' ),
		'section'  => 'zerif_testimonials_section',
		'priority'    => -2,
	));

	/* testimonials subtitle */
	$wp_customize->add_setting( 'zerif_testimonials_subtitle', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'zerif_testimonials_subtitle', array(
		'label'    => __( 'Testimonials subtitle', 'zerif-lite' ),
		'section'  => 'zerif_testimonials_section',
		'priority'    => -1,
	));

	$testimonials_section = $wp_customize->get_section('sidebar-widgets-sidebar-testimonials');
	if( ! empty($our_team_section) ) {

		if ( zerif_check_if_wp_greater_than_4_7() ) {
			$testimonials_section->panel = 'zerif_frontpage_sections_panel';
		} else {
			$testimonials_section->panel = '';
		}
		$testimonials_section->title                                        = __( 'Testimonials section', 'zerif-lite' );
		$testimonials_section->priority                                     = 34;
		$wp_customize->get_control( 'zerif_testimonials_show' )->section     = 'sidebar-widgets-sidebar-testimonials';
		$wp_customize->get_control( 'zerif_testimonials_pinterest_style' )->section     = 'sidebar-widgets-sidebar-testimonials';
		$wp_customize->get_control( 'zerif_testimonials_title' )->section    = 'sidebar-widgets-sidebar-testimonials';
		$wp_customize->get_control( 'zerif_testimonials_subtitle' )->section = 'sidebar-widgets-sidebar-testimonials';
	}

	/***********************************************************/
	/********* RIBBONS ****************************************/
	/**********************************************************/

	if ( zerif_check_if_wp_greater_than_4_7() ) {

		$panel_ribbons = new Zerif_WP_Customize_Panel( $wp_customize, 'panel_ribbons', array(
			'priority' => 37,
			'title'    => __( 'Ribbon sections', 'zerif-lite' ),
			'panel'    => 'zerif_frontpage_sections_panel'
		) );

		$wp_customize->add_panel( $panel_ribbons );

	} else {

		$wp_customize->add_panel( 'panel_ribbons', array(
			'priority' => 37,
			'title'    => __( 'Ribbon sections', 'zerif-lite' )
		) );

	}

	$wp_customize->add_section( 'zerif_bottomribbon_section', array(
		'title'    => __( 'BottomButton Ribbon', 'zerif-lite' ),
		'priority' => 1,
		'panel'    => 'panel_ribbons'
	) );

	/* RIBBON SECTION WITH BOTTOM BUTTON */

	$zerif_bottomribbon_text_default = '';
	$zerif_bottomribbon_buttonlabel_default = '';
	$zerif_bottomribbon_buttonlink_default = '';

	/* For new users, add default values for the Ribbon section controls */
	if ( ! zerif_check_if_old_version_of_theme() && current_user_can( 'edit_theme_options' ) ) {
		$zerif_bottomribbon_text_default = __( 'Change this text in BottomButton Ribbon','zerif-lite' );
		$zerif_bottomribbon_buttonlabel_default = __( 'Get in touch','zerif-lite' );
		$zerif_bottomribbon_buttonlink_default = esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_bottomribbon_buttonlink' ) );
	}

	/* text */
	$wp_customize->add_setting( 'zerif_bottomribbon_text', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'default' => $zerif_bottomribbon_text_default,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_bottomribbon_text', array(
		'type'     => 'textarea',
		'label'    => __( 'Text', 'zerif-lite' ),
		'section'  => 'zerif_bottomribbon_section',
		'priority' => 1,
	) );

	/* button label */
	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'default' => $zerif_bottomribbon_buttonlabel_default,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(
		'label'    => __( 'Button label', 'zerif-lite' ),
		'section'  => 'zerif_bottomribbon_section',
		'priority' => 2,
	) );

	/* button link */
	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array(
		'sanitize_callback' => 'esc_url_raw',
		'default' => $zerif_bottomribbon_buttonlink_default,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(
		'label'    => __( 'Button link', 'zerif-lite' ),
		'section'  => 'zerif_bottomribbon_section',
		'priority' => 3,
	) );

	/* RIBBON SECTION WITH BUTTON IN THE RIGHT SIDE */

	$zerif_ribbonright_text_default = '';
	$zerif_ribbonright_buttonlabel_default = '';
	$zerif_ribbonright_buttonlink_default = '';

	/* For new users, add default values for the Ribbon section controls */
	if ( ! zerif_check_if_old_version_of_theme() && current_user_can( 'edit_theme_options' ) ) {
		$zerif_ribbonright_text_default = __( 'Change this text in RightButton Ribbon','zerif-lite' );
		$zerif_ribbonright_buttonlabel_default = __( 'Get in touch','zerif-lite' );
		$zerif_ribbonright_buttonlink_default = esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_ribbonright_buttonlink' ) );
	}

	$wp_customize->add_section( 'zerif_rightribbon_section', array(
		'title'    => __( 'RightButton Ribbon', 'zerif-lite' ),
		'priority' => 2,
		'panel'    => 'panel_ribbons'
	) );

	/* text */
	$wp_customize->add_setting( 'zerif_ribbonright_text', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'default' => $zerif_ribbonright_text_default,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_ribbonright_text', array(
		'type'     => 'textarea',
		'label'    => __( 'Text', 'zerif-lite' ),
		'section'  => 'zerif_rightribbon_section',
		'priority' => 4,
	) );

	/* button label */
	$wp_customize->add_setting( 'zerif_ribbonright_buttonlabel', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'default' => $zerif_ribbonright_buttonlabel_default,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_ribbonright_buttonlabel', array(
		'label'    => __( 'Button label', 'zerif-lite' ),
		'section'  => 'zerif_rightribbon_section',
		'priority' => 5,
	) );

	/* button link */
	$wp_customize->add_setting( 'zerif_ribbonright_buttonlink', array(
		'sanitize_callback' => 'esc_url_raw',
		'default' => $zerif_ribbonright_buttonlink_default,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_ribbonright_buttonlink', array(
		'label'    => __( 'Button link', 'zerif-lite' ),
		'section'  => 'zerif_rightribbon_section',
		'priority' => 6,
	) );

	/**********************************************/
	/**********	LATEST NEWS SECTION ***************/
	/**********************************************/
	$wp_customize->add_section( 'zerif_latestnews_section' , array(
		'title'       => __( 'Latest News section', 'zerif-lite' ),
		'priority'    => 35
	) );

	if ( zerif_check_if_wp_greater_than_4_7() ) {
		$wp_customize->get_section( 'zerif_latestnews_section' )->panel = 'zerif_frontpage_sections_panel';
	}

	/* latest news show/hide */
	$wp_customize->add_setting( 'zerif_latestnews_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_latestnews_show', array(
		'type' => 'checkbox',
		'label' => __('Hide latest news section?','zerif-lite'),
		'section' => 'zerif_latestnews_section',
		'priority'    => 1,
	) );

	/* latest news title */
	$wp_customize->add_setting( 'zerif_latestnews_title', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_latestnews_title', array(
		'label'    		=> __( 'Latest News title', 'zerif-lite' ),
		'section'  		=> 'zerif_latestnews_section',
		'priority'    	=> 2,
	) );

	/* latest news subtitle */
	$wp_customize->add_setting( 'zerif_latestnews_subtitle', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_latestnews_subtitle', array(
		'label'    		=> __( 'Latest News subtitle', 'zerif-lite' ),
		'section'  		=> 'zerif_latestnews_section',
		'priority'   	=> 3,
	) );

	/*******************************************************/
	/************	CONTACT US SECTION *********************/
	/*******************************************************/

	$zerif_contact_us_section_description = '';

	/* if Pirate Forms is installed */
	if( defined("PIRATE_FORMS_VERSION") ):
		$zerif_contact_us_section_description = __( 'For more advanced settings please go to Settings -> Pirate Forms','zerif-lite' );
	endif;

	$wp_customize->add_section( 'zerif_contactus_section' , array(
		'title'       => __( 'Contact us section', 'zerif-lite' ),
		'description' => $zerif_contact_us_section_description,
		'priority'    => 36
	) );

	if ( zerif_check_if_wp_greater_than_4_7() ) {
		$wp_customize->get_section( 'zerif_contactus_section' )->panel = 'zerif_frontpage_sections_panel';
	}

	/* contact us show/hide */
	$wp_customize->add_setting( 'zerif_contactus_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_contactus_show', array(
		'type' => 'checkbox',
		'label' => __('Hide contact us section?','zerif-lite'),
		'section' => 'zerif_contactus_section',
		'priority'    => 1,
	) );

	/* contactus title */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_contactus_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'Get in touch','zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_contactus_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_contactus_title', array(
		'label'    => __( 'Contact us section title', 'zerif-lite' ),
		'section'  => 'zerif_contactus_section',
		'priority'    => 2,
	) );

	/* contactus subtitle */

	$contactus_subtitle_default = '';
	if( ! defined("PIRATE_FORMS_VERSION") ) {
		$contactus_subtitle_default = sprintf( __( 'You need to install %s to create a contact form.','zerif-lite' ), 'Pirate Forms' );
	}

	$wp_customize->add_setting( 'zerif_contactus_subtitle', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'default'           => $contactus_subtitle_default,
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_contactus_subtitle', array(
		'label'    => __( 'Contact us section subtitle', 'zerif-lite' ),
		'section'  => 'zerif_contactus_section',
		'priority'    => 3,
	) );

	/* contactus email */
	$wp_customize->add_setting( 'zerif_contactus_email', array(
		'sanitize_callback' => 'sanitize_email'
	) );
	$wp_customize->add_control( 'zerif_contactus_email', array(
		'label'    => __( 'Email address', 'zerif-lite' ),
		'section'  => 'zerif_contactus_section',
		'priority'    => 4,
	) );
	/* contactus button label */
	$wp_customize->add_setting( 'zerif_contactus_button_label', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'default' => __('Send Message','zerif-lite'),
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_contactus_button_label', array(
		'label'    => __( 'Button label', 'zerif-lite' ),
		'section'  => 'zerif_contactus_section',
		'priority'    => 5,
	) );

	/* recaptcha */
	$wp_customize->add_setting( 'zerif_contactus_recaptcha_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'zerif_contactus_recaptcha_show', array(
		'type' => 'checkbox',
		'label' => __('Hide reCaptcha?','zerif-lite'),
		'section' => 'zerif_contactus_section',
		'priority'    => 6,
	) );

	/* site key */
	$attribut_new_tab = (isset($zerif_accessibility) && ($zerif_accessibility != 1) ? ' target="_blank"' : '' );
	$wp_customize->add_setting( 'zerif_contactus_sitekey', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'zerif_contactus_sitekey', array(
		'label'    => __( 'Site key', 'zerif-lite' ),
		'description' => '<a'.$attribut_new_tab.' href="https://www.google.com/recaptcha/admin#list">'.__('Create an account here','zerif-lite').'</a> to get the Site key and the Secret key for the reCaptcha.',
		'section'  => 'zerif_contactus_section',
		'priority'    => 7,
	) );

	/* secret key */
	$wp_customize->add_setting( 'zerif_contactus_secretkey', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'zerif_contactus_secretkey', array(
		'label'    => __( 'Secret key', 'zerif-lite' ),
		'section'  => 'zerif_contactus_section',
		'priority'    => 8,
	) );

	/****************************************************/
	/***************** FOOTER OPTIONS ******************/
	/***************************************************/

	$wp_customize->add_panel( 'panel_footer', array(
		'priority'   => 90,
		'capability' => 'edit_theme_options',
		'title'      => __( 'Footer options', 'zerif-lite' )
	) );

	$wp_customize->add_section( 'zerif_general_socials_section', array(
		'title'    => __( 'Footer Social Icons', 'zerif-lite' ),
		'priority' => 31,
		'panel'    => 'panel_footer'
	) );

	/* facebook */
	$wp_customize->add_setting( 'zerif_socials_facebook', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_socials_facebook', array(
		'label'    => __( 'Facebook link', 'zerif-lite' ),
		'section'  => 'zerif_general_socials_section',
		'priority' => 4,
	) );

	/* twitter */
	$wp_customize->add_setting( 'zerif_socials_twitter', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_socials_twitter', array(
		'label'    => __( 'Twitter link', 'zerif-lite' ),
		'section'  => 'zerif_general_socials_section',
		'priority' => 5,
	) );

	/* linkedin */
	$wp_customize->add_setting( 'zerif_socials_linkedin', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_control( 'zerif_socials_linkedin', array(
		'label'    => __( 'Linkedin link', 'zerif-lite' ),
		'section'  => 'zerif_general_socials_section',
		'priority' => 6,
	) );

	/* behance */
	$wp_customize->add_setting( 'zerif_socials_behance', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_socials_behance', array(
		'label'    => __( 'Behance link', 'zerif-lite' ),
		'section'  => 'zerif_general_socials_section',
		'priority' => 7,
	) );

	/* dribbble */
	$wp_customize->add_setting( 'zerif_socials_dribbble', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_socials_dribbble', array(
		'label'    => __( 'Dribbble link', 'zerif-lite' ),
		'section'  => 'zerif_general_socials_section',
		'priority' => 8,
	) );

	/* instagram */
	$wp_customize->add_setting( 'zerif_socials_instagram', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_socials_instagram', array(
		'label'    => __( 'Instagram link', 'zerif-lite' ),
		'section'  => 'zerif_general_socials_section',
		'priority' => 9,
	) );

	$wp_customize->add_section( 'zerif_general_footer_section', array(
		'title'    => __( 'Footer Content', 'zerif-lite' ),
		'priority' => 32,
		'panel'    => 'panel_footer'
	) );

	/* COPYRIGHT */
	$wp_customize->add_setting( 'zerif_copyright', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'zerif_copyright', array(
		'label'    => __( 'Footer Copyright', 'zerif-lite' ),
		'section'  => 'zerif_general_footer_section',
		'priority' => 5,
	) );

	/* address - ICON */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_address_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri().'/images/map25-redish.png',
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_address_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(
		'label'    => __( 'Address section - icon', 'zerif-lite' ),
		'section'  => 'zerif_general_footer_section',
		'priority' => 9,
	) ) );

	/* address */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_address', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'Company address', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_address', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_address', array(
		'label'    => __( 'Address', 'zerif-lite' ),
		'type'     => 'textarea',
		'section'  => 'zerif_general_footer_section',
		'priority' => 10
	) );

	/* email - ICON */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_email_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri().'/images/envelope4-green.png',
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_email_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(
		'label'    => __( 'Email section - icon', 'zerif-lite' ),
		'section'  => 'zerif_general_footer_section',
		'priority' => 11,
	) ) );

	/* email */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_email', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( 'youremail@site.com', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_email', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_email', array(
		'label'    => __( 'Email', 'zerif-lite' ),
		'type'     => 'textarea',
		'section'  => 'zerif_general_footer_section',
		'priority' => 12
	) );

	/* phone number - ICON */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_phone_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri().'/images/telephone65-blue.png',
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_phone_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(
		'label'    => __( 'Phone number section - icon', 'zerif-lite' ),
		'section'  => 'zerif_general_footer_section',
		'priority' => 13,
	) ) );

	/* phone number */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_phone', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => __( '0 332 548 954', 'zerif-lite' ),
			'transport'         => 'postMessage'
		) );
	} else {
		$wp_customize->add_setting( 'zerif_phone', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport'         => 'postMessage'
		) );
	}

	$wp_customize->add_control( 'zerif_phone', array(
		'label'    => __( 'Phone number', 'zerif-lite' ),
		'type'     => 'textarea',
		'section'  => 'zerif_general_footer_section',
		'priority' => 14
	) );

}
add_action( 'customize_register', 'zerif_customize_register' );


function zerif_customize_late_register( $wp_customize ) {

}
add_action( 'customize_register', 'zerif_customize_late_register',999 );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zerif_customize_preview_js() {
	wp_enqueue_script( 'zerif_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'zerif_customize_preview_js' );

function zerif_sanitize_input($input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function zerif_sanitize_checkbox( $input ){
	return ( isset( $input ) && true == $input ? true : false );
}

function zerif_late_registers(){

	wp_enqueue_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery"), '1.0.8', true  );

	wp_localize_script( 'zerif_customizer_script', 'zerifLiteCustomizerObject', array(

		'tooltip_safefont' => sprintf( '%1$s <br><br> %2$s', __( 'Zerif Lite main font is Montserrat, which only supports the Latin script.','zerif-lite' ), __( 'If you are using other scripts like Cyrillic or Greek , you need to check this box to enable the safe fonts for better compatibility.','zerif-lite' ) ),
		'tooltip_accessibility' => sprintf( '%1$s <br><br> %2$s', __( 'Web accessibility means that people with disabilities can use the Web. More specifically, Web accessibility means that people with disabilities can perceive, understand, navigate, and interact with the Web, and that they can contribute to the Web.','zerif-lite' ), __( 'Web accessibility also benefits others, including older people with changing abilities due to aging.','zerif-lite' ) ),
		'tooltip_smoothscroll' => sprintf( '%1$s <br><br> %2$s', __( 'Smooth scrolling can be very useful if you read a lot of long pages. Normally, when you press Page Down, the view jumps directly down one page.','zerif-lite' ), __( 'With smooth scrolling, it slides down smoothly, so you can see how much it scrolls. This makes it easier to resume reading from where you were before.','zerif-lite' ) ),
		'tooltip_preloader' => sprintf( '%1$s <br><br> %2$s', __( 'The preloader is the circular progress element that first appears on the site. When the loader finishes its progress animation, the whole page elements are revealed.','zerif-lite' ), __( 'The preloader is used as a creative way to make waiting a bit less boring for the visitor.','zerif-lite' ) )
		) );

	wp_enqueue_script( 'zerif_multiple_panels_script', get_template_directory_uri() . '/js/zerif_multiple_panels.js', array( 'zerif_customizer_script' ), '1.0.8', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'zerif_late_registers', 99 );

/**
 * Custom logo callback function.
 *
 * @return string
 */
function zerif_custom_logo_callback() {
	$logo              = '';
	$zerif_custom_logo = get_theme_mod( 'custom_logo' );

	if ( ! empty( $zerif_custom_logo ) ) {
		$custom_logo = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' );
		$logo        = '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( $custom_logo ) . '"></a>';
	} else {
		$logo = '<div class="site-title-tagline-wrapper"><h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></h1><p class="site-description">' . get_bloginfo( 'description' ) . '</p></div>';
	}

	return $logo;
}

/**
 * Function to check if WordPress is greater or equal to 4.7
 */
function zerif_check_if_wp_greater_than_4_7() {

	$wp_version_nr = get_bloginfo('version');

	if ( function_exists( 'version_compare' ) ) {
		if ( version_compare( $wp_version_nr, '4.7', '>=' ) ) {
			return true;
		}
	}

	return false;

}