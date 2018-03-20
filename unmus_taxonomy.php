<?php

/* 
All about Taxonomies
*/ 

/* 
Zirkusliebe Taxonomy (like Category for Guests)
*/

add_action( 'init', 'create_artist_taxonomy' );

function create_artist_taxonomy() {

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

?>