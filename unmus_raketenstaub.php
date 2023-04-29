<?php

/**
 * All about Raketenstaub
 * 
 * @package unmus
 * 
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Create Custom Post Type Raketenstaub
 *
 */

function unmus_raketenstaub_custom_post_type() {

		$labels = array(
			'name'               => _x( 'Raketenstaub', 'post type general name' ),
			'singular_name'      => _x( 'Raketenstaub', 'post type singular name' ),
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
			'menu_name'          => 'Raketenstaub'
		);

		$supports = array(
			'title', 
			'editor', 
			'thumbnail', 
			'custom-fields', 
			'author', 
			'trackbacks', 
			'comments', 
			'revisions', 
			false
		);

		$args = array(
			'labels'              => $labels,
			'description'         => 'Fotos',
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
			'menu_position'       => 9,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'raketenstaub')
		);

		register_post_type( 'raketenstaub', $args );

}
add_action( 'init', 'unmus_raketenstaub_custom_post_type' );

/**
 * Adds Current Menu Item Class
 * 
 * Required for Raketenstaub Archive Pages (2 to n)
 *
 */

function unmus_raketenstaub_nav_class( $classes, $item ) {

    if ( is_post_type_archive('raketenstaub') && $item->title == 'Raketenstaub' ) {
        $classes[] = 'current-menu-item';
    }
    return $classes;

}
add_filter( 'nav_menu_css_class', 'unmus_raketenstaub_nav_class', 10, 2 );

?>