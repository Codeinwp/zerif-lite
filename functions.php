<?php
/**
 * Zerif Lite functions and definitions
 *
 * @package zerif-lite
 */

if ( ! defined( 'ELEMENTOR_PARTNER_ID' ) ) {
	define( 'ELEMENTOR_PARTNER_ID', 2112 );
}


/**
 * Main setup function
 */
function zerif_setup() {

	global $content_width;

	if ( ! isset( $content_width ) ) {
		$content_width = 640;
	}

	/*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on zerif, use a find and replace
     * to change 'zerif-lite' to the name of your theme in all the template files
     */
	load_theme_textdomain( 'zerif-lite', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	/*
     * Enable support for Post Thumbnails on posts and pages.
     */
	add_theme_support( 'post-thumbnails' );

	/* Set the image size by cropping the image */
	add_image_size( 'zerif-post-thumbnail', 250, 250, true );
	add_image_size( 'zerif-post-thumbnail-large', 750, 500, true ); /* blog thumbnail */
	add_image_size( 'zerif-post-thumbnail-large-table', 600, 300, true ); /* blog thumbnail for table */
	add_image_size( 'zerif-post-thumbnail-large-mobile', 400, 200, true ); /* blog thumbnail for mobile */
	add_image_size( 'zerif_project_photo', 285, 214, true );
	add_image_size( 'zerif_our_team_photo', 174, 174, true );

	/* Register primary menu */
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'zerif-lite' ),
		)
	);

	/* Enable support for Post Formats. */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/* Setup the WordPress core custom background feature. */

	if ( file_exists( get_stylesheet_directory() . '/images/bg.jpg' ) ) {
		$zerif_default_image = get_stylesheet_directory_uri() . '/images/bg.jpg';
	} else {
		$zerif_default_image = get_template_directory_uri() . '/images/bg.jpg';
	}
	add_theme_support(
		'custom-background', apply_filters(
			'zerif_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => $zerif_default_image,
			)
		)
	);

	/* Enable support for HTML5 markup. */
	add_theme_support(
		'html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
		)
	);

	/* Enable support for title-tag */
	add_theme_support( 'title-tag' );

	/* Enable support for custom logo */
	add_theme_support(
		'custom-logo', array(
			'flex-width' => true,
		)
	);

	/* Custom template tags for this theme. */
	require get_template_directory() . '/inc/template-tags.php';

	/* Custom functions that act independently of the theme templates. */
	require get_template_directory() . '/inc/extras.php';

	/* Customizer additions. */
	require get_template_directory() . '/inc/customizer.php';

	/* tgm-plugin-activation */
	require_once get_template_directory() . '/class-tgm-plugin-activation.php';

	/* preview demo */
	require_once get_template_directory() . '/ti-prevdem/init-prevdem.php';

	/* woocommerce support */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/* selective widget refresh */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 *  HOOKS
	 */

	/* Enables user customization via WordPress plugin API. */
	require get_template_directory() . '/inc/hooks.php';

	add_action( 'zerif_404_title', 'zerif_404_title_function' ); // Outputs the title on 404 pages
	add_action( 'zerif_404_content', 'zerif_404_content_function' ); // Outputs a helpful message on 404 pages

	add_action( 'zerif_page_header', 'zerif_page_header_function' ); // Outputs the title on pages

	add_action( 'zerif_page_header_title_archive', 'zerif_page_header_title_archive_function' ); // Outputs the title on archive pages
	add_action( 'zerif_page_term_description_archive', 'zerif_page_term_description_archive_function' ); // Outputs the term description

	add_action( 'zerif_footer_widgets', 'zerif_footer_widgets_function' ); // Outputs the 3 sidebars in footer

	add_action( 'zerif_our_focus_header_title', 'zerif_our_focus_header_title_function' ); // Outputs the title in Our focus section
	add_action( 'zerif_our_focus_header_subtitle', 'zerif_our_focus_header_subtitle_function' ); // Outputs the subtitle in Our focus section

	add_action( 'zerif_our_team_header_title', 'zerif_our_team_header_title_function' ); // Outputs the title in Our team section
	add_action( 'zerif_our_team_header_subtitle', 'zerif_our_team_header_subtitle_function' ); // Outputs the subtitle in Our team section

	add_action( 'zerif_testimonials_header_title', 'zerif_testimonials_header_title_function' ); // Outputs the title in Testimonials section
	add_action( 'zerif_testimonials_header_subtitle', 'zerif_testimonials_header_subtitle_function' ); // Outputs the subtitle in Testimonials section

	add_action( 'zerif_latest_news_header_title', 'zerif_latest_news_header_title_function' ); // Outputs the title in Latest news section
	add_action( 'zerif_latest_news_header_subtitle', 'zerif_latest_news_header_subtitle_function' ); // Outputs the subtitle in Latest news section

	add_action( 'zerif_big_title_text', 'zerif_big_title_text_function' ); // Outputs the text in Big title section

	add_action( 'zerif_about_us_header_title', 'zerif_about_us_header_title_function' ); // Outputs the title in About us section
	add_action( 'zerif_about_us_header_subtitle', 'zerif_about_us_header_subtitle_function' ); // Outputs the subtitle in About us section

	add_action( 'zerif_sidebar', 'zerif_sidebar_function' ); // Outputs the sidebar

	add_action( 'zerif_primary_navigation', 'zerif_primary_navigation_function' ); // Outputs the navigation menu

	add_filter( 'excerpt_more', 'zerif_excerpt_more' );

	require_once( trailingslashit( get_template_directory() ) . 'inc/class/class-customizer-theme-info-control/class-customizer-theme-info-root.php' );

	/**
	 * About page class
	 */
	require_once get_template_directory() . '/ti-about-page/class-ti-about-page.php';

	/*
	* About page instance
	*/
	$config = array(
		// Menu name under Appearance.
		'menu_name'           => __( 'About Zerif Lite', 'zerif-lite' ),
		// Page title.
		'page_name'           => __( 'About Zerif Lite', 'zerif-lite' ),
		// Main welcome title
		/* translators: Theme Name */
		'welcome_title'       => sprintf( __( 'Welcome to %s! - Version ', 'zerif-lite' ), 'Zerif Lite' ),
		// Main welcome content
		'welcome_content'     => esc_html__( 'Zerif LITE is a free one page WordPress theme. It\'s perfect for web agency business,corporate business,personal and parallax business portfolio, photography sites and freelancer.Is built on BootStrap with parallax support, is responsive, clean, modern, flat and minimal. Zerif Lite is ecommerce (WooCommerce) Compatible, WPML, RTL, Retina-Ready, SEO Friendly and with parallax, full screen image is one of the best business themes.', 'zerif-lite' ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'tabs'                => array(
			'getting_started'     => __( 'Getting Started', 'zerif-lite' ),
			'recommended_actions' => __( 'Recommended Actions', 'zerif-lite' ),
			'recommended_plugins' => __( 'Useful Plugins', 'zerif-lite' ),
			'support'             => __( 'Support', 'zerif-lite' ),
			'changelog'           => __( 'Changelog', 'zerif-lite' ),
			'free_pro'            => __( 'Free VS PRO', 'zerif-lite' ),
		),
		// Support content tab.
		'support_content'     => array(
			'first'  => array(
				'title'        => esc_html__( 'Contact Support', 'zerif-lite' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'We want to make sure you have the best experience using Zerif Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Zerif Lite, as much as we enjoy creating great products.', 'zerif-lite' ),
				'button_label' => esc_html__( 'Contact Support', 'zerif-lite' ),
				'button_link'  => esc_url( 'https://themeisle.com/contact/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Documentation', 'zerif-lite' ),
				'icon'         => 'dashicons dashicons-book-alt',
				'text'         => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use Zerif Lite.', 'zerif-lite' ),
				'button_label' => esc_html__( 'Read full documentation', 'zerif-lite' ),
				'button_link'  => 'https://docs.themeisle.com/article/5-zerif-lite-documentation',
				'is_button'    => false,
				'is_new_tab'   => true,
			),
			'third'  => array(
				'title'        => esc_html__( 'Changelog', 'zerif-lite' ),
				'icon'         => 'dashicons dashicons-portfolio',
				'text'         => esc_html__( 'Want to get the gist on the latest theme changes? Just consult our changelog below to get a taste of the recent fixes and features implemented.', 'zerif-lite' ),
				'button_label' => esc_html__( 'Changelog', 'zerif-lite' ),
				'button_link'  => esc_url( admin_url( 'themes.php?page=zerif-lite-welcome&tab=changelog&show=yes' ) ),
				'is_button'    => false,
				'is_new_tab'   => false,
			),
			'fourth' => array(
				'title'        => esc_html__( 'Create a child theme', 'zerif-lite' ),
				'icon'         => 'dashicons dashicons-admin-customizer',
				'text'         => esc_html__( "If you want to make changes to the theme's files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.", 'zerif-lite' ),
				'button_label' => esc_html__( 'View how to do this', 'zerif-lite' ),
				'button_link'  => 'https://docs.themeisle.com/article/14-how-to-create-a-child-theme',
				'is_button'    => false,
				'is_new_tab'   => true,
			),
			'fifth'  => array(
				'title'        => esc_html__( 'Speed up your site', 'zerif-lite' ),
				'icon'         => 'dashicons dashicons-controls-skipforward',
				'text'         => esc_html__( 'If you find yourself in the situation where everything on your site is running very slow, you might consider having a look at the below documentation where you will find the most common issues causing this and possible solutions for each of the issues.', 'zerif-lite' ),
				'button_label' => esc_html__( 'View how to do this', 'zerif-lite' ),
				'button_link'  => 'https://docs.themeisle.com/article/63-speed-up-your-wordpress-site',
				'is_button'    => false,
				'is_new_tab'   => true,
			),
			'sixth'  => array(
				'title'        => esc_html__( 'Build a landing page with a drag-and-drop content builder', 'zerif-lite' ),
				'icon'         => 'dashicons dashicons-images-alt2',
				'text'         => esc_html__( 'In the below documentation you will find an easy way to build a great looking landing page using a drag-and-drop content builder plugin.', 'zerif-lite' ),
				'button_label' => esc_html__( 'View how to do this', 'zerif-lite' ),
				'button_link'  => 'https://docs.themeisle.com/article/219-how-to-build-a-landing-page-with-a-drag-and-drop-content-builder',
				'is_button'    => false,
				'is_new_tab'   => true,
			),
		),
		// Getting started tab
		'getting_started'     => array(
			'first'  => array(
				'title'               => esc_html__( 'Recommended actions', 'zerif-lite' ),
				'text'                => esc_html__( 'We have compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow.', 'zerif-lite' ),
				'button_label'        => esc_html__( 'Recommended actions', 'zerif-lite' ),
				'button_link'         => esc_url( admin_url( 'themes.php?page=zerif-lite-welcome&tab=recommended_actions' ) ),
				'is_button'           => false,
				'recommended_actions' => true,
				'is_new_tab'          => false,
			),
			'second' => array(
				'title'               => esc_html__( 'Read full documentation', 'zerif-lite' ),
				'text'                => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use Zerif Lite.', 'zerif-lite' ),
				'button_label'        => esc_html__( 'Documentation', 'zerif-lite' ),
				'button_link'         => 'https://docs.themeisle.com/article/5-zerif-lite-documentation',
				'is_button'           => false,
				'recommended_actions' => false,
				'is_new_tab'          => true,
			),
			'third'  => array(
				'title'               => esc_html__( 'Go to Customizer', 'zerif-lite' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'zerif-lite' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'zerif-lite' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
				'is_new_tab'          => true,
			),
		),
		// Free vs pro array.
		'free_pro'            => array(
			'free_theme_name'     => 'Zerif Lite',
			'pro_theme_name'      => 'Zerif PRO',
			'pro_theme_link'      => 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/upgrade/',
			/* translators: Zerif Pro name */
			'get_pro_theme_label' => sprintf( __( 'Get %s now!', 'zerif-lite' ), 'Zerif Pro' ),
			'features'            => array(
				array(
					'title'       => __( 'Parallax effect', 'zerif-lite' ),
					'description' => __( 'Smooth, catchy and easy scrolling experience.', 'zerif-lite' ),
					'is_in_lite'  => 'true',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Mobile friendly', 'zerif-lite' ),
					'description' => __( 'Responsive layout. Works on every device.', 'zerif-lite' ),
					'is_in_lite'  => 'true',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'WooCommerce Compatible', 'zerif-lite' ),
					'description' => __( 'Ready for e-commerce. You can build an online store here.', 'zerif-lite' ),
					'is_in_lite'  => 'true',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Frontpage sections', 'zerif-lite' ),
					'description' => __( 'Big title, Our focus, About us, Our team, Testimonials, Ribbons, Latest news, Contat us', 'zerif-lite' ),
					'is_in_lite'  => 'true',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Background image', 'zerif-lite' ),
					'description' => __( 'You can use any background image you want.', 'zerif-lite' ),
					'is_in_lite'  => 'true',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Unlimited color option', 'zerif-lite' ),
					'description' => __( 'You can change the colors of each section. You have unlimited options.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Google map section', 'zerif-lite' ),
					'description' => __( 'Embed your current location to your website by using a Google map.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Portfolio', 'zerif-lite' ),
					'description' => __( 'Showcase your best projects in the portfolio section.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Sections order', 'zerif-lite' ),
					'description' => __( 'Arrange the sections by your priorities.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Background slider/video', 'zerif-lite' ),
					'description' => __( 'Apart from static images, you can use videos or sliders on the background.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Support', 'zerif-lite' ),
					'description' => __( 'You will benefit of our full support for any issues you have with the theme.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Packages/Subscribe sections', 'zerif-lite' ),
					'description' => __( 'Add pricing tables for your products and use newsletter forms to attract the clients.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'Change labels for the Contact Us section', 'zerif-lite' ),
					'description' => __( 'Write an original text in each Contact us section field.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
				array(
					'title'       => __( 'No credit footer link', 'zerif-lite' ),
					'description' => __( 'Remove "Zerif Lite developed by ThemeIsle" copyright from the footer.', 'zerif-lite' ),
					'is_in_lite'  => 'false',
					'is_in_pro'   => 'true',
				),
			),
		),
		// Plugins array.
		'recommended_plugins' => array(
			'already_activated_message' => esc_html__( 'Already activated', 'zerif-lite' ),
			'version_label'             => esc_html__( 'Version: ', 'zerif-lite' ),
			'install_label'             => esc_html__( 'Install and Activate', 'zerif-lite' ),
			'activate_label'            => esc_html__( 'Activate', 'zerif-lite' ),
			'deactivate_label'          => esc_html__( 'Deactivate', 'zerif-lite' ),
			'content'                   => array(
				array(
					'slug' => 'translatepress-multilingual',
				),
				array(
					'slug' => 'siteorigin-panels',
				),
				array(
					'slug' => 'wp-product-review',
				),
				array(
					'slug' => 'intergeo-maps',
				),
				array(
					'slug' => 'visualizer',
				),
				array(
					'slug' => 'adblock-notify-by-bweb',
				),
				array(
					'slug' => 'nivo-slider-lite',
				),
			),
		),
		// Required actions array.
		'recommended_actions' => array(
			'install_label'    => esc_html__( 'Install and Activate', 'zerif-lite' ),
			'activate_label'   => esc_html__( 'Activate', 'zerif-lite' ),
			'deactivate_label' => esc_html__( 'Deactivate', 'zerif-lite' ),
			'content'          => array(
				'themeisle-companion' => array(
					'title'       => 'ThemeIsle Companion',
					'description' => __( 'It is highly recommended that you install the companion plugin to have access to the frontpage sections widgets.', 'zerif-lite' ),
					'check'       => defined( 'THEMEISLE_COMPANION_VERSION' ),
					'plugin_slug' => 'themeisle-companion',
					'id'          => 'themeisle-companion',
				),
				'pirate-forms'        => array(
					'title'       => 'Pirate Forms',
					'description' => __( 'Makes your contact page more engaging by creating a good-looking contact form on your website. The interaction with your visitors was never easier.', 'zerif-lite' ),
					'check'       => defined( 'PIRATE_FORMS_VERSION' ),
					'plugin_slug' => 'pirate-forms',
					'id'          => 'pirate-forms',
				),

			),
		),
	);

	/*
	* Add recommendation for Elementor plugin, after 5 days of installing the theme
	**/
	if ( ! defined( 'ELEMENTOR_VERSION' ) && zerif_check_passed_time( '259200' ) ) {
		$elementor_array = array(
			'slug' => 'elementor',
		);
		if ( ! empty( $config['recommended_plugins']['content'] ) ) {
			array_push( $config['recommended_plugins']['content'], $elementor_array );
		}
	}

	TI_About_Page::init( $config );

	/*
	 * Notifications in customize
	 */
	require get_template_directory() . '/ti-customizer-notify/class-ti-customizer-notify.php';

	$config_customizer = array(
		'recommended_plugins'       => array(
			'themeisle-companion' => array(
				'recommended' => true,
				/* translators: ThemeIsle Companion install link */
				'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer, please install and activate %s', 'zerif-lite' ), sprintf( '<strong>%s</strong>', 'ThemeIsle Companion' ) ),
			),
		),
		'recommended_actions'       => array(),
		'recommended_actions_title' => esc_html__( 'Recommended Actions', 'zerif-lite' ),
		'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'zerif-lite' ),
		'install_button_label'      => esc_html__( 'Install and Activate', 'zerif-lite' ),
		'activate_button_label'     => esc_html__( 'Activate', 'zerif-lite' ),
		'deactivate_button_label'   => esc_html__( 'Deactivate', 'zerif-lite' ),
	);
	Ti_Customizer_Notify::init( apply_filters( 'zerif_customizer_notify_array', $config_customizer ) );

}

add_action( 'after_setup_theme', 'zerif_setup' );

/**
 * Migrate logo from theme to core
 */
function zerif_migrate_logo() {

	$zerif_old_logo = get_theme_mod( 'zerif_logo' );

	if ( ! empty( $zerif_old_logo ) ) {

		$zerif_old_logo_id = attachment_url_to_postid( $zerif_old_logo );
		if ( is_int( $zerif_old_logo_id ) ) {
			set_theme_mod( 'custom_logo', $zerif_old_logo_id );
		}
		remove_theme_mod( 'zerif_logo' );
	}
}

add_action( 'after_setup_theme', 'zerif_migrate_logo' );

/**
 * Custom excerpt more link
 */
function zerif_excerpt_more( $more ) {
	return ' <a href="' . esc_url( get_the_permalink() ) . '" rel="nofollow"><span class="sr-only">' . esc_html__( 'Read more about ', 'zerif-lite' ) . esc_attr( get_the_title() ) . '</span>[&hellip;]</a>';
}

/**
 * Check if latest posts
 */
function zerif_lite_is_not_latest_posts() {
	return ( 'posts' == get_option( 'show_on_front' ) ? true : false );
}

/**
 * Check if frontpage
 */
function zerif_lite_is_static_frontpage() {
	if ( 'posts' == get_option( 'show_on_front' ) ) {
		return false;
	} else {
		$frontpage_id = get_option( 'page_on_front' );
		if ( 'template-frontpage.php' == get_post_meta( $frontpage_id, '_wp_page_template', true ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function zerif_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'zerif-lite' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'About us section', 'zerif-lite' ),
			'id'            => 'sidebar-aboutus',
			'before_widget' => '<span id="%1$s">',
			'after_widget'  => '</span>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);

	register_sidebars(
		3,
		array(
			/* translators: Footer area number */
			'name'          => __( 'Footer area %d', 'zerif-lite' ),
			'id'            => 'zerif-sidebar-footer',
			'before_widget' => '<aside id="%1$s" class="widget footer-widget-footer %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);

}

add_action( 'widgets_init', 'zerif_widgets_init' );

/**
 * Enqueue fonts
 */
function zerif_slug_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Lora, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lato     = _x( 'on', 'Lato font: on or off', 'zerif-lite' );
	$homemade = _x( 'on', 'Homemade font: on or off', 'zerif-lite' );

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Open Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$monserrat = _x( 'on', 'Monserrat font: on or off', 'zerif-lite' );

	$zerif_use_safe_font = get_theme_mod( 'zerif_use_safe_font' );

	if ( ( 'off' !== $lato || 'off' !== $monserrat || 'off' !== $homemade ) && isset( $zerif_use_safe_font ) && ( $zerif_use_safe_font != 1 ) ) {
		$font_families = array();

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:300,400,700,400italic';
		}
		if ( 'off' !== $monserrat ) {
			$font_families[] = 'Montserrat:400,700';
		}

		if ( 'off' !== $homemade ) {
			$font_families[] = 'Homemade Apple';
		}
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
		$fonts_url      = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}
	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function zerif_scripts() {

	wp_enqueue_style( 'zerif_font', zerif_slug_fonts_url(), array(), null );

	wp_enqueue_style(
		'zerif_font_all', add_query_arg(
			array(
				'family' => urlencode( 'Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' ),
				'subset' => urlencode( 'latin' ),
			), '//fonts.googleapis.com/css'
		)
	);

	wp_enqueue_style( 'zerif_bootstrap_style', get_template_directory_uri() . '/css/bootstrap.css' );

	wp_style_add_data( 'zerif_bootstrap_style', 'rtl', 'replace' );

	wp_enqueue_style( 'zerif_fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), 'v1' );

	wp_enqueue_style( 'zerif_style', get_stylesheet_uri(), array( 'zerif_fontawesome' ), 'v1' );

	/* Add this style only for the other cases than New users that have a static page */
	$zerif_keep_old_fp_template = get_theme_mod( 'zerif_keep_old_fp_template' );

	if ( ! ( ! zerif_check_if_old_version_of_theme() && ( get_option( 'show_on_front' ) == 'page' ) && ! $zerif_keep_old_fp_template ) ) {
		$custom_css = 'body.home.page:not(.page-template-template-frontpage) {
			background-image: none !important;
		}';
		wp_add_inline_style( 'zerif_style', $custom_css );
	}

	wp_enqueue_style( 'zerif_responsive_style', get_template_directory_uri() . '/css/responsive.css', array( 'zerif_style' ), 'v1' );

	wp_enqueue_style( 'zerif_ie_style', get_template_directory_uri() . '/css/ie.css', array( 'zerif_style' ), 'v1' );
	wp_style_add_data( 'zerif_ie_style', 'conditional', 'lt IE 9' );

	if ( wp_is_mobile() ) {
		wp_enqueue_style( 'zerif_style_mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'zerif_bootstrap_style', 'zerif_style' ), 'v1' );
	}

	/* Bootstrap script */
	wp_enqueue_script( 'zerif_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20120206', true );

	/* Knob script */
	wp_enqueue_script( 'zerif_knob_nav', get_template_directory_uri() . '/js/jquery.knob.js', array( 'jquery' ), '20120206', true );

	/* Smootscroll script */
	$zerif_disable_smooth_scroll = get_theme_mod( 'zerif_disable_smooth_scroll' );
	if ( isset( $zerif_disable_smooth_scroll ) && ( $zerif_disable_smooth_scroll != 1 ) ) {
		wp_enqueue_script( 'zerif_smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '20120206', true );
	}

	/* scrollReveal script */
	if ( ! wp_is_mobile() ) {
		wp_enqueue_script( 'zerif_scrollReveal_script', get_template_directory_uri() . '/js/scrollReveal.js', array( 'jquery' ), '20120206', true );
	}

	/* zerif script */
	wp_enqueue_script( 'zerif_script', get_template_directory_uri() . '/js/zerif.js', array( 'jquery', 'zerif_knob_nav' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	/* HTML5Shiv*/
	wp_enqueue_script( 'zerif_html5', get_template_directory_uri() . '/js/html5.js' );
	wp_script_add_data( 'zerif_html5', 'conditional', 'lt IE 9' );

	/* parallax effect */
	if ( ! wp_is_mobile() ) {

		/* include parallax only if on frontpage and the parallax effect is activated */
		$zerif_parallax_use = get_theme_mod( 'zerif_parallax_show' );

		if ( ! empty( $zerif_parallax_use ) && ( $zerif_parallax_use == 1 ) && is_front_page() ) :

			wp_enqueue_script( 'zerif_parallax', get_template_directory_uri() . '/js/parallax.js', array( 'jquery' ), 'v1', true );

		endif;
	}

	add_editor_style( '/css/custom-editor-style.css' );

}
add_action( 'wp_enqueue_scripts', 'zerif_scripts' );

/**
 * Adjust content width based on template.
 */
function zerif_adjust_content_width() {
	global $content_width;

	$zerif_change_to_full_width = get_theme_mod( 'zerif_change_to_full_width' );
	if ( is_page_template( 'template-fullwidth.php' ) || is_page_template( 'template-fullwidth-no-title.php' ) || is_page_template( 'woocommerce.php' ) || is_page_template( 'single-download.php' ) || ( is_page_template( 'page.php' ) && ! empty( $zerif_change_to_full_width ) ) ) {
		$content_width = 1110;
	}

}
add_action( 'template_redirect', 'zerif_adjust_content_width' );

/**
 * Remove Yoast rel="prev/next" link from header
 */
function zerif_remove_yoast_rel_link() {
	return false;
}
add_filter( 'wpseo_prev_rel_link', 'zerif_remove_yoast_rel_link' );
add_filter( 'wpseo_next_rel_link', 'zerif_remove_yoast_rel_link' );

add_action( 'tgmpa_register', 'zerif_register_required_plugins' );

/**
 * Recommend plugins with TGMPA
 */
function zerif_register_required_plugins() {

	$wp_version_nr = get_bloginfo( 'version' );

	if ( $wp_version_nr < 3.9 ) :
		$plugins = array(
			array(
				'name'     => 'Widget customizer',
				'slug'     => 'widget-customizer',
				'required' => false,
			),
			array(
				'name'     => 'Pirate Forms',
				'slug'     => 'pirate-forms',
				'required' => false,
			),
			array(
				'name'     => 'ThemeIsle Companion',
				'slug'     => 'themeisle-companion',
				'required' => false,
			),
		);

	else :

		$plugins = array(
			array(
				'name'     => 'Pirate Forms',
				'slug'     => 'pirate-forms',
				'required' => false,
			),
			array(
				'name'     => 'ThemeIsle Companion',
				'slug'     => 'themeisle-companion',
				'required' => false,
			),
		);

	endif;
	$config = array(
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'zerif-lite' ),
			'menu_title'                      => __( 'Install Plugins', 'zerif-lite' ),
			/* translators: name of installing plugin */
			'installing'                      => __( 'Installing Plugin: %s', 'zerif-lite' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'zerif-lite' ),
			/* translators: Name of required plugin */
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'zerif-lite' ),
			/* translators: Name of recommended plugin */
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'zerif-lite' ),
			/* translators: Name of required plugin */
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'zerif-lite' ),
			/* translators: Name of required plugin that is not active */
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'zerif-lite' ),
			/* translators: Name of recommended plugin that is not active */
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'zerif-lite' ),
			/* translators: Name of plguin that can't be activated */
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'zerif-lite' ),
			/* translators: Name of plugin that needs to be updated */
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'zerif-lite' ),
			/* translators: Nme of plugin that can't be updated */
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'zerif-lite' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'zerif-lite' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'zerif-lite' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'zerif-lite' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'zerif-lite' ),
			/* translators: Name of plugins installed and activated successfully */
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'zerif-lite' ),
			'nag_type'                        => 'updated',
		),
	);
	tgmpa( $plugins, $config );
}

