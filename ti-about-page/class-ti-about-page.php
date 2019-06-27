<?php
/**
 * ThemeIsle - About page class
 *
 * @package Themeisle
 * @subpackage Admin
 * @since 1.0.0
 */
if ( ! class_exists( 'TI_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class TI_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The TI_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;
		/**
		 * Define the menu item name for the page.
		 *
		 * @var string $menu_name The name of the menu name under Appearance settings.
		 */
		private $menu_name;
		/**
		 * Define the page title name.
		 *
		 * @var string $page_name The title of the About page.
		 */
		private $page_name;
		/**
		 * Define the page tabs.
		 *
		 * @var array $tabs The page tabs.
		 */
		private $tabs;
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of TI_About_Page
		 *
		 * @var TI_About_Page $instance The  TI_About_Page instance.
		 */
		private static $instance;

		/**
		 * The Main TI_About_Page instance.
		 *
		 * We make sure that only one instance of TI_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof TI_About_Page ) ) {
				self::$instance = new TI_About_Page;
				if ( ! empty( $config ) && is_array( $config ) ) {
					self::$instance->config = $config;
					self::$instance->setup_config();
					self::$instance->setup_actions();
				}
			}

		}

		/**
		 * Notice for Neve theme
		 *
		 * @return string
		 */
		public function neve_notice() {

			global $current_user;
			$user_id        = $current_user->ID;
			$ignored_notice = get_user_meta( $user_id, 'zerif_ignore_neve_notice' );

			if ( ! empty( $ignored_notice ) ) {
				return;
			}

			$theme_args = wp_get_theme();
			$name       = $theme_args->__get( 'Name' );

			$notice_template = '
			<div class="nv-notice-wrapper">
			%1$s
			<hr/>
				<div class="nv-notice-column-container">
					<div class="nv-notice-column nv-notice-image">%2$s</div>
					<div class="nv-notice-column nv-notice-starter-sites">%3$s</div>
					<div class="nv-notice-column nv-notice-documentation">%4$s</div>
				</div> 
			</div>
			<style>%5$s</style>';

			/* translators: 1 - notice title, 2 - notice message */
			$notice_header = sprintf(
				'<h2>%1$s</h2><p class="about-description">%2$s</p></hr>',
				esc_html__( 'Your theme is no longer maintained. A New, Modern WordPress Theme is Here!', 'zerif-lite' ),
				sprintf(
					/* translators: %s - theme name */
					esc_html__( '%s is no longer maintained. Switch to Neve today and get more powerful features (for free).', 'zerif-lite' ),
					$name
				)
			);

			$notice_picture = sprintf(
				'<picture>
					<source srcset="about:blank" media="(max-width: 1024px)">
					<img src="%1$s">
				</picture>',
				esc_url( get_template_directory_uri() . '/ti-about-page/images/neve.png' )
			);

			$notice_right_side_content = sprintf(
				'<div><h3> %1$s</h3><p>%2$s</p><p>%3$s</p></div>',
				__( 'Switch to Neve today', 'zerif-lite' ),
				// translators: %s - theme name
				sprintf( __( 'We\'ve made it easy for you to try the new Neve theme and import your existing content into a template similar to %s with just a few clicks.', 'zerif-lite' ), $name ),
				esc_html__( 'With Neve you get a super fast, multi-purpose theme, fully AMP optimized and responsive, that works perfectly with Gutenberg and the most popular page builders like Elementor, Beaver Builder, and many more.', 'zerif-lite' )
			);

			$notice_left_side_content = sprintf(
				'<div><h3> %1$s</h3><p>%2$s</p><p>%3$s</p><p class="nv-buttons-wrapper"><a class="button button-hero button-primary" href="%4$s" target="_blank">%5$s</a></p> </div>',
				sprintf( esc_html__( '%s (former Zerif Lite) is no longer maintained', 'zerif-lite' ), $name ),
				// translators: %s - theme name
				sprintf( __( 'We\'re saying %s in favor of our more powerful Neve free WordPress theme. This means that there will not be any new features added although we will continue to update the theme for major security issues.', 'zerif-lite' ), sprintf( "<a href='https://themeisle.com/blog/zerif-changes-its-name-to-zelle/' target='_blank'>goodbye to %s</a>", $name ) ),
				// translators: %s - theme name
				sprintf( __( 'We strongly encourage you to switch to %1$s. Also, we\'ve made sure you can easily migrate your old content into a template similar to %2$s.' ), "<a href='https://themeisle.com/themes/neve/' target='_blank'>Neve</a>", $name ),
				esc_url( admin_url( 'theme-install.php?theme=neve' ) ),
				esc_html__( 'See Neve theme', 'zerif-lite' )
			);
			$style = '
				.nv-notice-wrapper p{
					font-size: 14px;
				}
				.nv-buttons-wrapper {
					padding-top: 20px !important;
				}
				.nv-notice-wrapper h2{
					margin: 0;
					font-size: 21px;
					font-weight: 400;
					line-height: 1.2;
				}
				.nv-notice-wrapper p.about-description{
					color: #72777c;
					font-size: 16px;
					margin: 0;
					padding:0px;
				}
				.nv-notice-wrapper{
					padding: 23px 10px 0;
					max-width: 1500px;
				}
				.nv-notice-wrapper hr {
					margin: 20px -23px 0;
					border-top: 1px solid #f3f4f5;
					border-bottom: none;
				}
				.nv-notice-column-container h3{	
					margin: 17px 0 0;
					font-size: 16px;
					line-height: 1.4;
				}
				.nv-notice-text p.ti-return-dashboard {
					margin-top: 30px;
				}
				.nv-notice-column-container .nv-notice-column{
					 padding-right: 60px;
				} 
				.nv-notice-column-container img{ 
					margin-top: 23px;
					width: 100%;
					border: 1px solid #f3f4f5; 
				} 
				.nv-notice-column-container { 
					display: -ms-grid;
					display: grid;
					-ms-grid-columns: 24% 32% 32%;
					grid-template-columns: 24% 32% 32%;
					margin-bottom: 13px;
				}
				.nv-notice-column-container a.button.button-hero.button-secondary,
				.nv-notice-column-container a.button.button-hero.button-primary{
					margin:0px;
				}
				@media screen and (max-width: 1280px) {
					.nv-notice-wrapper .nv-notice-column-container {
						-ms-grid-columns: 50% 50%;
						grid-template-columns: 50% 50%;
					}
					.nv-notice-column-container a.button.button-hero.button-secondary,
					.nv-notice-column-container a.button.button-hero.button-primary{
						padding:6px 18px;
					}
					.nv-notice-wrapper .nv-notice-image {
						display: none;
					}
				} 
				@media screen and (max-width: 870px) {
					 
					.nv-notice-wrapper .nv-notice-column-container {
						-ms-grid-columns: 100%;
						grid-template-columns: 100%;
					}
					.nv-notice-column-container a.button.button-hero.button-primary{
						padding:12px 36px;
					}
				}
			';
			return sprintf(
				$notice_template,
				$notice_header,
				$notice_picture,
				$notice_left_side_content,
				$notice_right_side_content,
				$style
			);// WPCS: XSS OK.
		}

		/**
		 * Dismiss the notice for Neve
		 */
		public function zerif_nag_ignore_neve() {
			global $current_user;
			$user_id = $current_user->ID;

			if ( isset( $_GET['zerif_nag_ignore_neve'] ) && '0' == $_GET['zerif_nag_ignore_neve'] ) {
				add_user_meta( $user_id, 'zerif_ignore_neve_notice', 'true', true );
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();
			$this->menu_name     = isset( $this->config['menu_name'] ) ? $this->config['menu_name'] : 'About ' . $this->theme_name;
			$this->page_name     = isset( $this->config['page_name'] ) ? $this->config['page_name'] : 'About ' . $this->theme_name;
			$this->tabs          = isset( $this->config['tabs'] ) ? $this->config['tabs'] : array();
		}



		/**
		 * Setup the actions used for this page.
		 */
		public function setup_actions() {

			add_action( 'admin_menu', array( $this, 'register' ) );

			add_action( 'admin_notices', array( $this, 'ti_about_page_welcome_admin_notice' ) );

			add_action( 'admin_init', array( $this, 'zerif_nag_ignore_neve' ) );

			/* enqueue script and style for about page */
			add_action( 'admin_enqueue_scripts', array( $this, 'style_and_scripts' ) );

			/* ajax callback for dismissable required actions */
			add_action( 'wp_ajax_ti_about_page_dismiss_required_action', array( $this, 'dismiss_required_action_callback' ) );
			add_action( 'wp_ajax_nopriv_ti_about_page_dismiss_required_action', array( $this, 'dismiss_required_action_callback' ) );
		}

		/**
		 * Hide required tab if no actions present.
		 *
		 * @return bool Either hide the tab or not.
		 */
		public function hide_required( $value, $tab ) {
			if ( $tab != 'recommended_actions' ) {
				return $value;
			}
			$required = $this->get_required_actions();
			if ( count( $required ) == 0 ) {
				return false;
			} else {
				return true;
			}
		}


		/**
		 * Register the menu page under Appearance menu.
		 */
		function register() {
			if ( ! empty( $this->menu_name ) && ! empty( $this->page_name ) ) {

				$count = 0;

				$actions_count = $this->get_required_actions();

				if ( ! empty( $actions_count ) ) {
					$count = count( $actions_count );
				}

				$title = $count > 0 ? $this->page_name . '<span class="badge-action-count">' . esc_html( $count ) . '</span>' : $this->page_name;

				add_theme_page(
					$this->menu_name,
					$title,
					'activate_plugins',
					$this->theme_slug . '-welcome',
					array(
						$this,
						'ti_about_page_render',
					)
				);
			}
		}

		/**
		 * Display an admin notice linking to the about page
		 */
		public function ti_about_page_welcome_admin_notice() {
			$dismiss_button =
				sprintf(
					/* translators: Install Neve link */
					'<a href="%s" class="notice-dismiss" style="text-decoration:none;"></a>',
					'?zerif_nag_ignore_neve=0'
				);
			echo '<div class="updated notice" style="position:relative;">';
			echo $dismiss_button;
			echo $this->neve_notice();
			echo '</div>';
		}

		/**
		 * Render the main content page.
		 */
		public function ti_about_page_render() {

			if ( ! empty( $this->config['welcome_title'] ) ) {
				$welcome_title = $this->config['welcome_title'];
			}
			if ( ! empty( $this->config['welcome_content'] ) ) {
				$welcome_content = $this->config['welcome_content'];
			}

			if ( ! empty( $welcome_title ) || ! empty( $welcome_content ) || ! empty( $this->tabs ) ) {

				echo '<div class="wrap about-wrap epsilon-wrap">';

				if ( ! empty( $welcome_title ) ) {
					echo '<h1>';
					echo esc_html( $welcome_title );
					if ( ! empty( $this->theme_version ) ) {
						echo esc_html( $this->theme_version ) . ' </sup>';
					}
					echo '</h1>';
				}
				if ( ! empty( $welcome_content ) ) {
					echo '<div class="about-text">' . wp_kses_post( $welcome_content ) . '</div>';
				}

				echo '<a href="https://themeisle.com/" target="_blank" class="wp-badge epsilon-welcome-logo"></a>';

				/* Display tabs */
				if ( ! empty( $this->tabs ) ) {
					$active_tab = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'getting_started';

					echo '<h2 class="nav-tab-wrapper wp-clearfix">';

					$actions_count = $this->get_required_actions();

					$count = 0;

					if ( ! empty( $actions_count ) ) {
						$count = count( $actions_count );
					}

					foreach ( $this->tabs as $tab_key => $tab_name ) {

						if ( ( $tab_key != 'changelog' ) || ( ( $tab_key == 'changelog' ) && isset( $_GET['show'] ) && ( $_GET['show'] == 'yes' ) ) ) {

							if ( ( $count == 0 ) && ( $tab_key == 'recommended_actions' ) ) {
								continue;
							}

							echo '<a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-welcome' ) ) . '&tab=' . $tab_key . '" class="nav-tab ' . ( $active_tab == $tab_key ? 'nav-tab-active' : '' ) . '" role="tab" data-toggle="tab">';
							echo esc_html( $tab_name );
							if ( $tab_key == 'recommended_actions' ) {
								$count = 0;

								$actions_count = $this->get_required_actions();

								if ( ! empty( $actions_count ) ) {
									$count = count( $actions_count );
								}
								if ( $count > 0 ) {
									echo '<span class="badge-action-count">' . esc_html( $count ) . '</span>';
								}
							}
							echo '</a>';
						}
					}

					echo '</h2>';

					/* Display content for current tab */
					if ( method_exists( $this, $active_tab ) ) {
						$this->$active_tab();
					}
				}

				echo '</div><!--/.wrap.about-wrap-->';
			}
		}

		/**
		 * Call plugin api
		 */
		public function call_plugin_api( $slug ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

			if ( false === ( $call_api = get_transient( 'ti_about_page_plugin_information_transient_' . $slug ) ) ) {
				$call_api = plugins_api(
					'plugin_information',
					array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'ti_about_page_plugin_information_transient_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}

		/**
		 * Check if plugin is active
		 */
		public function check_if_plugin_active( $slug ) {
			if ( ( $slug == 'intergeo-maps' ) || ( $slug == 'visualizer' ) ) {
				$plugin_root_file = 'index';
			} elseif ( $slug == 'wpforms-lite' ) {
				$plugin_root_file = 'wpforms';
			} elseif ( $slug == 'adblock-notify-by-bweb' ) {
				$plugin_root_file = 'adblock-notify';
			} else {
				$plugin_root_file = $slug;
			}

			$path = WPMU_PLUGIN_DIR . '/' . $slug . '/' . $plugin_root_file . '.php';
			if ( ! file_exists( $path ) ) {
				$path = WP_PLUGIN_DIR . '/' . $slug . '/' . $plugin_root_file . '.php';
				if ( ! file_exists( $path ) ) {
					$path = false;
				}
			}

			if ( file_exists( $path ) ) {

				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

				$needs = is_plugin_active( $slug . '/' . $plugin_root_file . '.php' ) ? 'deactivate' : 'activate';

				return array(
					'status' => is_plugin_active( $slug . '/' . $plugin_root_file . '.php' ),
					'needs'  => $needs,
				);
			}

			return array(
				'status' => false,
				'needs'  => 'install',
			);
		}

		/**
		 * Get icon of wordpress.org plugin
		 */
		public function get_plugin_icon( $arr ) {

			if ( ! empty( $arr['svg'] ) ) {
				$plugin_icon_url = $arr['svg'];
			} elseif ( ! empty( $arr['2x'] ) ) {
				$plugin_icon_url = $arr['2x'];
			} elseif ( ! empty( $arr['1x'] ) ) {
				$plugin_icon_url = $arr['1x'];
			} else {
				$plugin_icon_url = get_template_directory_uri() . '/ti-about-page/images/placeholder_plugin.png';
			}

			return $plugin_icon_url;
		}

		/**
		 * Function used to create an action link for plugins
		 */
		public function create_action_link( $state, $slug ) {

			if ( ( $slug == 'intergeo-maps' ) || ( $slug == 'visualizer' ) ) {
				$plugin_root_file = 'index';
			} elseif ( $slug == 'adblock-notify-by-bweb' ) {
				$plugin_root_file = 'adblock-notify';
			} elseif ( $slug == 'wpforms-lite' ) {
				$plugin_root_file = 'wpforms';
			} else {
				$plugin_root_file = $slug;
			}

			switch ( $state ) {
				case 'install':
					return wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'install-plugin',
								'plugin' => $slug,
							),
							network_admin_url( 'update.php' )
						),
						'install-plugin_' . $slug
					);
					break;
				case 'deactivate':
					return add_query_arg(
						array(
							'action'        => 'deactivate',
							'plugin'        => rawurlencode( $slug . '/' . $plugin_root_file . '.php' ),
							'plugin_status' => 'all',
							'paged'         => '1',
							'_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . $slug . '/' . $plugin_root_file . '.php' ),
						),
						network_admin_url( 'plugins.php' )
					);
					break;
				case 'activate':
					return add_query_arg(
						array(
							'action'        => 'activate',
							'plugin'        => rawurlencode( $slug . '/' . $plugin_root_file . '.php' ),
							'plugin_status' => 'all',
							'paged'         => '1',
							'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $slug . '/' . $plugin_root_file . '.php' ),
						),
						network_admin_url( 'plugins.php' )
					);
					break;
			}
		}

		/**
		 * Getting started tab
		 */
		public function getting_started() {

			if ( ! empty( $this->config['getting_started'] ) ) {

				$getting_started = $this->config['getting_started'];

				if ( ! empty( $getting_started ) ) {

					echo '<div class="feature-section three-col">';

					foreach ( $getting_started as $getting_started_item ) {

						echo '<div class="col">';
						if ( ! empty( $getting_started_item['title'] ) ) {
							echo '<h3>' . $getting_started_item['title'] . '</h3>';
						}
						if ( ! empty( $getting_started_item['text'] ) ) {
							echo '<p>' . $getting_started_item['text'] . '</p>';
						}
						if ( ! empty( $getting_started_item['button_link'] ) && ! empty( $getting_started_item['button_label'] ) ) {

							echo '<p>';
							$button_class = '';
							if ( $getting_started_item['is_button'] ) {
								$button_class = 'button button-primary';
							}

							$count = 0;

							$actions_count = $this->get_required_actions();

							if ( ! empty( $actions_count ) ) {
								$count = count( $actions_count );
							}

							if ( $count > 0 ) {
								echo '<span class="dashicons dashicons-no-alt"></span>';
								$button_new_tab = '_self';
								if ( isset( $getting_started_item['is_new_tab'] ) ) {
									if ( $getting_started_item['is_new_tab'] ) {
										$button_new_tab = '_blank';
									}
								}

								if ( isset( $getting_started_item['button_link'] ) && isset( $getting_started_item['button_label'] ) ) {
									echo '<a target="' . $button_new_tab . '" href="' . $getting_started_item['button_link'] . '"class="' . $button_class . '">' . $getting_started_item['button_label'] . '</a>';
								}
							}

							echo '</p>';
						}

						echo '</div><!-- .col -->';
					}
					echo '</div><!-- .feature-section three-col -->';
				}
			}
		}

		/**
		 * Recommended Actions tab
		 */
		public function recommended_actions() {

			$recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();

			if ( ! empty( $recommended_actions ) ) {

				echo '<div class="feature-section action-required demo-import-boxed" id="plugin-filter">';

				$actions     = array();
				$req_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
				foreach ( $req_actions['content'] as $req_action ) {
					$actions[] = $req_action;
				}

				if ( ! empty( $actions ) && is_array( $actions ) ) {

					$ti_about_page_show_required_actions = get_option( $this->theme_slug . '_required_actions' );

					$hooray = true;

					foreach ( $actions as $action_key => $action_value ) {

						$hidden = false;

						if ( $ti_about_page_show_required_actions[ $action_value['id'] ] === false ) {
							$hidden = true;
						}
						if ( $action_value['check'] ) {
							continue;
						}

						echo '<div class="ti-about-page-action-required-box">';

						if ( ! $hidden ) {
							echo '<span data-action="dismiss" class="dashicons dashicons-visibility ti-about-page-required-action-button" id="' . esc_attr( $action_value['id'] ) . '"></span>';
						} else {
							echo '<span data-action="add" class="dashicons dashicons-hidden ti-about-page-required-action-button" id="' . esc_attr( $action_value['id'] ) . '"></span>';
						}

						if ( ! empty( $action_value['title'] ) ) {
							echo '<h3>' . wp_kses_post( $action_value['title'] ) . '</h3>';
						}

						if ( ! empty( $action_value['description'] ) ) {
							echo '<p>' . wp_kses_post( $action_value['description'] ) . '</p>';
						}

						if ( ! empty( $action_value['plugin_slug'] ) ) {

							$active = $this->check_if_plugin_active( $action_value['plugin_slug'] );
							$url    = $this->create_action_link( $active['needs'], $action_value['plugin_slug'] );
							$label  = '';

							switch ( $active['needs'] ) {

								case 'install':
									$class = 'install-now button';
									if ( ! empty( $this->config['recommended_actions']['install_label'] ) ) {
										$label = $this->config['recommended_actions']['install_label'];
									}
									break;
								case 'activate':
									$class = 'activate-now button button-primary';
									if ( ! empty( $this->config['recommended_actions']['activate_label'] ) ) {
										$label = $this->config['recommended_actions']['activate_label'];
									}
									break;
								case 'deactivate':
									$class = 'deactivate-now button';
									if ( ! empty( $this->config['recommended_actions']['deactivate_label'] ) ) {
										$label = $this->config['recommended_actions']['deactivate_label'];
									}
									break;
							}

							?>
							<p class="plugin-card-<?php echo esc_attr( $action_value['plugin_slug'] ); ?> action_button <?php echo ( $active['needs'] !== 'install' && $active['status'] ) ? 'active' : ''; ?>">
								<a data-slug="<?php echo esc_attr( $action_value['plugin_slug'] ); ?>"
									class="<?php echo esc_attr( $class ); ?>"
									href="<?php echo esc_url( $url ); ?>"> <?php echo esc_html( $label ); ?>
								</a>
							</p>

							<?php

						}
						echo '</div>';
					}
				}
				echo '</div>';
			}
		}

		/**
		 * Recommended plugins tab
		 */
		public function recommended_plugins() {
			$recommended_plugins = $this->config['recommended_plugins'];
			if ( ! empty( $recommended_plugins ) ) {
				if ( ! empty( $recommended_plugins['content'] ) && is_array( $recommended_plugins['content'] ) ) {

					echo '<div class="feature-section recommended-plugins three-col demo-import-boxed" id="plugin-filter">';

					foreach ( $recommended_plugins['content'] as $recommended_plugins_item ) {

						if ( ! empty( $recommended_plugins_item['slug'] ) ) {
							$info = $this->call_plugin_api( $recommended_plugins_item['slug'] );
							if ( ! empty( $info->icons ) ) {
								$icon = $this->get_plugin_icon( $info->icons );
							}

							$active = $this->check_if_plugin_active( $recommended_plugins_item['slug'] );

							if ( ! empty( $active['needs'] ) ) {
								$url = $this->create_action_link( $active['needs'], $recommended_plugins_item['slug'] );
							}

							echo '<div class="col plugin_box">';
							if ( ! empty( $icon ) ) {
								echo '<img src="' . esc_url( $icon ) . '" alt="plugin box image">';
							}
							if ( ! empty( $info->version ) ) {
								echo '<span class="version">' . ( ! empty( $this->config['recommended_plugins']['version_label'] ) ? esc_html( $this->config['recommended_plugins']['version_label'] ) : '' ) . esc_html( $info->version ) . '</span>';
							}
							if ( ! empty( $info->author ) ) {
								echo '<span class="separator"> | </span>' . wp_kses_post( $info->author );
							}

							if ( ! empty( $info->name ) && ! empty( $active ) ) {
								echo '<div class="action_bar ' . ( ( $active['needs'] !== 'install' && $active['status'] ) ? 'active' : '' ) . '">';
								echo '<span class="plugin_name">' . ( ( $active['needs'] !== 'install' && $active['status'] ) ? 'Active: ' : '' ) . esc_html( $info->name ) . '</span>';
								echo '</div>';

								$label = '';

								switch ( $active['needs'] ) {
									case 'install':
										$class = 'install-now button';
										if ( ! empty( $this->config['recommended_plugins']['install_label'] ) ) {
											$label = $this->config['recommended_plugins']['install_label'];
										}
										break;
									case 'activate':
										$class = 'activate-now button button-primary';
										if ( ! empty( $this->config['recommended_plugins']['activate_label'] ) ) {
											$label = $this->config['recommended_plugins']['activate_label'];
										}
										break;
									case 'deactivate':
										$class = 'deactivate-now button';
										if ( ! empty( $this->config['recommended_plugins']['deactivate_label'] ) ) {
											$label = $this->config['recommended_plugins']['deactivate_label'];
										}
										break;
								}

								echo '<span class="plugin-card-' . esc_attr( $recommended_plugins_item['slug'] ) . ' action_button ' . ( ( $active['needs'] !== 'install' && $active['status'] ) ? 'active' : '' ) . '">';
								echo '<a data-slug="' . esc_attr( $recommended_plugins_item['slug'] ) . '" class="' . esc_attr( $class ) . '" href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
								echo '</span>';
							}
							echo '</div><!-- .col.plugin_box -->';
						}
					}

					echo '</div><!-- .recommended-plugins -->';

				}
			}
		}

		/**
		 * Child themes
		 */
		public function child_themes() {
			echo '<div id="child-themes" class="ti-about-page-tab-pane">';
			$child_themes = isset( $this->config['child_themes'] ) ? $this->config['child_themes'] : array();
			if ( ! empty( $child_themes ) ) {
				if ( ! empty( $child_themes['content'] ) && is_array( $child_themes['content'] ) ) {
					echo '<div class="ti-about-row">';
					for ( $i = 0; $i < count( $child_themes['content'] ); $i ++ ) {
						if ( ( $i !== 0 ) && ( $i / 3 === 0 ) ) {
							echo '</div>';
							echo '<div class="ti-about-row">';
						}
						$child = $child_themes['content'][ $i ];
						if ( ! empty( $child['image'] ) ) {
							echo '<div class="ti-about-child-theme">';
							echo '<div class="ti-about-page-child-theme-image">';
							echo '<img src="' . esc_url( $child['image'] ) . '" alt="' . ( ! empty( $child['image_alt'] ) ? esc_html( $child['image_alt'] ) : '' ) . '" />';
							if ( ! empty( $child['title'] ) ) {
								echo '<div class="ti-about-page-child-theme-details">';
								if ( $child['title'] != $this->theme_name ) {
									echo '<div class="theme-details">';
									echo '<span class="theme-name">' . $child['title'] . '</span>';
									if ( ! empty( $child['download_link'] ) && ! empty( $child_themes['download_button_label'] ) ) {
										echo '<a href="' . esc_url( $child['download_link'] ) . '" class="button button-primary install right">' . esc_html( $child_themes['download_button_label'] ) . '</a>';
									}
									if ( ! empty( $child['preview_link'] ) && ! empty( $child_themes['preview_button_label'] ) ) {
										echo '<a class="button button-secondary preview right" target="_blank" href="' . $child['preview_link'] . '">' . esc_html( $child_themes['preview_button_label'] ) . '</a>';
									}
									echo '</div>';
								}
								echo '</div>';
							}
							echo '</div><!--ti-about-page-child-theme-image-->';
							echo '</div><!--ti-about-child-theme-->';
						}// End if().
					}// End for().
					echo '</div>';
				}// End if().
			}// End if().
			echo '</div>';
		}

		/**
		 * Support tab
		 */
		public function support() {
			echo '<div class="feature-section three-col">';

			if ( ! empty( $this->config['support_content'] ) ) {

				$support_steps = $this->config['support_content'];

				if ( ! empty( $support_steps ) ) {

					foreach ( $support_steps as $support_step ) {

						echo '<div class="col">';

						if ( ! empty( $support_step['title'] ) ) {
							echo '<h3>';
							if ( ! empty( $support_step['icon'] ) ) {
								echo '<i class="' . $support_step['icon'] . '"></i>';
							}
							echo $support_step['title'];
							echo '</h3>';
						}

						if ( ! empty( $support_step['text'] ) ) {
							echo '<p><i>' . $support_step['text'] . '</i></p>';
						}

						if ( ! empty( $support_step['button_link'] ) && ! empty( $support_step['button_label'] ) ) {

							echo '<p>';
							$button_class = '';
							if ( $support_step['is_button'] ) {
								$button_class = 'button button-primary';
							}

							$button_new_tab = '_self';
							if ( isset( $support_step['is_new_tab'] ) ) {
								if ( $support_step['is_new_tab'] ) {
									$button_new_tab = '_blank';
								}
							}
							echo '<a target="' . $button_new_tab . '" href="' . $support_step['button_link'] . '"class="' . $button_class . '">' . $support_step['button_label'] . '</a>';
							echo '</p>';
						}

						echo '</div>';

					}
				}
			}

			echo '</div>';
		}

		/**
		 * Changelog tab
		 */
		public function changelog() {
			$changelog = $this->parse_changelog();
			if ( ! empty( $changelog ) ) {
				echo '<div class="featured-section changelog">';
				foreach ( $changelog as $release ) {
					if ( ! empty( $release['title'] ) ) {
						echo '<h2>' . $release['title'] . ' </h2 > ';
					}
					if ( ! empty( $release['changes'] ) ) {
						echo implode( '<br/>', $release['changes'] );
					}
				}
				echo '</div><!-- .featured-section.changelog -->';
			}
		}

		/**
		 * Return the releases changes array.
		 *
		 * @return array The releases array.
		 */
		private function parse_changelog() {
			WP_Filesystem();
			global $wp_filesystem;
			$changelog = $wp_filesystem->get_contents( get_template_directory() . '/CHANGELOG.md' );
			if ( is_wp_error( $changelog ) ) {
				$changelog = '';
			}
			$changelog = explode( PHP_EOL, $changelog );
			$releases  = array();
			foreach ( $changelog as $changelog_line ) {
				if ( strpos( $changelog_line, '**Changes:**' ) !== false || empty( $changelog_line ) ) {
					continue;
				}
				if ( substr( $changelog_line, 0, 3 ) === '###' ) {
					if ( isset( $release ) ) {
						$releases[] = $release;
					}
					$release = array(
						'title'   => substr( $changelog_line, 3 ),
						'changes' => array(),
					);
				} else {
					$release['changes'][] = $changelog_line;
				}
			}

			return $releases;
		}

		/**
		 * Free vs PRO tab
		 */
		public function free_pro() {
			$free_pro = isset( $this->config['free_pro'] ) ? $this->config['free_pro'] : array();
			if ( ! empty( $free_pro ) ) {
				if ( ! empty( $free_pro['free_theme_name'] ) && ! empty( $free_pro['pro_theme_name'] ) && ! empty( $free_pro['features'] ) && is_array( $free_pro['features'] ) ) {
					echo '<div class="feature-section">';
					echo '<div id="free_pro" class="ti-about-page-tab-pane ti-about-page-fre-pro">';
					echo '<table class="free-pro-table">';
					echo '<thead>';
					echo '<tr>';
					echo '<th></th>';
					echo '<th>' . esc_html( $free_pro['free_theme_name'] ) . '</th>';
					echo '<th>' . esc_html( $free_pro['pro_theme_name'] ) . '</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					foreach ( $free_pro['features'] as $feature ) {
						echo '<tr>';
						if ( ! empty( $feature['title'] ) || ! empty( $feature['description'] ) ) {
							echo '<td>';
							if ( ! empty( $feature['title'] ) ) {
								echo '<h3>' . wp_kses_post( $feature['title'] ) . '</h3>';
							}
							if ( ! empty( $feature['description'] ) ) {
								echo '<p>' . wp_kses_post( $feature['description'] ) . '</p>';
							}
							echo '</td>';
						}
						if ( ! empty( $feature['is_in_lite'] ) && ( $feature['is_in_lite'] == 'true' ) ) {
							echo '<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>';
						} else {
							echo '<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>';
						}
						if ( ! empty( $feature['is_in_pro'] ) && ( $feature['is_in_pro'] == 'true' ) ) {
							echo '<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>';
						} else {
							echo '<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>';
						}
						echo '</tr>';

					}
					if ( ! empty( $free_pro['pro_theme_link'] ) && ! empty( $free_pro['get_pro_theme_label'] ) ) {
						echo '<tr class="ti-about-page-text-center">';
						echo '<td></td>';
						echo '<td colspan="2"><a href="' . esc_url( $free_pro['pro_theme_link'] ) . '" target="_blank" class="button button-primary button-hero">' . wp_kses_post( $free_pro['get_pro_theme_label'] ) . '</a></td>';
						echo '</tr>';
					}
					echo '</tbody>';
					echo '</table>';
					echo '</div>';
					echo '</div>';

				}
			}
		}

		/**
		 * Load css and scripts for the about page
		 */
		public function style_and_scripts( $hook_suffix ) {

			// this is needed on all admin pages, not just the about page, for the badge action count in the WordPress main sidebar
			wp_enqueue_style( 'ti-about-page-css', get_template_directory_uri() . '/ti-about-page/css/ti_about_page_css.css' );

			if ( 'appearance_page_' . $this->theme_slug . '-welcome' == $hook_suffix ) {

				wp_enqueue_script( 'ti-about-page-js', get_template_directory_uri() . '/ti-about-page/js/ti_about_page_scripts.js', array( 'jquery' ) );

				wp_enqueue_style( 'plugin-install' );
				wp_enqueue_script( 'plugin-install' );
				wp_enqueue_script( 'updates' );

				$recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
				$required_actions    = $this->get_required_actions();
				wp_localize_script(
					'ti-about-page-js',
					'tiAboutPageObject',
					array(
						'nr_actions_required' => count( $required_actions ),
						'ajaxurl'             => admin_url( 'admin-ajax.php' ),
						'template_directory'  => get_template_directory_uri(),
						'activating_string'   => __( 'Activating', 'zerif-lite' ),
					)
				);

			}

		}

		/**
		 * Return the valid array of required actions.
		 *
		 * @return array The valid array of required actions.
		 */
		private function get_required_actions() {
			$saved_actions = get_option( $this->theme_slug . '_required_actions' );
			if ( ! is_array( $saved_actions ) ) {
				$saved_actions = array();
			}
			$req_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
			$valid       = array();
			foreach ( $req_actions['content'] as $req_action ) {
				if ( ( ! isset( $req_action['check'] ) || ( isset( $req_action['check'] ) && ( $req_action['check'] == false ) ) ) && ( ! isset( $saved_actions[ $req_action['id'] ] ) ) ) {
					$valid[] = $req_action;
				}
			}

			return $valid;
		}

		/**
		 * Dismiss required actions
		 */
		public function dismiss_required_action_callback() {

			$recommended_actions = array();
			$req_actions         = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
			foreach ( $req_actions['content'] as $req_action ) {
				$recommended_actions[] = $req_action;
			}

			$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

			echo esc_html( wp_unslash( $action_id ) ); /* this is needed and it's the id of the dismissable required action */

			if ( ! empty( $action_id ) ) {

				/* if the option exists, update the record for the specified id */
				if ( get_option( $this->theme_slug . '_required_actions' ) ) {

					$ti_about_page_show_required_actions = get_option( $this->theme_slug . '_required_actions' );

					switch ( esc_html( $_GET['todo'] ) ) {
						case 'add':
							$ti_about_page_show_required_actions[ absint( $action_id ) ] = true;
							break;
						case 'dismiss':
							$ti_about_page_show_required_actions[ absint( $action_id ) ] = false;
							break;
					}

					update_option( $this->theme_slug . '_required_actions', $ti_about_page_show_required_actions );

					/* create the new option,with false for the specified id */
				} else {

					$ti_about_page_show_required_actions_new = array();

					if ( ! empty( $recommended_actions ) ) {

						foreach ( $recommended_actions as $ti_about_page_required_action ) {

							if ( $ti_about_page_required_action['id'] == $action_id ) {
								$ti_about_page_show_required_actions_new[ $ti_about_page_required_action['id'] ] = false;
							} else {
								$ti_about_page_show_required_actions_new[ $ti_about_page_required_action['id'] ] = true;
							}
						}

						update_option( $this->theme_slug . '_required_actions', $ti_about_page_show_required_actions_new );

					}
				}
			}
		}

	}
}
