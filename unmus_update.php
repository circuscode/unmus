<?php

/**
 * WordPress Updates
 * 
 * @package unmus
 * @since 0.2
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Run WordPress Updates automaticly?
 *
 * @return bool
 */

function unmus_wordpress_update() {
    $unmus_wordpress_update=get_option('unmus_wordpress_update_auto');
    return $unmus_wordpress_update;
}
add_filter( 'auto_update_core', 'unmus_wordpress_update' );

/**
 * Run Plugin Updates automaticly?
 *
 * @return bool
 */

function unmus_plugins_update() {
    $unmus_plugins_update=get_option('unmus_plugins_update_auto');
    return $unmus_plugins_update;
}
add_filter( 'auto_update_plugin', 'unmus_plugins_update' );

/**
 * Run Theme Updates automaticly?
 *
 * @return bool
 */

 function unmus_themes_update() {
    $unmus_themes_update=get_option('unmus_themes_update_auto');
    return $unmus_themes_update;
}
add_filter( 'auto_update_plugin', 'unmus_themes_update' );

/**
 * Disable eMail Notification after Update
 *
 * @since 0.6
 */

// Disable core auto-update email notifications.
add_filter( 'auto_core_update_send_email', '__return_false' );

// Disable plugins auto-update email notifications.
add_filter( 'auto_plugin_update_send_email', '__return_false' );
 
// Disable themes auto-update email notifications.
add_filter( 'auto_theme_update_send_email', '__return_false' );

?>