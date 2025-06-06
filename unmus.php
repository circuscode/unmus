<?php

/*
Plugin Name:	unmus
Plugin URI:		https://www.unmus.de/
Description:	Additional WordPress Features @ unmus
Version:		0.9
Author: 		Marco Hitschler
Author URI: 	https://www.unmus.de/
License:     	GPL3
License URI: 	https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: 	/languages
Text Domain: 	unmus
*/

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

// Basic Setup: Include program files
require_once('unmus_install.php'); 
require_once('unmus_zimtwolke.php'); 
require_once('unmus_pinseldisko.php'); 
require_once('unmus_zirkusliebe.php'); 
require_once('unmus_feed.php'); 
require_once('unmus_rewrite.php');
require_once('unmus_rocket.php');
require_once('unmus_seo.php');
require_once('unmus_editor.php');
require_once('unmus_search.php');
require_once('unmus_settings.php');
require_once('unmus_validate.php');
require_once('unmus_tools.php');
require_once('unmus_script.php');
require_once('unmus_conditionals.php');
require_once('unmus_maintenance.php');
require_once('unmus_raketenstaub.php');
require_once('unmus_taxonomy.php');
require_once('unmus_privacy.php');
require_once('unmus_resources.php');
require_once('unmus_sitehealth.php');
require_once('unmus_glance.php');
require_once('unmus_update.php');
require_once('unmus_loop.php');
require_once('unmus_archives.php');
require_once('unmus_menu.php');
require_once('unmus_me.php');
require_once('unmus_activitypub.php');
require_once('unmus_widgets.php');
require_once('unmus_visibility.php');
require_once('unmus_cache.php');
require_once('unmus_tootpress.php');

// Ensure that all required functions are available during setup
require_once( ABSPATH . 'wp-admin/includes/upgrade.php');

// Hooks
register_activation_hook( __FILE__ , 'unmus_activate' );
register_uninstall_hook( __FILE__ , 'unmus_delete' );
register_deactivation_hook( __FILE__ , 'unmus_deactivate' );

?>