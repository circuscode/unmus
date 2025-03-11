<?php

/**
 * SEO Framework Modifications
 * 
 * @package unmus
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Filter Stack
 * 
 * Includes all SEO manipulations to be applied.
 * 
 * @since 0.1
 */

function unmus_seo_framework_filter_stack() {

        // Manipulate Titles
        add_filter( 'the_seo_framework_title_from_generation', 'unmus_seo_framework_manipulate_title', 10, 3 );

        // Manipulate Meta Descriptions
        add_filter( 'the_seo_framework_generated_description', 'unmus_seo_framework_manipulate_meta_description' );

        // Disable Cannonical for Archives and Pages without Content
        if ( is_archive() OR is_search() OR ( is_paged() AND is_home() ) OR is_page('wordpress') OR is_page('notify-me')) {
               add_filter('the_seo_framework_meta_render_data','unmus_seo_framework_meta_remove_canonical');
        }

        // Create Next, Create Previous & Overwrite Canonicals @ Mathilda
        if(function_exists('mathilda_activate')) {
                if( mathilda_is_tweet_page() ) {
                        add_filter('the_seo_framework_meta_render_data','mathilda_set_prev');
                        add_filter('the_seo_framework_meta_render_data','mathilda_set_next');
                        add_filter('the_seo_framework_meta_render_data','mathilda_set_canonical');
                }
        }

        // Create Next, Create Previous & Overwrite Canonicals @ TootPress
        if(function_exists('tootpress_activate')) {
                if( tootpress_toot_here() ) {
                        add_filter('the_seo_framework_meta_render_data','tootpress_set_prev');
                        add_filter('the_seo_framework_meta_render_data','tootpress_set_next');
                        add_filter('the_seo_framework_meta_render_data','tootpress_set_canonical');
                }
        }       

}
if (defined('THE_SEO_FRAMEWORK_VERSION')) {
add_action( 'template_redirect', 'unmus_seo_framework_filter_stack');
}

/**
 * Manipulates the title for some pages
 * 
 * @since 0.1
 * 
 * @return string Manipulated Title
 */

function unmus_seo_framework_manipulate_title( $title, $args = array(), $escape = true ) {

        if ( is_post_type_archive('podcast') ) {     
                return 'Zirkusliebe'; 
        } 
        
        if(function_exists('mathilda_activate')) {
                if (mathilda_is_tweet_page()) {
                        $mathilda_subpage=mathilda_which_page();
                        if($mathilda_subpage==1) {
                                return 'Tweets';
                        } else {
                                $tweetspagedtitle='Tweets - Seite '. $mathilda_subpage .'';
                                return $tweetspagedtitle;
                        }
                }
        }

        if(function_exists('tootpress_activate')) {
                if (tootpress_toot_here()) {
                        $tootpress_page=tootpress_get_query_var();
                        if($tootpress_page==1) {
                                return 'Tröts';
                        } else {
                                $tootspagedtitle='Tröts - Seite '. $tootpress_page .'';
                                return $tootspagedtitle;
                        }   
                }
        }

	return $title;

}

/**
 * Manipulates the Meta Descriptions
 * 
 * @since 0.1
 * 
 * @param string Meta Description
 * @return string Manipulated Meta Description
 */

function unmus_seo_framework_manipulate_meta_description($description) {
	
	if ( is_post_type_archive('ello') ) {
                $description = 'Mid-size Bloggen';
                return esc_html( $description );
	}
	elseif ( is_post_type_archive('pinseldisko') ) {
                $description = 'Sketchnotes und Visual Storytelling';
                return esc_html( $description );
        }
        elseif ( is_post_type_archive('podcast') ) {
                $description = 'Podcast!';
                return esc_html( $description );
        }
        elseif ( is_post_type_archive('raketenstaub') ) {
                $description = 'Instagram on unmus';
                return esc_html( $description );
        }
        else {
                return esc_html( $description );
        }
	
}

/**
 * Creates the canonical URL for the Mathilda Pages 
 * 
 * @see Mathilda Plugin
 * 
 * @return html Cannonical Link
 */

function mathilda_canonical() {
        
        if(function_exists('mathilda_activate')) {

                $mathilda_subpage=mathilda_which_page();
                
                if($mathilda_subpage==1) {
                        $mathilda_canonical=get_permalink();
                } else {
                        $mathilda_canonical=get_permalink() . $mathilda_subpage."/";
                }

                return $mathilda_canonical;

        }
}

/**
 * Creates the canonical URL for the TootPress Pages 
 * 
 * @since 0.6
 * 
 * @see TootPress Plugin
 * 
 * @return html Cannonical Link
 */

function tootpress_canonical() {
        
        if(function_exists('tootpress_activate')) {

                $tootpress_subpage=tootpress_get_query_var();
                
                if($tootpress_subpage==1) {
                        $tootpress_canonical=get_permalink();
                } else {
                        $tootpress_canonical=get_permalink() . $tootpress_subpage."/";
                }

                return $tootpress_canonical;

        }

}

/**
 * Creates the NEXT Link for the Mathilda Pages
 * 
 * @see Mathilda Plugin
 * 
 * @return string Next Link
 */

function mathilda_next_meta_output() {

        if(function_exists('mathilda_activate')){

        $mathilda_subpage=mathilda_which_page();
        $number_of_pages=mathilda_pages();

        $mathilda_permalink=get_permalink();
        $mathilda_permalink=$mathilda_permalink . ($mathilda_subpage+1)."/";
        
        if($mathilda_subpage==$number_of_pages) {
                $mathilda_permalink=false;
        }

        return esc_html( $mathilda_permalink );
        
        }
}

