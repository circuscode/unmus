<?php

/**
 * SEO Framework Modifications
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Filter Stack
 * 
 * Includes all SEO manipulations to be applied.
 */

function unmus_seo_framework_filter_stack() {

        // Manipulate Titles
        add_filter( 'the_seo_framework_title_from_generation', 'unmus_seo_framework_manipulate_title', 10, 3 );

        // Manipulate Meta Descriptions
        add_filter( 'the_seo_framework_generated_description', 'unmus_seo_framework_manipulate_meta_description' );

        // Disable Cannonical for Archives and Pages without Content
        if ( is_archive() OR is_search() OR ( is_paged() AND is_home() ) OR is_page('wordpress') OR is_page('notify-me')) {
                add_filter( 'the_seo_framework_rel_canonical_output', '__return_false' );
        }

        // Create Next, Create Previous & Overwrite Canonicals @ Mathilda
        if(function_exists('mathilda_activate')) {
                if( mathilda_is_tweet_page() ) {
                        add_filter( 'the_seo_framework_paged_url_output_prev', 'mathilda_prev_meta_output' );
                        add_filter( 'the_seo_framework_paged_url_output_next', 'mathilda_next_meta_output' );
                        add_filter( 'the_seo_framework_rel_canonical_output', 'mathilda_canonical' );
                }
        }

        // Create Next, Create Previous & Overwrite Canonicals @ TootPress
        if(function_exists('tootpress_activate')) {
                if( tootpress_toot_here() ) {
                        add_filter( 'the_seo_framework_paged_url_output_prev', 'tootpress_prev_meta_output' );
                        add_filter( 'the_seo_framework_paged_url_output_next', 'tootpress_next_meta_output' );
                        add_filter( 'the_seo_framework_rel_canonical_output', 'tootpress_canonical' );
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
 * @see TootPress Plugin
 * @since 0.6
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
                $mathilda_permalink=$mathilda_permalink . ($mathilda_subpage-1)."/";
                
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
 * @return string Prev Link
 */

function tootpress_prev_meta_output() {

        if( function_exists('tootpress_activate') ) {

                $tootpress_subpage=tootpress_get_query_var();
                $number_of_pages=tootpress_amount_of_pages();

                $tootpress_permalink=get_permalink();
                $tootpress_permalink=$tootpress_permalink . ($tootpress_subpage-1)."/";
                
                if($tootpress_subpage==1) {
                        $tootpress_permalink=false;
                }

        return esc_html( $tootpress_permalink );

        }
}

?>