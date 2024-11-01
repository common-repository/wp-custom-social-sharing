<?php
/**
 * Plugin Name: WP Custom Social Sharing
 * Description: The best and simple WordPress social sharing plugin to display social media icons on your websites. This plugin allows your visitors to share a post, news, or articles to different social media platforms.
 * Version: 2.1
 * Author: WP Tech Giants
 * Author URI: https://wptechgiants.com/
 * Text Domain: wcss-social-share
 * License: GPLv3 or later
 *
 * @package WP_Custom_social_sharing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Wcss_Social_Share' ) ) {
	/**
	 * Wcss_Social_share class manages all the backend attributes of plugin.
	 */
	class Wcss_Social_Share {
		/**
		 * Constructor Class
		 */
		public function __construct() {

			$this->wcss_define_constants();

			$this->wcss_default_options_settings();

			add_action( 'admin_menu', array( $this, 'wcss_add_menu_item' ) ); // add menu options to the admin panel’s.

			add_action( 'admin_init', array( $this, 'wcss_register_settings' ) ); // registers a setting and validate its data.

			add_action( 'admin_enqueue_scripts', array( $this, 'wcss_admin_enqueues' ) ); // enqueue scripts for admin purposes only.

			add_action( 'plugins_loaded', array( $this, 'includes' ) ); // fires once activated plugin is loaded.

		}


		/**
		 * Define Plugin Constant
		 */
		public function wcss_define_constants() {

			if ( ! defined( 'WCSS_PLUGIN_DIR' ) ) {
				define( 'WCSS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}

			if ( ! defined( 'WCSS_PLUGIN_URL' ) ) {
				define( 'WCSS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
			}
		}


		/**
		 * Add Option Page. Comes under Settings menu in backend.
		 */
		public function wcss_add_menu_item() {
			add_options_page( __( 'WP Custom Social Sharing', 'wcss-social-share' ), __( 'Social Sharing', 'wcss-social-share' ), 'manage_options', 'wcss-social-share', array( $this, 'wcss_settings_page' ) );
		}


		/**
		 * Call Settings html content
		 */
		public function wcss_settings_page() {

			require WCSS_PLUGIN_DIR . 'admin-view/admin-settings-page.php';
		}


		/**
		 * Admin enqueue scripts
		 */
		public function wcss_admin_enqueues() {

			$wcss_front = new Wcss_Front_Manager();

			$wcss_front->wcss_dequeue_other_fontawesome(); // dequeue font-awesome if exists.

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'wcss-admin-fontawesome', WCSS_PLUGIN_URL . 'assets/css/all.min.css' );

			wp_enqueue_style( 'wcss-admin-style', WCSS_PLUGIN_URL . 'assets/css/wcss-admin-style.css', '', time() );
			wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap' );

			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js' );
			wp_enqueue_script( 'wcss-admin-script', WCSS_PLUGIN_URL . 'assets/js/wcss-admin-script.js', array( 'wp-color-picker' ), '2.1', true );
		}

		/**
		 * Load Classes for front-end purposes
		 */
		public function includes() {

			if ( ! class_exists( 'Wcss_Front_Manager' ) ) {
				include_once WCSS_PLUGIN_DIR . 'includes/class-wcss-front-manager.php';
			}

		}

		/**
		 * Sanitize and register a setting
		 */
		public function wcss_register_settings() {
			register_setting( 'wcss_settings_options', 'wcss_settings_options', array( $this, 'wcss_sanitize_settings_options' ) );
		}

		/**
		 * Sanitize and return field/option  value
		 */
		public function wcss_sanitize_settings_options() {

			if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'wcss_settings_options-options' ) ) {
				return false;
			}

			$wcss_settings_options = get_option( 'wcss_settings_options' );
			$wcss_options          = $wcss_settings_options['wcss_social_sharing'];
			$variables_array       = array();
			$input_options         = array();
			$posts_variables       = stripslashes_deep( $_POST['wcss_social_sharing'] );

			$social_options_array = array( 'facebook', 'twitter', 'pinterest', 'linkedin', 'blogger', 'buffer', 'digg', 'email', 'flipboard', 'odnoklassniki', 'pocket', 'reddit', 'skype', 'stumbleupon', 'telegram', 'tumblr', 'whatsapp', 'xing' );

			$enabled_social_icons = array();

			foreach ( $social_options_array as $option_value ) {

				if ( isset( $posts_variables[ $option_value ]['enable'] ) && ! empty( $posts_variables[ $option_value ]['enable'] ) && 'yes' === $posts_variables[ $option_value ]['enable'] ) {

					$input_options[ $option_value ]['enable'] = 'yes';

					// Check if the button is enabled and push to the enabled array.
					if ( ! in_array( $option_value, $enabled_social_icons ) ) {
						array_push( $enabled_social_icons, $option_value );
					}
				} else {
					$input_options[ $option_value ]['enable'] = '';
				}

				// validate all the social media icon colors.
				$input_options[ $option_value ]['color'] = ( ! empty( $posts_variables[ $option_value ]['color'] ) ) ? sanitize_hex_color( $posts_variables[ $option_value ]['color'] ) : $wcss_options[ $option_value ]['color'];
			}

			$variables_array['wcss_social_sharing'] = $input_options; // assign input variable to $variables_array.

			$variables_array['wcss_social_sharing']['post_type'] = ( isset( $posts_variables['post_type'] ) && ! empty( $posts_variables['post_type'] ) ) ? $posts_variables['post_type'] : array(); // enable post type variables.

			$variables_array['wcss_social_sharing']['enabled_icons'] = $enabled_social_icons; // enable post type variables.

			$variables_array['wcss_social_sharing']['button_order'] = ( isset( $posts_variables['button_order'] ) && ! empty( $posts_variables['button_order'] ) ) ? sanitize_text_field( $posts_variables['button_order'] ) : 'facebook,twitter,pinterest,linkedin,blogger,buffer,digg,email,flipboard,odnoklassniki,pocket,reddit,skype,stumbleupon,telegram,tumblr,whatsapp,xing'; // assign the order of icon to display on the front.

			$variables_array['wcss_social_sharing']['icon_position'] = ( isset( $posts_variables['icon_position'] ) && ! empty( $posts_variables['icon_position'] ) ) ? $posts_variables['icon_position'] : array(); // assign the position of icons to display in the front.

			$variables_array['wcss_social_sharing']['button_size'] = ( isset( $posts_variables['button_size'] ) && ! empty( $posts_variables['button_size'] ) ) ? sanitize_text_field( $posts_variables['button_size'] ) : 'small'; // size of the social icons.

			$variables_array['wcss_social_sharing']['default_count'] = ( isset( $posts_variables['default_count'] ) && ! empty( $posts_variables['default_count'] ) ) ? intval( $posts_variables['default_count'] ) : '';

			$variables_array['wcss_social_sharing']['button_label'] = ( isset( $posts_variables['button_label'] ) && ! empty( $posts_variables['button_label'] ) ) ? sanitize_text_field( $posts_variables['button_label'] ) : '';

			$variables_array['wcss_social_sharing']['border_radius'] = ( isset( $posts_variables['border_radius'] ) && ! empty( $posts_variables['border_radius'] ) ) ? intval( $posts_variables['border_radius'] ) : 0;

			return $variables_array;
		}


		/**
		 * Return default admin form setting.
		 */
		public function wcss_default_options_settings() {
			$default_setting = array(
				'wcss_social_sharing' => array(
					'facebook'      => array(
						'enable' => 'yes',
						'color'  => '#3b5998',
					),
					'twitter'       => array(
						'enable' => 'yes',
						'color'  => '#00acee',
					),
					'pinterest'     => array(
						'enable' => 'yes',
						'color'  => '#C92228',
					),
					'linkedin'      => array(
						'enable' => 'yes',
						'color'  => '#0077b5',
					),
					'blogger'       => array(
						'enable' => 'yes',
						'color'  => '#ff8b13',
					),
					'buffer'        => array(
						'enable' => 'yes',
						'color'  => '#3e3e3e',
					),
					'digg'          => array(
						'enable' => 'yes',
						'color'  => '#3e3e3e',
					),
					'email'         => array(
						'enable' => 'yes',
						'color'  => '#f4cd0b',
					),
					'flipboard'     => array(
						'enable' => 'yes',
						'color'  => '#f43d3d',
					),
					'odnoklassniki' => array(
						'enable' => 'yes',
						'color'  => '#ff8321',
					),
					'pocket'        => array(
						'enable' => 'yes',
						'color'  => '#ff384b',
					),
					'reddit'        => array(
						'enable' => 'yes',
						'color'  => '#ff4500',
					),
					'skype'         => array(
						'enable' => 'yes',
						'color'  => '#06bcff',
					),
					'stumbleupon'   => array(
						'enable' => 'yes',
						'color'  => '#eb4924',
					),
					'telegram'      => array(
						'enable' => 'yes',
						'color'  => '#2ca5e0',
					),
					'tumblr'        => array(
						'enable' => 'yes',
						'color'  => '#3e3e3e',
					),
					'whatsapp'      => array(
						'enable' => 'yes',
						'color'  => '#13d25a',
					),
					'xing'          => array(
						'enable' => 'yes',
						'color'  => '#20a5a5',
					),
					'post_type'     => array(),
					'button_order'  => 'facebook,twitter,pinterest,linkedin,blogger,buffer,digg,email,flipboard,odnoklassniki,pocket,reddit,skype,stumbleupon,telegram,tumblr,whatsapp,xing',
					'icon_position' => array(),
					'button_size'   => 'medium',
					'button_label'  => 'Share This:',
					'border_radius' => 0,
					'default_count' => 3,
					'enabled_icons' => array( 'facebook', 'twitter', 'pinterest', 'linkedin', 'blogger', 'buffer', 'digg', 'email', 'flipboard', 'odnoklassniki', 'pocket', 'reddit', 'skype', 'stumbleupon', 'telegram', 'tumblr', 'whatsapp', 'xing' ),
				),
			);

			$settings = get_option( 'wcss_settings_options' );

			$default_setting = apply_filters( 'wcss_default_settings', $default_setting );

			if ( empty( $settings ) ) {
				update_option( 'wcss_settings_options', $default_setting );
			}

			return $default_setting;
		}
	}

	$wcss = new Wcss_Social_Share();
}
