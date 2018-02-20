<?php

/*
Rewrites
*/

/* 
Remove slug from custom post type post URLs
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

/* 
Enable CPT Access without Slug
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