/* Load Jetpack compatibility file. */

require get_template_directory() . '/inc/jetpack.php';

/**
 * Menu layout
 */
function zerif_wp_page_menu() {

	echo '<ul class="nav navbar-nav navbar-right responsive-nav main-nav-list">';

		wp_list_pages(
			array(
				'title_li' => '',
				'depth'    => 1,
			)
		);

	echo '</ul>';

}

add_filter( 'the_title', 'zerif_default_title' );

/**
 * Add a default title for posts without one
 */
function zerif_default_title( $title ) {

	if ( $title == '' ) {

		$title = __( 'Default title', 'zerif-lite' );
	}

	return $title;

}

add_action( 'widgets_init', 'zerif_register_widgets' );

/**
 * Register custom widgets
 */
function zerif_register_widgets() {

	if ( ! defined( 'THEMEISLE_COMPANION_VERSION' ) ) {

		if ( zerif_check_if_old_version_of_theme() ) {
			register_widget( 'zerif_ourfocus' );
			register_widget( 'zerif_testimonial_widget' );
			register_widget( 'zerif_clients_widget' );
			register_widget( 'zerif_team_widget' );
		}
	}

	$zerif_lite_sidebars = array(
		'sidebar-ourfocus'     => 'sidebar-ourfocus',
		'sidebar-testimonials' => 'sidebar-testimonials',
		'sidebar-ourteam'      => 'sidebar-ourteam',
	);

	/* Register sidebars */
	foreach ( $zerif_lite_sidebars as $zerif_lite_sidebar ) :
		$extra_class = '';
		if ( $zerif_lite_sidebar == 'sidebar-ourfocus' ) :

			$zerif_lite_name = __( 'Our focus section widgets', 'zerif-lite' );

		elseif ( $zerif_lite_sidebar == 'sidebar-testimonials' ) :
			$extra_class     = 'feedback-box';
			$zerif_lite_name = __( 'Testimonials section widgets', 'zerif-lite' );

		elseif ( $zerif_lite_sidebar == 'sidebar-ourteam' ) :

			$zerif_lite_name = __( 'Our team section widgets', 'zerif-lite' );

		else :

			$zerif_lite_name = $zerif_lite_sidebar;

		endif;

		register_sidebar(
			array(
				'name'          => $zerif_lite_name,
				'id'            => $zerif_lite_sidebar,
				'before_widget' => '<span id="%1$s" class="' . $extra_class . '">',
				'after_widget'  => '</span>',
			)
		);

	endforeach;

}

