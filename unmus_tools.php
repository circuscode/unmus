<?php

/**
 * Developer Tools
 * 
 * @package unmus 
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }
 
/* 
Developer - Yes or No? 
*/

$unmus_developer=get_option('unmus_developer');
if (! $unmus_developer == 1)
{
return;
}

/**
 * Create Menu Item
 * 
 */

function unmus_tools_menu() {
    	add_management_page(
            'Scripting',
            'Scripting',
            'manage_options',
            'unmus-tools-menu',
            'unmus_tools_controller'
        );
}

add_action('admin_menu', 'unmus_tools_menu');

/**
 * Tools Controller
 * 
 */

function unmus_tools_controller() {
	
	echo '<div class="wrap">';

    /* Headline */
	echo '<h1 class="unmus_tools_headline">Scripting</h1>
    <p class="unmus_tools_description">unmus</p>';
    
    unmus_scripting();
	
	echo '</div>';
	
}

?>