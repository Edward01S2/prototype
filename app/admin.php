<?php

/**
 * Theme admin.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

use WP_Customize_Manager;

use function Roots\asset;

/**
 * Register the `.brand` selector as the blogname.
 *
 * @param  \WP_Customize_Manager $wp_customize
 * @return void
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Register the customizer assets.
 *
 * @return void
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset('scripts/customizer.js')->uri(), ['customize-preview'], null, true);
});

add_action( 'wp_dashboard_setup', function () {
	remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
	//remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // At a Glance
	//remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
	remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
	remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
	remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
	remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
    remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
});

//Remove comments
add_action('init', function () {
    wp_deregister_script( 'comment-reply' );
});

//Disable Guteberg on certain pages and templates
add_filter( 'block_editor_settings' , function($settings) {
    unset($settings['styles'][0]);
    return $settings;
});

//Remove Yoast from Dashboard
add_action('wp_dashboard_setup', function() {
  // In some cases, you may need to replace 'side' with 'normal' or 'advanced'.
  remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
});