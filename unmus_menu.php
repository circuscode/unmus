<?php

/**
 * Menu
 * 
 * @package unmus
 * @since 0.7
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Add Current Menu Item Class
 * 
 * Required for Custom Post Type Archive Pages (2 to n)
 *
 * @since 0.2
 * 
 * @param array $classes CSS Menu Item Classes
 * @param object $item Current Menu Item
 * @return array $classes CSS Menu Item Classes
 */

function unmus_menu_current_item_class( $classes, $item ) {

    if (!in_array('current-menu-item',$classes)){

        if(is_post_type_archive('pinseldisko') && $item->title == 'Pinseldisko') {
            $classes[] = 'current-menu-item';
        } 
        elseif(is_post_type_archive('raketenstaub') && $item->title == 'Raketenstaub') {
            $classes[] = 'current-menu-item';
        }
        elseif(is_post_type_archive('ello') && $item->title == 'Zimtwolke') {
            $classes[] = 'current-menu-item';
        }
        elseif(is_post_type_archive('podcast') && $item->title == 'Zirkusliebe') {
            $classes[] = 'current-menu-item';
        }

    }

    return $classes;

}
// This is not working anymore with Block Themes :-(
// add_filter( 'nav_menu_css_class', 'unmus_menu_current_item_class', 10, 2 );

?>