if ( ! class_exists( 'zerif_ourfocus' ) && zerif_check_if_old_version_of_theme() ) {

	/**
	 * Our focus widget
	 */
	class zerif_ourfocus extends WP_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {

			parent::__construct(
				'ctUp-ads-widget',
				__( 'Zerif - Our focus widget', 'zerif-lite' ),
				array(
					'customize_selective_refresh' => true,
				)
			);
			add_action( 'admin_enqueue_scripts', array( $this, 'widget_scripts' ) );
		}

		/**
		 * Enqueue scripts
		 */
		function widget_scripts( $hook ) {
			if ( $hook != 'widgets.php' ) {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_script( 'zerif_widget_media_script', get_template_directory_uri() . '/js/widget-media.js', false, '1.1', true );
		}

		/**
		 * Create the widget
		 */
		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			echo '<div class="col-lg-3 col-sm-3 focus-box" data-scrollreveal="enter left after 0.15s over 1s">';

			if ( ! empty( $instance['image_uri'] ) && ( $instance['image_uri'] != 'Upload Image' ) ) {
				if ( ! empty( $instance['link'] ) ) {

					echo '<a href="' . esc_url( $instance['link'] ) . '" class="service-icon">';

					if ( ! empty( $instance['title'] ) ) {

						echo '<span class="sr-only">';
						printf(
							/* Translators: %s: widget title */
							__( 'Go to %s', 'zerif-lite' ),
							apply_filters( 'widget_title', $instance['title'] )
						);
						echo '</span>';

					}
					echo '<i class="pixeden" style="background:url(' . esc_url( $instance['image_uri'] ) . ') no-repeat center;width:100%; height:100%;"></i>';
					echo '</a>';

				} else {

					echo '<div class="service-icon" tabindex="0">';
					echo '<i class="pixeden" style="background:url(' . esc_url( $instance['image_uri'] ) . ') no-repeat center;width:100%; height:100%;"></i>';
					echo '</div>';
				}
			} elseif ( ! empty( $instance['custom_media_id'] ) ) {

				$zerif_ourfocus_custom_media_id = wp_get_attachment_image_url( $instance['custom_media_id'] );
				if ( ! empty( $zerif_ourfocus_custom_media_id ) ) {

					if ( ! empty( $instance['link'] ) ) {

						echo '<a href="' . esc_url( $instance['link'] ) . '" class="service-icon">';

						if ( ! empty( $instance['title'] ) ) {

							echo '<span class="sr-only">';
							_e( 'Go to', 'zerif-lite' );
							echo apply_filters( 'widget_title', $instance['title'] );
							echo '</span>';

						}
						echo '<i class="pixeden" style="background:url(' . esc_url( $zerif_ourfocus_custom_media_id ) . ') no-repeat center;width:100%; height:100%;"></i>';
						echo '</a>';

					} else {

						echo '<div class="service-icon" tabindex="0">';
						echo '<i class="pixeden" style="background:url(' . esc_url( $zerif_ourfocus_custom_media_id ) . ') no-repeat center;width:100%; height:100%;"></i>';
						echo '</div>';
					}
				}
			}

				echo '<h3 class="red-border-bottom">';

			if ( ! empty( $instance['title'] ) ) {
				echo apply_filters( 'widget_title', $instance['title'] );
			}
			echo '</h3>';

			if ( ! empty( $instance['text'] ) ) {
				echo '<p>' . htmlspecialchars_decode( apply_filters( 'widget_title', $instance['text'] ) ) . '</p>';
			}

			echo '</div>';

			echo $after_widget;

		}

		/**
		 * Update widgets instance
		 */
		function update( $new_instance, $old_instance ) {

			$instance                        = $old_instance;
			$instance['text']                = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
			$instance['title']               = sanitize_text_field( $new_instance['title'] );
			$instance['link']                = esc_url( $new_instance['link'] );
			$instance['image_uri']           = esc_url( $new_instance['image_uri'] );
			$instance['custom_media_id']     = sanitize_text_field( $new_instance['custom_media_id'] );
			$instance['image_in_customizer'] = esc_url( $new_instance['image_in_customizer'] );

			return $instance;

		}

		/**
		 * Widget controls
		 */
		function form( $instance ) {

			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="';
			if ( ! empty( $instance['title'] ) ) {
				echo $instance['title'];
			}
				echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'text' ) . '">' . __( 'Text', 'zerif-lite' ) . '</label><br/>';
				echo '<textarea class="widefat" rows="8" cols="20" name="' . $this->get_field_name( 'text' ) . '" id="' . $this->get_field_id( 'text' ) . '">';
			if ( ! empty( $instance['text'] ) ) {
				echo htmlspecialchars_decode( $instance['text'] );
			}
				echo '</textarea>';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'link' ) . '">' . __( 'Link', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'link' ) . '" id="' . $this->get_field_id( 'link' ) . '" value="';
			if ( ! empty( $instance['link'] ) ) {
				echo esc_url( $instance['link'] );
			}
				echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'image_uri' ) . '">' . __( 'Image', 'zerif-lite' ) . '</label><br/>';

				$image_in_customizer = '';
				$display             = 'none';
			if ( ! empty( $instance['image_in_customizer'] ) && ! empty( $instance['image_uri'] ) ) {
				$image_in_customizer = esc_url( $instance['image_in_customizer'] );
				$display             = 'inline-block';
			} else {
				if ( ! empty( $instance['image_uri'] ) ) {
					$image_in_customizer = esc_url( $instance['image_uri'] );
					$display             = 'inline-block';
				}
			}
				$zerif_image_in_customizer = $this->get_field_name( 'image_in_customizer' );

				echo '<input type="hidden" class="custom_media_display_in_customizer" name="';
			if ( ! empty( $zerif_image_in_customizer ) ) {
				echo $zerif_image_in_customizer;
			}
				echo '" value="';
			if ( ! empty( $instance['image_in_customizer'] ) ) {
				echo $instance['image_in_customizer'];
			}
				echo '">';
				echo '<img class="custom_media_image" src="' . $image_in_customizer . '" style="margin:0;padding:0;max-width:100px;float:left;display:' . $display . '" alt="' . __( 'Uploaded image', 'zerif-lite' ) . '"/><br/>';

				echo '<input type="text" class="widefat custom_media_url" name="' . $this->get_field_name( 'image_uri' ) . '" id="' . $this->get_field_id( 'image_uri' ) . '" value="';
			if ( ! empty( $instance['image_uri'] ) ) {
				echo $instance['image_uri'];
			}
				echo '" style="margin-top:5px;">';

				echo '<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="' . $this->get_field_name( 'image_uri' ) . '" value="' . __( 'Upload Image', 'zerif-lite' ) . '" style="margin-top:5px;">';
			echo '</p>';

			echo '<input class="custom_media_id" id="' . $this->get_field_id( 'custom_media_id' ) . '" name="' . $this->get_field_name( 'custom_media_id' ) . '" type="hidden" value="';
			if ( ! empty( $instance['custom_media_id'] ) ) {
				echo $instance['custom_media_id'];
			}
			echo '"/>';
		}

	}
}

