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
 * Modify Amount of Post per Page
 * 
 * Amount of Post to be shown can be defined via Plugin Options
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

?>