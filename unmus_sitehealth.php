<?php

/**
 * Site Health
 * 
 * @package unmus 
 * @since 0.6
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }
 
/**
 * Disable Persistent Object Cache Check @ Site Health
 *
 * @since 0.7
 */

add_filter('site_status_should_suggest_persistent_object_cache', '__return_false');


?>