if ( ! class_exists( 'zerif_testimonial_widget' ) && zerif_check_if_old_version_of_theme() ) {

	/**
	 * Testimonial widget
	 */
	class zerif_testimonial_widget extends WP_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {
			parent::__construct(
				'zerif_testim-widget',
				__( 'Zerif - Testimonial widget', 'zerif-lite' ),
				array(
					'customize_selective_refresh' => true,
				)
			);
			add_action( 'admin_enqueue_scripts', array( $this, 'widget_scripts' ) );
		}

		/**
		 * Enqueue scripts
		 */
		function widget_scripts( $hook ) {
			if ( $hook != 'widgets.php' ) {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_script( 'zerif_widget_media_script', get_template_directory_uri() . '/js/widget-media.js', false, '1.1', true );
		}

		/**
		 * Create the widget
		 */
		function widget( $args, $instance ) {

			extract( $args );

			$zerif_accessibility = get_theme_mod( 'zerif_accessibility' );
			// open link in a new tab when checkbox "accessibility" is not ticked
			$attribut_new_tab = ( isset( $zerif_accessibility ) && ( $zerif_accessibility != 1 ) ? ' target="_blank"' : '' );

			echo $before_widget;

			if ( ! empty( $instance['text'] ) ) {
				echo '<div class="message">' . htmlspecialchars_decode( apply_filters( 'widget_title', $instance['text'] ) ) . '</div>';
			}

			echo '<div class="client">';

				echo '<div class="quote red-text">';

					echo '<i class="fa fa-quote-left"></i>';

				echo '</div>';

				echo '<div class="client-info">';

					echo '<a ' . $attribut_new_tab . ' class="client-name"';
			if ( ! empty( $instance['link'] ) ) {
				echo 'href="' . esc_url( $instance['link'] ) . '"';
			}
					echo '>';

			if ( ! empty( $instance['title'] ) ) {
				echo apply_filters( 'widget_title', $instance['title'] );
			}
					echo '</a>';

			if ( ! empty( $instance['details'] ) ) {
				echo '<div class="client-company">' . apply_filters( 'widget_title', $instance['details'] ) . '</div>';
			}

				echo '</div>';

			if ( ! empty( $instance['image_uri'] ) && ( $instance['image_uri'] != 'Upload Image' ) ) {

				echo '<div class="client-image hidden-xs">';

				echo '<img src="' . esc_url( $instance['image_uri'] ) . '" alt="" />';

				echo '</div>';

			} elseif ( ! empty( $instance['custom_media_id'] ) ) {

				$zerif_testimonials_custom_media_id = wp_get_attachment_image_url( $instance['custom_media_id'] );
				$alt                                = get_post_meta( $instance['custom_media_id'], '_wp_attachment_image_alt', true );

				if ( ! empty( $zerif_testimonials_custom_media_id ) ) {

					echo '<div class="client-image hidden-xs">';

					echo '<img src="' . esc_url( $zerif_testimonials_custom_media_id ) . '" alt="' . esc_attr( $alt ) . '" />';

					echo '</div>';

				}
			}

			echo '</div>';

			echo $after_widget;

		}

		/**
		 * Update widget's values
		 */
		function update( $new_instance, $old_instance ) {

			$instance                        = $old_instance;
			$instance['text']                = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
			$instance['title']               = sanitize_text_field( $new_instance['title'] );
			$instance['details']             = sanitize_text_field( $new_instance['details'] );
			$instance['image_uri']           = esc_url( $new_instance['image_uri'] );
			$instance['link']                = esc_url( $new_instance['link'] );
			$instance['custom_media_id']     = sanitize_text_field( $new_instance['custom_media_id'] );
			$instance['image_in_customizer'] = esc_url( $new_instance['image_in_customizer'] );

			return $instance;

		}

		/**
		 * Form the widget
		 */
		function form( $instance ) {

			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Author', 'zerif-lite' ) . '</label><br/>';
					echo '<input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="';
			if ( ! empty( $instance['title'] ) ) {
				echo $instance['title'];
			}
						echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'link' ) . '">' . __( 'Author link', 'zerif-lite' ) . '</label><br/>';
					echo '<input type="text" name="' . $this->get_field_name( 'link' ) . '" id="' . $this->get_field_id( 'link' ) . '" value="';
			if ( ! empty( $instance['link'] ) ) {
				echo esc_url( $instance['link'] );
			}
						echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'details' ) . '">' . __( 'Author details', 'zerif-lite' ) . '</label><br/>';
					echo '<input type="text" name="' . $this->get_field_name( 'details' ) . '" id="' . $this->get_field_id( 'details' ) . '" value="';
			if ( ! empty( $instance['details'] ) ) {
				echo $instance['details'];
			}
						echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'text' ) . '">' . __( 'Text', 'zerif-lite' ) . '</label><br/>';
					echo '<textarea class="widefat" rows="8" cols="20" name="' . $this->get_field_name( 'text' ) . '" id="' . $this->get_field_id( 'text' ) . '">';
			if ( ! empty( $instance['text'] ) ) {
				echo htmlspecialchars_decode( $instance['text'] );
			}
					echo '</textarea>';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'image_uri' ) . '">' . __( 'Image', 'zerif-lite' ) . '</label><br/>';

				$image_in_customizer = '';
				$display             = 'none';
			if ( ! empty( $instance['image_in_customizer'] ) && ! empty( $instance['image_uri'] ) ) {
				$image_in_customizer = esc_url( $instance['image_in_customizer'] );
				$display             = 'inline-block';
			} else {
				if ( ! empty( $instance['image_uri'] ) ) {
					$image_in_customizer = esc_url( $instance['image_uri'] );
					$display             = 'inline-block';
				}
			}
				$zerif_image_in_customizer = $this->get_field_name( 'image_in_customizer' );

				echo '<input type="hidden" class="custom_media_display_in_customizer" name="';
			if ( ! empty( $zerif_image_in_customizer ) ) {
				echo $zerif_image_in_customizer;
			}
				echo '" value="';
			if ( ! empty( $instance['image_in_customizer'] ) ) {
				echo $instance['image_in_customizer'];
			}
				echo  '">';
				echo '<img class="custom_media_image" src="' . $image_in_customizer . '" style="margin:0;padding:0;max-width:100px;float:left;display:' . $display . '" alt="' . __( 'Uploaded image', 'zerif-lite' ) . '"/><br/>';

				echo '<input type="text" class="widefat custom_media_url" name="' . $this->get_field_name( 'image_uri' ) . '" id="' . $this->get_field_id( 'image_uri' ) . '" value="';
			if ( ! empty( $instance['image_uri'] ) ) {
				echo $instance['image_uri'];
			}
				echo '" style="margin-top:5px;">';

				echo '<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="' . $this->get_field_name( 'image_uri' ) . '" value="' . __( 'Upload Image', 'zerif-lite' ) . '" style="margin-top:5px;">';
			echo '</p>';

			echo '<input class="custom_media_id" id="' . $this->get_field_id( 'custom_media_id' ) . '" name="' . $this->get_field_name( 'custom_media_id' ) . '" type="hidden" value="';
			if ( ! empty( $instance['custom_media_id'] ) ) {
				echo $instance['custom_media_id'];
			}
			echo '"/>';

		}

	}
}

