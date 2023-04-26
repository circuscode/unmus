<?php

/**
 * Plugin
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Enqueue Plugin CSS Styles
 *
 */

function unmus_plugin_admin_styles() {

    wp_enqueue_style('admin-styles',  plugin_dir_url( __FILE__ ).'/unmus_styles.css');

}
add_action('admin_enqueue_scripts', 'unmus_plugin_admin_styles');

?>