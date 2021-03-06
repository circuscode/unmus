<?php

/*
Plugin Name:	unmus
Plugin URI:		https://www.unmus.de/
Description:	Additional WordPress Features @ unmus
Version:		0.6
Author: 		Marco Hitschler
Author URI: 	https://www.unmus.de/
License:     	GPL3
License URI: 	https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: 	/languages
Text Domain: 	unmus
*/

/*
Basic Setup
*/

require_once('unmus_zimtwolke.php'); 
require_once('unmus_pinseldisko.php'); 
require_once('unmus_zirkusliebe.php'); 
require_once('unmus_creativecommons.php'); 
require_once('unmus_feed.php'); 
require_once('unmus_rewrite.php');
require_once('unmus_amp.php');
require_once('unmus_rocket.php');
require_once('unmus_seo.php');
require_once('unmus_backend.php');
require_once('unmus_search.php');
require_once('unmus_wordpress.php');
require_once('unmus_settings.php');
require_once('unmus_tools.php');
require_once('unmus_scripting.php');
require_once('unmus_conditionals.php');
require_once('unmus_maintenance.php');
require_once('unmus_raketenstaub.php');
require_once('unmus_taxonomy.php');
require_once('unmus_dataprivacy.php');
require_once('unmus_resources.php');
require_once('unmus_sitehealth.php');

/* 
Activate 
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
}

register_activation_hook( __FILE__ , 'unmus_activate' );

/* 
Deactivate
*/

function unmus_deactivate () {
	
}

register_deactivation_hook( __FILE__ , 'unmus_deactivate' );

/* 
Delete
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
} 

register_uninstall_hook( __FILE__ , 'unmus_delete' );

?>