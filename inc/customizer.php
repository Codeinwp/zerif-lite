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
				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
		<?php
		}
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'custom_logo' )->transport = 'postMessage';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
			'selector' => '.navbar-brand',
			'settings' => 'custom_logo',
			'render_callback' => 'zerif_custom_logo_callback',
		));
		$wp_customize->selective_refresh->add_partial( 'zerif_bigtitle_title_2', array(
			'selector' => '.intro-text',
			'settings' => 'zerif_bigtitle_title_2',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_bigtitle_title_2' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_bigtitle_redbutton_label_2', array(
			'selector' => '.buttons a.red-btn',
			'settings' => 'zerif_bigtitle_redbutton_label_2',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_bigtitle_redbutton_label_2' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_bigtitle_greenbutton_label', array(
			'selector' => '.buttons a.green-btn',
			'settings' => 'zerif_bigtitle_greenbutton_label',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_bigtitle_greenbutton_label' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourfocus_title_2', array(
			'selector' => '#focus .section-header h2',
			'settings' => 'zerif_ourfocus_title_2',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_ourfocus_title_2' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourfocus_subtitle', array(
			'selector' => '#focus .section-header div.section-legend',
			'settings' => 'zerif_ourfocus_subtitle',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_ourfocus_subtitle' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourteam_title', array(
			'selector' => '#team .section-header h2',
			'settings' => 'zerif_ourteam_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_ourteam_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_ourteam_subtitle', array(
			'selector' => '#team .section-header div.section-legend',
			'settings' => 'zerif_ourteam_subtitle',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_ourteam_subtitle' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_title', array(
			'selector' => '#aboutus .section-header h2',
			'settings' => 'zerif_aboutus_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_subtitle', array(
			'selector' => '#aboutus .section-header div.section-legend',
			'settings' => 'zerif_aboutus_subtitle',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_subtitle' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_biglefttitle', array(
			'selector' => '#aboutus .big-intro',
			'settings' => 'zerif_aboutus_biglefttitle',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_biglefttitle' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_text', array(
			'selector' => '#aboutus .text_and_skills p',
			'settings' => 'zerif_aboutus_text',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_text' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature1_title', array(
			'selector' => '#aboutus .skill_1 label',
			'settings' => 'zerif_aboutus_feature1_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature1_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature2_title', array(
			'selector' => '#aboutus .skill_2 label',
			'settings' => 'zerif_aboutus_feature2_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature2_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature3_title', array(
			'selector' => '#aboutus .skill_3 label',
			'settings' => 'zerif_aboutus_feature3_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature3_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_aboutus_feature4_title', array(
			'selector' => '#aboutus .skill_4 label',
			'settings' => 'zerif_aboutus_feature4_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_aboutus_feature4_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_testimonials_title', array(
			'selector' => '#testimonials .section-header h2',
			'settings' => 'zerif_testimonials_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_testimonials_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_contactus_title', array(
			'selector' => '#contact .section-header h2',
			'settings' => 'zerif_contactus_title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_contactus_title' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_facebook', array(
			'selector' => '#footer .social #facebook',
			'settings' => 'zerif_socials_facebook',
			'render_callback' => function() {
				return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_facebook' ) ) . '"><span class="sr-only">' . __( 'Go to Facebook', 'zerif-lite' ) . '</span> <i class="fa fa-facebook"></i></a>';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_twitter', array(
			'selector' => '#footer .social #twitter',
			'settings' => 'zerif_socials_twitter',
			'render_callback' => function() {
				return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_twitter' ) ) . '"><span class="sr-only">' . __( 'Go to Twitter', 'zerif-lite' ) . '</span> <i class="fa fa-twitter"></i></a>';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_linkedin', array(
			'selector' => '#footer .social #linkedin',
			'settings' => 'zerif_socials_linkedin',
			'render_callback' => function() {
				return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_linkedin' ) ) . '"><span class="sr-only">' . __( 'Go to Linkedin', 'zerif-lite' ) . '</span> <i class="fa fa-linkedin"></i></a>';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_behance', array(
			'selector' => '#footer .social #behance',
			'settings' => 'zerif_socials_behance',
			'render_callback' => function() {
				return '<a href="'. esc_url ( get_theme_mod( 'zerif_socials_behance' ) ) . '"><span class="sr-only">' . __( 'Go to Behance', 'zerif-lite' ) . '</span> <i class="fa fa-behance"></i></a>';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_dribbble', array(
			'selector' => '#footer .social #dribbble',
			'settings' => 'zerif_socials_dribbble',
			'render_callback' => function() {
				return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_dribbble' ) ) . '"><span class="sr-only">' . __( 'Go to Dribble', 'zerif-lite' ) . '</span> <i class="fa fa-dribbble"></i></a>';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_socials_instagram', array(
			'selector' => '#footer .social #instagram',
			'settings' => 'zerif_socials_instagram',
			'render_callback' => function() {
				return '<a href="' . esc_url( get_theme_mod( 'zerif_socials_instagram' ) ) . '"><span class="sr-only">' . __( 'Go to Instagram', 'zerif-lite' ) . '</span> <i class="fa fa-instagram"></i></a>';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_address', array(
			'selector' => '.zerif-footer-address',
			'settings' => 'zerif_address',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_address' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_email', array(
			'selector' => '.zerif-footer-email',
			'settings' => 'zerif_email',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'zerif_email' ) );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_phone', array(
			'selector' => '.zerif-footer-phone',
			'settings' => 'zerif_phone',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod('zerif_phone') );
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_address_icon', array(
			'selector' => '.company-details .icon-top.red-text',
			'settings' => 'zerif_address_icon',
			'render_callback' => function() {
				return '<img src="' . esc_url( get_theme_mod( 'zerif_address_icon' ) ) . '">';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_email_icon', array(
			'selector' => '.company-details .icon-top.green-text',
			'settings' => 'zerif_email_icon',
			'render_callback' => function() {
				return '<img src="' . esc_url( get_theme_mod( 'zerif_email_icon' ) ) . '">';
			},
		) );
		$wp_customize->selective_refresh->add_partial( 'zerif_phone_icon', array(
			'selector' => '.company-details .icon-top.blue-text',
			'settings' => 'zerif_phone_icon',
			'render_callback' => function() {
				return '<img src="' . esc_url( get_theme_mod( 'zerif_phone_icon' ) ) . '">';
			},
		) );
	}

	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_general', array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'title' => __( 'General options', 'zerif-lite' )
		));

		$wp_customize->add_section( 'zerif_general_section' , array(
			'title' => __( 'General', 'zerif-lite' ),
			'priority' => 30,
			'panel' => 'panel_general'
		));

		$wp_customize->add_setting( 'zerif_use_safe_font', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_use_safe_font', array(
	        'type' 		=> 'checkbox',
	        'label' 	=> 'Use safe font?',
	        'section' 	=> 'zerif_general_section',
	        'priority'	=> 1
		));

		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_disable_preloader', array(
			'type' => 'checkbox',
			'label' => __('Disable preloader?','zerif-lite'),
			'section' => 'zerif_general_section',
			'priority' => 2,
		));

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_disable_smooth_scroll', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Disable smooth scroll?','zerif-lite'),
			'section' 	=> 'zerif_general_section',
			'priority'	=> 3,
		));

		/* Enable accessibility */
		$wp_customize->add_setting( 'zerif_accessibility', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_accessibility', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Enable accessibility?','zerif-lite'),
			'section' 	=> 'zerif_general_section',
			'priority'	=> 4,
		));

		/* COPYRIGHT */
		$wp_customize->add_setting( 'zerif_copyright', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_copyright', array(
			'label'    => __( 'Footer Copyright', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 5,
		));

		/* Change the template to full width for page.php */
        $wp_customize->add_setting( 'zerif_change_to_full_width', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		) );

        $wp_customize->add_control( 'zerif_change_to_full_width', array(
             'type' 		=> 'checkbox',
             'label' 	=> 'Change the template to Full width for all the pages?',
             'section' 	=> 'zerif_general_section',
             'priority'	=> 6
         ) );

		$wp_customize->add_section( 'zerif_general_socials_section' , array(
			'title' => __( 'Footer Social Icons', 'zerif-lite' ),
			'priority' => 31,
			'panel' => 'panel_general'
		));

		/* facebook */
		$wp_customize->add_setting( 'zerif_socials_facebook', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_socials_facebook', array(
			'label'    => __( 'Facebook link', 'zerif-lite' ),
			'section'  => 'zerif_general_socials_section',
			'priority' => 4,
		));

		/* twitter */
		$wp_customize->add_setting( 'zerif_socials_twitter', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_socials_twitter', array(
			'label'    => __( 'Twitter link', 'zerif-lite' ),
			'section'  => 'zerif_general_socials_section',
			'priority' => 5,
		));

		/* linkedin */
		$wp_customize->add_setting( 'zerif_socials_linkedin', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'zerif_socials_linkedin', array(
			'label'    => __( 'Linkedin link', 'zerif-lite' ),
			'section'  => 'zerif_general_socials_section',
			'priority' => 6,
		));

		/* behance */
		$wp_customize->add_setting( 'zerif_socials_behance', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_socials_behance', array(
			'label'    => __( 'Behance link', 'zerif-lite' ),
			'section'  => 'zerif_general_socials_section',
			'priority' => 7,
		));

		/* dribbble */
		$wp_customize->add_setting( 'zerif_socials_dribbble', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_socials_dribbble', array(
			'label'    => __( 'Dribbble link', 'zerif-lite' ),
			'section'  => 'zerif_general_socials_section',
			'priority' => 8,
		));

		/* instagram */
		$wp_customize->add_setting( 'zerif_socials_instagram', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_socials_instagram', array(
			'label'    => __( 'Instagram link', 'zerif-lite' ),
			'section'  => 'zerif_general_socials_section',
			'priority' => 9,
		));

		$wp_customize->add_section( 'zerif_general_footer_section' , array(
			'title' => __( 'Footer Content', 'zerif-lite' ),
			'priority' => 32,
			'panel' => 'panel_general'
		));

		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(
			'label'    => __( 'Address section - icon', 'zerif-lite' ),
			'section'  => 'zerif_general_footer_section',
			'priority' => 9,
		)));

		/* address */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_address', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'General options','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_address', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			) );
		}

		$wp_customize->add_control( 'zerif_address', array(
			'label'   => __( 'Address', 'zerif-lite' ),
			'type' => 'textarea',
			'section' => 'zerif_general_footer_section',
			'priority' => 10
		));

		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(
			'label'    => __( 'Email section - icon', 'zerif-lite' ),
			'section'  => 'zerif_general_footer_section',
			'priority'    => 11,
		)));

		/* email */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_email', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'General options','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_email', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			));
		}

		$wp_customize->add_control( 'zerif_email', array(
			'label'   => __( 'Email', 'zerif-lite' ),
			'type' => 'textarea',
			'section' => 'zerif_general_footer_section',
			'priority' => 12
		));

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(
			'label'    => __( 'Phone number section - icon', 'zerif-lite' ),
			'section'  => 'zerif_general_footer_section',
			'priority' => 13,
		)));

		/* phone number */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_phone', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'General options','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_phone', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			));
		}

		$wp_customize->add_control( 'zerif_phone', array(
			'label'   => __( 'Phone number', 'zerif-lite' ),
			'type' => 'textarea',
			'section' => 'zerif_general_footer_section',
			'priority' => 14
		));

	else: /* Old versions of WordPress */

		$wp_customize->add_section( 'zerif_general_section' , array(
			'title'       => __( 'General options', 'zerif-lite' ),
			'priority'    => 30,
			'description' => __('Zerif theme general options','zerif-lite'),
		));

		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_disable_preloader', array(
			'type' => 'checkbox',
			'label' => __('Disable preloader?','zerif-lite'),
			'section' => 'zerif_general_section',
			'priority'    => 2,
		));

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_disable_smooth_scroll', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Disable smooth scroll?','zerif-lite'),
			'section' 	=> 'zerif_general_section',
			'priority'	=> 3,
		));

		/* Enable accessibility */
		$wp_customize->add_setting( 'zerif_accessibility', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_accessibility', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Enable accessibility?','zerif-lite'),
			'section' 	=> 'zerif_general_section',
			'priority'	=> 4,
		));

		/* COPYRIGHT */
		$wp_customize->add_setting( 'zerif_copyright', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_copyright', array(
			'label'    => __( 'Footer Copyright', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 5,
		));

		/* facebook */
		$wp_customize->add_setting( 'zerif_socials_facebook', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'zerif_socials_facebook', array(
			'label'    => __( 'Facebook link', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 6,
		));
		/* twitter */
		$wp_customize->add_setting( 'zerif_socials_twitter', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'zerif_socials_twitter', array(
			'label'    => __( 'Twitter link', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 7,
		));
		/* linkedin */
		$wp_customize->add_setting( 'zerif_socials_linkedin', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'zerif_socials_linkedin', array(
			'label'    => __( 'Linkedin link', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 8,
		));
		/* behance */
		$wp_customize->add_setting( 'zerif_socials_behance', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'zerif_socials_behance', array(
			'label'    => __( 'Behance link', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 9,
		));
		/* dribbble */
		$wp_customize->add_setting( 'zerif_socials_dribbble', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'zerif_socials_dribbble', array(
			'label'    => __( 'Dribbble link', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 10,
		));
		/* instagram */
		$wp_customize->add_setting( 'zerif_socials_instagram', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_socials_instagram', array(
			'label'    => __( 'Instagram link', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 11,
		));
		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(
			'label'    => __( 'Address section - icon', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority' => 12,
		)));

		/* address */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_address', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'General options','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_address', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			) );
		}

		$wp_customize->add_control( 'zerif_address', array(
			'label'   => __( 'Address', 'zerif-lite' ),
			'type' => 'textarea',
			'section' => 'zerif_general_section',
			'priority' => 13
		));
		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(
			'label'    => __( 'Email section - icon', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 14,
		)));

		/* email */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_email', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'General options','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_email', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			));
		}

		$wp_customize->add_control( 'zerif_email', array(
			'label'   => __( 'Email', 'zerif-lite' ),
			'type' => 'textarea',
			'section' => 'zerif_general_section',
			'priority' => 15
		));

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(
			'label'    => __( 'Phone number section - icon', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority' => 16,
		)));

		/* phone number */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_phone', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'General options','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_phone', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			));
		}

		$wp_customize->add_control( 'zerif_phone', array(
			'label'   => __( 'Phone number', 'zerif-lite' ),
			'type' => 'textarea',
			'section' => 'zerif_general_section',
			'priority' => 17
		));

	endif;

	/*****************************************************/
    /**************	BIG TITLE SECTION *******************/
	/****************************************************/

	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_big_title', array(
			'priority' => 31,
			'capability' => 'edit_theme_options',
			'title' => __( 'Big title section', 'zerif-lite' )
		));

		$wp_customize->add_section( 'zerif_bigtitle_section' , array(
			'title'       => __( 'Main content', 'zerif-lite' ),
			'priority'    => 1,
			'panel'       => 'panel_big_title'
		));

		/* show/hide */
		$wp_customize->add_setting( 'zerif_bigtitle_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bigtitle_show', array(
			'type' => 'checkbox',
			'label' => __('Hide big title section?','zerif-lite'),
			'section' => 'zerif_bigtitle_section',
			'priority'    => 1,
		));

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
				'default' => ! empty( $zerif_bigtitle_title_default ) ? $zerif_bigtitle_title_default : sprintf( __( 'This piece of text can be changed in %s','zerif-lite' ), __( 'Big title section','zerif-lite' ) ),
				'transport' => 'postMessage'
			));
		} else {
			$wp_customize->add_setting( 'zerif_bigtitle_title_2', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			));
		}

		$wp_customize->add_control( 'zerif_bigtitle_title_2', array(
			'label'    => __( 'Title', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 2,
		));


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
                'default' => ! empty( $zerif_bigtitle_redbutton_label_default ) ? $zerif_bigtitle_redbutton_label_default : __('Customize this button','zerif-lite'),
                'transport' => 'postMessage'
            ));
        } else {
            $wp_customize->add_setting( 'zerif_bigtitle_redbutton_label_2', array(
                'sanitize_callback' => 'zerif_sanitize_input',
                'transport' => 'postMessage'
            ));
        }

        $wp_customize->add_control( 'zerif_bigtitle_redbutton_label_2', array(
            'label'    => __( 'Red button label', 'zerif-lite' ),
            'section'  => 'zerif_bigtitle_section',
            'priority'    => 3,
        ));

		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => esc_url( home_url( '/' ) ).'#focus',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(
			'label'    => __( 'Red button link', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 4,
		));

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
			'priority'    => 5,
		));

		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => esc_url( home_url( '/' ) ).'#focus',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(
			'label'    => __( 'Green button link', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 6,
		));

		/****************************************************/
		/************	PARALLAX IMAGES *********************/
		/****************************************************/

		$wp_customize->add_section( 'zerif_parallax_section' , array(
			'title'       => __( 'Parallax effect', 'zerif-lite' ),
			'priority'    => 2,
			'panel'       => 'panel_big_title'
		));

		/* show/hide */
		$wp_customize->add_setting( 'zerif_parallax_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_parallax_show', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Use parallax effect?','zerif-lite'),
			'section' 	=> 'zerif_parallax_section',
			'priority'	=> 1,
		));

		/* IMAGE 1*/
		$wp_customize->add_setting( 'zerif_parallax_img1', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() . '/images/background1.jpg'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
			'label'    	=> __( 'Image 1', 'zerif-lite' ),
			'section'  	=> 'zerif_parallax_section',
			'settings' 	=> 'zerif_parallax_img1',
			'priority'	=> 1,
		)));

		/* IMAGE 2 */
		$wp_customize->add_setting( 'zerif_parallax_img2', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() . '/images/background2.png'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
			'label'    	=> __( 'Image 2', 'zerif-lite' ),
			'section'  	=> 'zerif_parallax_section',
			'settings' 	=> 'zerif_parallax_img2',
			'priority'	=> 2,
		)));


	else:

		$wp_customize->add_section( 'zerif_bigtitle_section' , array(
			'title'       => __( 'Big title section', 'zerif-lite' ),
			'priority'    => 31
		));

		/* show/hide */
		$wp_customize->add_setting( 'zerif_bigtitle_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bigtitle_show', array(
			'type' => 'checkbox',
			'label' => __('Hide big title section?','zerif-lite'),
			'section' => 'zerif_bigtitle_section',
			'priority'    => 1,
		));

		/* title */

        /*
         * define a new option with _2 to be used to differentiate between the old users and new ones
         *
         * get the old option's value and put it as default for the new _2 option
         */

		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_bigtitle_title_2', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default' => ! empty( $zerif_bigtitle_title_default ) ? $zerif_bigtitle_title_default : sprintf( __( 'This piece of text can be changed in %s','zerif-lite' ), __( 'Big title section','zerif-lite' ) ),
				'transport' => 'postMessage'
			));
		} else {
			$wp_customize->add_setting( 'zerif_bigtitle_title_2', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			));
		}

		$wp_customize->add_control( 'zerif_bigtitle_title_2', array(
			'label'    => __( 'Title', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 2,
		));

		/* red button */

        /*
         * define a new option with _2 to be used to differentiate between the old users and new ones
         *
         * get the old option's value and put it as default for the new _2 option
         */

        if ( current_user_can( 'edit_theme_options' ) ) {
            $wp_customize->add_setting( 'zerif_bigtitle_redbutton_label_2', array(
                'sanitize_callback' => 'zerif_sanitize_input',
                'default' => ! empty( $zerif_bigtitle_redbutton_label_default ) ? $zerif_bigtitle_redbutton_label_default : __( 'Customize this button', 'zerif-lite' ) ,
                'transport' => 'postMessage'
            ));
        } else {
            $wp_customize->add_setting( 'zerif_bigtitle_redbutton_label_2', array(
                'sanitize_callback' => 'zerif_sanitize_input',
                'transport' => 'postMessage'
            ));
        }

        $wp_customize->add_control( 'zerif_bigtitle_redbutton_label_2', array(
            'label'    => __( 'Red button label', 'zerif-lite' ),
            'section'  => 'zerif_bigtitle_section',
            'priority'    => 3,
        ));

		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => esc_url( home_url( '/' ) ).'#focus',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(
			'label'    => __( 'Red button link', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 4,
		));

		/* green button */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default' => __("Customize this button",'zerif-lite'),
				'transport' => 'postMessage'
			));
		} else {
			$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			));
		}


		$wp_customize->add_control( 'zerif_bigtitle_greenbutton_label', array(
			'label'    => __( 'Green button label', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 5,
		));

		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => esc_url( home_url( '/' ) ).'#focus',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(
			'label'    => __( 'Green button link', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 6,
		));

		/****************************************************/
		/************	PARALLAX IMAGES *********************/
		/****************************************************/
		$wp_customize->add_section( 'zerif_parallax_section' , array(
			'title'       => __( 'Parallax effect', 'zerif-lite' ),
			'priority'    => 60
		));

		/* show/hide */
		$wp_customize->add_setting( 'zerif_parallax_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox'
		));

		$wp_customize->add_control( 'zerif_parallax_show', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Use parallax effect?','zerif-lite'),
			'section' 	=> 'zerif_parallax_section',
			'priority'	=> 1,
		));

		/* IMAGE 1*/
		$wp_customize->add_setting( 'zerif_parallax_img1', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() . '/images/background1.jpg'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
			'label'    	=> __( 'Image 1', 'zerif-lite' ),
			'section'  	=> 'zerif_parallax_section',
			'settings' 	=> 'zerif_parallax_img1',
			'priority'	=> 1,
		)));

		/* IMAGE 2 */
		$wp_customize->add_setting( 'zerif_parallax_img2', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() . '/images/background2.png'
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
			'label'    	=> __( 'Image 2', 'zerif-lite' ),
			'section'  	=> 'zerif_parallax_section',
			'settings' 	=> 'zerif_parallax_img2',
			'priority'	=> 2,
		)));


	endif;


	/********************************************************************/
	/*************  OUR FOCUS SECTION **********************************/
	/********************************************************************/


	$wp_customize->add_section( 'zerif_ourfocus_section' , array(
		'title'       => __( 'Content', 'zerif-lite' ),
		'priority'    => 1
	));

	/* show/hide */
	$wp_customize->add_setting( 'zerif_ourfocus_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'zerif_ourfocus_show', array(
		'type' => 'checkbox',
		'label' => __('Hide our focus section?','zerif-lite'),
		'section'  => 'zerif_ourfocus_section',
		'priority'    => -3,
	));

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
            'default' => ! empty( $zerif_ourfocus_title_default ) ? $zerif_ourfocus_title_default : sprintf( __( 'Change this title in %s','zerif-lite' ), __( 'Our focus section','zerif-lite' ) ),
            'transport' => 'postMessage'
        ));
    } else {
        $wp_customize->add_setting( 'zerif_ourfocus_title_2', array(
            'sanitize_callback' => 'zerif_sanitize_input',
            'transport' => 'postMessage'
        ));
    }
    $wp_customize->add_control( 'zerif_ourfocus_title_2', array(
        'label'    => __( 'Title', 'zerif-lite' ),
        'section'  => 'zerif_ourfocus_section',
        'priority'    => -2,
    ));

	/* our focus subtitle */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => sprintf( __( 'Change this subtitle in %s','zerif-lite' ), __( 'Our focus section','zerif-lite' ) ),
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
		'priority'    => -1,
	));


	$our_focus_section = $wp_customize->get_section('sidebar-widgets-sidebar-ourfocus');
	if(!empty($our_focus_section)) {
		$our_focus_section->panel                                        = '';
		$our_focus_section->title                                        = __( 'Our focus section', 'zerif-lite' );
		$our_focus_section->priority                                     = 32;
		$wp_customize->get_control( 'zerif_ourfocus_show' )->section     = 'sidebar-widgets-sidebar-ourfocus';
		$wp_customize->get_control( 'zerif_ourfocus_title_2' )->section    = 'sidebar-widgets-sidebar-ourfocus';
		$wp_customize->get_control( 'zerif_ourfocus_subtitle' )->section = 'sidebar-widgets-sidebar-ourfocus';
	}



	/************************************/
	/******* ABOUT US SECTION ***********/
	/************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_about', array(
			'priority' => 34,
			'capability' => 'edit_theme_options',
			'title' => __( 'About us section', 'zerif-lite' )
		));

		$wp_customize->add_section( 'zerif_aboutus_settings_section' , array(
			'title'       => __( 'Settings', 'zerif-lite' ),
			'priority'    => 1,
			'panel' => 'panel_about'
		));

		/* about us show/hide */
		$wp_customize->add_setting( 'zerif_aboutus_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_show', array(
			'type' => 'checkbox',
			'label' => __('Hide about us section?','zerif-lite'),
			'section' => 'zerif_aboutus_settings_section',
			'priority'    => 1,
		));

		$wp_customize->add_section( 'zerif_aboutus_main_section' , array(
			'title'       => __( 'Main content', 'zerif-lite' ),
			'priority'    => 2,
			'panel' => 'panel_about'
		));

		/* title */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this title in %s','zerif-lite' ), __( 'About us section','zerif-lite' ) ),
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
			'priority'    => 2,
		));

		/* subtitle */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_subtitle', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this subtitle in %s','zerif-lite' ), __( 'About us section','zerif-lite' ) ),
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
			'priority'    => 3,
		));

		/* big left title */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
			'label'    => __( 'Big left side title', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_main_section',
			'priority'    => 4,
		));

		/* text */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_text', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'About us section','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_aboutus_text', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			) );
		}

		$wp_customize->add_control( 'zerif_aboutus_text', array(
			'type'	=>	'textarea',
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_main_section',
			'priority'    => 5,
		));

		$wp_customize->add_section( 'zerif_aboutus_feat1_section' , array(
			'title'       => __( 'Feature no#1', 'zerif-lite' ),
			'priority'    => 3,
			'panel' => 'panel_about'
		));

		/* feature no#1 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'priority'    => 6,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(
			'label'    => __( 'Feature no1 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_feat1_section',
			'priority'    => 7,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '80'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature1_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no1 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_feat1_section',
			'priority'    => 8
		)));

		$wp_customize->add_section( 'zerif_aboutus_feat2_section' , array(
			'title'       => __( 'Feature no#2', 'zerif-lite' ),
			'priority'    => 4,
			'panel' => 'panel_about'
		));

		/* feature no#2 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'priority'    => 9,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(
			'label'    => __( 'Feature no2 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_feat2_section',
			'priority'    => 10,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '91'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature2_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no2 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_feat2_section',
			'priority'    => 11
		)));

		$wp_customize->add_section( 'zerif_aboutus_feat3_section' , array(
			'title'       => __( 'Feature no#3', 'zerif-lite' ),
			'priority'    => 5,
			'panel' => 'panel_about'
		));

		/* feature no#3 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'priority'    => 12,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(
			'label'    => __( 'Feature no3 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_feat3_section',
			'priority'    => 13,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '88'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature3_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no3 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_feat3_section',
			'priority'    => 14
		)));

		$wp_customize->add_section( 'zerif_aboutus_feat4_section' , array(
			'title'       => __( 'Feature no#4', 'zerif-lite' ),
			'priority'    => 6,
			'panel' => 'panel_about'
		));

		/* feature no#4 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'priority'    => 15,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(
			'label'    => __( 'Feature no4 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_feat4_section',
			'priority'    => 16,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '95'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature4_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no4 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_feat4_section',
			'priority' => 17
		)));

        /* ABOUT US CLIENTS TITLE */

        $wp_customize->add_section( 'zerif_aboutus_clients_title_section' , array(
            'title'       => 'Clients area title',
            'priority'    => 7,
            'panel' => 'panel_about'
        ));

        $wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array(
            'sanitize_callback' => 'zerif_sanitize_input',
            'default' => __( 'OUR HAPPY CLIENTS','zerif-lite' ),
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
            'label'    => 'Title',
            'description' => 'This title appears only if you have widgets in the About us sidebar.',
            'section'  => 'zerif_aboutus_clients_title_section',
            'priority'    => 1,
        ));

	else:	/* Old versions of WordPress */

		$wp_customize->add_section( 'zerif_aboutus_section' , array(
			'title' => __( 'About us section', 'zerif-lite' ),
			'priority' => 34
		));

		/* about us show/hide */
		$wp_customize->add_setting( 'zerif_aboutus_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_show', array(
			'type' => 'checkbox',
			'label' => __('Hide about us section?','zerif-lite'),
			'section' => 'zerif_aboutus_section',
			'priority'    => 1,
		));

		/* title */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this title in %s','zerif-lite' ), __( 'About us section','zerif-lite' ) ),
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
			'section'  => 'zerif_aboutus_section',
			'priority'    => 2,
		));

		/* subtitle */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_subtitle', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this subtitle in %s','zerif-lite' ), __( 'About us section','zerif-lite' ) ),
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
			'section'  => 'zerif_aboutus_section',
			'priority'    => 3,
		));

		/* big left title */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
			'label'    => __( 'Big left side title', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_section',
			'priority'    => 4,
		));

		/* text */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_text', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => sprintf( __( 'Change this text in %s','zerif-lite' ), __( 'About us section','zerif-lite' ) ),
				'transport' => 'postMessage'
			) );
		} else {
			$wp_customize->add_setting( 'zerif_aboutus_text', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'transport' => 'postMessage'
			) );
		}

		$wp_customize->add_control( 'zerif_aboutus_text', array(
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_section',
			'priority'    => 5,
		));

		/* feature no#1 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'section'  => 'zerif_aboutus_section',
			'priority'    => 6,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(
			'label'    => __( 'Feature no1 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_section',
			'priority'    => 7,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '80'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature1_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no1 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_section',
			'priority'    => 8
		)));

		/* feature no#2 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'section'  => 'zerif_aboutus_section',
			'priority'    => 9,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(
			'label'    => __( 'Feature no2 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_section',
			'priority'    => 10,
		));
		$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '91'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature2_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no2 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_section',
			'priority'    => 11
		)));

		/* feature no#3 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'section'  => 'zerif_aboutus_section',
			'priority'    => 12,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(
			'label'    => __( 'Feature no3 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_section',
			'priority'    => 13,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '88'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature3_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no3 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_section',
			'priority'    => 14
		)));

		/* feature no#4 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array(
				'sanitize_callback' => 'zerif_sanitize_input',
				'default'           => __( 'Edit skill','zerif-lite' ),
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
			'section'  => 'zerif_aboutus_section',
			'priority'    => 15,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(
			'label'    => __( 'Feature no4 text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_section',
			'priority'    => 16,
		));

		$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array(
			'sanitize_callback' => 'absint',
			'default' => '95'
		));

		$wp_customize->add_control( new Zerif_Customizer_Number_Control( $wp_customize, 'zerif_aboutus_feature4_nr', array(
			'type' => 'number',
			'label' => __( 'Feature no4 percentage', 'zerif-lite' ),
			'section' => 'zerif_aboutus_section',
			'priority'    => 17
		)));

        $wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array(
            'sanitize_callback' => 'zerif_sanitize_input',
            'default' => __( 'OUR HAPPY CLIENTS','zerif-lite' )
        ) );

        $wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
            'label'    => 'Clients widgets area title',
            'description' => 'This title appears only if you have widgets in the About us sidebar.',
            'section'  => 'zerif_aboutus_section',
            'priority'    => 18,
        ));

	endif;

	/******************************************/
    /**********	OUR TEAM SECTION **************/
	/******************************************/

	$wp_customize->add_section( 'zerif_ourteam_section' , array(
		'title'       => __( 'Content', 'zerif-lite' ),
		'priority'    => 1,
	));

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
			'default'           => sprintf( __( 'Change this title in %s','zerif-lite' ), __( 'Our team section','zerif-lite' ) ),
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
	if(!empty($our_team_section)) {
		$our_team_section->panel                                        = '';
		$our_team_section->title                                        = __( 'Our team section', 'zerif-lite' );
		$our_team_section->priority                                     = 35;
		$wp_customize->get_control( 'zerif_ourteam_show' )->section     = 'sidebar-widgets-sidebar-ourteam';
		$wp_customize->get_control( 'zerif_ourteam_title' )->section    = 'sidebar-widgets-sidebar-ourteam';
		$wp_customize->get_control( 'zerif_ourteam_subtitle' )->section = 'sidebar-widgets-sidebar-ourteam';
	}



	/**********************************************/
    /**********	TESTIMONIALS SECTION **************/
	/**********************************************/

	$wp_customize->add_section( 'zerif_testimonials_section' , array(
		'title'       => __( 'Testimonials section', 'zerif-lite' ),
		'priority'    => 1,
	));

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
			'default' => sprintf( __( 'Change this title in %s','zerif-lite' ), __( 'Testimonials section','zerif-lite' ) ),
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
	if(!empty($our_team_section)) {
		$testimonials_section->panel                                        = '';
		$testimonials_section->title                                        = __( 'Testimonials section', 'zerif-lite' );
		$testimonials_section->priority                                     = 36;
		$wp_customize->get_control( 'zerif_testimonials_show' )->section     = 'sidebar-widgets-sidebar-testimonials';
		$wp_customize->get_control( 'zerif_testimonials_pinterest_style' )->section     = 'sidebar-widgets-sidebar-testimonials';
		$wp_customize->get_control( 'zerif_testimonials_title' )->section    = 'sidebar-widgets-sidebar-testimonials';
		$wp_customize->get_control( 'zerif_testimonials_subtitle' )->section = 'sidebar-widgets-sidebar-testimonials';
	}

	/**********************************************/
    /**********	LATEST NEWS SECTION ***************/
	/**********************************************/
	$wp_customize->add_section( 'zerif_latestnews_section' , array(
		'title'       => __( 'Latest News section', 'zerif-lite' ),
    	'priority'    => 37
	));

	/* latest news show/hide */
	$wp_customize->add_setting( 'zerif_latestnews_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport' => 'postMessage'
	));

    $wp_customize->add_control( 'zerif_latestnews_show', array(
		'type' => 'checkbox',
		'label' => __('Hide latest news section?','zerif-lite'),
		'section' => 'zerif_latestnews_section',
		'priority'    => 1,
	));

	/* latest news title */
	$wp_customize->add_setting( 'zerif_latestnews_title', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'zerif_latestnews_title', array(
		'label'    		=> __( 'Latest News title', 'zerif-lite' ),
		'section'  		=> 'zerif_latestnews_section',
		'priority'    	=> 2,
	));

	/* latest news subtitle */
	$wp_customize->add_setting( 'zerif_latestnews_subtitle', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'zerif_latestnews_subtitle', array(
		'label'    		=> __( 'Latest News subtitle', 'zerif-lite' ),
	    'section'  		=> 'zerif_latestnews_section',
		'priority'   	=> 3,
	));

	/***********************************************************/
	/********* RIBBONS ****************************************/
	/**********************************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_ribbons', array(
			'priority' => 37,
			'capability' => 'edit_theme_options',
			'title' => __( 'Ribbon sections', 'zerif-lite' )
		));

		$wp_customize->add_section( 'zerif_bottomribbon_section' , array(
			'title'       => __( 'BottomButton Ribbon', 'zerif-lite' ),
			'priority'    => 1,
			'panel'       => 'panel_ribbons'
		));

		/* RIBBON SECTION WITH BOTTOM BUTTON */

		/* text */
		$wp_customize->add_setting( 'zerif_bottomribbon_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bottomribbon_text', array(
			'type'	=>	'textarea',
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_bottomribbon_section',
			'priority'    => 1,
		));

		/* button label */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(
			'label'    => __( 'Button label', 'zerif-lite' ),
			'section'  => 'zerif_bottomribbon_section',
			'priority'    => 2,
		));

		/* button link */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(
			'label'    => __( 'Button link', 'zerif-lite' ),
			'section'  => 'zerif_bottomribbon_section',
			'priority'    => 3,
		));

		$wp_customize->add_section( 'zerif_rightribbon_section' , array(
			'title'       => __( 'RightButton Ribbon', 'zerif-lite' ),
			'priority'    => 2,
			'panel'       => 'panel_ribbons'
		));

		/* RIBBON SECTION WITH BUTTON IN THE RIGHT SIDE */

		/* text */
		$wp_customize->add_setting( 'zerif_ribbonright_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_ribbonright_text', array(
			'type'	=>	'textarea',
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_rightribbon_section',
			'priority'    => 4,
		));

		/* button label */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlabel', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlabel', array(
			'label'    => __( 'Button label', 'zerif-lite' ),
			'section'  => 'zerif_rightribbon_section',
			'priority'    => 5,
		));

		/* button link */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlink', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlink', array(
			'label'    => __( 'Button link', 'zerif-lite' ),
			'section'  => 'zerif_rightribbon_section',
			'priority'    => 6,
		));

	else: /* Old versions of WordPress */
		$wp_customize->add_section( 'zerif_ribbon_section' , array(
			'title'       => __( 'Ribbon sections', 'zerif-lite' ),
			'priority'    => 37
		));

		/* RIBBON SECTION WITH BOTTOM BUTTON */

		/* text */
		$wp_customize->add_setting( 'zerif_bottomribbon_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bottomribbon_text', array(
			'label'    => __( 'Ribbon section with bottom button - Text', 'zerif-lite' ),
			'section'  => 'zerif_ribbon_section',
			'priority'    => 1,
		));

		/* button label */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(
			'label'    => __( 'Ribbon section with bottom button - Button label', 'zerif-lite' ),
			'section'  => 'zerif_ribbon_section',
			'priority'    => 2,
		));

		/* button link */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(
			'label'    => __( 'Ribbon section with bottom button - Button link', 'zerif-lite' ),
			'section'  => 'zerif_ribbon_section',
			'priority'    => 3,
		));

		/* RIBBON SECTION WITH BUTTON IN THE RIGHT SIDE */

		/* text */
		$wp_customize->add_setting( 'zerif_ribbonright_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_ribbonright_text', array(
			'label'    => __( 'Ribbon section with button in the right side - Text', 'zerif-lite' ),
			'section'  => 'zerif_ribbon_section',
			'priority'    => 4,
		));

		/* button label */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlabel', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlabel', array(
			'label'    => __( 'Ribbon section with button in the right side - Button label', 'zerif-lite' ),
			'section'  => 'zerif_ribbon_section',
			'priority'    => 5,
		));

		/* button link */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlink', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlink', array(
			'label'    => __( 'Ribbon section with button in the right side - Button link', 'zerif-lite' ),
			'section'  => 'zerif_ribbon_section',
			'priority'    => 6,
		));
	endif;

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
    	'priority'    => 38
	));

	/* contact us show/hide */
	$wp_customize->add_setting( 'zerif_contactus_show', array(
		'sanitize_callback' => 'zerif_sanitize_checkbox',
		'transport' => 'postMessage'
	));

    $wp_customize->add_control( 'zerif_contactus_show', array(
		'type' => 'checkbox',
		'label' => __('Hide contact us section?','zerif-lite'),
		'section' => 'zerif_contactus_section',
		'priority'    => 1,
	));

	/* contactus title */
	if ( current_user_can( 'edit_theme_options' ) ) {
		$wp_customize->add_setting( 'zerif_contactus_title', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default'           => sprintf( __( 'Change this title in %s','zerif-lite' ), __( 'Contact us section','zerif-lite' ) ),
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
	));

	/* contactus subtitle */
	$wp_customize->add_setting( 'zerif_contactus_subtitle', array(
		'sanitize_callback' => 'zerif_sanitize_input',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'zerif_contactus_subtitle', array(
		'label'    => __( 'Contact us section subtitle', 'zerif-lite' ),
	    'section'  => 'zerif_contactus_section',
		'priority'    => 3,
	));


	/*********************************/
	/*********  Theme Info  **********/
	/*********************************/

	if ( class_exists( 'WP_Customize_Panel' ) ):

		require_once get_template_directory() . '/inc/class/class-zerif-theme-info.php';

		$wp_customize->add_section('zerif_theme_info', array(
				'title' => __('Theme info', 'zerif-lite'),
				'priority' => 0,
			)
		);
		$wp_customize->add_setting('zerif_theme_info', array(
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'zerif_sanitize_input'
			)
		);
		$wp_customize->add_control( new Zerif_Theme_Info( $wp_customize, 'zerif_theme_info', array(
				'section' => 'zerif_theme_info',
				'priority' => 10
			) )
		);

	endif;

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
	wp_enqueue_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery"), '1.0.7', true  );

	wp_localize_script( 'zerif_customizer_script', 'zerifLiteCustomizerObject', array(

		'documentation' => __( 'View Documentation', 'zerif-lite' ),
		'pro' => __('View PRO version','zerif-lite'),
		'tooltip_safefont' => sprintf( '%1$s <br><br> %2$s', __( 'Zerif Lite main font is Montserrat, which only supports the Latin script.','zerif-lite' ), __( 'If you are using other scripts like Cyrillic or Greek , you need to check this box to enable the safe fonts for better compatibility.','zerif-lite' ) ),
		'tooltip_accessibility' => sprintf( '%1$s <br><br> %2$s <br><br> %3$s', __( 'Web accessibility means that people with disabilities can use the Web. More specifically, Web accessibility means that people with disabilities can perceive, understand, navigate, and interact with the Web, and that they can contribute to the Web.','zerif-lite' ), __( 'Web accessibility also benefits others, including older people with changing abilities due to aging.','zerif-lite' ), __( 'By checking this box, you will enable this option on the site.','zerif-lite' ) ),
		'tooltip_smoothscroll' => sprintf( '%1$s <br><br> %2$s <br><br> %3$s', __( 'Smooth scrolling can be very useful if you read a lot of long pages. Normally, when you press Page Down, the view jumps directly down one page.','zerif-lite' ), __( 'With smooth scrolling, it slides down smoothly, so you can see how much it scrolls. This makes it easier to resume reading from where you were before.','zerif-lite' ), __( 'By checking this box, the smooth scroll will be disabled.','zerif-lite' ) ),
		'tooltip_preloader' => sprintf( '%1$s <br><br> %2$s <br><br> %3$s', __( 'The preloader is the circular progress element that first appears on the site. When the loader finishes its progress animation, the whole page elements are revealed.','zerif-lite' ), __( 'The preloader is used as a creative way to make waiting a bit less boring for the visitor.','zerif-lite' ), __( 'By checking this box, the preloader will be disabled.','zerif-lite' ) )
		) );
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