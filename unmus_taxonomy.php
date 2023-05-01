<?php

/**
 * All about Taxonomies
 * 
 * @package unmus 
 * @since 0.2
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }
 
/**
 * Create Artists Taxonomy
 *
 * Reference: Custom Post Type Podcast (Zirkusliebe)
 * 
 * @since 0.2
 */

function unmus_create_artist_taxonomy() {

	$labels = array(
		'name' => _x( 'Artisten', 'taxonomy general name' ),
		'singular_name' => _x( 'Artist', 'taxonomy singular name' ),
		'search_items' =>  __( 'Artisten suchen' ),
		'popular_items' => __( 'Beliebte Artisten' ),
		'all_items' => __( 'Alle Artisten' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Artist bearbeiten' ), 
		'update_item' => __( 'Artist aktualisieren' ),
		'add_new_item' => __( 'Neuen Artisten hinzufügen' ),
		'new_item_name' => __( 'Neuer Name' ),
		'separate_items_with_commas' => __( 'Artisten durch Kommas trennen' ),
		'add_or_remove_items' => __( 'Artisten hinzufügen oder entfernen' ),
		'choose_from_most_used' => __( 'Wähle aus den meistgenutzen Artisten' ),
		'menu_name' => __( 'Artisten' ),
	  ); 

	register_taxonomy(
		'artist',
		'podcast',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'artist'
			)
		)
	);
}
add_action( 'init', 'unmus_create_artist_taxonomy' );

/**
 * Create Fotoalbum Taxonomy
 *
 * Reference: Custom Post Type Raketenstaub
 * 
 * @since 0.5
 */

function unmus_create_raketen_taxonomy() {

	$labels = array(
		'name' => _x( 'Fotoalbum', 'taxonomy general name' ),
		'singular_name' => _x( 'Fotoalbum', 'taxonomy singular name' ),
		'search_items' =>  __( 'Fotoalbum suchen' ),
		'popular_items' => __( 'Beliebte Fotoalben' ),
		'all_items' => __( 'Alle Fotoalben' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Fotoalbum bearbeiten' ), 
		'update_item' => __( 'Fotoalbum aktualisieren' ),
		'add_new_item' => __( 'Neues Fotoalbum hinzufügen' ),
		'new_item_name' => __( 'Neuer Name' ),
		'separate_items_with_commas' => __( 'Fotoalben durch Kommas trennen' ),
		'add_or_remove_items' => __( 'Fotoalben hinzufügen oder entfernen' ),
		'choose_from_most_used' => __( 'Wähle aus den meistgenutzen Fotoalben' ),
		'menu_name' => __( 'Fotoalben' ),
	  ); 

	register_taxonomy(
		'fotoalbum',
		'raketenstaub',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'fotoalbum'
			)
		)
	);
}
add_action( 'init', 'unmus_create_raketen_taxonomy' );

/**
 * Create Kunsthalle Taxonomy
 *
 * Reference: Custom Post Type Pinseldisko
 * 
 * @since 0.5
 */

function unmus_create_pinseldisko_taxonomy() {

	$labels = array(
		'name' => _x( 'Kunsthalle', 'taxonomy general name' ),
		'singular_name' => _x( 'Kunsthalle', 'taxonomy singular name' ),
		'search_items' =>  __( 'Kunsthalle suchen' ),
		'popular_items' => __( 'Beliebte Kunsthallen' ),
		'all_items' => __( 'Alle Kunsthallen' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Kunsthalle bearbeiten' ), 
		'update_item' => __( 'Kunsthalle aktualisieren' ),
		'add_new_item' => __( 'Neue Kunsthalle hinzufügen' ),
		'new_item_name' => __( 'Neuer Name' ),
		'separate_items_with_commas' => __( 'Kunsthallen durch Kommas trennen' ),
		'add_or_remove_items' => __( 'Kunsthalle hinzufügen oder entfernen' ),
		'choose_from_most_used' => __( 'Wähle aus den meistgenutzen Kunsthallen' ),
		'menu_name' => __( 'Kunsthalle' ),
	  ); 

	register_taxonomy(
		'kunsthalle',
		'pinseldisko',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'kunsthalle'
			)
		)
	);
}
add_action( 'init', 'unmus_create_pinseldisko_taxonomy' );


/**
 * Create Tagebuch Taxonomy
 *
 * Reference: Custom Post Type Ello (Zimtwolke)
 * 
 * @since 0.5
 */

function unmus_create_zimtwolke_taxonomy() {

	$labels = array(
		'name' => _x( 'Tagebuch', 'taxonomy general name' ),
		'singular_name' => _x( 'Tagebuch', 'taxonomy singular name' ),
		'search_items' =>  __( 'Tagebuch suchen' ),
		'popular_items' => __( 'Beliebte Tagebücher' ),
		'all_items' => __( 'Alle Tagebücher' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Tagebuch bearbeiten' ), 
		'update_item' => __( 'Tagebuch aktualisieren' ),
		'add_new_item' => __( 'Neues Tagebuch hinzufügen' ),
		'new_item_name' => __( 'Neuer Name' ),
		'separate_items_with_commas' => __( 'Tagebücher durch Kommas trennen' ),
		'add_or_remove_items' => __( 'Tagebuch hinzufügen oder entfernen' ),
		'choose_from_most_used' => __( 'Wähle aus den meistgenutzen Tagebüchern' ),
		'menu_name' => __( 'Tagebücher' ),
	  ); 

	register_taxonomy(
		'tagebuch',
		'ello',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'tagebuch'
			)
		)
	);
}
add_action( 'init', 'unmus_create_zimtwolke_taxonomy' );

?>