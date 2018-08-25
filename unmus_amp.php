<?php

/*
AMP Enhancements
*/

if (function_exists ( 'amp_init' )) {

/* 
Add Piwik to AMD Pages
*/

function unmus_amp_add_piwik() {

    if( is_unmus_environment_public() ) {

    $piwik_url = 'https://matomo.unmus.de/';
    $piwik_site_id = '1';

    ?>
    <amp-pixel src="<?php echo $piwik_url; ?>matomo.php?idsite=<?php echo $piwik_site_id; ?>&rec=1&action_name=$TITLE&urlref=DOCUMENT_REFERRER&url=$CANONICAL_URL&rand=$RANDOM"></amp-pixel>
    <?php

    }
}

add_action( 'amp_post_template_footer', 'unmus_amp_add_piwik' );

}  // function exists

?>