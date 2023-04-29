<?php

/**
 * Pinseldisko
 * 
 * @package unmus
 * 
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Create Custom Post Type Pinseldisko
 *
 */

function unmus_pinseldisko_custom_post_type() {

		$labels = array(
			'name'               => _x( 'Pinseldisko', 'post type general name' ),
			'singular_name'      => _x( 'Pinseldisko', 'post type singular name' ),
			'add_new'            => __( 'Erstellen'),
			'add_new_item'       => __( 'Erstellen' ),
			'edit_item'          => __( 'Beitrag bearbeiten' ),
			'new_item'           => __( 'Neuer Beitrag' ),
			'all_items'          => __( 'Alle Beiträge' ),
			'view_item'          => __( 'Beiträge ansehen' ),
			'search_items'       => __( 'Beiträge durchsuchen' ),
			'not_found'          => __( 'Keine Beiträge gefunden' ),
			'not_found_in_trash' => __( 'Keine Beiträge im Papierkorb gefunden' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Pinseldisko'
		);

		$supports = array( 
			'title', 
			'editor', 
			'thumbnail', 
			'excerpt',
			'custom-fields', 
			'author', 
			'trackbacks', 
			'comments', 
			'revisions', 
			false
		);

		$args = array(
			'labels'              => $labels,
			'description'         => 'Sketchnotes, Comics, Illustrationen',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'taxonomies' 		  => array('post_tag'),
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'supports'            => $supports,
			'has_archive'         => true,
			'can_export'          => true,
			'menu_position'       => 7,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'pinseldisko')
		);

		register_post_type( 'pinseldisko', $args );

}
add_action( 'init', 'unmus_pinseldisko_custom_post_type' );

/**
 * Adds Current Menu Item Class
 * 
 * Required for Pinseldisko Archive Pages (2 to n)
 *
 */

function unmus_pinseldisko_nav_class( $classes, $item ) {

    if ( is_post_type_archive('pinseldisko') && $item->title == 'pinseldisko' ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'unmus_pinseldisko_nav_class', 10, 2 );

?>