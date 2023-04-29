<?php

/**
 * Rewrites
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Remove Slug from Custom Post Type Post URLs
 *
 * URL Concept is the following.
 * https://www.unmus.de/post-slug/
 * 
 * Zimtwolke required a special routine as CPT Name is different (Ello) 
 * CPT Episode is handled by the podlove plugin.
 * 
 */

function unmus_remove_cpt_slug( $post_link, $post, $leavename ) {
 
	$custom_post_types = array( 'pinseldisko', 'ello', 'podcast', 'raketenstaub' );
	
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
add_filter( 'post_type_link', 'unmus_remove_cpt_slug', 10, 3 );

/**
 * Enable Access to CPT Post Page without Slug
 *
 * CPT post page URLs are not working without this function.
 * This is required because of the URL Concept.
 * 
 */

function unmus_parse_request_trick( $query ) {
 
    if ( ! $query->is_main_query() )
        return;

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'page', 'pinseldisko', 'ello', 'podcast', 'raketenstaub' ) );
    }
}
add_action( 'pre_get_posts', 'unmus_parse_request_trick');

?>