<?php

/**
 * All about Podcast
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Adds Current Menu Item Class
 * 
 * Required for Podcast Archive Pages (2 to n)
 *
 */

function unmus_zirkusliebe_nav_class( $classes, $item ) {

    if ( is_post_type_archive('podcast') && $item->title == 'Zirkusliebe' ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;

}
if (function_exists('load_podlove_podcast_publisher')) {
    add_filter( 'nav_menu_css_class', 'unmus_zirkusliebe_nav_class', 10, 2 );
}

/**
 * Modify Podcast Excerpt Length
 * 
 * I do not remember why I have created this function.
 *
 */

function unmus_zirkusliebe_excerpt_modify($input) {

    if('podcast' == get_post_type()) {

        $word_count = str_word_count( strip_tags( $input ) );

        if ($word_count > 65 ) {

            $text = $input;
            $text = str_replace(']]>', ']]>', $text);
            $text = strip_tags($text);
            $excerpt_length = 55;
            $words = explode(' ', $text, $excerpt_length + 1);
            if (count($words)> $excerpt_length) {
                array_pop($words);
                array_push($words, '[...]');
                $text = implode(' ', $words);
            }
            return '<p>'.$text.'</p>';

        }
        else {
            return $input;
        }
    }
    else { 
        return $input;
    }

}
if (function_exists('load_podlove_podcast_publisher')) {
    add_filter('the_excerpt', 'unmus_zirkusliebe_excerpt_modify');
}

?>