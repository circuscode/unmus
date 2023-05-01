<?php

/**
 * Resources
 * 
 * Disable Resources not required increases site performance.
 * 
 * @package unmus
 * @since 0.5
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Remove Podlove Publisher Resources
 *
 * @since 0.7
 * @see Plugin Podlove Publisher
 */

function unmus_remove_podlove_publisher_resources(){

    if(! ( is_post_type_archive('podcast') OR ('podcast' == get_post_type() ) ) )
    {
        wp_dequeue_style( 'podlove-frontend-css' );
    }

    if (! (is_admin() OR is_user_logged_in() ) ) 
    {
        wp_dequeue_style( 'podlove-admin-font' );
    }

}
if (function_exists('load_podlove_podcast_publisher')) {
    add_action('wp_enqueue_scripts', 'unmus_remove_podlove_publisher_resources');
}

/**
 * Remove Podlove Web Player Resources
 *
 * @since 0.7
 * @see Plugin Podlove Web Player
 */

function unmus_remove_podlove_web_player_resources(){

    if(! ( is_post_type_archive('podcast') OR ('podcast' == get_post_type() ) ) )
    {
        // Podlove WebPlayer 5
        wp_dequeue_script( 'podlove-web-player-player' );
        wp_dequeue_script( 'podlove-web-player-player-cache' );
    }
}
if (function_exists('run_podlove_web_player')) {
    add_action('wp_enqueue_scripts', 'unmus_remove_podlove_web_player_resources',99);
}

/**
 * Disable Emoji Resources
 * 
 * @link https://kinsta.com/knowledgebase/disable-emojis-wordpress/#disable-emojis-code
 */

function unmus_remove_emoji_resources() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    if ( class_exists( 'Classic_Editor' ) ) {
        add_filter('tiny_mce_plugins', 'unmus_remove_tinymce_emoji');
    }
}
add_action('init', 'unmus_remove_emoji_resources');

/**
 * Remove TinyMCE Emoji Plugin
 * 
 * @param array
 * @return array
 */

function unmus_remove_tinymce_emoji($plugins) {
    if (!is_array($plugins))
        {
        return array();
        }
    return array_diff($plugins, array(
        'wpemoji'
    ));
}

?>