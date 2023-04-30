<?php

/**
 * Conditionals
 * 
 * @package unmus
 * @since 0.7
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Get Environment
 *
 * @return string Environment
 */

function unmus_get_environment() {
    return get_option('unmus_environment');
}

/**
 * Is this the local environment?
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