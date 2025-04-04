<?php

/**
 * Widgets
 * 
 * @package unmus
 * @since 0.8
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Add Custom Post Types to Activity Widget
 * 
 * @since 0.8
 * 
 * @param query ?
 * 
 */

function add_cpt_to_dashboard_activity( $query ) {

	$post_types = ['post', 'ello', 'podcast', 'pinseldisko'];
	$query['post_type'] = $post_types;
	return $query;
	
}
add_filter( 'dashboard_recent_posts_query_args', 'add_cpt_to_dashboard_activity' );

?>