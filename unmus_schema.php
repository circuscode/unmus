<?php

if(! function_exists( 'schema_wp' )) { return; }

/*
Schema Enhancements
*/

// This code is not used anymore since Schema was removed from unmus

function unmus_schema_wp_set_default_image( $json ) {
	
	// If image is already defiend,
	// return our $json array and do not do anything
	if ( isset($json['media']) && ! empty($json['media']) ) return $json;
	
	// There is no image defined in Schema array, 
	// set default ImageObject url, width, and height
	$json['media']['@type'] = 'ImageObject'; // schema type, do not chage this!
	$json['media']['url'] = 'https://www.unmus.de/wp-content/uploads/luftschiffderliebe-pusteblume.gif'; // set default image url
	$json['media']['width'] = 1300; // set image width
	$json['media']['height'] = 792;	// set image height
	
	return $json;
}
add_filter('schema_json', 'unmus_schema_wp_set_default_image');

?>