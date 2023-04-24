<?php

/**
 * Data Privacy
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Removes the cookie opt-in from comment form
 *
 * Filter affects that cookie will not be set
 * 
 * @param array Default comment fields
 * @return array Comment fields without cookie option
 */

function unmus_comment_form_remove_cookies_consent( $fields ) {
	unset( $fields['cookies'] );
	return $fields;
}
add_filter( 'comment_form_default_fields', 'unmus_comment_form_remove_cookies_consent' );

/**
 * Removes the comment author's IP address
 * 
 * Filter will be applied before IP adress is set
 * 
 * @param string comment author's IP address
 * @return string empty string
 */

function unmus_remove_comment_author_ip( $comment_author_ip ) {
	return '';
}
add_filter( 'pre_comment_user_ip', 'unmus_remove_comment_author_ip' );

/**
 * Removes the comment author's user agent
 * 
 * Filter will be applied before user agent is set
 * 
 * @param string comment author's user agent
 * @return string empty string
 */

function unmus_remove_comment_agent_string( $comment_agent ) { 
	return '';
}
add_filter( 'pre_comment_user_agent', 'unmus_remove_comment_agent_string' );

/**
 * Adjust the embed overlay text
 * 
 * @since 0.7
 * 
 * @see WordPress Plugin Embed Privacy
 * @param string Embed Overlay Content
 * @param string Embed Provider
 * @return string Manipulated Embed Overlay Content
 */

function unmus_manipulate_embed_overlay_text( $content, $embed_provider ) {

	// 1
	$search_for="Erfahre mehr in der";
	$replace_with="Was dann passiert, steht in der";
	$content=str_replace($search_for, $replace_with, $content);

	// 2
	$search_for='target="_blank"';
	$replace_with="";
	$content=str_replace($search_for, $replace_with, $content);
	
	return $content;

}
if (defined('EMBED_PRIVACY_VERSION')) {
add_filter( 'embed_privacy_content', 'unmus_manipulate_embed_overlay_text', 10, 2);
}

?>