<?php

/*
Plugin Name: 1 UW-Madison Web Components
Plugin URI: NA
Description:  plugin for Wordpress blogging tool. shortcode [myuw-badge]
Version: 1.0
Author: DoIT 
Author URI: http://it.wisc.edu/
Author Email: rhspiess@wisc.edu
License:  Board of Regents of the University of Wisconsin System
 *  Text Domain: plugin-name
 * Domain Path: /languages
 */

if ( ! defined( 'WPINC' ) ) { die; }  // If this file is called directly, abort.

// the plugin
require_once plugin_dir_path( __FILE__ ) . 'uw-webcomponents-plugin.php';

function run_UwWebComponents() {
    $plugin = new UwWebComponents();
    //$plugin->run();
}

run_UwWebComponents();