<?php

/*
Jetpack Sitemap
*/

// This code is not used anymore since JetPack was removed from unmus

if (function_exists('jetpack_require_lib_dir')) {

/*
Add Unmus Formats to XML sitempap
*/

function unmus_xml_sitemap( $post_types ) {
    $post_types[] = 'podcast';
	$post_types[] = 'ello';
	$post_types[] = 'pinseldisko';
    return $post_types;
}
add_filter( 'jetpack_sitemap_post_types', 'unmus_xml_sitemap' );

/* 
Remove devicepx JavaScript (Responsive Gravatars)
*/

function remove_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'remove_devicepx' );

} // if function

?>