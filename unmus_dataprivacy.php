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

?>