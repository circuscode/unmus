<?php

/* 
Podcast Zirkusliebe
*/

/*
Zirkusliebe @ Auf einen Blick
*/

function zirkusliebe_cpt_glance_counter( $items = array() ) {
    $post_types = array( 'podcast' ); 
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
                echo '<li><a class="zirkusliebe-count" href="edit.php?post_type=podcast">' . $output . '</a></li>';
            } else {
            $output = '' . $text . '';
                echo ' ' . $output . '';
            }
        }
    }
    return $items;
}
add_filter( 'dashboard_glance_items', 'zirkusliebe_cpt_glance_counter', 10, 1 );

/*
Adds Current Menu Item Class @ Nav (for Zirkusliebe Archive Page 2 to n)
*/

function zirkusliebe_nav_class( $classes, $item ) {

    if ( is_post_type_archive('podcast') && $item->title == 'Zirkusliebe' ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'zirkusliebe_nav_class', 10, 2 );

/*
Modify Post per Page
*/

function unmus_zirkusliebe_change_posts_per_page( $query ) {

	$amountofposts=get_option('unmus_zirkusliebe_amountofposts');

    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'podcast' ) ) {
       $query->set( 'posts_per_page', $amountofposts );
    }
}
add_filter( 'pre_get_posts', 'unmus_zirkusliebe_change_posts_per_page' );

/*
Modify Podcast Excerpt
*/

function zirkusliebe_excerpt_modify($input) {

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
add_filter('the_excerpt', 'zirkusliebe_excerpt_modify');

?>