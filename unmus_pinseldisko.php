<?php

/* 
All about Pinseldisko
*/

/* 
Pinseldisko Custom Post Type
*/

function pinseldisko_custom_post_type() {

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
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields', 'author', 'trackbacks', 'comments', 'revisions', false),
			'has_archive'         => true,
			'can_export'          => true,
			'menu_position'       => 7,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'pinseldisko')
		);

		register_post_type( 'pinseldisko', $args );

}
add_action( 'init', 'pinseldisko_custom_post_type' );

/*
Pinseldisko @ Auf einen Blick
*/

function pinseldisko_cpt_glance_counter( $items = array() ) {
    $post_types = array( 'pinseldisko' ); 
    foreach( $post_types as $type ) {
        if( ! post_type_exists( $type ) ) continue;
        $num_posts = wp_count_posts( $type );
        if( $num_posts ) {
            $published = intval( $num_posts->publish );
            $post_type = get_post_type_object( $type );
            $text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
            $text = sprintf( $text, number_format_i18n( $published ) );
            if ( current_user_can( $post_type->cap->edit_posts ) ) {
            $output = '' . $text . '';
                echo '<li class="post-count"><a class="pinseldisko-count" href="edit.php?post_type=pinseldisko">' . $output . '</a></li>';
            } else {
            $output = '' . $text . '';
                echo ' ' . $output . '';
            }
        }
    }
    return $items;
}
add_filter( 'dashboard_glance_items', 'pinseldisko_cpt_glance_counter', 10, 1 );

/*
Adds Current Menu Item Class @ Nav (for Pinseldisko Archive Page 2 to n)
*/

function pinseldisko_nav_class( $classes, $item ) {

    if ( is_post_type_archive('pinseldisko') && $item->title == 'pinseldisko' ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'pinseldisko_nav_class', 10, 2 );

?>