/**
 * Creates the PREV Link for the Mathilda Pages
 * 
 * @see Mathilda Plugin
 * 
 * @return string Prev Link
 */

function mathilda_prev_meta_output() {

        if(function_exists('mathilda_activate')){

                $mathilda_subpage=mathilda_which_page();
                $number_of_pages=mathilda_pages();
                $mathilda_permalink=get_permalink();

                if($mathilda_subpage>2) {
                        $mathilda_permalink=$mathilda_permalink . ($mathilda_subpage-1)."/";
                }
                
                if($mathilda_subpage==1) {
                        $mathilda_permalink=false;
                }

                return esc_html( $mathilda_permalink );

        }
}

/**
 * Creates the NEXT Link for the TootPress Pages
 * 
 * @since 0.6
 * 
 * @see TootPress Plugin
 * 
 * @return string Next Link
 */

function tootpress_next_meta_output() {

        if( function_exists('tootpress_activate') ) {

                $tootpress_subpage=tootpress_get_query_var();
                $number_of_pages=tootpress_amount_of_pages();

                $tootpress_permalink=get_permalink();
                $tootpress_permalink=$tootpress_permalink . ($tootpress_subpage+1)."/";
                
                if($tootpress_subpage==$number_of_pages) {
                        $tootpress_permalink=false;
                }

                return esc_html( $tootpress_permalink );

        }
}

/**
 * Creates the PREV Link for the TootPress Pages
 * 
 * @since 0.6
 * 
 * @see TootPress Plugin
 * 
 * @return string Prev Link
 */

function tootpress_prev_meta_output() {

        if( function_exists('tootpress_activate') ) {

                $tootpress_subpage=tootpress_get_query_var();
                $number_of_pages=tootpress_amount_of_pages();
                $tootpress_permalink=get_permalink();

                if($tootpress_subpage>2) {
                        $tootpress_permalink=$tootpress_permalink . ($tootpress_subpage-1)."/";
                }

                if($tootpress_subpage==1) {
                        $tootpress_permalink=false;
                }

        return esc_html( $tootpress_permalink );

        }
}

// TSF 5.0
// New technical approach
// Background: depreciated filters

/**
 * Removes the Canonical Link
 * 
 * @since 0.8
 * 
 * @param array $tags_render_data
 * @return array $tags_render_data
 */

function unmus_seo_framework_meta_remove_canonical($tags_render_data) {

	unset( $tags_render_data['canonical'] );
        return $tags_render_data;

}

/**
 * Set Tootpress Canonical
 * 
 * @since 0.8
 * 
 * @param array $tags_render_data
 * @return array $tags_render_data
 */

function tootpress_set_canonical($tags_render_data) {

	$tags_render_data['canonical']['attributes']['href'] = tootpress_canonical();
        return $tags_render_data;

}

/**
 * Set Tootpress Next Link
 * 
 * @since 0.8
 * 
 * @param array $tags_render_data
 * @return array $tags_render_data
 */

 function tootpress_set_next($tags_render_data) {
        
        $next_meta_content=tootpress_next_meta_output();

        if($next_meta_content!='') {
       
                $tags_render_data['next'] = [

                        'tag' => 'link',
                        'attributes' => [
                                'rel' => 'next',
                                'href' => $next_meta_content,
                        ]
                ];

        }

        return $tags_render_data;

}

/**
 * Set Tootpress Prev Link
 * 
 * @since 0.8
 * 
 * @param array $tags_render_data
 * @return array $tags_render_data
 */

 function tootpress_set_prev($tags_render_data) {
       
        $prev_meta_content=tootpress_prev_meta_output();

        if($prev_meta_content!='') {

                $tags_render_data['prev'] = [

                        'tag' => 'link',
                        'attributes' => [
                                'rel' => 'prev',
                                'href' => $prev_meta_content,
                        ]
                ];

        }

        return $tags_render_data;

}

/**
 * Set Mathilda Canonical
 * 
 * @since 0.8
 * 
 * @param array $tags_render_data
 * @return array $tags_render_data
 */

 function mathilda_set_canonical($tags_render_data) {

	$tags_render_data['canonical']['attributes']['href'] = mathilda_canonical();
        return $tags_render_data;

}

/**
 * Set Mathilda Next Link
 * 
 * @since 0.8
 * 
 * @param array $tags_render_data
 * @return array $tags_render_data
 */

 function mathilda_set_next($tags_render_data) {
        
        $next_meta_content=mathilda_next_meta_output();

        if($next_meta_content!='') {
       
                $tags_render_data['next'] = [

                        'tag' => 'link',
                        'attributes' => [
                                'rel' => 'next',
                                'href' => $next_meta_content,
                        ]
                ];

        }

        return $tags_render_data;

}

/**
 * Set Mathilda Prev Link
 * 
 * @since 0.8
 * 
 * @param array $tags_render_data
 * @return array $tags_render_data
 */

 function mathilda_set_prev($tags_render_data) {
       
        $prev_meta_content=mathilda_prev_meta_output();

        if($prev_meta_content!='') {

                $tags_render_data['prev'] = [

                        'tag' => 'link',
                        'attributes' => [
                                'rel' => 'prev',
                                'href' => $prev_meta_content,
                        ]
                ];

        }

        return $tags_render_data;

}

?>