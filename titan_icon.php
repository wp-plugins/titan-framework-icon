<?php
/*
Plugin Name: Titan Framework Icon
Description: Add functionality to use Font Awesome Icon as a new type of option field for Titan Framework. This is an extended addon for Titan Framework plugin. This pluign requires Titan Framework plugin.
Author: oneTarek, MrRomi-1
Author URI: http://onetarek.com
Plugin URI: http://onetarek.com/my-wordpress-plugins/titan-framework-icon/
Version: 1.1
*/


define ( 'TICON_VERSION', '1.1');
define ( 'TICON_PLUGIN_FILE', __FILE__);
define ( 'TICON_PLUGIN_DIR', dirname(__FILE__)); // Plugin Directory
define ( 'TICON_PLUGIN_URL', plugin_dir_url(__FILE__)); // with forward slash (/). Plugin URL (for http requests).


function ticon_load_files(){
	require_once('class-option-icon.php' );
}

add_action("tf_create_options", "ticon_load_files");//A hook by Titan Framework
/**
 * Enqueue scripts and styles
 */
function ticon_scripts() {
	// load Font Awesome css
	wp_enqueue_style( 'ticon-font-awesome', TICON_PLUGIN_URL. 'assets/css/font-awesome.min.css', false, TICON_VERSION );

        // load Font Awesome css
	wp_enqueue_style( 'ticon-fontawesome-iconpicker', TICON_PLUGIN_URL. 'assets/css/fontawesome-iconpicker.min.css', false, TICON_VERSION );
	wp_enqueue_script( 'ticon-fontawesome-iconpicker', TICON_PLUGIN_URL. 'assets/js/fontawesome-iconpicker.js', array(), TICON_VERSION , true );
}
add_action( 'wp_enqueue_scripts', 'ticon_scripts' );


function ticon_admin_style() {
        wp_register_style( 'ticon_admin_css', TICON_PLUGIN_URL. 'assets/css/font-awesome.min.css', false, TICON_VERSION );
        wp_enqueue_style( 'ticon_admin_css' );
        wp_register_style( 'fa-iconpicker-css', TICON_PLUGIN_URL. 'assets/css/fontawesome-iconpicker.css', false, TICON_VERSION );
        wp_enqueue_style( 'fa-iconpicker-css' );
        
        
            
        wp_register_script( 'jq-js', 'http://code.jquery.com/jquery-1.11.1.min.js', true, TICON_VERSION );
        wp_enqueue_script( 'jq-js' );
        //wp_enqueue_script("jquery");
        wp_register_script( 'fa-iconpicker-js', TICON_PLUGIN_URL. 'assets/js/fontawesome-iconpicker.js', true, TICON_VERSION );
        wp_enqueue_script( 'fa-iconpicker-js' );
        wp_register_script( 'fa-popup', TICON_PLUGIN_URL. 'assets/js/popup.js', true, TICON_VERSION );
        wp_enqueue_script( 'fa-popup' );
        
}
add_action( 'admin_enqueue_scripts', 'ticon_admin_style' );
