<?php
/**
 * @author: Ignacio Cruz (igmoweb)
 * @version: 1.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '{{Plugin_Name}}_Activator' ) ) {
	/**
	 * Class {{Plugin_Name}}_Activator
	 *
	 * Manages the activation of the plugin
	 */
	class {{Plugin_Name}}_Activator {

		/**
		 * Run on plugin activation
		 */
		public static function activate() {

		}

		/**
		 * Run on plugin deactivation
		 */
		public static function deactivate() {

		}

		/**
		 * Run on plugin uninstall
		 */
		public static function uninstall() {

		}

		/**
		 * Run on plugin upgrade
		 */
		public static function upgrade() {

		}

	}
}
