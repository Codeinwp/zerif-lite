<?php

/**
 * zerif functions and definitions
 *
 * @package zerif
 */


/**
 * Set the content width based on the theme's design and stylesheet.

 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.

 */

function zerif_setup()
{
    global $content_width;
    if (!isset($content_width)) {

        $content_width = 640;

    }

    /*

     * Make theme available for translation.

     * Translations can be filed in the /languages/ directory.

     * If you're building a theme based on zerif, use a find and replace

     * to change 'zerif-lite' to the name of your theme in all the template files

     */

    load_theme_textdomain('zerif-lite', get_template_directory() . '/languages'); 


    // Add default posts and comments RSS feed links to head.

    add_theme_support('automatic-feed-links');


    /*

     * Enable support for Post Thumbnails on posts and pages.

     *

     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails

     */

    add_theme_support('post-thumbnails');


    /* Set the image size by cropping the image */

    add_image_size('post-thumbnail', 250, 250, true);
    add_image_size( 'post-thumbnail-large', 750, 500, true ); /* blog thumbnail */
    add_image_size( 'post-thumbnail-large-table', 600, 300, true ); /* blog thumbnail for table */
    add_image_size( 'post-thumbnail-large-mobile', 400, 200, true ); /* blog thumbnail for mobile */


    // This theme uses wp_nav_menu() in one location.

    register_nav_menus(array(

        'primary' => __('Primary Menu', 'zerif-lite'),

    ));


    // Enable support for Post Formats.

    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));


    // Setup the WordPress core custom background feature.

    add_theme_support('custom-background', apply_filters('zerif_custom_background_args', array(

        'default-color' => 'ffffff',

        'default-image' => get_stylesheet_directory_uri() . "/images/bg.jpg",

    )));


    // Enable support for HTML5 markup.

    add_theme_support('html5', array(

        'comment-list',

        'search-form',

        'comment-form',

        'gallery',

    ));


		/**
		 * Custom template tags for this theme.

		 */

		require get_template_directory() . '/inc/template-tags.php';


		/**
		 * Custom functions that act independently of the theme templates.

		 */

		require get_template_directory() . '/inc/extras.php';


		/**
		 * Customizer additions.

		 */

		require get_template_directory() . '/inc/customizer.php';

		require get_template_directory() . '/inc/category-dropdown-custom-control.php';


		/* tgm-plugin-activation */
        require_once get_template_directory() . '/class-tgm-plugin-activation.php';

        add_image_size('zerif_project_photo', 285, 214, true);

        add_image_size('zerif_our_team_photo', 174, 174, true);
	
		/* woocommerce support */
		add_theme_support( 'woocommerce' );

}


add_action('after_setup_theme', 'zerif_setup');


/**
 * Register widgetized area and update sidebar with default widgets.

 */