if ( ! class_exists( 'zerif_clients_widget' ) && zerif_check_if_old_version_of_theme() ) {

	/**
	 * Clients widget
	 */
	class zerif_clients_widget extends WP_Widget {

		/**
		 * Constructor
		 */
		public function __construct() {
			parent::__construct(
				'zerif_clients-widget',
				__( 'Zerif - Clients widget', 'zerif-lite' ),
				array(
					'customize_selective_refresh' => true,
				)
			);
			add_action( 'admin_enqueue_scripts', array( $this, 'widget_scripts' ) );
		}

		/**
		 * Enqueue widgets scripts
		 */
		function widget_scripts( $hook ) {
			if ( $hook != 'widgets.php' ) {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_script( 'zerif_widget_media_script', get_template_directory_uri() . '/js/widget-media.js', false, '1.1', true );
		}

		/**
		 * Widget instance
		 */
		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			echo '<a href="';

			if ( ! empty( $instance['link'] ) ) {
				echo apply_filters( 'widget_title', $instance['link'] );
			}
			echo '">';

			if ( ! empty( $instance['image_uri'] ) && ( $instance['image_uri'] != 'Upload Image' ) ) {
				echo '<img src="' . esc_url( $instance['image_uri'] ) . '" alt="' . __( 'Client', 'zerif-lite' ) . '">';

			} elseif ( ! empty( $instance['custom_media_id'] ) ) {

				$zerif_clients_custom_media_id = wp_get_attachment_image_url( $instance['custom_media_id'] );
				if ( ! empty( $zerif_clients_custom_media_id ) ) {

					echo '<img src="' . esc_url( $zerif_clients_custom_media_id ) . '" alt="' . __( 'Client', 'zerif-lite' ) . '">';

				}
			}

			echo '</a>';

			echo $after_widget;

		}

		/**
		 * Update the widget
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['link'] = esc_url( $new_instance['link'] );

			$instance['image_uri'] = esc_url( $new_instance['image_uri'] );

			$instance['image_in_customizer'] = esc_url( $new_instance['image_in_customizer'] );

			$instance['custom_media_id'] = sanitize_text_field( $new_instance['custom_media_id'] );

			return $instance;

		}

		/**
		 * Form the widget
		 */
		function form( $instance ) {

			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'link' ) . '">' . __( 'Link', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'link' ) . '" id="' . $this->get_field_id( 'link' ) . '" value="';
			if ( ! empty( $instance['link'] ) ) {
				echo $instance['link'];
			}
				echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'image_uri' ) . '">' . __( 'Image', 'zerif-lite' ) . '</label><br/>';

				$image_in_customizer = '';
				$display             = 'none';
			if ( ! empty( $instance['image_in_customizer'] ) && ! empty( $instance['image_uri'] ) ) {
				$image_in_customizer = esc_url( $instance['image_in_customizer'] );
				$display             = 'inline-block';
			} else {
				if ( ! empty( $instance['image_uri'] ) ) {
					$image_in_customizer = esc_url( $instance['image_uri'] );
					$display             = 'inline-block';
				}
			}
				$zerif_image_in_customizer = $this->get_field_name( 'image_in_customizer' );

			echo '<input type="hidden" class="custom_media_display_in_customizer" name="';
			if ( ! empty( $zerif_image_in_customizer ) ) {
				echo $zerif_image_in_customizer;
			}
			echo '" value="';

			if ( ! empty( $instance['image_in_customizer'] ) ) {
				echo $instance['image_in_customizer'];
			}
			echo '">';

			echo '<img class="custom_media_image" src="' . $image_in_customizer . '" style="margin:0;padding:0;max-width:100px;float:left;display:' . $display . '" alt="' . __( 'Uploaded image', 'zerif-lite' ) . '"/><br/>';

				echo '<input type="text" class="widefat custom_media_url" name="' . $this->get_field_name( 'image_uri' ) . '" id="' . $this->get_field_id( 'image_uri' ) . '" value="';
			if ( ! empty( $instance['image_uri'] ) ) {
				echo $instance['image_uri'];
			}
				echo '" style="margin-top:5px;">';

				echo '<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="' . $this->get_field_name( 'image_uri' ) . '" value="' . __( 'Upload Image', 'zerif-lite' ) . '" style="margin-top:5px;">';
			echo '</p>';

			echo '<input class="custom_media_id" id="' . $this->get_field_id( 'custom_media_id' ) . '" name="' . $this->get_field_name( 'custom_media_id' ) . '" type="hidden" value="';
			if ( ! empty( $instance['custom_media_id'] ) ) {
				echo $instance['custom_media_id'];
			}
			echo '"/>';
		}

	}
}

