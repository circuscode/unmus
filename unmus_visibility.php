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

?>