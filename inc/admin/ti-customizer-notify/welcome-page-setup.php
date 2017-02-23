<?php

add_action( 'customize_register', 'ti_customizer_notify_customize_register' );

function ti_customizer_notify_customize_register($wp_customize){

	require_once get_template_directory() . '/inc/admin/ti-customizer-notify/custom-recommend-action-section.php';
		$wp_customize->register_section_type( 'Ti_Customizer_Notify_Customize_Section_Recommend' );

		// Recomended Actions
		$wp_customize->add_section(
			new Ti_Customizer_Notify_Customize_Section_Recommend(
				$wp_customize,
				'affluent-recommended-section',
				array(
					'title'    => esc_html__( 'Recomended Actions', 'zerif-lite' ),
					'plugin_text'	=> esc_html__( 'Recomended Plugins :', 'zerif-lite' ),
					'dismiss_button' => esc_html__( 'Dismiss', 'zerif-lite' ),
					'priority' => 0
				)
			)
		);

}

add_action( 'customize_controls_enqueue_scripts', 'ti_customizer_notify_welcome_scripts_for_customizer', 0 );

function ti_customizer_notify_welcome_scripts_for_customizer(){

	wp_enqueue_style( 'ti-customizer-notify-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/ti-customizer-notify/css/welcome_customizer.css' );
	wp_enqueue_style( 'plugin-install' );
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

	wp_enqueue_script( 'ti-customizer-notify-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/ti-customizer-notify/js/welcome_customizer.js', array( 'customize-controls' ) );
	wp_localize_script( 'ti-customizer-notify-welcome-screen-customizer-js', 'tiCustomizerNotifyWelcomeScreenObject', array(
		'ajaxurl'                  => admin_url( 'admin-ajax.php' ),
		'template_directory'       => get_template_directory_uri(),
		'base_path'                => admin_url(),
	) );

}

// Load the system checks ( used for notifications )
require get_template_directory() . '/inc/admin/ti-customizer-notify/notify-system-checks.php';

// Welcome screen
if ( is_admin() ) {

	global $ti_customizer_notify_required_actions, $affluent_recommended_plugins;

	$affluent_recommended_plugins = array(
		'themeisle-companion' 		=> array( 'recommended' => true ),
	);
	/**
	 * Add required actions in $ti_customizer_notify_required_actions variable to display in customizer.
	 *
	 * id - unique id; required
	 * title
	 * description
	 * check - check for plugins (if installed)
	 * plugin_slug - the plugin's slug (used for installing the plugin)
	 *
	 * Example:
	 * array(
	 * "id"          => 'affluent-req-ac-install-cpo-content-types',
	 * "title"       => Ti_Customizer_Notify_Notify_System::create_plugin_requirement_title( __( 'Install: CPO Content Types', 'zerif-lite' ), __( 'Activate: CPO Content Types', 'zerif-lite' ), 'cpo-content-types' ),
	 * "description" => __( 'It is highly recommended that you install the CPO Content Types plugin. It will help you manage all the special content types that this theme supports.', 'zerif-lite' ),
	 * "check"       => Ti_Customizer_Notify_Notify_System::has_import_plugin( 'cpo-content-types' ),
	 * "plugin_slug" => 'cpo-content-types'
	 * ),
	 */
	$ti_customizer_notify_required_actions = array();

	require get_template_directory() . '/inc/admin/ti-customizer-notify/welcome-screen.php';
}