<?php

/**
 * All about Podcast
 * 
 * @package unmus
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Modify Podcast Excerpt Length
 * 
 * Required for Taxonomy/Date Archives & Search.
 * Excerpt Lenght will be reduced to WordPress Standard.
 *
 * @since 0.2
 * 
 * @param string Excerpt
 * @return string Excerpt
 */

function unmus_zirkusliebe_modify_excerpt_length($input) {

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
add_filter('the_excerpt', 'unmus_zirkusliebe_modify_excerpt_length');

?>