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

/**
 * Mastodon Creator
 *
 * @since 0.8
 * @see https://blog.joinmastodon.org/2024/07/highlighting-journalism-on-mastodon/ 
 */

function unmus_mastodon_creator() {

   ?>

      <meta name="fediverse:creator" content="@irrlicht@mastodon.social">

   <?php

}
add_action('wp_head', 'unmus_mastodon_creator');

?>