function zerif_widgets_init()
{

    register_sidebar(array(

        'name' => __('Sidebar', 'zerif-lite'),

        'id' => 'sidebar-1',

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('Our focus section', 'zerif-lite'),

        'id' => 'sidebar-ourfocus',

        'before_widget' => '',

        'after_widget' => '',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('Testimonials section', 'zerif-lite'),

        'id' => 'sidebar-testimonials',

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('About us section', 'zerif-lite'),

        'id' => 'sidebar-aboutus',

        'before_widget' => '',

        'after_widget' => '',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('Our team section', 'zerif-lite'),

        'id' => 'sidebar-ourteam',

        'before_widget' => '',

        'after_widget' => '',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

}

add_action('widgets_init', 'zerif_widgets_init');

function zerif_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'zerif-lite' );
    $homemade = _x( 'on', 'Homemade font: on or off', 'zerif-lite' );
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $monserrat = _x( 'on', 'Monserrat font: on or off', 'zerif-lite' );
 
    if ( 'off' !== $lato || 'off' !== $monserrat|| 'off' !== $homemade ) {
        $font_families = array();
 
        
        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:300,400,700,400italic';
        }
 
        if ( 'off' !== $monserrat ) {
            $font_families[] = 'Montserrat:700';
        }
        
        if ( 'off' !== $homemade ) {
            $font_families[] = 'Homemade Apple';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
 * Enqueue scripts and styles.

 */

function zerif_scripts()
{


    wp_enqueue_style('zerif_font', zerif_slug_fonts_url(), array(), null );

    wp_enqueue_style( 'zerif_font_all', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600italic,600,700,700italic,800,800italic');
    
    wp_enqueue_style('zerif_bootstrap_style', get_template_directory_uri() . '/css/bootstrap.css');
    wp_style_add_data( 'zerif_bootstrap_style', 'rtl', 'replace' );

    wp_enqueue_style('zerif_fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), 'v1');

    wp_enqueue_style('zerif_pixeden_style', get_template_directory_uri() . '/css/pixeden-icons.css', array('zerif_fontawesome'), 'v1');

    wp_enqueue_style('zerif_style', get_stylesheet_uri(), array('zerif_pixeden_style'), 'v1');

    wp_enqueue_style('zerif_responsive_style', get_template_directory_uri() . '/css/responsive.css', array('zerif_style'), 'v1');

    if ( wp_is_mobile() ){
        
        wp_enqueue_style( 'zerif_style_mobile', get_template_directory_uri() . '/css/style-mobile.css', array('zerif_bootstrap_style', 'zerif_style'),'v1' );
    
    }

    wp_enqueue_script('jquery');

    /* Bootstrap script */
    wp_enqueue_script('zerif_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120206', true);

    /* Knob script */
    wp_enqueue_script('zerif_knob_nav', get_template_directory_uri() . '/js/jquery.knob.js', array("jquery"), '20120206', true);

    /* Smootscroll script */

    $zerif_disable_smooth_scroll = get_theme_mod('zerif_disable_smooth_scroll');
    if( isset($zerif_disable_smooth_scroll) && ($zerif_disable_smooth_scroll != 1)):
        wp_enqueue_script('zerif_smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array("jquery"), '20120206', true);
    endif;  
	
	/* scrollReveal script */
	if ( !wp_is_mobile() ){
		wp_enqueue_script( 'zerif_scrollReveal_script', get_template_directory_uri() . '/js/scrollReveal.js', array("jquery"), '20120206', true  );
	}

    /* zerif script */

    wp_enqueue_script('zerif_script', get_template_directory_uri() . '/js/zerif.js', array("jquery", "zerif_knob_nav"), '20120206', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }

	add_editor_style('/css/custom-editor-style.css');
}

add_action('wp_enqueue_scripts', 'zerif_scripts');


add_action('tgmpa_register', 'zerif_register_required_plugins');


function zerif_register_required_plugins()
{

	$wp_version_nr = get_bloginfo('version');
	
	if( $wp_version_nr < 3.9 ):

		$plugins = array(


			array(

				'name' => 'Widget customizer',

				'slug' => 'widget-customizer', 

				'required' => false 

			),

			array(
	 
				'name'      => 'Login customizer',
	 
				'slug'      => 'login-customizer',
	 
				'required'  => false,
	 
			),

			array(
	 
				'name'      => 'Revive Old Post (Former Tweet Old Post)',
	 
				'slug'      => 'tweet-old-post',
	 
				'required'  => false,
	 
			)

		);
		
	else:

		$plugins = array(

			array(
	 
				'name'      => 'Login customizer',
	 
				'slug'      => 'login-customizer',
	 
				'required'  => false,
	 
			),

			array(
	 
				'name'      => 'Revive Old Post (Former Tweet Old Post)',
	 
				'slug'      => 'tweet-old-post',
	 
				'required'  => false,
	 
			)

		);

	
	endif;

	 


    $config = array(

        'default_path' => '',

        'menu' => 'tgmpa-install-plugins',

        'has_notices' => true,

        'dismissable' => true,

        'dismiss_msg' => '',

        'is_automatic' => false,

        'message' => '',

        'strings' => array(

            'page_title' => __('Install Required Plugins', 'zerif-lite'),

            'menu_title' => __('Install Plugins', 'zerif-lite'),

            'installing' => __('Installing Plugin: %s', 'zerif-lite'),

            'oops' => __('Something went wrong with the plugin API.', 'zerif-lite'),

            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','zerif-lite'),

            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','zerif-lite'),

            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','zerif-lite'),

            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','zerif-lite'),

            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','zerif-lite'),

            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','zerif-lite'),

            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','zerif-lite'),

            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','zerif-lite'),

            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','zerif-lite'),

            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','zerif-lite'),

            'return' => __('Return to Required Plugins Installer', 'zerif-lite'),

            'plugin_activated' => __('Plugin activated successfully.', 'zerif-lite'),

            'complete' => __('All plugins installed and activated successfully. %s', 'zerif-lite'),

            'nag_type' => 'updated'

        )

    );


    tgmpa($plugins, $config);


}


/**
 * Load Jetpack compatibility file.

 */

require get_template_directory() . '/inc/jetpack.php';

function zerif_wp_page_menu()
{

    echo '<ul class="nav navbar-nav navbar-right responsive-nav main-nav-list">';

    wp_list_pages(array('title_li' => '', 'depth' => 1));

    echo '</ul>';

}

add_filter('the_title', 'cwp_default_title');


function cwp_default_title($title)
{


    if ($title == '')

        $title = __("Default title",'zerif-lite');


    return $title;

}


/*****************************************/

/******          WIDGETS     *************/

/*****************************************/


add_action('widgets_init', 'zerif_register_widgets');

function zerif_register_widgets()
{

    register_widget('zerif_ourfocus');

    register_widget('zerif_testimonial_widget');

    register_widget('zerif_clients_widget');

    register_widget('zerif_team_widget');

}


/**************************/

/****** our focus widget */

/************************/


add_action('admin_enqueue_scripts', 'zerif_ourfocus_widget_scripts');

function zerif_ourfocus_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);

}


class zerif_ourfocus extends WP_Widget
{


    function zerif_ourfocus()
    {

        $widget_ops = array('classname' => 'ctUp-ads');

        $this->WP_Widget('ctUp-ads-widget', 'Zerif - Our focus widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>



        <div class="col-lg-3 col-sm-3 focus-box" data-scrollreveal="enter left after 0.15s over 1s">

			<?php if( !empty($instance['image_uri']) ): ?>
            <div class="service-icon">
				
				<?php if( !empty($instance['link']) ): ?>
				
					<a href="<?php echo $instance['link']; ?>"><i class="pixeden" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON--></a>
				
				<?php else: ?>
				
					<i class="pixeden" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON-->
				
				<?php endif; ?>


            </div>
			<?php endif; ?>

            <h5 class="red-border-bottom"><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title']); endif; ?></h5>
            <!-- FOCUS HEADING -->


			<?php 
				if( !empty($instance['text']) ):
				
					echo '<p>';
						echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text']));
					echo '</p>';
				endif;
			?>	

        </div>



        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));

        $instance['title'] = strip_tags($new_instance['title']);
		
		$instance['link'] = strip_tags( $new_instance['link'] );

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"
                   id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'zerif-lite'); ?></label><br/>

            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>"
                      id="<?php echo $this->get_field_id('text'); ?>"><?php
                        if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif;
            ?></textarea>

        </p>
		
	
		<p>

			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','zerif'); ?></label><br />

			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" class="widefat" />

		</p>

        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif-lite'); ?></label><br/>



            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                   name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','zerif-lite'); ?>"
                   style="margin-top:5px;"/>

        </p>



    <?php

    }

}


/****************************/

/****** testimonial widget **/

/***************************/


add_action('admin_enqueue_scripts', 'zerif_testimonial_widget_scripts');

function zerif_testimonial_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_testimonial_widget_script', get_template_directory_uri() . '/js/widget-testimonials.js', false, '1.0', true);

}


