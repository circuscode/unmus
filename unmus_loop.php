<?php

/**
 * Loop
 * 
 * @package unmus
 * @since 0.7
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Raketenstaub: Modify Amount of Posts per Page
 *
 */

function unmus_raketenstaub_change_posts_per_page( $query ) {

	$amountofposts=get_option('unmus_raketenstaub_amountofposts');

    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'raketenstaub' ) ) {
       $query->set( 'posts_per_page', $amountofposts );
    }
}
add_filter( 'pre_get_posts', 'unmus_raketenstaub_change_posts_per_page' );

/**
 * Ello: Modify Amount of Posts per Page
 *
 */

function unmus_ello_change_posts_per_page( $query ) {

	$amountofposts=get_option('unmus_ello_amountofposts');

    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'ello' ) ) {
       $query->set( 'posts_per_page', $amountofposts );
    }
}
add_filter( 'pre_get_posts', 'unmus_ello_change_posts_per_page' );

/**
 * Podcast: Modify Amount of Posts per Page
 *
 */

function unmus_zirkusliebe_change_posts_per_page( $query ) {

	$amountofposts=get_option('unmus_zirkusliebe_amountofposts');

    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'podcast' ) ) {
       $query->set( 'posts_per_page', $amountofposts );
    }
}
add_filter( 'pre_get_posts', 'unmus_zirkusliebe_change_posts_per_page' );

?>