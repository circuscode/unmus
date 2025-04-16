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

/**
 * Disable Threaded Comments Check @ Activity Pub
 *
 * @since 0.8
 */

function unmus_activitypub_threaded_comments_check( $tests ) {
	unset( $tests['direct']['activitypub_test_threaded_comments'] );
	return $tests;
}
add_filter( 'site_status_tests', 'unmus_activitypub_threaded_comments_check',100 );

?>