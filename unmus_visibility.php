<?php

/**
 * Visbility
 * 
 * @package unmus
 * @since 0.9
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Disable UpdraftPlus @ Admin Bar
 * 
 * @since 0.9
 */

function unmus_disable_updraftplus_admin_bar() {
	
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('updraft_admin_node');
	
}
add_action('wp_before_admin_bar_render', 'unmus_disable_updraftplus_admin_bar', 999);

/**
 * The annoying Message
 * 
 * Plugin: UpdraftPlus
 * Fades out the Message on WordPress Upgrade Page
 *
 * @since 0.8
 */

 function unmus_updraft_message_invisible() {

    // Get current page
	global $pagenow;

	// Run on specific pages only
    if ( $pagenow == 'update-core.php') {

        echo "
        <style type='text/css'>
        .updraft-ad-container {
            display:none !important;
        }
        </style>
        ";
   }

}
add_action( 'admin_head', 'unmus_updraft_message_invisible' );

?>