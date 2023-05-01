<?php

/**
 * Rewrites
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Remove Custom Post Type Slug from Permalink
 *
 * Standard Permalink:
 * https://www.unmus.de/cpt-slug/post-slug/
 * 
 * Target is to have an URL as the following for all posts.
 * https://www.unmus.de/post-slug/
 * 
 * Format Zimtwolke requires a special routine as CPT Name is different (Ello).
 * CPT Episode is handled by the podlove plugin.
 * 
 * @param string $post_link Permalink
 * @param WP_Post $post Post
 * @param book $leavename Wheter to keep the post?
 */

function unmus_remove_cpt_slug_from_perma( $post_link, $post, $leavename ) {
 
	$custom_post_types = array( 'pinseldisko', 'ello', 'podcast', 'raketenstaub' );
	
    // No Action required for Standard Post Type
    if ( ! in_array( $post->post_type, $custom_post_types ) || 'publish' != $post->post_status ) {
        return $post_link;
    }

  	if(stristr($post_link, 'zimtwolke') === FALSE) {
    	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
  	}
	else {
		$post_link = str_replace( '/zimtwolke/', '/', $post_link );
	}
	
    return $post_link;
}
add_filter( 'post_type_link', 'unmus_remove_cpt_slug_from_perma', 10, 3 );

/**
 * Enable Parsing of Custom Post Types URLs
 *
 * Custom Post Type URLs are not working without this function.
 * But I do remember why this is required exactly.
 * 
 * @param WP_Query The WP_Query Instance
 */

function unmus_enable_parsing_cpt_urls( $query ) {
 
    if ( ! $query->is_main_query() )
        return;

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'page', 'pinseldisko', 'ello', 'podcast', 'raketenstaub' ) );
    }
}
add_action( 'pre_get_posts', 'unmus_enable_parsing_cpt_urls');

?>