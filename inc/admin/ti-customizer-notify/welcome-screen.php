<?php

/**
 * Welcome Screen Class
 */
class Ti_Customizer_Notify_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

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

new Ti_Customizer_Notify_Welcome();
