<?php

/* 
Options 
*/

function unmus_options_menu() {
    add_options_page('unmus', 'unmus', 'manage_options', 'unmus-options', "unmus_options_content");
}

add_action( 'admin_menu', 'unmus_options_menu');

/*
Options Page
*/

function unmus_options_content() {

	echo '
	<div class="wrap">
	<h1>Options › unmus</h1>
	<p class="unmus_settings">All Settings<br/>&nbsp;</p>
	
	<form method="post" action="options.php">';
	
	do_settings_sections( 'unmus-options' );
	settings_fields( 'unmus_settings' );
	submit_button();

	echo '</form></div><div class="clear"></div>';
}

/*
Fields
#*/

function unmus_options_display_environment()
{
	echo '<input class="regular-text" type="text" name="unmus_environment" id="unmus_environment" value="'. get_option('unmus_environment') .'"/>';
}

function unmus_options_display_maintenance()
{
	echo '<input class="regular-text" type="text" name="unmus_maintenance" id="unmus_maintenance" value="'. get_option('unmus_maintenance') .'"/>';
}

function unmus_options_display_raketenstaub_amountofposts()
{
	echo '<input class="regular-text" type="text" name="unmus_raketenstaub_amountofposts" id="unmus_raketenstaub_amountofposts" value="'. get_option('unmus_raketenstaub_amountofposts') .'"/>';
}

function unmus_options_display_zirkusliebe_amountofposts()
{
	echo '<input class="regular-text" type="text" name="unmus_zirkusliebe_amountofposts" id="unmus_zirkusliebe_amountofposts" value="'. get_option('unmus_zirkusliebe_amountofposts') .'"/>';
}

function unmus_options_display_ello_amountofposts()
{
	echo '<input class="regular-text" type="text" name="unmus_ello_amountofposts" id="unmus_ello_amountofposts" value="'. get_option('unmus_ello_amountofposts') .'"/>';
}


function unmus_options_display_force_feedupdate()
{
	echo '<input class="regular-text" type="text" name="unmus_force_feedupdate" id="unmus_force_feedupdate" value="'. get_option('unmus_force_feedupdate') .'"/>';
}

function unmus_options_display_wordpress_update_auto()
{
	echo '<input class="regular-text" type="text" name="unmus_wordpress_update_auto" id="unmus_wordpress_update_auto" value="'. get_option('unmus_wordpress_update_auto') .'"/>';
}

function unmus_options_display_plugins_update_auto()
{
	echo '<input class="regular-text" type="text" name="unmus_plugins_update_auto" id="unmus_plugins_update_auto" value="'. get_option('unmus_plugins_update_auto') .'"/>';
}

function unmus_options_display_themes_update_auto()
{
	echo '<input class="regular-text" type="text" name="unmus_themes_update_auto" id="unmus_themes_update_auto" value="'. get_option('unmus_themes_update_auto') .'"/>';
}

/* 
Sections
*/

function unmus_options_display_blog_description()
{ echo '<p>Basic Settings</p>'; }

function unmus_options_display_customposttype_description()
{ echo '<p>Format Related</p>'; }

function unmus_options_display_internal_description()
{ echo '<p>Technical Settings</p>'; }

/* 
Definitions
*/

// Plugin Basic Settings 

function unmus_options_blog_display()
{
	
	add_settings_section("blog_settings_section", "Blog", "unmus_options_display_blog_description", "unmus-options");
	
	add_settings_field("unmus_environment", "Environment", "unmus_options_display_environment", "unmus-options", "blog_settings_section");
	add_settings_field("unmus_maintenance", "Maintenance", "unmus_options_display_maintenance", "unmus-options", "blog_settings_section");
	
	register_setting("unmus_settings", "unmus_environment", "unmus_validate_environment");
	register_setting("unmus_settings", "unmus_maintenance", "unmus_validate_maintenance");

}