class zerif_testimonial_widget extends WP_Widget
{


    function zerif_testimonial_widget()
    {

        $widget_ops = array('classname' => 'zerif_testim');

        $this->WP_Widget('zerif_testim-widget', 'Zerif - Testimonial widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>



        <div class="feedback-box">

            <!-- MESSAGE OF THE CLIENT -->

			<?php if( !empty($instance['text']) ): ?>
				<div class="message">

					<?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); ?>

				</div>
			<?php endif; ?>

            <!-- CLIENT INFORMATION -->

            <div class="client">

                <div class="quote red-text">

                    <i class="icon-fontawesome-webfont-294"></i>

                </div>

                <div class="client-info">

					<a class="client-name" target="_blank" <?php if( !empty($instance['link']) ): echo 'href="'.esc_url($instance['link']).'"'; endif; ?>><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title'] ); endif; ?></a>
					

					<?php if( !empty($instance['details']) ): ?>
                    <div class="client-company">

                        <?php echo apply_filters('widget_title', $instance['details']); ?>

                    </div>
					<?php endif; ?>

                </div>

                <?php
				
				if( !empty($instance['image_uri']) ):

					echo '<div class="client-image hidden-xs">';

					echo '<img src="' . esc_url($instance['image_uri']) . '" alt="">';

					echo '</div>';
				endif;	

                ?>

            </div>
            <!-- / END CLIENT INFORMATION-->

        </div> <!-- / END SINGLE FEEDBACK BOX-->





        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['details'] = strip_tags($new_instance['details']);

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
		
		$instance['link'] = strip_tags( $new_instance['link'] );

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"
                   id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>"
                   class="widefat"/>

        </p>
		
		<p>

			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Author link','zerif'); ?></label><br />

			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" class="widefat" />

		</p>

        <p>

            <label for="<?php echo $this->get_field_id('details'); ?>"><?php _e('Author details', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('details'); ?>"
                   id="<?php echo $this->get_field_id('details'); ?>" value="<?php if( !empty($instance['details']) ): echo $instance['details']; endif; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'zerif-lite'); ?></label><br/>

            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>"
                      id="<?php echo $this->get_field_id('text'); ?>"><?php
                if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif;
            ?></textarea>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif-lite'); ?></label><br/>



            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_testimonial" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url_testimonial"
                   name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button_testimonial"
                   id="custom_media_button_testimonial" name="<?php echo $this->get_field_name('image_uri'); ?>"
                   value="<?php _e('Upload Image','zerif-lite'); ?>" style="margin-top:5px;"/>

        </p>



    <?php

    }

}


/****************************/

/****** clients widget **/

/***************************/


add_action('admin_enqueue_scripts', 'zerif_clients_widget_scripts');

function zerif_clients_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_clients_widget_script', get_template_directory_uri() . '/js/widget-clients.js', false, '1.0', true);

}


