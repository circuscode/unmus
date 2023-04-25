<?php

/**
 * Installation, Deinstallation, Deactivation
 * 
 * @package unmus
 * @since 0.7
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Installs the plugin
 * 
 * Function will triggered with plugin activation
 * 
 */

function unmus_activate () {
	add_option('unmus_environment',"na");
	add_option('unmus_maintenance',"0");
	add_option('unmus_raketenstaub_amountofposts',"10");
	add_option('unmus_zirkusliebe_amountofposts',"10");
	add_option('unmus_ello_amountofposts',"10");
	add_option('unmus_force_feedupdate',"0");
	add_option('unmus_wordpress_update_auto',"0");
	add_option('unmus_plugins_update_auto',"0");
	add_option('unmus_themes_update_auto',"0");
	add_option('unmus_developer',"0")
}

/**
 * Deactivates the plugin
 * 
 * Function will triggered with plugin deactivation
 */

function unmus_deactivate () {
	// Code here
}

/**
 * Deinstalls the plugin
 * 
 * Function will triggered with plugin deletion
 * 
 */

function unmus_delete () {
	delete_option('unmus_environment');
	delete_option('unmus_maintenance');
	delete_option('unmus_raketenstaub_amountofposts');
	delete_option('unmus_zirkusliebe_amountofposts');
	delete_option('unmus_ello_amountofposts');
	delete_option('unmus_force_feedupdate');
	delete_option('unmus_wordpress_update_auto');
	delete_option('unmus_plugins_update_auto');
	delete_option('unmus_themes_update_auto');
	delete_option('unmus_developer')
}

?>