function unmus_options_customposttype_display()
{
	
	add_settings_section("customposttype_settings_section", "Custom Post Types", "unmus_options_display_customposttype_description", "unmus-options");
	
	add_settings_field("unmus_raketenstaub_amountofposts", "Amount of Posts @ Raketen", "unmus_options_display_raketenstaub_amountofposts", "unmus-options", "customposttype_settings_section");
	add_settings_field("unmus_zirkusliebe_amountofposts", "Amount of Posts @ Zirkus", "unmus_options_display_zirkusliebe_amountofposts", "unmus-options", "customposttype_settings_section");
	add_settings_field("unmus_ello_amountofposts", "Amount of Posts @ Ello", "unmus_options_display_ello_amountofposts", "unmus-options", "customposttype_settings_section");
	
	register_setting("unmus_settings", "unmus_raketenstaub_amountofposts", "unmus_validate_raketenstaub_amountofposts");
	register_setting("unmus_settings", "unmus_zirkusliebe_amountofposts", "unmus_validate_zirkusliebe_amountofposts");
	register_setting("unmus_settings", "unmus_ello_amountofposts", "unmus_validate_ello_amountofposts");
}

// Technical Settings 

function unmus_options_internal_display()
{
	
	add_settings_section("internal_settings_section", "Internal", "unmus_options_display_internal_description", "unmus-options");
	
	add_settings_field("unmus_force_feedupdate", "Force Feed Update", "unmus_options_display_force_feedupdate", "unmus-options", "internal_settings_section");
	add_settings_field("unmus_wordpress_update_auto", "Update WordPress Auto", "unmus_options_display_wordpress_update_auto", "unmus-options", "internal_settings_section");
	add_settings_field("unmus_plugins_update_auto", "Update Plugins Auto", "unmus_options_display_plugins_update_auto", "unmus-options", "internal_settings_section");
	add_settings_field("unmus_themes_update_auto", "Update Themes Auto", "unmus_options_display_themes_update_auto", "unmus-options", "internal_settings_section");
	
	register_setting("unmus_settings", "unmus_force_feedupdate", "unmus_validate_force_feedupdate");
	register_setting("unmus_settings", "unmus_wordpress_update_auto", "unmus_validate_wordpress_update_auto");
	register_setting("unmus_settings", "unmus_plugins_update_auto", "unmus_validate_plugins_update_auto");
	register_setting("unmus_settings", "unmus_themes_update_auto", "unmus_validate_themes_update_auto");

}

/*
Actions
*/

add_action("admin_init", "unmus_options_blog_display");
add_action("admin_init", "unmus_options_customposttype_display");
add_action("admin_init", "unmus_options_internal_display");

/*
Validation
*/

/* Validate Input: Environment */

function unmus_validate_environment ( $environment ) {
    
    $output = $environment;
    return $output;

} 

/* Validate Input: Maintenance */

function unmus_validate_maintenance ( $maintenance ) {
	
	$output;

	if($maintenance == 1) {
		$output=1;
	} else {
		$output=0;
	}

	$current_mode=get_option('unmus_maintenance');
	
	if ($current_mode!=$maintenance) {

		if( function_exists( 'rocket_deactivation' ) ) { 
			rocket_clean_domain();
		}
	
	}

    return $output;
} 

/* Validate Input: Raketenstaub Number of Posts */

function unmus_validate_raketenstaub_amountofposts ( $amountofposts ) {
    
    $output = $amountofposts;
    return $output;

} 

/* Validate Input: Zirkusliebe Number of Posts */

function unmus_validate_zirkusliebe_amountofposts ( $amountofposts ) {
    
    $output = $amountofposts;
    return $output;

} 

/* Validate Input: Ello Number of Posts */

function unmus_validate_ello_amountofposts ( $amountofposts ) {
    
    $output = $amountofposts;
    return $output;

} 

/* Validate Input: Force Feedupdate */

function unmus_validate_force_feedupdate ( $force ) {
	
    $output = $force;
	return $output;
	
}

/* Validate Input: WordPress Update Auto */

function unmus_validate_wordpress_update_auto ( $update ) {
	
    $output = $update;
	return $output;
	
}

/* Validate Input: Plugins Update Auto */

function unmus_validate_plugins_update_auto ( $update ) {
	
    $output = $update;
	return $output;
	
}

/* Validate Input: Themes Update Auto */

function unmus_validate_themes_update_auto ( $update ) {
	
    $output = $update;
	return $output;
	
}

?>