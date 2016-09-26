<?php
/**
 * @author: Ignacio Cruz (igmoweb)
 * @version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get a plugin option.
 *
 * All options are prefixed with the plugin slug
 *
 * @param $name
 * @param bool $default
 *
 * @return mixed|void
 */
function {{plugin_name}}_get_option( $name, $default = false ) {
	return get_option( {{plugin_name}}_slug() . '-' . $name, $default );
}

/**
 * Update a plugin option.
 *
 * @param string $name
 * @param mixed $value
 *
 * @return mixed|void
 */
function {{plugin_name}}_update_option( $name, $value ) {
	return update_option( {{plugin_name}}_slug() . '-' . $name, $value );
}

/**
 * Get all settings for a given group
 *
 * @param string $group. Default empty string
 *
 * @return array
 */
function {{plugin_name}}_get_settings( $group = '' ) {
	$option_name = 'settings';
	if ( $group ) {
		$option_name .= "-{$group}";
	}

	return wp_parse_args(
		{{plugin_name}}_get_option( $option_name, array() ),
		{{plugin_name}}_get_default_settings( $group )
	);
}

/**
 * Return a single setting value
 *
 * @param string $name
 * @param string $group
 *
 * @return bool|mixed
 */
function {{plugin_name}}_get_setting( $name, $group = '' ) {
	$settings = {{plugin_name}}_get_settings( $group );
	return isset( $settings[ $name ] ) ? $settings[ $name ] : false;
}

/**
 * Return the default settings for a given group
 *
 * @param string $group Default empty string
 *
 * @return mixed|void
 */
function {{plugin_name}}_get_default_settings( $group = '' ) {
	$all_defaults = array(
		'' => array(),
		'group1' => array()
	);

	$defaults = array();
	if ( isset( $all_defaults[ $group ] ) ) {
		$defaults = $all_defaults[ $group ];
	}

	/**
	 * Filters the default plugin settings
	 *
	 * @var array $defaults Default settings for a given group
	 * @var string $group Group slug
	 */
	return apply_filters( '{{plugin_name}}_default_settings', $defaults, $group );
}

/**
 * Update a single setting
 *
 * @param $name
 * @param $value
 * @param string $group
 */
function {{plugin_name}}_update_setting( $name, $value, $group = '' ) {
	$settings = {{plugin_name}}_get_settings( $group );
	$settings[ $name ] = $value;

}

/**
 * Updates a group of settings
 *
 * @param array $new_settings
 * @param string $group
 */
function {{plugin_name}}_update_settings( $new_settings, $group = '' ) {
	$option_name = 'settings';
	if ( $group ) {
		$option_name .= "-{$group}";
	}

	{{plugin_name}}_update_option( $option_name, $new_settings );
}