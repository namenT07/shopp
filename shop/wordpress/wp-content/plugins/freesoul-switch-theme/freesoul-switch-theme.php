<?php
/*
Plugin Name: Freesoul Switch Theme
Description: Freesoul Switch Theme allows you to load a different theme for a specific page, both in a permanent way and just for debugging..
Author: Jose Mortellaro
Author URI: https://josemortellaro.com
Text Domain: eos-sw
Domain Path: /languages/
Version: 1.0.7
*/
/*  Copyright 2018 Freesoul Design Studio (email: info at freesoul-design-studio.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

//Definitions
define( 'EOS_SW_VERSION','1.0.7' );
define( 'EOS_SW_NEED_UPDATE_MU',false );
define( 'EOS_SW_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'EOS_SW_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );
define( 'EOS_SW_PLUGIN_BASE_NAME', untrailingslashit( plugin_basename( __FILE__ ) ) );

//Actions triggered after plugin activation or after a new site of a multisite installation is created
function eos_sw_initialize_plugin(){
	require EOS_SW_PLUGIN_DIR.'/plugin-activation.php';
}
register_activation_hook( __FILE__, 'eos_sw_initialize_plugin' );

//Actions triggered after plugin deaactivation
function eos_sw_deactivate_plugin(){
	if( !is_multisite() && file_exists( WPMU_PLUGIN_DIR.'/eos-switch-theme.php' ) ){
		unlink( WPMU_PLUGIN_DIR.'/eos-switch-theme.php' );
	}
}
register_deactivation_hook( __FILE__, 'eos_sw_deactivate_plugin' );

//It loads plugin translation files
function eos_load_sw_plugin_textdomain(){
	load_plugin_textdomain( 'eos-sw', FALSE,EOS_SW_PLUGIN_DIR . '/languages/' );
}
add_action( 'admin_init', 'eos_load_sw_plugin_textdomain' );

//Filter function to read plugin translation files
function eos_sw_load_translation_file( $mofile, $domain ) {
	if ( 'eos-sw' === $domain ) {
		$loc = function_exists( 'get_user_locale' ) ? get_user_locale() : get_locale();
		$mofile = EOS_SW_PLUGIN_DIR . '/languages/eos-sw-' . $loc . '.mo';
	}
	return $mofile;
}

if( is_admin() ){
	add_filter( 'load_textdomain_mofile', 'eos_sw_load_translation_file',99,2 ); //loads plugin translation files
	//Loads plugin text domain
	require EOS_SW_PLUGIN_DIR . '/inc/eos-sw-metaboxes.php'; //file including the needed functions for the metaboxes
	require EOS_SW_PLUGIN_DIR . '/admin/eos-sw-admin.php'; //file including the functions for back-end
	if( ( isset( $_GET['post'] ) && isset( $_GET['action'] ) && $_GET['action'] === 'edit' ) ){
		add_action( 'admin_enqueue_scripts', 'eos_sw_style',10 ); //we enqueue the style for back-end
		add_action( 'admin_enqueue_scripts', 'eos_sw_scripts',10 ); //we enqueue the scripts for back-end
	}
}
/**
 * Enqueue scripts for back-end
 */
function eos_sw_scripts() {
	wp_enqueue_script( 'eos-sw-backend',EOS_SW_PLUGIN_URL.'/admin/js/eos-sw-backend.js', array( 'jquery' ), '' );
}
/**
 * Enqueue style for back-end
 */
function eos_sw_style() {
	wp_enqueue_style( 'eos-sw-admin-style',EOS_SW_PLUGIN_URL.'/admin/css/eos-sw-style.css' );
}
