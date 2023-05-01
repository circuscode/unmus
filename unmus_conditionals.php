<?php

/**
 * Conditionals
 * 
 * @package unmus
 * @since 0.6
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Get Environment
 *
 * @since 0.6
 * 
 * @return string Environment
 */

function unmus_get_environment() {
    return get_option('unmus_environment');
}

/**
 * Is this the local environment?
 * 
 * @since 0.6
 *
 * @return bool
 */

function unmus_is_environment_local() {
    $env=unmus_get_environment();
    if($env=='local') {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Is this the dev environment?
 * 
 * @since 0.6
 *
 * @return bool
 */

function unmus_is_environment_dev() {
    $env=unmus_get_environment();
    if($env=='dev') {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Is this the public environment?
 * 
 * @since 0.6
 *
 * @return bool
 */

function unmus_is_environment_public() {
    $env=unmus_get_environment();
    if($env=='public') {
        return true;
    }
    else {
        return false;
    }
}

?>