<?php
/**
 * @author: Ignacio Cruz (igmoweb)
 * @version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @see Plugin_Name_Admin::view()
 * @todo replace
 */
function plugin_name_load_admin_view( $path, $args = array(), $echo = true ) {
	// @todo replace
	$plugin = plugin_name();
	$plugin->admin->view( $path, $args, $echo );
}