class zerif_clients_widget extends WP_Widget
{


    function zerif_clients_widget()
    {

        $widget_ops = array('classname' => 'zerif_clients');

        $this->WP_Widget('zerif_clients-widget', 'Zerif - Clients widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>

        <a href="<?php if( !empty($instance['link']) ): echo apply_filters('widget_title', $instance['link']); endif; ?>"><img
                src="<?php if( !empty($instance['image_uri']) ): echo esc_url($instance['image_uri']); endif; ?>" alt="Client"></a>





        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['link'] = strip_tags($new_instance['link']);

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('link'); ?>"
                   id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif-lite'); ?></label><br/>



            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_clients" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url_clients"
                   name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button_clients"
                   id="custom_media_button_clients" name="<?php echo $this->get_field_name('image_uri'); ?>"
                   value="<?php _e('Upload Image','zerif-lite'); ?>" style="margin-top:5px;"/>

        </p>



    <?php

    }

}


/****************************/

/****** team member widget **/

/***************************/


add_action('admin_enqueue_scripts', 'zerif_team_widget_scripts');

function zerif_team_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_team_widget_script', get_template_directory_uri() . '/js/widget-team.js', false, '1.0', true);

}


class zerif_team_widget extends WP_Widget
{


    function zerif_team_widget()
    {

        $widget_ops = array('classname' => 'zerif_team');

        $this->WP_Widget('zerif_team-widget', 'Zerif - Team member widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>



        <div class="col-lg-3 col-sm-3 team-box">


            <div class="team-member">

				<?php if( !empty($instance['image_uri']) ): ?>
				
					<figure class="profile-pic">


						<img src="<?php echo esc_url($instance['image_uri']); ?>" alt="">


					</figure>
				
				<?php endif; ?>


                <div class="member-details">

					<?php if( !empty($instance['name']) ): ?>
					
						<h5 class="dark-text red-border-bottom"><?php echo apply_filters('widget_title', $instance['name']); ?></h5>
						
					<?php endif; ?>	

					<?php if( !empty($instance['position']) ): ?>
					
						<div class="position"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['position'])); ?></div>
				
					<?php endif; ?>

                </div>


                <div class="social-icons">


                    <ul>


