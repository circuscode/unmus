<?php

/**
 * wpRocket - All about Caching
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Removes Mathilda Pages from Cache
 * 
 * Function will called everytime new tweets have been loaded
 * 
 * @since 0.6
 * @see Plugin Mathilda
 * @see Plugin wpRocket
 */

function unmus_wprocket_refresh_mathilda_cache()
{

	if (defined('WP_ROCKET_VERSION')) {

		$current_host=get_site_url();
		$page_slug=get_option('mathilda_slug');

		$cache_mathilda_url=$current_host.'/'.$page_slug.'/';

		$cache_number_of_pages=mathilda_pages();
		$clear_urls=array();

		for($i=0; $i < $cache_number_of_pages; $i++)
		{
			if($i==0) {
				$clear_urls[]=$cache_mathilda_url;
			} else {
				$clear_urls[]=$cache_mathilda_url.($i+1).'/';
			}
		}

		rocket_clean_files( $clear_urls );
	}
}
if(function_exists('mathilda_activate')) {
add_action('mathilda_tweets_updated', 'unmus_wprocket_refresh_mathilda_cache');
}

/**
 * Removes TootPress Pages from Cache
 * 
 * Function will called everytime new toots have been loaded
 * 
 * @since 0.6
 * @see Plugin TootPress
 * @see Plugin wpRocket
 */

function unmus_wprocket_fresh_tootpress_cache() {

	if (defined('WP_ROCKET_VERSION')) {

		$current_host=get_site_url();
		$page_slug=tootpress_get_slug();

		$cache_tootpress_url=$current_host.'/'.$page_slug.'/';

		$cache_number_of_pages=tootpress_amount_of_pages();
		$clear_urls=array();

		for($i=0; $i < $cache_number_of_pages; $i++)
		{
			if($i==0) {
				$clear_urls[]=$cache_tootpress_url;
			} else {
				$clear_urls[]=$cache_tootpress_url.($i+1).'/';
			}
		}

		rocket_clean_files( $clear_urls );
	}
}
if(function_exists('tootpress_activate')) {
add_action('tootpress_toots_update', 'unmus_wprocket_fresh_tootpress_cache');
}

/**
 * Delete Cache if Maintenance Mode was activated or deactivated
 * 
 * @since 0.7
 * @see wpRocket Plugin
 */

function unmus_wprocket_delete_cache(){

	if (defined('WP_ROCKET_VERSION')) {
		rocket_clean_domain();
	}
} 
add_action('update_option_unmus_maintenance','unmus_wprocket_delete_cache');

?>