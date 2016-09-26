<?php
/**
 * @author: Ignacio Cruz (igmoweb)
 * @version:
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '{{Plugin_Name}}_Core' ) ) {

	/**
	 * Class {{Plugin_Name}}_Core
	 */
	class {{Plugin_Name}}_Core {

		public function __construct() {
			$this->includes();
		}

		private function includes() {
			include_once 'helpers/helpers-options.php';
		}

	}
}
