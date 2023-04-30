<?php

/**
 * Archives
 * 
 * @package unmus
 * @since 0.7
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Add Custom Post Types to Archives
 * 
 * @param WP_Query The WP_Query Instance
 */

function unmus_custom_post_types_archives($query) {

    if ( $query->is_author OR $query->is_date ) {

		$query->set( 'post_type', array(
			'ello', 
			'post', 
			'podcast', 
			'pinseldisko', 
			'raketenstaub'
		) );

	}
}
add_action( 'pre_get_posts', 'unmus_custom_post_types_archives' );

?>