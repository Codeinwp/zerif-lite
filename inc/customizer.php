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

	class Zerif_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}

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


	class Zerif_Theme_Support extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the <a href="https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> for full control over the frontpage sections order!','zerif-lite');
		}

	} 
	
	class Zerif_Theme_Support_Colors extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the <a href="https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> for full control over the color scheme !','zerif-lite');
		}

	} 
	
	class Zerif_Theme_Support_Googlemap extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the <a href="https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> to add a google maps section !','zerif-lite');
		}

	} 
	
	class Zerif_Theme_Support_Pricing extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the <a href="https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> to add a pricing section !','zerif-lite');
		}

	} 


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	$wp_customize->remove_section('colors');


	/**********************************************/
	/*************** ORDER ************************/
	/**********************************************/
	
	$wp_customize->add_section( 'zerif_order_section' , array(

					'title'       => __( 'Sections order', 'zerif-lite' ),

					'priority'    => 28

	));
	
	$wp_customize->add_setting(
        'zerif_order_section',array('sanitize_callback' => 'zerif_sanitize_pro_version')
	);
	
	$wp_customize->add_control( new Zerif_Theme_Support( $wp_customize, 'zerif_order_section',
	    array(
	        'section' => 'zerif_order_section',
	   )
	));
	
	/**********************************************/
	/*************** COLORS ************************/
	/**********************************************/
	
	$wp_customize->add_section( 'zerif_colors_section' , array(

					'title'       => __( 'Colors', 'zerif-lite' ),

					'priority'    => 29

	));
	
	$wp_customize->add_setting(
        'zerif_colors_section', array('sanitize_callback' => 'zerif_sanitize_pro_version')
	);
	
	$wp_customize->add_control( new Zerif_Theme_Support_Colors( $wp_customize, 'zerif_colors_section',
	    array(
	        'section' => 'zerif_colors_section',
	   )
	));


	/***********************************************/

	/************** GENERAL OPTIONS  ***************/

	/***********************************************/





	$wp_customize->add_section( 'zerif_general_section' , array(

			'title'       => __( 'General options', 'zerif-lite' ),

    	  	'priority'    => 30,

    	  	'description' => __('Zerif theme general options','zerif-lite'),

	));



	/* LOGO	*/

	$wp_customize->add_setting( 'zerif_logo', array('sanitize_callback' => 'esc_url_raw'));



	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(

	      	'label'    => __( 'Logo', 'zerif-lite' ),

	      	'section'  => 'zerif_general_section',

	      	'settings' => 'zerif_logo',

			'priority'    => 1,

	)));
	
	/* Disable preloader */
	
	$wp_customize->add_setting( 'zerif_disable_preloader', array('sanitize_callback' => 'zerif_sanitize_text'));

	$wp_customize->add_control(

			'zerif_disable_preloader',

			array(

				'type' => 'checkbox',

				'label' => __('Disable preloader?','zerif-lite'),

				'section' => 'zerif_general_section',

				'priority'    => 2,

			)

	);



	/* COPYRIGHT */



	$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_copyright', array(

			'label'    => __( 'Copyright', 'zerif-lite' ),

	      	'section'  => 'zerif_general_section',

	      	'settings' => 'zerif_copyright',

			'priority'    => 3,

	));



	/* facebook */

	$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));



	$wp_customize->add_control( 'zerif_socials_facebook', array(

			'label'    => __( 'Facebook link', 'zerif-lite' ),

	      	'section'  => 'zerif_general_section',

	      	'settings' => 'zerif_socials_facebook',

			'priority'    => 4,

	));



	/* twitter */

	$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));



	$wp_customize->add_control( 'zerif_socials_twitter', array(

			'label'    => __( 'Twitter link', 'zerif-lite' ),

	      	'section'  => 'zerif_general_section',

	      	'settings' => 'zerif_socials_twitter',

			'priority'    => 5,

	));



	/* linkedin */

	$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));



	$wp_customize->add_control( 'zerif_socials_linkedin', array(

			'label'    => __( 'Linkedin link', 'zerif-lite' ),

	      	'section'  => 'zerif_general_section',

	      	'settings' => 'zerif_socials_linkedin',

			'priority'    => 6,

	));



	/* behance */

	$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));



	$wp_customize->add_control( 'zerif_socials_behance', array(

			'label'    => __( 'Behance link', 'zerif-lite' ),

	      	'section'  => 'zerif_general_section',

	      	'settings' => 'zerif_socials_behance',

			'priority'    => 7,

	));



	/* dribbble */

	$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));



	$wp_customize->add_control( 'zerif_socials_dribbble', array(

			'label'    => __( 'Dribbble link', 'zerif-lite' ),

	      	'section'  => 'zerif_general_section',

	      	'settings' => 'zerif_socials_dribbble',

			'priority'    => 8,

	));


	/* email - ICON */
	$wp_customize->add_setting( 'zerif_email_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/envelope4-green.png'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(

				'label'    => __( 'Email section - icon', 'zerif-lite' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_email_icon',

				'priority'    => 9,

	)));
		
	/* email */   

	$wp_customize->add_setting( 'zerif_email', array( 'sanitize_callback' => 'zerif_sanitize_text','default' => __('support@codeinwp.com','zerif-lite')) );
    $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_email', array(
            'label'   => __( 'Email', 'zerif-lite' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_email',
            'priority' => 10
    )) );
	
	/* phone number - ICON */
	$wp_customize->add_setting( 'zerif_phone_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/telephone65-blue.png'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(

				'label'    => __( 'Phone number section - icon', 'zerif-lite' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_phone_icon',

				'priority'    => 11,

	)));

	/* phone number */
		
	$wp_customize->add_setting( 'zerif_phone', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Phone number','zerif-lite')) );
    $wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_phone', array(
            'label'   => __( 'Phone number', 'zerif-lite' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_phone',
            'priority' => 12
    )) );

	
	/* address - ICON */
	$wp_customize->add_setting( 'zerif_address_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/map25-redish.png'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(

				'label'    => __( 'Address section - icon', 'zerif-lite' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_address_icon',

				'priority'    => 13,

	)));

	/* address */
		
	$wp_customize->add_setting( 'zerif_address', array( 'sanitize_callback' => 'zerif_sanitize_text', 'default' => __('24B, Fainari Street, Bucharest, Romania','zerif-lite') ) );
    $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_address', array(
            'label'   => __( 'Address', 'zerif-lite' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_address',
            'priority' => 14
    )) ) ;







	/*****************************************************/

    /**************	BIG TITLE SECTION *******************/

	/****************************************************/







	$wp_customize->add_section( 'zerif_bigtitle_section' , array(

			'title'       => __( 'Big title section', 'zerif-lite' ),

    	  	'priority'    => 31

	));



	/* show/hide */

	$wp_customize->add_setting( 'zerif_bigtitle_show', array('sanitize_callback' => 'zerif_sanitize_text'));

    $wp_customize->add_control(

		'zerif_bigtitle_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide big title section?','zerif-lite'),

			'section' => 'zerif_bigtitle_section',

			'priority'    => 1,

		)

	);



	/* title */

	$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('To add a title here please go to Customizer','zerif-lite')));



	$wp_customize->add_control( 'zerif_bigtitle_title', array(

			'label'    => __( 'Title', 'zerif-lite' ),

	      	'section'  => 'zerif_bigtitle_section',

	      	'settings' => 'zerif_bigtitle_title',

			'priority'    => 2,

	));



	/* red button */

	$wp_customize->add_setting( 'zerif_bigtitle_redbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('One button','zerif-lite')));



	$wp_customize->add_control( 'zerif_bigtitle_redbutton_label', array(

			'label'    => __( 'Red button label', 'zerif-lite' ),

	      	'section'  => 'zerif_bigtitle_section',

	      	'settings' => 'zerif_bigtitle_redbutton_label',

			'priority'    => 3,

	));



	$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array('sanitize_callback' => 'esc_url_raw','default' => '#'));



	$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(

			'label'    => __( 'Red button link', 'zerif-lite' ),

	      	'section'  => 'zerif_bigtitle_section',

	      	'settings' => 'zerif_bigtitle_redbutton_url',

			'priority'    => 4,

	));



	/* green button */

	$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Another button','zerif-lite')));



	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_label', array(

			'label'    => __( 'Red button label', 'zerif-lite' ),

	      	'section'  => 'zerif_bigtitle_section',

	      	'settings' => 'zerif_bigtitle_greenbutton_label',

			'priority'    => 5,

	));



	$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array('sanitize_callback' => 'esc_url_raw','default' => '#'));



	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(

			'label'    => __( 'Green button link', 'zerif-lite' ),

	      	'section'  => 'zerif_bigtitle_section',

	      	'settings' => 'zerif_bigtitle_greenbutton_url',

			'priority'    => 6,

	));







	/********************************************************************/

	/*************  OUR FOCUS SECTION **********************************/

	/********************************************************************/



	$wp_customize->add_section( 'zerif_ourfocus_section' , array(

			'title'       => __( 'Our focus section', 'zerif-lite' ),

    	  	'priority'    => 32

	));



	/* show/hide */

	$wp_customize->add_setting( 'zerif_ourfocus_show', array('sanitize_callback' => 'zerif_sanitize_text'));

    $wp_customize->add_control(

		'zerif_ourfocus_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide our focus section?','zerif-lite'),

			'section' => 'zerif_ourfocus_section',

			'priority'    => 1,

		)

	);

	/* our focus title */

	$wp_customize->add_setting( 'zerif_ourfocus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Our Focus','zerif-lite')));

			

		$wp_customize->add_control( 'zerif_ourfocus_title', array(

				'label'    => __( 'Title', 'zerif-lite' ),

				'section'  => 'zerif_ourfocus_section',

				'settings' => 'zerif_ourfocus_title',

				'priority'    => 2,

	));

	/* our focus subtitle */

	$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Our focus section"','zerif-lite')));



	$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(

			'label'    => __( 'Our focus subtitle', 'zerif-lite' ),

	      	'section'  => 'zerif_ourfocus_section',

	      	'settings' => 'zerif_ourfocus_subtitle',

			'priority'    => 3,

	));










	/************************************/

	/******* ABOUT US SECTION ***********/

	/************************************/



	$wp_customize->add_section( 'zerif_aboutus_section' , array(

			'title'       => __( 'About us section', 'zerif-lite' ),

    	  	'priority'    => 34

	));



	/* about us show/hide */

	$wp_customize->add_setting( 'zerif_aboutus_show', array('sanitize_callback' => 'zerif_sanitize_text'));

    $wp_customize->add_control(

		'zerif_aboutus_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide about us section?','zerif-lite'),

			'section' => 'zerif_aboutus_section',

			'priority'    => 1,

		)

	);

	/* title */

	$wp_customize->add_setting( 'zerif_aboutus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('About Us','zerif-lite')));

	$wp_customize->add_control( 'zerif_aboutus_title', array(

				'label'    => __( 'Title', 'zerif-lite' ),

				'section'  => 'zerif_aboutus_section',

				'settings' => 'zerif_aboutus_title',

				'priority'    => 2,

	));

	/* subtitle */

	$wp_customize->add_setting( 'zerif_aboutus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "About us section"','zerif-lite')));



	$wp_customize->add_control( 'zerif_aboutus_subtitle', array(

			'label'    => __( 'Subtitle', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_subtitle',

			'priority'    => 3,

	));



	/* big left title */

	$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('In order to Change the Title here you Need to go to Customizer','zerif-lite')));



	$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(

			'label'    => __( 'Big left side title', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_biglefttitle',

			'priority'    => 4,

	));



	/* text */

	$wp_customize->add_setting( 'zerif_aboutus_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('You can add here a large piece of text. For that, please go in the Admin Area, Customizer, "About us section" <br/> <br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque.  <br/> <br/>Maecenas non tellus vitae augue tempor venenatis. Mauris ac tincidunt dolor, id feugiat odio. Mauris egestas ligula sit amet lorem condimentum ultrices','zerif-lite')));



	$wp_customize->add_control( 'zerif_aboutus_text', array(

			'label'    => __( 'Text', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_text',

			'priority'    => 5,

	));





	/* feature no#1 */

	$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('Feature 1','zerif-lite')));



	$wp_customize->add_control( 'zerif_aboutus_feature1_title', array(

			'label'    => __( 'Feature no1 title', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature1_title',

			'priority'    => 6,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(

			'label'    => __( 'Feature no1 text', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature1_text',

			'priority'    => 7,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array('sanitize_callback' => 'zerif_sanitize_number', 'default' => '50'));

	$wp_customize->add_control(

		new Zerif_Customizer_Number_Control(

			$wp_customize,

			'zerif_aboutus_feature1_nr',

			array(

				'type' => 'number',

				'label' => __( 'Feature no1 percentage', 'zerif-lite' ),

				'section' => 'zerif_aboutus_section',

				'settings' => 'zerif_aboutus_feature1_nr',

				'priority'    => 8

			)

		)

	);



	/* feature no#2 */

	$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('Feature 2','zerif-lite')));



	$wp_customize->add_control( 'zerif_aboutus_feature2_title', array(

			'label'    => __( 'Feature no2 title', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature2_title',

			'priority'    => 9,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(

			'label'    => __( 'Feature no2 text', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature2_text',

			'priority'    => 10,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '70'));

	$wp_customize->add_control(

		new Zerif_Customizer_Number_Control(

			$wp_customize,

			'zerif_aboutus_feature2_nr',

			array(

				'type' => 'number',

				'label' => __( 'Feature no2 percentage', 'zerif-lite' ),

				'section' => 'zerif_aboutus_section',

				'settings' => 'zerif_aboutus_feature2_nr',

				'priority'    => 11

			)

		)

	);



	/* feature no#3 */

	$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('Feature 3','zerif-lite')));



	$wp_customize->add_control( 'zerif_aboutus_feature3_title', array(

			'label'    => __( 'Feature no3 title', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature3_title',

			'priority'    => 12,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(

			'label'    => __( 'Feature no3 text', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature3_text',

			'priority'    => 13,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '100'));

	$wp_customize->add_control(

		new Zerif_Customizer_Number_Control(

			$wp_customize,

			'zerif_aboutus_feature3_nr',

			array(

				'type' => 'number',

				'label' => __( 'Feature no3 percentage', 'zerif-lite' ),

				'section' => 'zerif_aboutus_section',

				'settings' => 'zerif_aboutus_feature3_nr',

				'priority'    => 14

			)

		)

	);



	/* feature no#4 */

	$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature 4','zerif-lite')));



	$wp_customize->add_control( 'zerif_aboutus_feature4_title', array(

			'label'    => __( 'Feature no4 title', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature4_title',

			'priority'    => 15,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(

			'label'    => __( 'Feature no4 text', 'zerif-lite' ),

	      	'section'  => 'zerif_aboutus_section',

	      	'settings' => 'zerif_aboutus_feature4_text',

			'priority'    => 16,

	));



	$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '10'));

	$wp_customize->add_control(

		new Zerif_Customizer_Number_Control(

			$wp_customize,

			'zerif_aboutus_feature4_nr',

			array(

				'type' => 'number',

				'label' => __( 'Feature no4 percentage', 'zerif-lite' ),

				'section' => 'zerif_aboutus_section',

				'settings' => 'zerif_aboutus_feature4_nr',

				'priority'    => 17

			)

		)

	);





	/******************************************/

    /**********	OUR TEAM SECTION **************/

	/******************************************/





	$wp_customize->add_section( 'zerif_ourteam_section' , array(

			'title'       => __( 'Our team section', 'zerif-lite' ),

    	  	'priority'    => 35

	));



	/* our team show/hide */

	$wp_customize->add_setting( 'zerif_ourteam_show', array('sanitize_callback' => 'zerif_sanitize_text'));

    $wp_customize->add_control(

		'zerif_ourteam_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide our team section?','zerif-lite'),

			'section' => 'zerif_ourteam_section',

			'priority'    => 1,

		)

	);


	/* our team title */

	$wp_customize->add_setting( 'zerif_ourteam_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Our Team','zerif-lite')));

	$wp_customize->add_control( 'zerif_ourteam_title', array(

				'label'    => __( 'Title', 'zerif-lite' ),

				'section'  => 'zerif_ourteam_section',

				'settings' => 'zerif_ourteam_title',

				'priority'    => 2,

	));


	/* our team subtitle */

	$wp_customize->add_setting( 'zerif_ourteam_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Our team section"','zerif-lite')));



	$wp_customize->add_control( 'zerif_ourteam_subtitle', array(

			'label'    => __( 'Our team subtitle', 'zerif-lite' ),

	      	'section'  => 'zerif_ourteam_section',

	      	'settings' => 'zerif_ourteam_subtitle',

			'priority'    => 3,

	));





	/**********************************************/

    /**********	TESTIMONIALS SECTION **************/

	/**********************************************/





	$wp_customize->add_section( 'zerif_testimonials_section' , array(

			'title'       => __( 'Testimonials section', 'zerif-lite' ),

    	  	'priority'    => 36

	));



	/* testimonials show/hide */

	$wp_customize->add_setting( 'zerif_testimonials_show', array('sanitize_callback' => 'zerif_sanitize_text'));

    $wp_customize->add_control(

		'zerif_testimonials_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide testimonials section?','zerif-lite'),

			'section' => 'zerif_testimonials_section',

			'priority'    => 1,

		)

	);

	/* testimonials title */

	$wp_customize->add_setting( 'zerif_testimonials_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Testimonials','zerif-lite')));

	$wp_customize->add_control( 'zerif_testimonials_title', array(

				'label'    => __( 'Title', 'zerif-lite' ),

				'section'  => 'zerif_testimonials_section',

				'settings' => 'zerif_testimonials_title',

				'priority'    => 2,

	));

	/* testimonials subtitle */

	$wp_customize->add_setting( 'zerif_testimonials_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_testimonials_subtitle', array(

			'label'    => __( 'Testimonials subtitle', 'zerif-lite' ),

	      	'section'  => 'zerif_testimonials_section',

	      	'settings' => 'zerif_testimonials_subtitle',

			'priority'    => 3,

	));






	/**********************************************/

    /**********	LATEST NEWS SECTION **************/

	/**********************************************/





	$wp_customize->add_section( 'zerif_latestnews_section' , array(

			'title'       => __( 'Latest News section', 'zerif-lite' ),

    	  	'priority'    => 37

	));



	/* latest news show/hide */

	$wp_customize->add_setting( 'zerif_latestnews_show', array('sanitize_callback' => 'zerif_sanitize_text'));

    $wp_customize->add_control(

		'zerif_latestnews_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide latest news section?','zerif-lite'),

			'section' => 'zerif_latestnews_section',

			'priority'    => 1,

		)

	);


	/* latest news subtitle */

	$wp_customize->add_setting( 'zerif_latestnews_title', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_latestnews_title', array(

			'label'    		=> __( 'Latest News title', 'zerif-lite' ),

	      	'section'  		=> 'zerif_latestnews_section',

	      	'settings' 		=> 'zerif_latestnews_title',

			'priority'    	=> 2,

	));


	/* latest news subtitle */

	$wp_customize->add_setting( 'zerif_latestnews_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_latestnews_subtitle', array(

			'label'    		=> __( 'Latest News subtitle', 'zerif-lite' ),

	      	'section'  		=> 'zerif_latestnews_section',

	      	'settings' 		=> 'zerif_latestnews_subtitle',

			'priority'   	=> 3,

	));





	/***********************************************************/

	/********* RIBBONS ****************************************/

	/**********************************************************/



	$wp_customize->add_section( 'zerif_ribbon_section' , array(

			'title'       => __( 'Ribbon sections', 'zerif-lite' ),

    	  	'priority'    => 37

	));





	/* RIBBON SECTION WITH BOTTOM BUTTON */



	/* text */

	$wp_customize->add_setting( 'zerif_bottomribbon_text', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_bottomribbon_text', array(

			'label'    => __( 'Ribbon section with bottom button - Text', 'zerif-lite' ),

	      	'section'  => 'zerif_ribbon_section',

	      	'settings' => 'zerif_bottomribbon_text',

			'priority'    => 1,

	));



	/* button label */

	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(

			'label'    => __( 'Ribbon section with bottom button - Button label', 'zerif-lite' ),

	      	'section'  => 'zerif_ribbon_section',

	      	'settings' => 'zerif_bottomribbon_buttonlabel',

			'priority'    => 2,

	));



	/* button link */

	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array('sanitize_callback' => 'esc_url_raw'));



	$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(

			'label'    => __( 'Ribbon section with bottom button - Button link', 'zerif-lite' ),

	      	'section'  => 'zerif_ribbon_section',

	      	'settings' => 'zerif_bottomribbon_buttonlink',

			'priority'    => 3,

	));





	/* RIBBON SECTION WITH BUTTON IN THE RIGHT SIDE */



	/* text */

	$wp_customize->add_setting( 'zerif_ribbonright_text', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_ribbonright_text', array(

			'label'    => __( 'Ribbon section with button in the right side - Text', 'zerif-lite' ),

	      	'section'  => 'zerif_ribbon_section',

	      	'settings' => 'zerif_ribbonright_text',

			'priority'    => 4,

	));



	/* button label */

	$wp_customize->add_setting( 'zerif_ribbonright_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_ribbonright_buttonlabel', array(

			'label'    => __( 'Ribbon section with button in the right side - Button label', 'zerif-lite' ),

	      	'section'  => 'zerif_ribbon_section',

	      	'settings' => 'zerif_ribbonright_buttonlabel',

			'priority'    => 5,

	));



	/* button link */

	$wp_customize->add_setting( 'zerif_ribbonright_buttonlink', array('sanitize_callback' => 'esc_url_raw'));



	$wp_customize->add_control( 'zerif_ribbonright_buttonlink', array(

			'label'    => __( 'Ribbon section with button in the right side - Button link', 'zerif-lite' ),

	      	'section'  => 'zerif_ribbon_section',

	      	'settings' => 'zerif_ribbonright_buttonlink',

			'priority'    => 6,

	));









	/*******************************************************/

    /************	CONTACT US SECTION *********************/

	/*******************************************************/





	$wp_customize->add_section( 'zerif_contactus_section' , array(

			'title'       => __( 'Contact us section', 'zerif-lite' ),

    	  	'priority'    => 38

	));



	/* contact us show/hide */

	$wp_customize->add_setting( 'zerif_contactus_show', array('sanitize_callback' => 'zerif_sanitize_text'));

    $wp_customize->add_control(

		'zerif_contactus_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide contact us section?','zerif-lite'),

			'section' => 'zerif_contactus_section',

			'priority'    => 1,

		)

	);

	/* contactus title */

	$wp_customize->add_setting( 'zerif_contactus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Get in touch','zerif-lite')));

	$wp_customize->add_control( 'zerif_contactus_title', array(

				'label'    => __( 'Contact us section title', 'zerif-lite' ),

				'section'  => 'zerif_contactus_section',

				'settings' => 'zerif_contactus_title',

				'priority'    => 2,

	));


	/* contactus subtitle */

	$wp_customize->add_setting( 'zerif_contactus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));



	$wp_customize->add_control( 'zerif_contactus_subtitle', array(

			'label'    => __( 'Contact us section subtitle', 'zerif-lite' ),

	      	'section'  => 'zerif_contactus_section',

	      	'settings' => 'zerif_contactus_subtitle',

			'priority'    => 3,

	));
	
	/* contactus email */

	$wp_customize->add_setting( 'zerif_contactus_email', array('sanitize_callback' => 'zerif_sanitize_text'));

			

	$wp_customize->add_control( 'zerif_contactus_email', array(

				'label'    => __( 'Email address', 'zerif-lite' ),

				'section'  => 'zerif_contactus_section',

				'settings' => 'zerif_contactus_email',

				'priority'    => 4,

	));
		
	/* contactus button label */

	$wp_customize->add_setting( 'zerif_contactus_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Send Message','zerif-lite')));

			

	$wp_customize->add_control( 'zerif_contactus_button_label', array(

				'label'    => __( 'Button label', 'zerif-lite' ),

				'section'  => 'zerif_contactus_section',

				'settings' => 'zerif_contactus_button_label',

				'priority'    => 5,

	));

	/* recaptcha */

	$wp_customize->add_setting( 'zerif_contactus_recaptcha_show', array('sanitize_callback' => 'zerif_sanitize_text'));

	$wp_customize->add_control(

		'zerif_contactus_recaptcha_show',

		array(

			'type' => 'checkbox',

			'label' => __('Hide reCaptcha?','zerif-lite'),

			'section' => 'zerif_contactus_section',

			'priority'    => 6,

		)

	);

	/* site key */

	$wp_customize->add_setting( 'zerif_contactus_sitekey', array('sanitize_callback' => 'zerif_sanitize_text'));	

	$wp_customize->add_control( 'zerif_contactus_sitekey', array(

				'label'    => __( 'Site key', 'zerif-lite' ),

				'section'  => 'zerif_contactus_section',

				'settings' => 'zerif_contactus_sitekey',

				'priority'    => 7,

	));


	/* secret key */

	$wp_customize->add_setting( 'zerif_contactus_secretkey', array('sanitize_callback' => 'zerif_sanitize_text'));	

	$wp_customize->add_control( 'zerif_contactus_secretkey', array(

				'label'    => __( 'Secret key', 'zerif-lite' ),

				'section'  => 'zerif_contactus_section',

				'settings' => 'zerif_contactus_secretkey',

				'priority'    => 8,

	));
	
	/* Google maps section */
	
	$wp_customize->add_section( 'zerif_googlemap_section' , array(

					'title'       => __( 'Google maps section', 'zerif-lite' ),

					'priority'    => 39

	));
	
	$wp_customize->add_setting(
        'zerif_googlemap_section', array('sanitize_callback' => 'zerif_sanitize_pro_version')
	);
	
	$wp_customize->add_control( new Zerif_Theme_Support_Googlemap( $wp_customize, 'zerif_googlemap_section',
	    array(
	        'section' => 'zerif_googlemap_section',
	   )
	));

	/* Pricing section */

	$wp_customize->add_section( 'zerif_pricing_section' , array(

					'title'       => __( 'Pricing section', 'zerif-lite' ),

					'priority'    => 40

	));
	
	$wp_customize->add_setting(
        'zerif_pricing_section', array('sanitize_callback' => 'zerif_sanitize_pro_version')
	);
	
	$wp_customize->add_control( new Zerif_Theme_Support_Pricing( $wp_customize, 'zerif_pricing_section',
	    array(
	        'section' => 'zerif_pricing_section',
	   )
	));


}

add_action( 'customize_register', 'zerif_customize_register' );



/**

 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.

 */

function zerif_customize_preview_js() {

	wp_enqueue_script( 'zerif_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}

add_action( 'customize_preview_init', 'zerif_customize_preview_js' );



function zerif_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}

function zerif_sanitize_pro_version( $input ) {

    return $input;

}

function zerif_sanitize_number( $input ) {

    return force_balance_tags( $input );

}



function zerif_registers() {

    wp_register_script( 'zerif_jquery_ui', '//code.jquery.com/ui/1.10.4/jquery-ui.js', array("jquery"), '20120206', true  );

	wp_enqueue_script( 'zerif_jquery_ui' );



	wp_register_style( 'zerif_jquery_ui_css', '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css');

	wp_enqueue_style( 'zerif_jquery_ui_css' );



	wp_register_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery","zerif_jquery_ui"), '20120206', true  );

	wp_enqueue_script( 'zerif_customizer_script' );
	
	wp_localize_script( 'zerif_customizer_script', 'objectL10n', array(
		
		'documentation' => __( 'Documentation', 'zerif-lite' ),
		'pro' => __('View PRO version','zerif-lite')
		
	) );

}

add_action( 'customize_controls_enqueue_scripts', 'zerif_registers' );



