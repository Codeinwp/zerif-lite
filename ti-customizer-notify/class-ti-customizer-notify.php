<?php

/**
 * TI Customizer Notify Class
 */
class Ti_Customizer_Notify {

	/**
	 * Recommended actions
	 *
	 * @var array $recommended_actions Recommended actions displayed in customize notification system.
	 */
	private $recommended_actions;

	/**
	 * Recommended plugins
	 *
	 * @var array $recommended_plugins Recommended plugins displayed in customize notification system.
	 */
	private $recommended_plugins;

	/**
	 * The single instance of Ti_Customizer_Notify
	 *
	 * @var Ti_Customizer_Notify $instance The Ti_Customizer_Notify instance.
	 */
	private static $instance;

	/**
	 * The Main Ti_Customizer_Notify instance.
	 *
	 * We make sure that only one instance of Ti_Customizer_Notify exists in the memory at one time.
	 *
	 * @param array $config The configuration array.
	 */
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Ti_Customizer_Notify ) ) {
			self::$instance = new Ti_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	/**
	 * Scripts and styles used in the Ti_Customizer_Notify class
	 */
	public function ti_customizer_notify_scripts_for_customizer(){

		wp_enqueue_style( 'ti-customizer-notify-customizer-css', get_template_directory_uri() . '/ti-customizer-notify/css/ti-customizer-notify-customizer.css' );

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );

		wp_enqueue_script( 'ti-customizer-notify-customizer-js', get_template_directory_uri() . '/ti-customizer-notify/js/ti-customizer-notify-customizer.js', array( 'customize-controls' ) );
		wp_localize_script( 'ti-customizer-notify-customizer-js', 'tiCustomizerNotifyObject', array(
			'ajaxurl'                  => admin_url( 'admin-ajax.php' ),
			'template_directory'       => get_template_directory_uri(),
			'base_path'                => admin_url(),
		) );

	}

	public function ti_customizer_notify_customize_register($wp_customize){

		require_once get_template_directory() . '/ti-customizer-notify/custom-recommend-action-section.php';
		$wp_customize->register_section_type( 'Ti_Customizer_Notify_Customize_Section_Recommend' );

		// Recomended Actions
		$wp_customize->add_section(
			new Ti_Customizer_Notify_Customize_Section_Recommend(
				$wp_customize,
				'ti-customizer-notify-recommended-section',
				array(
					'title'    => esc_html__( 'Recomended Actions', 'zerif-lite' ),
					'plugin_text'	=> esc_html__( 'Recomended Plugins :', 'zerif-lite' ),
					'dismiss_button' => esc_html__( 'Dismiss', 'zerif-lite' ),
					'priority' => 0
				)
			)
		);

	}

	/**
	 * Constructor for the welcome screen
	 */
	public function setup_config() {
		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		global $ti_customizer_notify_recommended_plugins;
		$ti_customizer_notify_recommended_plugins= $this->recommended_plugins;
		global $ti_customizer_notify_required_actions;
		$ti_customizer_notify_required_actions = $this->recommended_actions;



		// Load the system checks ( used for notifications )
		require get_template_directory() . '/ti-customizer-notify/notify-system-checks.php';

		add_action( 'customize_register', array( $this,'ti_customizer_notify_customize_register') );

		add_action( 'customize_controls_enqueue_scripts', array( $this,'ti_customizer_notify_scripts_for_customizer'), 0 );


	}

	/**
	 * Constructor for the welcome screen
	 */
	public function setup_actions() {

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_ti_customizer_notify_dismiss_required_action', array(
			$this,
			'ti_customizer_notify_dismiss_required_action_callback'
		) );

		add_action( 'wp_ajax_affluent_dismiss_recommended_plugins', array(
			$this,
			'ti_customizer_notify_dismiss_recommended_plugins_callback'
		) );


		add_action( 'admin_init', array( $this, 'ti_customizer_notify_activate_plugin' ) );
		add_action( 'admin_init', array( $this, 'ti_customizer_notify_deactivate_plugin' ) );
	}



	public function ti_customizer_notify_activate_plugin() {
		if ( ! empty( $_GET ) ) {
			/**
			 * Check action
			 */
			if ( ! empty( $_GET['action'] ) && ! empty( $_GET['plugin'] ) && $_GET['action'] === 'activate_plugin' ) {
				$active_tab = $_GET['tab'];
				$url        = self_admin_url( 'themes.php?page=zerif-lite-welcome&tab=' . $active_tab );
				activate_plugin( $_GET['plugin'], $url );
			}
		}
	}

	public function ti_customizer_notify_deactivate_plugin() {
		if ( ! empty( $_GET ) ) {
			/**
			 * Check action
			 */
			if ( ! empty( $_GET['action'] ) && ! empty( $_GET['plugin'] ) && $_GET['action'] === 'deactivate_plugin' ) {
				$active_tab = $_GET['tab'];
				$url        = self_admin_url( 'themes.php?page=zerif-lite-welcome&tab=' . $active_tab );
				$current    = get_option( 'active_plugins', array() );
				$search     = array_search( $_GET['plugin'], $current );
				if ( array_key_exists( $search, $current ) ) {
					unset( $current[ $search ] );
				}
				update_option( 'active_plugins', $current );
			}
		}
	}


	/**
	 * Dismiss required actions
	 *
	 * @since 1.8.2.4
	 */
	public function ti_customizer_notify_dismiss_required_action_callback() {
		global $ti_customizer_notify_required_actions;
		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;
		echo $action_id; /* this is needed and it's the id of the dismissable required action */
		if ( ! empty( $action_id ) ):
			/* if the option exists, update the record for the specified id */
			if ( get_option( 'affluent_show_required_actions' ) ):
				$affluent_show_required_actions = get_option( 'affluent_show_required_actions' );
				switch ( $_GET['todo'] ) {
					case 'add';
						$affluent_show_required_actions[ $action_id ] = true;
						break;
					case 'dismiss';
						$affluent_show_required_actions[ $action_id ] = false;
						break;
				}
				update_option( 'affluent_show_required_actions', $affluent_show_required_actions );
			/* create the new option,with false for the specified id */
			else:
				$affluent_show_required_actions_new = array();
				if ( ! empty( $ti_customizer_notify_required_actions ) ):
					foreach ( $ti_customizer_notify_required_actions as $affluent_required_action ):
						if ( $affluent_required_action['id'] == $action_id ):
							$affluent_show_required_actions_new[ $affluent_required_action['id'] ] = false;
						else:
							$affluent_show_required_actions_new[ $affluent_required_action['id'] ] = true;
						endif;
					endforeach;
					update_option( 'affluent_show_required_actions', $affluent_show_required_actions_new );
				endif;
			endif;
		endif;
		die(); // this is required to return a proper result
	}

	public function ti_customizer_notify_dismiss_recommended_plugins_callback() {
		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;
		echo $action_id; /* this is needed and it's the id of the dismissable required action */
		if ( ! empty( $action_id ) ):
			/* if the option exists, update the record for the specified id */
			$affluent_show_recommended_plugins = get_option( 'affluent_show_recommended_plugins' );
				
				switch ( $_GET['todo'] ) {
					case 'add';
						$affluent_show_recommended_plugins[ $action_id ] = false;
						break;
					case 'dismiss';
						$affluent_show_recommended_plugins[ $action_id ] = true;
						break;
				}
				update_option( 'affluent_show_recommended_plugins', $affluent_show_recommended_plugins );
			/* create the new option,with false for the specified id */
		endif;
		die(); // this is required to return a proper result
	}


}

new Ti_Customizer_Notify();
