<?php
/**
 * @author: Ignacio Cruz (igmoweb)
 * @version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '{{Plugin_Name}}_Admin' ) ) {

	/**
	 * Class {{Plugin_Name}}_Admin
	 *
	 * Manages the admin side of the plugin
	 */
	class {{Plugin_Name}}_Admin {

		/**
		 * Save a list of {{Plugin_Name}}_Admin_Page instances
		 * @var array
		 */
		public $pages = array();

		public function __construct() {
			$this->includes();

			add_action( 'admin_menu', array( $this, 'register_menus' ) );
		}

		private function includes() {
			include_once( 'admin-functions.php' );
			include_once( 'classes/class-plugin-admin-page.php' );
		}

		/**
		 * Register the admin menus
		 *
		 * Use $this->pages for this purpose
		 */
		public function register_menus() {
			//
		}

		/**
		 * Load an admin view inside views folder
		 *
		 * @param string $path path to the view file with no extension. Can be something like 'subset/subfolder/my-view'
		 * @param array $args List of variables to be passed to the view file
		 * @param bool $echo If return or render the content
		 *
		 * @return string
		 */
		public function view( $path, $args = array(), $echo = true ) {
			$file = {{plugin_name}}_dir() . "admin/views/$path.php";
			$content = '';

			if ( is_file ( $file ) ) {

				ob_start();

				extract( $args );

				include( $file );

				$content = ob_get_clean();
			}

			if ( ! $echo ) {
				return $content;
			}

			echo $content;
		}
	}
}
