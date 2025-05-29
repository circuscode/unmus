<?php

/**
 * TootPress
 * 
 * @package unmus
 * @since 0.9
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Closing Filter
 * 
 * @since 0.9
 *
 */

function tootpress_closing_add( $content ) {

      $domain=get_site_url();
      $path='/tweets/';

 		$content='<div class="tootpress-closing-filter"><p>Vor Mastodon war Twitter.<br/><a style="padding-top:7px;" href="'.$domain.$path.'">Tweets lesen</a></p></div>';
 
 		return $content;

}
add_filter( 'tootpress_closing_filter', 'tootpress_closing_add', 99, 1 );

?>