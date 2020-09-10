<?php

/*
Data Privacy
*/

/* Hide Data Privacy Checkbox */

function comment_form_hide_cookies_consent( $fields ) {
	unset( $fields['cookies'] );
	return $fields;
}
add_filter( 'comment_form_default_fields', 'comment_form_hide_cookies_consent' );

/* Do not save IP from comment author  */

function unmus_remove_comment_author_ip( $comment_author_ip ) {
	return '';
  }
  add_filter( 'pre_comment_user_ip', 'unmmus_remove_comment_author_ip' );

/* Do not save User Agent from comment author */

function unmus_remove_comment_agent_string( $comment_agent ) { 
	return '';
  }
add_filter( 'pre_comment_user_agent', 'unmus_remove_comment_agent_string' );

?>