if ( ! class_exists( 'zerif_team_widget' ) && zerif_check_if_old_version_of_theme() ) {

	/**
	 * Team member widget
	 */
	class zerif_team_widget extends WP_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {
			parent::__construct(
				'zerif_team-widget',
				__( 'Zerif - Team member widget', 'zerif-lite' ),
				array(
					'customize_selective_refresh' => true,
				)
			);
			add_action( 'admin_enqueue_scripts', array( $this, 'widget_scripts' ) );
		}

		/**
		 * Enqueue widget scripts
		 */
		function widget_scripts( $hook ) {
			if ( $hook != 'widgets.php' ) {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_script( 'zerif_widget_media_script', get_template_directory_uri() . '/js/widget-media.js', false, '1.1', true );
		}

		/**
		 * Instance widget
		 */
		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			echo '<div class="col-lg-3 col-sm-3 team-box">';

				echo '<div class="team-member" tabindex="0">';

			if ( ! empty( $instance['image_uri'] ) && ( $instance['image_uri'] != 'Upload Image' ) ) {

				echo '<figure class="profile-pic">';

				echo '<img src="' . esc_url( $instance['image_uri'] ) . '" alt=""/>';

				echo '</figure>';

			} elseif ( ! empty( $instance['custom_media_id'] ) ) {

				$zerif_team_custom_media_id = wp_get_attachment_image_url( $instance['custom_media_id'] );
				$alt                        = get_post_meta( $instance['custom_media_id'], '_wp_attachment_image_alt', true );

				if ( ! empty( $zerif_team_custom_media_id ) ) {

					echo '<figure class="profile-pic">';

						echo '<img src="' . esc_url( $zerif_team_custom_media_id ) . '" alt="' . esc_attr( $alt ) . '"/>';

					echo '</figure>';
				}
			}

					echo '<div class="member-details">';

			if ( ! empty( $instance['name'] ) ) {

				echo '<h3 class="dark-text red-border-bottom">' . apply_filters( 'widget_title', $instance['name'] ) . '</h3>';

			}

			if ( ! empty( $instance['position'] ) ) {

				echo '<div class="position">' . htmlspecialchars_decode( apply_filters( 'widget_title', $instance['position'] ) ) . '</div>';

			}

					echo '</div>';

					echo '<div class="social-icons">';

						echo '<ul>';

							$zerif_team_target = '_self';
			if ( ! empty( $instance['open_new_window'] ) ) {
				$zerif_team_target = '_blank';
			}

			if ( ! empty( $instance['fb_link'] ) ) {
				echo '<li>';
				echo '<a href="' . apply_filters( 'widget_title', $instance['fb_link'] ) . '" target="' . $zerif_team_target . '">';
				if ( ! empty( $instance['name'] ) ) {

					echo '<span class="sr-only">' . __( 'Facebook link', 'zerif-lite' ) . '</span>';

				}
				echo '<i class="fa fa-facebook"></i>';
				echo '</a>';
				echo '</li>';
			}

			if ( ! empty( $instance['tw_link'] ) ) {
				echo '<li>';
				echo '<a href="' . apply_filters( 'widget_title', $instance['tw_link'] ) . '" target="' . $zerif_team_target . '">';

				if ( ! empty( $instance['name'] ) ) {
					echo '<span class="sr-only">' . __( 'Twitter link', 'zerif-lite' ) . '</span>';
				}
				echo '<i class="fa fa-twitter"></i>';
				echo '</a>';
				echo '</li>';
			}

			if ( ! empty( $instance['bh_link'] ) ) {
				echo '<li>';
				echo '<a href="' . apply_filters( 'widget_title', $instance['bh_link'] ) . '" target="' . $zerif_team_target . '">';
				if ( ! empty( $instance['name'] ) ) {
					echo '<span class="sr-only">' . __( 'Behance link', 'zerif-lite' ) . '</span>';
				}
				echo '<i class="fa fa-behance"></i>';
				echo '</a>';
				echo '</li>';
			}

			if ( ! empty( $instance['db_link'] ) ) {
				echo '<li>';
				echo '<a href="' . apply_filters( 'widget_title', $instance['db_link'] ) . '" target="' . $zerif_team_target . '">';
				if ( ! empty( $instance['name'] ) ) {
					echo '<span class="sr-only">' . __( 'Dribble link', 'zerif-lite' ) . '</span>';
				}
				echo '<i class="fa fa-dribbble"></i>';
				echo '</a>';
				echo '</li>';
			}

			if ( ! empty( $instance['ln_link'] ) ) {
				echo '<li>';
				echo '<a href="' . apply_filters( 'widget_title', $instance['ln_link'] ) . '" target="' . $zerif_team_target . '">';
				if ( ! empty( $instance['name'] ) ) {
					echo '<span class="sr-only">' . __( 'Linkedin link', 'zerif-lite' ) . '</span>';
				}
				echo '<i class="fa fa-linkedin"></i>';
				echo '</a>';
				echo '</li>';
			}

						echo '</ul>';

					echo '</div>';

			if ( ! empty( $instance['description'] ) ) {
				echo '<div class="details">' . htmlspecialchars_decode( apply_filters( 'widget_title', $instance['description'] ) ) . '</div>';
			}

				echo '</div>';

			echo '</div>';

			echo $after_widget;

		}

		/**
		 * Update the widget
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['name']                = sanitize_text_field( $new_instance['name'] );
			$instance['position']            = stripslashes( wp_filter_post_kses( $new_instance['position'] ) );
			$instance['description']         = stripslashes( wp_filter_post_kses( $new_instance['description'] ) );
			$instance['fb_link']             = esc_url( $new_instance['fb_link'] );
			$instance['tw_link']             = esc_url( $new_instance['tw_link'] );
			$instance['bh_link']             = esc_url( $new_instance['bh_link'] );
			$instance['db_link']             = esc_url( $new_instance['db_link'] );
			$instance['ln_link']             = esc_url( $new_instance['ln_link'] );
			$instance['image_uri']           = esc_url( $new_instance['image_uri'] );
			$instance['open_new_window']     = strip_tags( $new_instance['open_new_window'] );
			$instance['custom_media_id']     = sanitize_text_field( $new_instance['custom_media_id'] );
			$instance['image_in_customizer'] = esc_url( $new_instance['image_in_customizer'] );

			return $instance;

		}

		/**
		 * Form the widget
		 */
		function form( $instance ) {

			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'name' ) . '">' . __( 'Name', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'name' ) . '" id="' . $this->get_field_id( 'name' ) . '" value="';
			if ( ! empty( $instance['name'] ) ) {
				echo $instance['name'];
			}
				echo '" class="widefat"/>';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'position' ) . '">' . __( 'Position', 'zerif-lite' ) . '</label><br/>';
				echo '<textarea class="widefat" rows="8" cols="20" name="' . $this->get_field_name( 'position' ) . '" id="' . $this->get_field_id( 'position' ) . '">';
			if ( ! empty( $instance['position'] ) ) {
				echo htmlspecialchars_decode( $instance['position'] );
			}
				echo '</textarea>';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'description' ) . '">' . __( 'Description', 'zerif-lite' ) . '</label><br/>';
				echo '<textarea class="widefat" rows="8" cols="20" name="' . $this->get_field_name( 'description' ) . '" id="' . $this->get_field_id( 'description' ) . '">';
			if ( ! empty( $instance['description'] ) ) {
				echo htmlspecialchars_decode( $instance['description'] );
			}
				echo '</textarea>';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'fb_link' ) . '">' . __( 'Facebook link', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'fb_link' ) . '" id="' . $this->get_field_id( 'fb_link' ) . '" value="';
			if ( ! empty( $instance['fb_link'] ) ) {
				echo $instance['fb_link'];
			}
					echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'tw_link' ) . '">' . __( 'Twitter link', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'tw_link' ) . '" id="' . $this->get_field_id( 'tw_link' ) . '" value="';
			if ( ! empty( $instance['tw_link'] ) ) {
				echo $instance['tw_link'];
			}
				echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'bh_link' ) . '">' . __( 'Behance link', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'bh_link' ) . '" id="' . $this->get_field_id( 'bh_link' ) . '" value="';
			if ( ! empty( $instance['bh_link'] ) ) {
				echo $instance['bh_link'];
			}
				echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'db_link' ) . '">' . __( 'Dribble link', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'db_link' ) . '" id="' . $this->get_field_id( 'db_link' ) . '" value="';
			if ( ! empty( $instance['db_link'] ) ) {
				echo $instance['db_link'];
			}
				echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'ln_link' ) . '">' . __( 'Linkedin link', 'zerif-lite' ) . '</label><br/>';
				echo '<input type="text" name="' . $this->get_field_name( 'ln_link' ) . '" id="' . $this->get_field_id( 'ln_link' ) . '" value="';
			if ( ! empty( $instance['ln_link'] ) ) {
				echo $instance['ln_link'];
			}
				echo '" class="widefat">';
			echo '</p>';
			echo '<p>';
				echo '<input type="checkbox" name="' . $this->get_field_name( 'open_new_window' ) . '" id="' . $this->get_field_id( 'open_new_window' ) . '"';
			if ( ! empty( $instance['open_new_window'] ) ) {
				checked( (bool) $instance['open_new_window'], true );
			}
				echo '>' . __( 'Open links in new window?', 'zerif-lite' ) . '<br>';
			echo '</p>';

			echo '<p>';
				echo '<label for="' . $this->get_field_id( 'image_uri' ) . '">' . __( 'Image', 'zerif-lite' ) . '</label><br/>';

				$image_in_customizer = '';
				$display             = 'none';
			if ( ! empty( $instance['image_in_customizer'] ) && ! empty( $instance['image_uri'] ) ) {
				$image_in_customizer = esc_url( $instance['image_in_customizer'] );
				$display             = 'inline-block';
			} else {
				if ( ! empty( $instance['image_uri'] ) ) {
					$image_in_customizer = esc_url( $instance['image_uri'] );
					$display             = 'inline-block';
				}
			}
				$zerif_image_in_customizer = $this->get_field_name( 'image_in_customizer' );

				echo '<input type="hidden" class="custom_media_display_in_customizer" name="';
			if ( ! empty( $zerif_image_in_customizer ) ) {
				echo $zerif_image_in_customizer;
			}
				echo '" value="';
			if ( ! empty( $instance['image_in_customizer'] ) ) {
				echo $instance['image_in_customizer'];
			}
				echo '">';
				echo '<img class="custom_media_image" src="' . $image_in_customizer . '" style="margin:0;padding:0;max-width:100px;float:left;display:' . $display . '" alt="' . __( 'Uploaded image', 'zerif-lite' ) . '"/><br/>';

				echo '<input type="text" class="widefat custom_media_url" name="' . $this->get_field_name( 'image_uri' ) . '" id="' . $this->get_field_id( 'image_uri' ) . '" value="';
			if ( ! empty( $instance['image_uri'] ) ) {
				echo $instance['image_uri'];
			}
				echo '" style="margin-top:5px;">';

				echo '<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="' . $this->get_field_name( 'image_uri' ) . '" value="' . __( 'Upload Image', 'zerif-lite' ) . '" style="margin-top:5px;">';
			echo '</p>';

			echo '<input class="custom_media_id" id="' . $this->get_field_id( 'custom_media_id' ) . '" name="' . $this->get_field_name( 'custom_media_id' ) . '" type="hidden" value="';
			if ( ! empty( $instance['custom_media_id'] ) ) {
				echo $instance['custom_media_id'];
			}
			echo '"/>';

		}

	}
}

