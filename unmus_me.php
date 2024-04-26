<?php

/**
 * Me
 * 
 * @package unmus
 * @since 0.8
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Mastodon Verification
 *
 * @since 0.8
 */

function unmus_mastodon_verification() {

   ?>

      <link href="https://mastodon.social/@irrlicht" rel="me">

   <?php

}
add_action('wp_head', 'unmus_mastodon_verification');

?>