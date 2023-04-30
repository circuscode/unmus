<?php

/**
 * All about Raketenstaub
 * 
 * @package unmus
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Create Custom Post Type Raketenstaub
 *
 * @since 0.1
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

?>