/**
 * Register CSS needed in customizer
 */
function zerif_customizer_custom_css() {

	wp_enqueue_style( 'zerif_customizer_custom_css', get_template_directory_uri() . '/css/zerif_customizer_custom_css.css' );

}
add_action( 'customize_controls_print_styles', 'zerif_customizer_custom_css' );

add_filter( 'body_class', 'remove_class_function' );

/**
 * Remove custom-background from body_class()
 */
function remove_class_function( $classes ) {

	$zerif_keep_old_fp_template = get_theme_mod( 'zerif_keep_old_fp_template' );
	/* For new users with static page */
	if ( ! zerif_check_if_old_version_of_theme() && ( get_option( 'show_on_front' ) == 'page' ) && ! $zerif_keep_old_fp_template ) {
		if ( ! is_front_page() && ! is_home() ) {
			// index of custom-background
			$key = array_search( 'custom-background', $classes );
			// remove class
			unset( $classes[ $key ] );
		}
	} else {
		if ( ! is_home() && ! is_page_template( 'template-frontpage.php' ) ) {
			// index of custom-background
			$key = array_search( 'custom-background', $classes );
			// remove class
			unset( $classes[ $key ] );
		}
	}
	return $classes;

}

add_action( 'customize_save_after', 'zerif_lite_update_options_in_pirate_forms', 99 );

