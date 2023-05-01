<?php

/**
 * Feed
 * 
 * @package unmus
 * @since 0.1
 */

/**
 * Add Custom Post Types to Main Feed
 *
 * @param array Query Vars
 */

function unmus_add_custom_post_types_to_feed($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type'])) {
		$qv['post_type'] = array('post','ello','pinseldisko','podcast');
    }
	return $qv;
}
add_filter('request', 'unmus_add_custom_post_types_to_feed');

/**
 * Remove Post Formats Quote & Image from Feed
 *
 * @param WP_Query The WP_Query Instance
 */

function unmus_filter_post_formats_from_feed(&$wp_query) {
	
	if( $wp_query->is_feed ) {
	
		$post_format_tax_query = array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-quote','post-format-image'),
            'operator' => 'NOT IN'
        );

        $tax_query = $wp_query->get( 'tax_query' );

        if ( is_array( $tax_query ) ) {
            $tax_query = $tax_query + $post_format_tax_query;
        } else {
            $tax_query = array( $post_format_tax_query );
        }
        
        $wp_query->set( 'tax_query', $tax_query );

	}
}
add_filter('pre_get_posts','unmus_filter_post_formats_from_feed');

?>