                        <?php if ( !empty($instance['fb_link']) ): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['fb_link']); ?>"><i
                                        class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['tw_link']) ): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['tw_link']); ?>"><i
                                        class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['bh_link']) ): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['bh_link']); ?>"><i
                                        class="fa fa-behance"></i></a></li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['db_link']) ): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['db_link']); ?>"><i
                                        class="fa fa-dribbble"></i></a></li>
                        <?php endif; ?>
						
						<?php if ( !empty($instance['ln_link']) ): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['ln_link']); ?>"><i
                                        class="fa fa-linkedin"></i></a></li>
                        <?php endif; ?>


                    </ul>


                </div>


				<?php if( !empty($instance['description']) ): ?>
                <div class="details">


                    <?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['description'])); ?>


                </div>
				<?php endif; ?>


            </div>


        </div>



        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['name'] = strip_tags($new_instance['name']);

        $instance['position'] = stripslashes(wp_filter_post_kses($new_instance['position']));

        $instance['description'] = stripslashes(wp_filter_post_kses($new_instance['description']));

        $instance['fb_link'] = strip_tags($new_instance['fb_link']);

        $instance['tw_link'] = strip_tags($new_instance['tw_link']);

        $instance['bh_link'] = strip_tags($new_instance['bh_link']);

        $instance['db_link'] = strip_tags($new_instance['db_link']);
		
		$instance['ln_link'] = strip_tags($new_instance['ln_link']);

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('name'); ?>"
                   id="<?php echo $this->get_field_id('name'); ?>" value="<?php if( !empty($instance['name']) ): echo $instance['name']; endif; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label for="<?php echo $this->get_field_id('position'); ?>"><?php _e('Position', 'zerif-lite'); ?></label><br/>

            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('position'); ?>"
                      id="<?php echo $this->get_field_id('position'); ?>"><?php
                if( !empty($instance['position']) ): echo htmlspecialchars_decode($instance['position']); endif;
            ?></textarea>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'zerif-lite'); ?></label><br/>

            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('description'); ?>"
                      id="<?php echo $this->get_field_id('description'); ?>"><?php
                if( !empty($instance['description']) ): echo htmlspecialchars_decode($instance['description']); endif;
            ?></textarea>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook link', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('fb_link'); ?>"
                   id="<?php echo $this->get_field_id('fb_link'); ?>" value="<?php if( !empty($instance['fb_link']) ): echo $instance['fb_link']; endif; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('tw_link'); ?>"><?php _e('Twitter link', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('tw_link'); ?>"
                   id="<?php echo $this->get_field_id('tw_link'); ?>" value="<?php if( !empty($instance['tw_link']) ): echo $instance['tw_link']; endif; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('bh_link'); ?>"><?php _e('Behance link', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('bh_link'); ?>"
                   id="<?php echo $this->get_field_id('bh_link'); ?>" value="<?php if( !empty($instance['bh_link']) ): echo $instance['bh_link']; endif; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('db_link'); ?>"><?php _e('Dribble link', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('db_link'); ?>"
                   id="<?php echo $this->get_field_id('db_link'); ?>" value="<?php if( !empty($instance['db_link']) ): echo $instance['db_link']; endif; ?>"
                   class="widefat"/>

        </p>

		<p>

            <label
                for="<?php echo $this->get_field_id('ln_link'); ?>"><?php _e('Linkedin link', 'zerif-lite'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('ln_link'); ?>"
                   id="<?php echo $this->get_field_id('ln_link'); ?>" value="<?php if( !empty($instance['ln_link']) ): echo $instance['ln_link']; endif; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif-lite'); ?></label><br/>



            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url_team"
                   name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_clients"
                   name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','zerif-lite'); ?>"
                   style="margin-top:5px;"/>

        </p>



    <?php

    }

}

function zerif_customizer_custom_css()
{


    wp_register_style('zerif_customizer_custom_css', get_template_directory_uri() . '/css/zerif_customizer_custom_css.css');

    wp_enqueue_style('zerif_customizer_custom_css');
}


add_action('customize_controls_print_styles', 'zerif_customizer_custom_css');

function zerif_excerpt_more( $more ) {
	return '<a href="'.get_permalink().'">[...]</a>';
}
add_filter('excerpt_more', 'zerif_excerpt_more');

/**************************/
/**** More themes *********/
/**************************/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Add stylesheet and JS for upsell page.
function zerif_upsell_style() {
	wp_enqueue_style( 'upsell-style', get_template_directory_uri() . '/css/upsell.css');
}

// Add upsell page to the menu.
function zerif_lite_add_upsell() {
	$page = add_theme_page(
		__( 'More Themes', 'zerif-lite' ),
		__( 'More Themes', 'zerif-lite' ),
		'administrator',
		'zerif-lite-themes',
		'zerif_lite_display_upsell'
	);

	add_action( 'admin_print_styles-' . $page, 'zerif_upsell_style' );
}
add_action( 'admin_menu', 'zerif_lite_add_upsell', 11 );

// Define markup for the upsell page.
function zerif_lite_display_upsell() {

	// Set template directory uri
	$directory_uri = get_template_directory_uri();
	?>
	<div class="wrap">
		<div class="container-fluid">
			<div id="upsell_container">
				<div class="row">
					<div id="upsell_header" class="col-md-12">
						<h2>
							<a href="https://themeisle.com" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo-themeisle.png"/>
							</a>
						</h2>

						<h3><?php _e( 'Simple and effective products, no complex frameworks, no drag & drop builders.', 'zerif-lite' ); ?></h3>
					</div>
				</div>

				<div id="upsell_themes" class="row">
					<?php
					// Set the argument array with author name.
					$args = array(
						'author' => 'codeinwp',
					);

					// Set the $request array.
					$request = array(
						'body' => array(
							'action'  => 'query_themes',
							'request' => serialize( (object)$args )
						)
					);
					$themes = zerif_get_themes( $request );
					$active_theme = wp_get_theme()->get( 'Name' );
					$counter = 1;

					// For currently active theme.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme == $theme->name ) {?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

									<div class="theme-description">
										<p><?php echo $theme->description; ?></p>
									</div>
								</div>
								<div class="theme-details active">
									<span class="theme-name"><?php echo $theme->name . ':' . __( 'Current theme', 'zerif-lite' ); ?></span>
									<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>">Customize</a>
								</div>
							</div>

						<?php
						$counter++;
						break;
						}
					}

					// For all other themes.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme != $theme->name ) {

							// Set the argument array with author name.
							$args = array(
								'slug' => $theme->slug,
							);

							// Set the $request array.
							$request = array(
								'body' => array(
									'action'  => 'theme_information',
									'request' => serialize( (object)$args )
								)
							);

							$theme_details = zerif_get_themes( $request );
							?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4 <?php echo $counter % 3 == 1 ? 'no-left-megin' : ""; ?>">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

									<div class="theme-description">
										<p><?php echo $theme->description; ?></p>
									</div>
								</div>
								<div class="theme-details">
									<span class="theme-name"><?php echo $theme->name; ?></span>

									<!-- Check if the theme is installed -->
									<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>

										<!-- Show the tick image notifying the theme is already installed. -->
										<img data-toggle="tooltip" title="<?php _e( 'Already installed', 'zerif-lite' ); ?>" data-placement="bottom" class="theme-exists" src="<?php echo $directory_uri ?>/core/images/tick.png"/>

										<!-- Activate Button -->
										<a  class="button button-primary activate right"
											href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug );?>" >Activate</a>
									<?php }
									else {

										// Set the install url for the theme.
										$install_url = add_query_arg( array(
												'action' => 'install-theme',
												'theme'  => $theme->slug,
											), self_admin_url( 'update.php' ) );
									?>
										<!-- Install Button -->
										<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-primary install right" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php _e( 'Install Now', 'zerif-lite' ); ?></a>
									<?php } ?>

									<!-- Preview button -->
									<a class="button button-secondary preview right" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'zerif-lite' ); ?></a>
								</div>
							</div>
							<?php
							$counter++;
						}
					}?>
				</div>
			</div>
		</div>
	</div>

	<script>
		jQuery(function () {
			jQuery('.download').tooltip();
			jQuery('.theme-exists').tooltip();
		});
	</script>
