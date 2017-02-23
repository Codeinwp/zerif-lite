<?php
/**
 * Pro customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Ti_Customizer_Notify_Customize_Section_Recommend extends WP_Customize_Section {
	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'affluent-recommended-section';
	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $required_actions = '';
	public $recommended_plugins = '';
	public $total_actions = '';
	public $plugin_text = '';
	public $dismiss_button = '';


	public function check_active( $slug ) {
		if ( file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $slug . '.php' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			$needs = is_plugin_active( $slug . '/' . $slug . '.php' ) ? 'deactivate' : 'activate';

			return array( 'status' => is_plugin_active( $slug . '/' . $slug . '.php' ), 'needs' => $needs );
		}

		return array( 'status' => false, 'needs' => 'install' );
	}

	public function create_action_link( $state, $slug ) {
		switch ( $state ) {
			case 'install':
				return wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'install-plugin',
							'plugin' => $slug
						),
						network_admin_url( 'update.php' )
					),
					'install-plugin_' . $slug
				);
				break;
			case 'deactivate':
				return add_query_arg( array(
					                      'action'        => 'deactivate',
					                      'plugin'        => rawurlencode( $slug . '/' . $slug . '.php' ),
					                      'plugin_status' => 'all',
					                      'paged'         => '1',
					                      '_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . $slug . '/' . $slug . '.php' ),
				                      ), network_admin_url( 'plugins.php' ) );
				break;
			case 'activate':
				return add_query_arg( array(
					                      'action'        => 'activate',
					                      'plugin'        => rawurlencode( $slug . '/' . $slug . '.php' ),
					                      'plugin_status' => 'all',
					                      'paged'         => '1',
					                      '_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $slug . '/' . $slug . '.php' ),
				                      ), network_admin_url( 'plugins.php' ) );
				break;
		}
	}

	public function call_plugin_api( $slug ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

		if ( false === ( $call_api = get_transient( 'affluent_plugin_information_transient_' . $slug ) ) ) {
			$call_api = plugins_api( 'plugin_information', array(
				'slug'   => $slug,
				'fields' => array(
					'downloaded'        => false,
					'rating'            => false,
					'description'       => false,
					'short_description' => true,
					'donate_link'       => false,
					'tags'              => false,
					'sections'          => false,
					'homepage'          => false,
					'added'             => false,
					'last_updated'      => false,
					'compatibility'     => false,
					'tested'            => false,
					'requires'          => false,
					'downloadlink'      => false,
					'icons'             => false
				)
			) );
			set_transient( 'affluent_plugin_information_transient_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
		}

		return $call_api;
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();
		global $ti_customizer_notify_required_actions, $affluent_recommended_plugins;
		$formatted_array = array();
		$affluent_show_required_actions = get_option( "affluent_show_required_actions" );
		foreach ( $ti_customizer_notify_required_actions as $key => $affluent_required_action ) {
			if ( @$affluent_show_required_actions[ $affluent_required_action['id'] ] === false ) {
				continue;
			}
			if ( $affluent_required_action['check'] ) {
				continue;
			}

			$affluent_required_action['index'] = $key + 1;

			if ( isset($affluent_required_action['plugin_slug']) ) {
				$active = $this->check_active( $affluent_required_action['plugin_slug'] );
				$affluent_required_action['url']    = $this->create_action_link( $active['needs'], $affluent_required_action['plugin_slug'] );
				if ( $active['needs'] !== 'install' && $active['status'] ) {
					$affluent_required_action['class'] = 'active';
				}else{
					$affluent_required_action['class'] = '';
				}

				switch ( $active['needs'] ) {
					case 'install':
						$affluent_required_action['button_class'] = 'install-now button';
						$affluent_required_action['button_label'] = __( 'Install', 'zerif-lite' );
						break;
					case 'activate':
						$affluent_required_action['button_class'] = 'activate-now button button-primary';
						$affluent_required_action['button_label'] = __( 'Activate', 'zerif-lite' );
						break;
					case 'deactivate':
						$affluent_required_action['button_class'] = 'deactivate-now button';
						$affluent_required_action['button_label'] = __( 'Deactivate', 'zerif-lite' );
						break;
				}

			}
			$formatted_array[] = $affluent_required_action;
		}

		$customize_plugins = array();
		$affluent_show_recommended_plugins = get_option( "affluent_show_recommended_plugins" );
		foreach ( $affluent_recommended_plugins as $slug => $plugin_opt ) {
			
			if ( !$plugin_opt['recommended'] ) {
				continue;
			}

			if ( Ti_Customizer_Notify_Notify_System::has_import_plugin( $slug ) ) {
				continue;
			}

			if ( isset($affluent_show_recommended_plugins[$slug]) && $affluent_show_recommended_plugins[$slug] ) {
				continue;
			}

			$active = $this->check_active( $slug );
			$affluent_recommended_plugin['url']    = $this->create_action_link( $active['needs'], $slug );
			if ( $active['needs'] !== 'install' && $active['status'] ) {
				$affluent_recommended_plugin['class'] = 'active';
			}else{
				$affluent_recommended_plugin['class'] = '';
			}

			switch ( $active['needs'] ) {
				case 'install':
					$affluent_recommended_plugin['button_class'] = 'install-now button';
					$affluent_recommended_plugin['button_label'] = __( 'Install', 'zerif-lite' );
					break;
				case 'activate':
					$affluent_recommended_plugin['button_class'] = 'activate-now button button-primary';
					$affluent_recommended_plugin['button_label'] = __( 'Activate', 'zerif-lite' );
					break;
				case 'deactivate':
					$affluent_recommended_plugin['button_class'] = 'deactivate-now button';
					$affluent_recommended_plugin['button_label'] = __( 'Deactivate', 'zerif-lite' );
					break;
			}
			$info   = $this->call_plugin_api( $slug );
			$affluent_recommended_plugin['id'] = $slug;
			$affluent_recommended_plugin['plugin_slug'] = $slug;
			$affluent_recommended_plugin['description'] = $info->short_description;
			$affluent_recommended_plugin['title'] = $affluent_recommended_plugin['button_label'].': '.$info->name;

			$customize_plugins[] = $affluent_recommended_plugin;

		}


		$json['required_actions'] = $formatted_array;
		$json['recommended_plugins'] = $customize_plugins;
		$json['total_actions'] = count($ti_customizer_notify_required_actions);
		$json['plugin_text'] = $this->plugin_text;
		$json['dismiss_button'] = $this->dismiss_button;
		return $json;

	}
	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>
        <# if( data.required_actions.length > 0 || data.recommended_plugins.length > 0 ){ #>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

                <h3 class="accordion-section-title">
                    <span class="section-title" data-plugin_text="{{ data.plugin_text }}">
                        <# if( data.required_actions.length > 0 ){ #>
                            {{ data.title }}
                        <# }else{ #>
                            <# if( data.recommended_plugins.length > 0 ){ #>
                                {{ data.plugin_text }}
                            <# }#>
                        <# } #>
                    </span>
                    <# if( data.required_actions.length > 0 ){ #>
                        <span class="affluent-actions-count">
                            <span class="current-index">{{ data.required_actions[0].index }}</span>
                            /
                            {{ data.total_actions }}
                        </span>
                    <# } #>
                </h3>
                <div class="recomended-actions_container" id="plugin-filter">
                    <# if( data.required_actions.length > 0 ){ #>
                        <# for (action in data.required_actions) { #>
                            <div class="epsilon-recommeded-actions-container epsilon-required-actions" data-index="{{ data.required_actions[action].index }}">
                                <# if( !data.required_actions[action].check ){ #>
                                    <div class="epsilon-recommeded-actions">
                                        <p class="title">{{ data.required_actions[action].title }}</p>
                                        <span data-action="dismiss" class="dashicons dashicons-no affluent-dismiss-required-action" id="{{ data.required_actions[action].id }}"></span>
                                        <div class="description">{{{ data.required_actions[action].description }}}</div>
                                        <# if( data.required_actions[action].plugin_slug ){ #>
                                            <div class="custom-action">
                                                <p class="plugin-card-{{ data.required_actions[action].plugin_slug }} action_button {{ data.required_actions[action].class }}">
                                                    <a data-slug="{{ data.required_actions[action].plugin_slug }}"
                                                       class="{{ data.required_actions[action].button_class }}"
                                                       href="{{ data.required_actions[action].url }}">{{ data.required_actions[action].button_label }}</a>
                                                </p>
                                            </div>
                                        <# } #>
                                        <# if( data.required_actions[action].help ){ #>
                                            <div class="custom-action">{{{ data.required_actions[action].help }}}</div>
                                        <# } #>
                                    </div>
                                <# } #>
                            </div>
                        <# } #>
                    <# } #>

                    <# if( data.recommended_plugins.length > 0 ){ #>
                        <# for (action in data.recommended_plugins) { #>
                            <div class="epsilon-recommeded-actions-container epsilon-recommended-plugins" data-index="{{ data.recommended_plugins[action].index }}">
                                <# if( !data.recommended_plugins[action].check ){ #>
                                    <div class="epsilon-recommeded-actions">
                                        <p class="title">{{ data.recommended_plugins[action].title }}</p>
                                        <span data-action="dismiss" class="dashicons dashicons-no affluent-recommended-plugin-button" id="{{ data.recommended_plugins[action].id }}"></span>
                                        <div class="description">{{{ data.recommended_plugins[action].description }}}</div>
                                        <# if( data.recommended_plugins[action].plugin_slug ){ #>
                                            <div class="custom-action">
                                                <p class="plugin-card-{{ data.recommended_plugins[action].plugin_slug }} action_button {{ data.recommended_plugins[action].class }}">
                                                    <a data-slug="{{ data.recommended_plugins[action].plugin_slug }}"
                                                       class="{{ data.recommended_plugins[action].button_class }}"
                                                       href="{{ data.recommended_plugins[action].url }}">{{ data.recommended_plugins[action].button_label }}</a>
                                                </p>
                                            </div>
                                        <# } #>
                                        <# if( data.recommended_plugins[action].help ){ #>
                                            <div class="custom-action">{{{ data.recommended_plugins[action].help }}}</div>
                                        <# } #>
                                    </div>
                                <# } #>
                            </div>
                        <# } #>
                    <# } #>
                </div>
            </li>
        <# } #>
	<?php }
}