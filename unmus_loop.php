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
 * Modify Amount of Posts per Page for Custom Post Types
 *
 * @since 0.7
 * 
 * @param WP_Query The WP_Query Instance
 */

function unmus_amount_of_posts_per_page( $query ) {

   if ( is_admin() || ! $query->is_main_query() ) {
      return;
   }

   if ( is_post_type_archive( 'raketenstaub' ) ) {
      $amountofposts=get_option('unmus_raketenstaub_amountofposts');
      $query->set( 'posts_per_page', $amountofposts );
   }

   if ( is_post_type_archive( 'ello' ) ) {
      $amountofposts=get_option('unmus_ello_amountofposts');
      $query->set( 'posts_per_page', $amountofposts );
   }

   if ( is_post_type_archive( 'podcast' ) ) {
      $amountofposts=get_option('unmus_zirkusliebe_amountofposts');
      $query->set( 'posts_per_page', $amountofposts );
   }

}
add_filter( 'pre_get_posts', 'unmus_amount_of_posts_per_page' );

?>