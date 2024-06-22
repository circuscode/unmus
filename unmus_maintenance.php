<?php

/**
 * Maintenance Mode
 * 
 * @package unmus
 * @since 0.1
 *
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Activate the Maintenance mode
 * 
 * @since 0.1
 * 
 * @see Theme including maintenance.php
 */

function unmus_maintenace_mode() {

    // Are we doing maintenance?
    $doing_maintenance=get_option('unmus_maintenance');

    if($doing_maintenance) {
        // Do not activate maintenance mode for Admins and User logged in
        if (! (is_admin() OR is_user_logged_in() ) ) { 
            // Activate maintenance mode if maintenance page exists
            if ( file_exists( WP_CONTENT_DIR . '/maintenance.php' ) ) {
                require_once( WP_CONTENT_DIR . '/maintenance.php' );
                die();
            } 

        }
    }

}
add_action('wp', 'unmus_maintenace_mode');

?>