<?php
}

// Get all themeisle themes by using API.
function zerif_get_themes( $request ) {

	// Generate a cache key that would hold the response for this request:
	$key = 'zerif-lite_' . md5( serialize( $request ) );

	// Check transient. If it's there - use that, if not re fetch the theme
	if ( false === ( $themes = get_transient( $key ) ) ) {

		// Transient expired/does not exist. Send request to the API.
		$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

		// Check for the error.
		if ( !is_wp_error( $response ) ) {

			$themes = unserialize( wp_remote_retrieve_body( $response ) );

			if ( !is_object( $themes ) && !is_array( $themes ) ) {

				// Response body does not contain an object/array
				return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
			}

			// Set transient for next time... keep it for 24 hours should be good
			set_transient( $key, $themes, 60 * 60 * 24 );
		}
		else {
			// Error object returned
			return $response;
		}
	}

	return $themes;
}


/* Enqueue Google reCAPTCHA scripts */
add_action( 'wp_enqueue_scripts', 'recaptcha_scripts' );

function recaptcha_scripts() {

    if ( is_home() ):
        $zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');
        $zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
        $zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');
        if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :
            wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js' );
        endif;
    endif;

}

/* remove custom-background from body_class() */
add_filter( 'body_class', 'remove_class_function' );
function remove_class_function( $classes ) {

    if ( !is_home() ) {   
        // index of custom-background
        $key = array_search('custom-background', $classes);
        // remove class
        unset($classes[$key]);
    }
    return $classes;

}