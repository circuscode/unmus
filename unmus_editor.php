<?php

/**
 * Editor Enhancements
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Add Post Format Filter to Ello Table View
 *
 * @param string Post Type
 */

function unmus_ello_post_format_filter($post_type = "") {

    if ( in_array( $post_type, array( 'ello' ) ) ) {
        wp_dropdown_categories( array(
            'taxonomy'          => 'post_format',
            'hide_empty'        => 0,
            'name'              => 'post_format', 
            'show_option_all'   => 'Post Format',
            'value_field'       => 'slug',
        ) );
    }

}
add_action( 'restrict_manage_posts', 'unmus_ello_post_format_filter');

/**
 * Remove Post Format Option in Editor for Standard Posts Types
 *
 */

function unmus_remove_post_formats_from_standard_post_editor () {

    global $pagenow;

    if ( 'post.php' === $pagenow && isset($_GET['post']) && 'post' === get_post_type( $_GET['post'] ) ) {
        remove_theme_support('post-formats');
    }
}
add_action( 'admin_init', 'unmus_remove_post_formats_from_standard_post_editor' );

/**
 * Show Custom Fields Meta Box in Editor
 * 
 * @see Advanced Custom Fields Plugin
 *
 */

add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );

?>