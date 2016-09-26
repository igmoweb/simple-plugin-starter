<?php
/*
Plugin Name:    Plugin Name
Plugin URI:
Description:
Version:        1.0
Author:         igmoweb
Author URI:
License:        GPL2
License URI:    https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:    /languages
Text Domain:    {{plugin-name}}
*/

/**
 * @author: Ignacio Cruz (igmoweb)
 * @version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the plugin current version
 *
 * @return string
 */
function {{plugin_name}}_version() {
	return '1.0';
}

if ( ! class_exists( '{{Plugin_Name}}_Loader' ) ) {
	/**
	 * Class {{Plugin_Name}}_Loader
	 *
	 * The plugin main loader. Initializes the plugin
	 */
	class {{Plugin_Name}}_Loader {

		private static $instance;

		/**
		 * @var {{Plugin_Name}}_Loader|null
		 */
		public $admin;

		/**
		 * @var {{Plugin_Name}}_Core
		 */
		public $core;

		/**
		 * Singleton Pattern
		 *
		 * Gets the instance of the class
		 *
		 * @since 1.0
		 */
		public static function get_instance() {
			if ( empty( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			$this->includes();
			$this->init();

			add_action( 'init', array( $this, 'maybe_upgrade' ) );
		}

		private function includes() {
			if ( is_admin() ) {
				include_once 'admin/class-plugin-admin.php';
			}

			include_once 'core/class-plugin-core.php';
		}

		/**
		 * Initializes the plugin
		 */
		private function init() {
			if ( is_admin() ) {
				// Load admin only when we are in admin
				$this->admin = new {{Plugin_Name}}_Admin();
			}

			$this->core = new {{Plugin_Name}}_Core();
		}

		public function maybe_upgrade() {
			$saved_version = {{plugin_name}}_get_option( 'version' );
			if ( $saved_version === {{plugin_name}}_version() ) {
				// Nothing to upgrade
				return;
			}

			include_once( 'core/classes/class-plugin-activator.php' );

			if ( false === $saved_version ) {
				// The plugin has not been activated.
				// This usually happens on a multisite when the plugin
				// is network activated
				{{Plugin_Name}}_Activator::activate();
				return;
			}

			{{Plugin_Name}}_Activator::upgrade();
		}


	}

}



/**
 * Return the plugin unique instance
 *
 * @return {{Plugin_Name}}_Loader
 */
function {{plugin_name}}() {
	return {{Plugin_Name}}_Loader::get_instance();
}
add_action( 'plugins_loaded', 'plugin_name' );


/**
 * Return the plugin name slug
 *
 * @return string
 */
function {{plugin_name}}_slug() {
	return '{{plugin-name}}';
}



/**
 * Return the plugin URL
 *
 * @return string
 */
function {{plugin_name}}_url() {
	return trailingslashit( plugin_dir_url( __FILE__ ) );
}


/**
 * Return the plugin absolute path
 *
 * @return string
 */
function {{plugin_name}}_dir() {
	return trailingslashit( plugin_dir_path( __FILE__ ) );
}

/**
 * Activate the plugin
 */
function {{plugin_name}}_activate() {
	include_once( 'core/classes/class-plugin-activator.php' );
	{{Plugin_Name}}_Activator::activate();
}
register_activation_hook( __FILE__, '{{plugin_name}}_activate' );

/**
 * Deactivate the plugin
 */
function {{plugin_name}}_deactivate() {
	include_once( 'core/classes/class-plugin-activator.php' );
	{{Plugin_Name}}_Activator::deactivate();
}
register_deactivation_hook( __FILE__, '{{plugin_name}}_activate' );

/**
 * Uninstall the plugin
 */
function {{plugin_name}}_uninstall() {
	include_once( 'core/classes/class-plugin-activator.php' );
	{{Plugin_Name}}_Activator::uninstall();
}
register_uninstall_hook( __FILE__, '{{plugin_name}}_uninstall' );