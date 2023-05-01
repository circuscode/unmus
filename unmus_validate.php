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
    
    $list_of_environments=array('local','dev','public','');

    if (in_array($environment, $list_of_environments)) {
        $output = $environment;
        return $output;
    } else {
        if($environment=='') {
            return '';
        } else {
            return get_option('unmus_environment');
        }
    }

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

function unmus_validate_raketenstaub_amountofposts ( $amount ) {
    
    // Input required
    if ($amount == '') {
        add_settings_error( 'unmus-options', 'invalid-amount', 'Raketenstaub / Amount of Posts: Input is required' );
        $amount=get_option( 'unmus_raketenstaub_amountofposts' );
    }
    // Invalid Input
    elseif (!is_numeric($amount) OR $amount < 0 OR $amount==0 OR is_float($amount)) {
        add_settings_error( 'unmus-options', 'invalid-amount', 'Raketenstaub / Amount of Posts: Invalid input' );
        $amount=get_option( 'unmus_raketenstaub_amountofposts' );
    }
    else {
        // Make Inputs like "15.0" to "15"
        $amount=intval($amount);
    }

    return $amount;

} 

/**
 * Validate Input: Zirkusliebe Number of Posts
 * 
 * @param int Zirkusliebe Number of Posts
 * @return int Zirkusliebe Number of Posts
 */

function unmus_validate_zirkusliebe_amountofposts ( $amount ) {
    
    // Input required
    if ($amount == '') {
        add_settings_error( 'unmus-options', 'invalid-amount', 'Zirkusliebe / Amount of Posts: Input is required' );
        $amount=get_option( 'unmus_zirkusliebe_amountofposts' );
    }
    // Invalid Input
    elseif (!is_numeric($amount) OR $amount < 0 OR $amount==0 OR is_float($amount)) {
        add_settings_error( 'unmus-options', 'invalid-amount', 'Zirkusliebe / Amount of Posts: Invalid input' );
        $amount=get_option( 'unmus_zirkusliebe_amountofposts' );
    }
    else {
        // Make Inputs like "15.0" to "15"
        $amount=intval($amount);
    }

    return $amount;

} 

/**
 * Validate Input: Ello Number of Posts
 * 
 * @param int Ello Number of Posts
 * @return int Ello Number of Posts
 */

function unmus_validate_ello_amountofposts ( $amount ) {
    
    // Input required
    if ($amount == '') {
        add_settings_error( 'unmus-options', 'invalid-amount', 'Ello / Amount of Posts: Input is required' );
        $amount=get_option( 'unmus_ello_amountofposts' );
    }
    // Invalid Input
    elseif (!is_numeric($amount) OR $amount < 0 OR $amount==0 OR is_float($amount)) {
        add_settings_error( 'unmus-options', 'invalid-amount', 'Ello / Amount of Posts: Invalid input' );
        $amount=get_option( 'unmus_ello_amountofposts' );
    }
    else {
        // Make Inputs like "15.0" to "15"
        $amount=intval($amount);
    }

    return $amount;

} 

/**
 * Validate Input: WordPress Update Auto
 * 
 * @param int WordPress Update Auto
 * @return int WordPress Update Auto
 */

function unmus_validate_wordpress_update_auto ( $update ) {
	
    $output;

	if($update == 1) {
		$output=1;
	} else {
		$output=0;
	}

    return $output;
	
}

/**
 * Validate Input: Plugins Update Auto
 * 
 * @param int Plugins Update Auto
 * @return int Plugins Update Auto
 */

function unmus_validate_plugins_update_auto ( $update ) {
	
    $output;

	if($update == 1) {
		$output=1;
	} else {
		$output=0;
	}

    return $output;
	
}

/**
 * Validate Input: Themes Update Auto
 * 
 * @param int Themes Update Auto
 * @return int Themes Update Auto
 */

function unmus_validate_themes_update_auto ( $update ) {
	
    $output;

	if($update == 1) {
		$output=1;
	} else {
		$output=0;
	}

    return $output;
	
}

?>