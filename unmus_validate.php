<?php

/**
 * Validate
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Validate Input: Environment
 * 
 * @param string Environment
 * @return string Environment
 */

function unmus_validate_environment ( $environment ) {
    
    $output = $environment;
    return $output;

} 

/**
 * Validate Input: Maintenance
 * 
 * @param int Maintenance
 * @return int Maintenance
 */

function unmus_validate_maintenance ( $maintenance ) {
	
	$output;

	if($maintenance == 1) {
		$output=1;
	} else {
		$output=0;
	}

    return $output;
} 

/**
 * Validate Input: Raketenstaub Number of Posts
 * 
 * @param int Raketenstaub Number of Posts
 * @return int Raketenstaub Number of Posts
 */

function unmus_validate_raketenstaub_amountofposts ( $amountofposts ) {
    
    $output = $amountofposts;
    return $output;

} 

/**
 * Validate Input: Zirkusliebe Number of Posts
 * 
 * @param int Zirkusliebe Number of Posts
 * @return int Zirkusliebe Number of Posts
 */

function unmus_validate_zirkusliebe_amountofposts ( $amountofposts ) {
    
    $output = $amountofposts;
    return $output;

} 

/**
 * Validate Input: Ello Number of Posts
 * 
 * @param int Ello Number of Posts
 * @return int Ello Number of Posts
 */

function unmus_validate_ello_amountofposts ( $amountofposts ) {
    
    $output = $amountofposts;
    return $output;

} 

/**
 * Validate Input: WordPress Update Auto
 * 
 * @param int WordPress Update Auto
 * @return int WordPress Update Auto
 */

function unmus_validate_wordpress_update_auto ( $update ) {
	
    $output = $update;
	return $output;
	
}

/**
 * Validate Input: Plugins Update Auto
 * 
 * @param int Plugins Update Auto
 * @return int Plugins Update Auto
 */

function unmus_validate_plugins_update_auto ( $update ) {
	
    $output = $update;
	return $output;
	
}

/**
 * Validate Input: Themes Update Auto
 * 
 * @param int Themes Update Auto
 * @return int Themes Update Auto
 */

function unmus_validate_themes_update_auto ( $update ) {
	
    $output = $update;
	return $output;
	
}

?>