/**
 * Update Pirate Forms plugin when there is a change in Customizer Contact us section
 */
function zerif_lite_update_options_in_pirate_forms() {

	/* if Pirate Forms is installed */
	if ( defined( 'PIRATE_FORMS_VERSION' ) ) :

		$zerif_lite_current_mods = get_theme_mods(); /* all theme modification values in Customize for Zerif Lite */

		$pirate_forms_settings_array = get_option( 'pirate_forms_settings_array' ); /* Pirate Forms's options's array */

		if ( ! empty( $zerif_lite_current_mods ) ) :

			if ( isset( $zerif_lite_current_mods['zerif_contactus_button_label'] ) ) :
				$pirate_forms_settings_array['pirateformsopt_label_submit_btn'] = $zerif_lite_current_mods['zerif_contactus_button_label'];
			endif;

			if ( isset( $zerif_lite_current_mods['zerif_contactus_email'] ) ) :

				$pirate_forms_settings_array['pirateformsopt_email']            = $zerif_lite_current_mods['zerif_contactus_email'];
				$pirate_forms_settings_array['pirateformsopt_email_recipients'] = $zerif_lite_current_mods['zerif_contactus_email'];

			endif;

			if ( isset( $zerif_lite_current_mods['zerif_contactus_recaptcha_show'] ) && ( $zerif_lite_current_mods['zerif_contactus_recaptcha_show'] == 1 ) ) :
				if ( isset( $pirate_forms_settings_array['pirateformsopt_recaptcha_field'] ) ) :
					unset( $pirate_forms_settings_array['pirateformsopt_recaptcha_field'] );
				endif;
			else :
				$pirate_forms_settings_array['pirateformsopt_recaptcha_field'] = 'yes';
			endif;

			if ( isset( $zerif_lite_current_mods['zerif_contactus_sitekey'] ) ) :
				$pirate_forms_settings_array['pirateformsopt_recaptcha_sitekey'] = $zerif_lite_current_mods['zerif_contactus_sitekey'];
			endif;

			if ( isset( $zerif_lite_current_mods['zerif_contactus_secretkey'] ) ) :
				$pirate_forms_settings_array['pirateformsopt_recaptcha_secretkey'] = $zerif_lite_current_mods['zerif_contactus_secretkey'];
			endif;

		endif;

		if ( ! empty( $pirate_forms_settings_array ) ) :
			update_option( 'pirate_forms_settings_array', $pirate_forms_settings_array ); /* Update the options */
		endif;

	endif;
}

/**
 * Function to check if version 1.8.5 or less has been previously installed.
 */
function zerif_check_if_old_version_of_theme() {

	$old_zerif_option   = get_theme_mod( 'zerif_bigtitle_title' );
	$old_zerif_option_2 = get_theme_mod( 'zerif_bigtitle_redbutton_label' );
	$old_zerif_option_3 = get_theme_mod( 'zerif_ourfocus_title' );

	if ( ! empty( $old_zerif_option ) || ! empty( $old_zerif_option_2 ) || ! empty( $old_zerif_option_3 ) ) {
		return true;
	}
	return false;
}

/**
 * Add starter content for fresh sites
 *
 * @since 1.8.5.12
 */
function zerif_starter_content() {
	/*
	 * Starter Content Support
	 */
	add_theme_support(
		'starter-content', array(
			// Twenty Seventeen
			'posts'     => array(
				'home',
				'blog',
			),

			'nav_menus' => array(
				'primary' => array(
					'name'  => __( 'Primary Menu', 'zerif-lite' ),
					'items' => array(
						'page_home',
						'page_blog',
					),
				),
			),

			'options'   => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),
		)
	);

}
add_action( 'after_setup_theme', 'zerif_starter_content' );

/**
 * Save activation time.
 */
function zerif_time_activated() {
	update_option( 'zerif_time_activated', time() );
}
add_action( 'after_switch_theme', 'zerif_time_activated' );

/**
 * BeaverBuilder Upgrade
 */
function zerif_bb_upgrade_link() {
	return 'https://www.wpbeaverbuilder.com/?fla=101&campaign=zf';
}

add_filter( 'fl_builder_upgrade_url', 'zerif_bb_upgrade_link' );


/**
 * Check if $no_seconds have passed since theme was activated.
 * Used to perform certain actions, like adding a new recommended action in About Zerif page.
 *
 * @since 1.8.5.31
 * @access public
 * @return bool
 */
function zerif_check_passed_time( $no_seconds ) {
	$activation_time = get_option( 'zerif_time_activated' );
	if ( ! empty( $activation_time ) ) {
		$current_time    = time();
		$time_difference = (int) $no_seconds;
		if ( $current_time >= $activation_time + $time_difference ) {
			return true;
		} else {
			return false;
		}
	}
	return true;
}
