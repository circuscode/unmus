<?php

/*
SEO Framework Modifications
*/

/*
Filter Stack
*/

function unmus_seo_framework_filter_stack() {

        // Create Next-Previous @ Mathilda
        if (function_exists('mathilda_activate')) {
                if( mathilda_is_tweet_page() ) {

                        add_filter( 'the_seo_framework_paged_url_output_prev', 'mathilda_prev_meta_output' );
                        add_filter( 'the_seo_framework_paged_url_output_next', 'mathilda_next_meta_output' );
                        add_filter( 'the_seo_framework_pre', 'mathilda_canonical' );

                }
        }

        // Manipulate Titles
        add_filter( 'the_seo_framework_title_from_generation', 'unmus_seo_framework_manipulate_title', 10, 3 );

        // Manipulate Meta Descriptions
        add_filter( 'the_seo_framework_generated_description', 'unmus_seo_framework_manipulate_meta_description' );

        // Add noindex
        add_filter( 'the_seo_framework_robots_meta_array', 'unmus_robots_data_noindex', 10, 1 );

        // Structured Data
        add_filter( 'the_seo_framework_articles_default_meta', 'unmus_tsf_blogposting' );

        // Disable Cannonical for Archives and defined Pages
        if ( is_archive() OR is_search() OR ( is_paged() AND is_home() ) OR is_page('wordpress') OR is_page('notify-me')) {
                
                add_filter( 'the_seo_framework_rel_canonical_output', '__return_false' );
                
        }

}
add_action( 'template_redirect', 'unmus_seo_framework_filter_stack');   

/*
Manipulate Title
*/

function unmus_seo_framework_manipulate_title( $title, $args = array(), $escape = true ) {

        if ( is_post_type_archive('podcast') ) {
                        return 'Zirkusliebe';   
        }

        elseif (function_exists('mathilda_activate')) {

                if(mathilda_is_tweet_page()){
                $mathilda_subpage=mathilda_which_page();
                
                if($mathilda_subpage==1) {
                        return 'Tweets';
                }
                else {
                        $tweetspagedtitle='Tweets - Page '. $mathilda_subpage .'';
                        return $tweetspagedtitle;
                }
                }
        }
	return $title;

}

/*
Manipulate Meta Descriptions
*/

function unmus_seo_framework_manipulate_meta_description() {
	
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
	
}

/*  
Add noindex
*/

function unmus_robots_data_noindex( $robots ) {

        // get current page we are on. If not set we can assume we are on page 1.
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        // are we on page one?
        if(1 != $paged) {
        //true

                if ( is_post_type_archive('ello') OR is_post_type_archive('pinseldisko') OR is_post_type_archive('raketenstaub') OR is_post_type_archive('podcast') ) {
                        $robots['noindex']='noindex';
                }
                return $robots;
        }
}

/*
Create Canonicals @ Mathilda
*/

function mathilda_canonical() {
        
        $mathilda_subpage=mathilda_which_page();
        
        if($mathilda_subpage==1) {
                $mathilda_permalink=get_permalink();
        }
        else {
                $mathilda_permalink=get_permalink();
                $mathilda_permalink=$mathilda_permalink . $mathilda_subpage."/";
        }

        $output='<link rel="canonical" href="'.$mathilda_permalink.'" />';
        add_filter( 'the_seo_framework_rel_canonical_output', '__return_false' );
        return $output;

}

/*
Create NEXT @ Mathilda
*/

function mathilda_next_meta_output() {

        $mathilda_subpage=mathilda_which_page();
        $number_of_pages=mathilda_pages();

        $mathilda_permalink=get_permalink();
        $mathilda_permalink=$mathilda_permalink . ($mathilda_subpage+1)."/";
        
        if($mathilda_subpage==$number_of_pages) {
                $mathilda_permalink=false;
        }

        return esc_html( $mathilda_permalink );

}

/*
Create PREV @ Mathilda
*/

function mathilda_prev_meta_output() {

        if( is_page('tweets') ) {

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

/*
Schema BlogPosting
*/

function unmus_tsf_blogposting( $meta ) {
        $meta['type'] = 'BlogPosting';    
        return $meta;
}

?>