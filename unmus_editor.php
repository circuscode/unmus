<?php

/**
 * Editor Enhancements
 * 
 * @package unmus
 * @since 0.7
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
 * Remove Post Format Option in Editor for Standard Post Type
 * 
 * Why?
 * 1 - Standard Posts do not have Post Formats at unmus
 * 2 - But Theme huhu provides post format support for standard posts
 * 
 * @since 0.2
 */

function unmus_remove_post_formats_for_standard_posts_in_editor () {

    global $pagenow;

    if ( 'post.php' === $pagenow && isset($_GET['post']) && 'post' === get_post_type( $_GET['post'] ) ) {
        remove_theme_support('post-formats');
    }
}
add_action( 'admin_init', 'unmus_remove_post_formats_for_standard_posts_in_editor' );

/**
 * Show Custom Fields Meta Box in Editor
 * 
 * ACF plugin disables the meta box for better performance as default
 * Filter below activates it again
 * 
 * @since 0.5
 * @see Advanced Custom Fields Plugin
 * @link https://www.advancedcustomfields.com
 */

if ( class_exists( 'ACF' ) ) {
add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );
}

?>