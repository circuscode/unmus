<?php

/**
 * Activity Pub
 * 
 * @package unmus
 * @since 0.8
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Remove Mastodon Blog Account @ Federated Comment
 * 
 * Initial content remains unchanged.
 * Filter will be applied before display. 
 * 
 * @since 0.8
 * 
 * @param string Comment Text
 * @param object WP_Comment
 * 
 */

function unmus_federated_comment_remove_account( $comment_text, $comment = null ) {

	// Check is required to avoid execution before database insert
	if ($comment !== null) {

		$handle='<p><a href="https://www.unmus.de/@blog" rel="ugc">@blog</a> ';

		$pos=strpos($comment_text, $handle);

		if($pos==0) {
			$comment_text = substr_replace($comment_text, '<p>', $pos, strlen($handle));
		}

		return $comment_text;

	}

}
add_filter( 'comment_text', 'unmus_federated_comment_remove_account', 10, 2 );

?>