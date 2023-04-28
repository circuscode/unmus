<?php

/**
 * Maintenance
 * 
 * @package unmus
 * @since 0.7
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Activate the Maintenance mode
 * 
 */

function unmus_maintenace_mode() {

    // Are we doing maintenance?
    $doing_maintenance=get_option('unmus_maintenance');

    if($doing_maintenance) {
        // Do not activate maintenance mode for Admins and User logged in
        if (! (is_admin() OR is_user_logged_in() ) ) {
            // Do not activate maintenance mode if maintenance page does not exist
            if ( file_exists( WP_CONTENT_DIR . '/maintenance.php' ) ) {
                require_once( WP_CONTENT_DIR . '/maintenance.php' );
                die();
            }
        }
    }

}
add_action('get_header', 'unmus_maintenace_mode');

?>