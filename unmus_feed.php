<?php

/*
Manage Feed
*/

/*
Add Unmus Formats to Feed
*/

function unmus_feed($qv) {

	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('post', 'ello', 'pinseldisko','podcast');
	return $qv;
}
add_filter('request', 'unmus_feed');

/*
Remove Post Format Quote from Feed
*/

function ello_filter_quotes_from_feed(&$wp_query) {
	
	if( $wp_query->is_feed ) {
	
		$post_format_tax_query = array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => 'post-format-quote',
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
add_filter('pre_get_posts','ello_filter_quotes_from_feed');

/*
Remove Post Format Image from Feed
*/

function ello_filter_images_from_feed(&$wp_query) {
	
	if( $wp_query->is_feed ) {
	
		$post_format_tax_query = array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => 'post-format-image',
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
add_filter('pre_get_posts','ello_filter_images_from_feed');

/*
Force Feed Updates
*/

if(get_option('unmus_force_feedupdate')) {
    add_filter('wp_feed_cache_transient_lifetime', create_function('', 'return 60;'));
}

?>