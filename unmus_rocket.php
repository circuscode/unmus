<?php

/**
 * Filter cache buffer, extract meta tag, inject right after opening head tag.
 * This ensures html output is valid with W3C Standards
 *
 * @var  $buffer
 * @return void
 */

function wp_rocket_unmus_put_charset_first($buffer) {

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
add_filter( 'rocket_buffer', 'wp_rocket_unmus_put_charset_first',PHP_INT_MAX);

/*
* Clean Cache for Mathilda Pages
*/

function wp_rocket_unmus_refresh_mathilda()
{

	$cache_mathilda_url=null;
	$current_host = $_SERVER['HTTP_HOST'];

	if($current_host == 'localhost') {
        $cache_mathilda_url='http://localhost/tweets/';
	}
	elseif($current_host == 'dev.unmus.de') {
        $cache_mathilda_url='http://dev.unmus.de/tweets/';
    }
    elseif($current_host == 'www.unmus.de') {
        $cache_mathilda_url='http://www.unmus.de/tweets/';
    }

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

	if (function_exists('rocket_clean_files')) {
		rocket_clean_files( $clear_urls );
	}

}
add_action('mathilda_tweets_updated', 'wp_rocket_unmus_refresh_mathilda');

?>