<?php
/**
 * @author: Ignacio Cruz (igmoweb)
 * @version:
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Plugin_Name_Core' ) ) {

	/**
	 * Class Plugin_Name_Core
	 */
	class Plugin_Name_Core {

		public function __construct() {
			$this->includes();
		}

		private function includes() {
			include_once 'helpers/helpers-options.php';
		}

	}
}
