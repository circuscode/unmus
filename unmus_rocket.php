<?php

/**
 * WP Rocket Modifications
 *
 *
 */

if(function_exists( 'rocket_deactivation' )) { return; }

/*
Execute or do not execute
*/

add_action( 'template_redirect', function() {

	// Always execute
	add_filter( 'rocket_buffer', 'wp_rocket_unmus_put_charset_first',PHP_INT_MAX);
	
	// Apply Filters below only @ Zirkusliebe Archive 
	if ( ! ( is_post_type_archive('podcast') ) ) {
		return;
	}

	// Minification & Defer */
	// add_filter( 'rocket_exclude_css', 'wp_rocket_unmus_exclude_from_css_minification' );
	add_filter( 'rocket_exclude_js', 'wp_rocket_unmus_exclude_from_js_minification' );
	add_filter( 'rocket_exclude_defer_js', 'wp_rocket_unmus_exclude_from_defer_js' );

	// Remove Query String
	add_filter( 'rocket_exclude_cache_busting', 'wp_rocket_unmus_exclude_from_cache_busting' );

	// Optimize CSS Delivery
	// Option is currently deactivated in wpRocket Settings
	// add_filter( 'rocket_exclude_async_css', 'wp_rocket_unmus_exclude_from_async_css' );
	
});

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

/**
* Exclude scripts from WP Rocket’s defer JS option.
*
* @param  array  $excluded_files   Array of script URLs to be excluded
* @return array                    Extended array script URLs to be excluded
*/

function wp_rocket_unmus_exclude_from_defer_js( $excluded_files = array() ) {

	/**
	* This is a sample file URL, define your own!
	* Duplicate below line as needed to exclude multiple files.
	*/

	/* Jquery */
	$excluded_files[] = '/wp-includes/js/jquery/jquery-migrate.min.js';
    $excluded_files[] = '/wp-includes/js/jquery/jquery.js';

	/* Podlove WebPlayer 2 */
    $excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v2/player/podlove-web-player/static/podlove-web-player.min.js';
	$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/js/frontend.js';
	
	/* Podlove WebPlayer 4 */
	$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/js/frontend.js';
	$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v4/dist/embed.js';

	/**
	* Stop editing here.
	*/

	return $excluded_files;
}

/**
* Exclude scripts from WP Rocket cache busting.
*
* @param  array  $excluded_files   Array of script URLs to be excluded
* @return array                    Extended array script URLs to be excluded
*/

function wp_rocket_unmus_exclude_from_cache_busting( $excluded_files = array() ) {
	
		/**
		* This is a sample file URL, define your own!
		* Duplicate below line as needed to exclude multiple files.
		*/

		/* Jquery */
		$excluded_files[] = '/wp-includes/js/jquery/jquery-migrate.min.js';
		$excluded_files[] = '/wp-includes/js/jquery/jquery.js';
	
		/* Podlove WebPlayer 2 */
		$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v2/player/podlove-web-player/static/podlove-web-player.min.js';
		$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/js/frontend.js';
	
		/* Podlove WebPlayer 4 */
		$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/js/frontend.js';
		$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v4/dist/embed.js';

		/**
		* Stop editing here.
		*/
	
		return $excluded_files;
}

/**
* Exclude scripts from WP Rocket’s asnyc CSS option.
*
* @param  array  $excluded_files   Array of script URLs to be excluded
* @return array                    Extended array script URLs to be excluded
*/

function wp_rocket_unmus_exclude_from_async_css( $excluded_files = array() ) {

	/**
	* This is a sample file URL, define your own!
	* Duplicate below line as needed to exclude multiple files.
	*/

	/* Podlove General */

	$excluded_files[] = 'wp-content/plugins/podlove/podcasting-plugin-for-wordpress/css/admin-font.css';
    $excluded_files[] = 'wp-content/plugins/podlove/podcasting-plugin-for-wordpress/css/frontend.css';

	/* Podlove WebPlayer 2 */

    $excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v2/player/podlove-web-player/static/podlove-web-player.min.css';
	$excluded_files[] = '/wp-content/cache/busting/1/wp-content-plugins-podlove-podcasting-plugin-for-wordpress-lib-modules-podlove_web_player-player_v2-player-podlove-web-player-static-podlove-web-player.min.css';
	
	/* Podlove WebPlayer 4 */
	$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/css/frontend.css';

	/**
	* Stop editing here.
	*/
    return $excluded_files;
}

/**
* Exclude CSS from minificaiton.
*
* @param  array  $excluded_files   Array of CSS URLs to be excluded
* @return array                    Extended array CSS URLs to be excluded
*/

function wp_rocket_unmus_exclude_from_css_minification( $excluded_files = array() ) {
    
        /**
        * This is a sample file URL, define your own!
        * Duplicate below line as needed to exclude multiple files.
		*/

		/* Podlove General */
		$excluded_files[] = 'wp-content/plugins/podlove/podcasting-plugin-for-wordpress/css/admin-font.css';
        $excluded_files[] = 'wp-content/plugins/podlove/podcasting-plugin-for-wordpress/css/frontend.css';
		
		/* Podlove WebPlayer 2 */
		$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v2/player/podlove-web-player/static/podlove-web-player.min.css';
		
		/* Podlove WebPlayer 4 */
        $excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/css/frontend.css';

        /**
        * Stop editing here.
        */
        return $excluded_files;
    
    }

/**
* Exclude JS from Minification
*
* @param  array  $excluded_files   Array of css URLs to be excluded
* @return array                    Extended array css URLs to be excluded
*/

function wp_rocket_unmus_exclude_from_js_minification( $excluded_files = array() ) {

    /**
	* This is a sample file URL, define your own!
	* Duplicate below line as needed to exclude multiple files.
	*/
	
	/* Jquery */
	$excluded_files[] = '/wp-includes/js/jquery/jquery-migrate.min.js';
    $excluded_files[] = '/wp-includes/js/jquery/jquery.js';
	
	/* Podlove WebPlayer 2 */
    $excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v2/player/podlove-web-player/static/podlove-web-player.min.js';
    $excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/js/frontend.js';

	/* Podlove WebPlayer 4 */
	$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/js/frontend.js';
	$excluded_files[] = '/wp-content/plugins/podlove-podcasting-plugin-for-wordpress/lib/modules/podlove_web_player/player_v4/dist/embed.js';

	/**
	* Stop editing here.
	*/

	return $excluded_files;

}

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

	rocket_clean_files( $clear_urls );
}
add_action('mathilda_tweets_updated', 'wp_rocket_unmus_refresh_mathilda');