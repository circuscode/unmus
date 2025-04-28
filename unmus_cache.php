<?php

/**
 * Caching
 * 
 * Rocket-related Caching, see unmus_rocket.php
 * Following is referring to WP REST API (Plugin WP-REST-CACHE)
 * 
 * @package unmus
 * @since 0.9
 * 
 * @link https://epiph.yt/blog/2025/das-activitypub-plugin-und-der-versehentliche-ddos/
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

// Import Caching Class from WP_Rest_Cache_Plugin
use WP_Rest_Cache_Plugin\Includes\Caching\Caching;

/**
 * Get ActivityPub REST API Namespace
 * 
 * @since 0.9
 * 
 * @return string The ActivityPub REST API namespace
 */

 function unmus_cache_get_activitypub_restapi_namespace() {

    $activitypub_api_namespace = 'activitypub/1.0';
    return $activitypub_api_namespace;
}

/**
 * Get ActivityPub endpoints to be cached
 * 
 * @since 0.9
 * 
 * @return array The ActivityPub endpoints to be cached
 */

function unmus_cache_get_activitypub_endpoints() {

    $endpoints = [ unmus_cache_get_activitypub_restapi_namespace() => [
        '',
        'actors',
        'application',
        'collections',
        'comments',
        'inbox',
        'interactions',
        'nodeinfo',
        'posts',
        'users',
        'webfinger'
    ]];

    return $endpoints;
}

/**
 * Add ActivityPub Endpoints to Cache
 * 
 * @since 0.9
 * 
 * @param array Endpoints that are allowed to be cached
 * @return array Allowed Endpoints extended with ActivityPub
 */

function unmus_cache_add_activitypub_endpoints( $allowed_endpoints ) {

    $activitypub_api_namespace = unmus_cache_get_activitypub_restapi_namespace();
    $endpoints = unmus_cache_get_activitypub_endpoints();

    if(!isset($allowed_endpoints[$activitypub_api_namespace])) {
        $allowed_endpoints[$activitypub_api_namespace] = $endpoints[$activitypub_api_namespace];
    }

    return $allowed_endpoints;

}
add_filter( 'wp_rest_cache/allowed_endpoints', 'unmus_cache_add_activitypub_endpoints', 10, 1);

/**
 * Is ActivityPub Endpoint
 *
 * @param string $uri URI to test
 * @return bool Whether the current endpoint is an ActivityPub endpoint
 */

function unmus_is_activitypub_endpoint( string $uri ) :bool {

    $search = '/' . unmus_cache_get_activitypub_restapi_namespace() . '/';
    
    return \str_contains( $uri, $search ) || \str_contains( $uri, 'rest_route=' . \rawurlencode( $search ) );
}

/**
 * Determine Object Type
 * 
 * @since 0.9
 * 
 * @param string $object_type Object type
 * @param string $cache_key Object key
 * @param mixed	$data Data to cache
 * @param string $uri Request URI
 * @return string Updated object type
 */

function unmus_cache_determine_object_type( $object_type, $cache_key, $data, $uri ) {

    if (unmus_is_activitypub_endpoint( $uri ) ) {
        return 'ActivityPub';
    } else {
        return $object_type;
    }
}
add_filter( 'wp_rest_cache/determine_object_type', 'unmus_cache_determine_object_type', 10, 4 );

/**
 * Reset Cache by Transition Post Status
 *
 * @since 0.9
 * 
 * @param string $new_status New post status
 * @param string $old_status Old post status
 * @param \WP_Post $post Post object
 */

function unmus_cache_reset_by_transition_post_status( string $new_status, string $old_status, \WP_Post $post ): void {

    if ( $new_status !== 'publish' && $old_status !== 'publish' ) {
        return;
    }

    $supported_post_types = (array) \get_option( 'activitypub_support_post_types', [] );

    if ( ! \in_array( $post->post_type, $supported_post_types, true ) ) {
        return;
    }

    if ( ! \class_exists( 'WP_Rest_Cache_Plugin\Includes\Caching\Caching' ) ) {
        return;
    }
    
    Caching::get_instance()->delete_object_type_caches( 'ActivityPub' );
}
add_action( 'transition_post_status', 'unmus_cache_reset_by_transition_post_status', 10, 3 );

/**
 * Set whether the cache represents a single item.
 *
 * Always return false for ActivityPub endpoints, 
 * since cache entries cannot be flushed otherwise.
 *
 * @param bool $is_single Whether the current cache represents a single item
 * @param mixed $data Data to cache
 * @param string $uri Request URI
 * @return bool Whether the cache represents a single item
 */

function set_is_single_item( bool $is_single, mixed $data, string $uri ): bool {

    if ( unmus_is_activitypub_endpoint( $uri ) ) {
        return false;
    }

    return $is_single;
}
add_filter( 'wp_rest_cache/is_single_item', 'set_is_single_item' , 10, 3 );

?>