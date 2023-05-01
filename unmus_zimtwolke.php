<?php

/**
 * All about Zimtwolke
 * 
 * @package unmus
 * 
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Create Custom Post Type Ello (Zimtwolke)
 *
 */

function unmus_ello_custom_post_type() {

		$labels = array(
			'name'               => _x( 'Zimtwolke', 'post type general name' ),
			'singular_name'      => _x( 'Zimtwolke', 'post type singular name' ),
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
			'menu_name'          => 'Zimtwolke'
		);

		$supports = array(
			'title',
			'editor',
			false,
			'author',
			'trackbacks',
			'comments',
			'revisions',
			'post-formats',
			'custom-fields'
		);

		$args = array(
			'labels'              => $labels,
			'description'         => 'That is Zimtwolke!',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'taxonomies' => array('post_tag'),
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'supports'            => $supports,
			'has_archive'         => true,
			'can_export'          => true,
			'menu_position'       => 5,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'zimtwolke' ),
			'show_in_rest'        => true
		);

		register_post_type( 'ello', $args );

}
add_action( 'init', 'unmus_ello_custom_post_type' );

/**
 * Adds Current Menu Item Class
 * 
 * Required for Ello Archive Pages (2 to n)
 *
 */

function unmus_ello_special_nav_class( $classes, $item ) {

    if ( is_post_type_archive('ello') && $item->title == 'Zimtwolke' ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'unmus_ello_special_nav_class', 10, 2 );

?>