<?php

/**
 * Site Health
 * 
 * @package unmus 
 * @since 0.6
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}
 
/**
 * Disable AMP Persistent Object Tests in Site Health.
 *
 * @since 0.6
 * 
 * @param array $tests The Site Health tests.
 * @return array $tests The filtered tests, without AMP persistent object cache test.
 */

function unmus_disable_amp_persistent_object_cache_test ( $tests ) {
	unset( $tests['direct']['amp_persistent_object_cache'] );
	return $tests;
}
add_filter( 'site_status_tests', 'unmus_disable_amp_persistent_object_cache_test', 50 );

?>