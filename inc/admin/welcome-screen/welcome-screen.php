<?php
/**
 * Welcome Screen Class
 */
class Zerif_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'zerif_lite_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'zerif_lite_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'zerif_lite_welcome_style_and_scripts' ) );

		/* load welcome screen */

		add_action( 'zerif_lite_welcome', array( $this, 'zerif_lite_welcome_getting_started' ), 	    10 );
		add_action( 'zerif_lite_welcome', array( $this, 'zerif_lite_welcome_actions_required' ), 		20 );
		add_action( 'zerif_lite_welcome', array( $this, 'zerif_lite_welcome_child_themes' ), 		    30 );
		add_action( 'zerif_lite_welcome', array( $this, 'zerif_lite_welcome_github' ), 		            40 );
		add_action( 'zerif_lite_welcome', array( $this, 'zerif_lite_welcome_changelog' ), 				50 );
		add_action( 'zerif_lite_welcome', array( $this, 'zerif_lite_welcome_about_us' ), 				60 );
		add_action( 'zerif_lite_welcome', array( $this, 'zerif_lite_welcome_free_pro' ), 				70 );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_register_menu() {
		add_theme_page( 'Zerif Lite', 'Zerif Lite', 'activate_plugins', 'zerif-lite-welcome', array( $this, 'zerif_lite_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function zerif_lite_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'zerif_lite_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Zerif Lite! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'zerif-lite' ), '<a href="' . esc_url( admin_url( 'themes.php?page=zerif-lite-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=zerif-lite-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Zerif Lite', 'zerif-lite' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function zerif_lite_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_zerif-lite-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'zerif-lite-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'zerif-lite-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );
		}
	}

	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="zerif-lite-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','zerif-lite'); ?></a></li>
			<li role="presentation" class="zerif-lite-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions required','zerif-lite'); ?></a></li>
			<li role="presentation"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child themes','zerif-lite'); ?></a></li>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute','zerif-lite'); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog','zerif-lite'); ?></a></li>
			<li role="presentation"><a href="#about_us" aria-controls="about_us" role="tab" data-toggle="tab"><?php esc_html_e( 'About us','zerif-lite'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','zerif-lite'); ?></a></li>
		</ul>

		<div class="zerif-lite-tab-content">

			<?php
			/**
			 * @hooked zerif_lite_welcome_getting_started - 10
			 * @hooked zerif_lite_welcome_actions_required - 20
			 * @hooked zerif_lite_welcome_child_themes - 30
			 * @hooked zerif_lite_welcome_github - 40
			 * @hooked zerif_lite_welcome_changelog - 50
			 * @hooked zerif_lite_welcome_about_us - 60
			 * @hooked zerif_lite_welcome_free_pro - 70
			 */
			do_action( 'zerif_lite_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php' );
	}

	/**
	 * Child themes
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_child_themes() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/child-themes.php' );
	}

	/**
	 * Contribute
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_github() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_changelog() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}

	/**
	 * About us
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_about_us() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/about_us.php' );
	}

	/**
	 * Free vs PRO
	 * @since 1.8.2.4
	 */
	public function zerif_lite_welcome_free_pro() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/free_pro.php' );
	}
}

$GLOBALS['Zerif_Welcome'] = new Zerif_Welcome();