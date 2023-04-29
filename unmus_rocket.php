<?php

/**
 * wpRocket - All about Caching
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Filter cache buffer, extract meta tag, inject right after opening head tag.
 * This ensures html output is valid with W3C Standards
 *
 * @var $buffer
 * @return void
 */

function unmus_wprocket_put_charset_first($buffer) {

	// Find meta charset tag.
	preg_match_all( '/<meta\s+charset=[\'|"]+([^"\']+)(["\'])(\s*\/)?>/iU', $buffer, $meta_tag_matches );

	if ( ! $meta_tag_matches[0] )
		return $buffer;

	// Remove tag from original position, store in variable.
	foreach ( $meta_tag_matches[0] as $tag ) {
		$buffer = str_replace( $tag, '', $buffer );
		$meta_tag = $tag;
		break;
	}

	// Find opening head tag.
	preg_match_all( '/<head(\s+.*)?>/i', $buffer, $head_tag_matches );

	// Inject meta tag right after head tag.
	foreach ( $head_tag_matches[0] as $tag ) {
		$buffer = str_replace( $tag, $tag . $meta_tag, $buffer );
		break;
	}

	return $buffer;
};
add_filter( 'rocket_buffer', 'unmus_wprocket_put_charset_first',PHP_INT_MAX);

/**
 * Removes Mathilda Pages from wpRocket Cache
 * 
 * Function will called everytime new tweets have been loaded
 * 
 */

function unmus_wprocket_refresh_mathilda()
{

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
add_action('mathilda_tweets_updated', 'unmus_wprocket_refresh_mathilda');

/**
 * Removes TootPress Pages from wpRocket Cache
 * 
 * Function will called everytime new toots have been loaded
 * 
 * @since 0.6
 */

function unmus_wprocket_fresh_cache_tootpress() {

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
add_action('tootpress_toots_update', 'unmus_wprocket_fresh_cache_tootpress');

/**
 * Delete Cache if Maintenance Mode is activated or deactivated
 * 
 * @since 0.7
 * @see wpRocket Plugin
 */

function unmus_wprocket_delete_cache(){
	rocket_clean_domain();
}
add_action('update_option_unmus_maintenance','unmus_wprocket_delete_cache');

?>