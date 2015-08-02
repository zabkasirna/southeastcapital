<?php
/**
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 */

// Load Sirna debugger
require_once( 'Debug/debuggrr_helper.php' );
require_once( 'Debug/debuggrr.php' );

// Load theme's core
require_once( 'rdt-sec15.php' );

// Load theme's acf options page
require_once( 'Theme_Options/theme_options.php' );

// Conf at theme launch
function sec_conf() {

    // Head cleanup
    add_action( 'init', 'sec_head_cleanup' );

    // Menu
    add_action( 'init', 'sec_register_nav_menus' );
    add_filter( 'nav_menu_css_class', 'sec_toggle_nav_class', 10, 2 );

    // Remove wp version from rss
    add_filter( 'the_generator', 'sec_rss_version' );

    // Enqueue scripts & styles
    add_action( 'wp_enqueue_scripts', 'sec_scripts_and_styles', 999 );

    // theme support after theme setup
    sec_theme_support();

    // clean up random code around images
    add_filter( 'the_content', 'sec_filter_ptags_on_images' );

    add_action( 'admin_menu', 'remove_author_metabox' );
    add_action( 'post_submitbox_misc_actions', 'move_author_to_publish_metabox' );

    // ACF Options Page
    initThemeOptions();

    // Debugger
    add_filter( 'template_include', 'var_template_include', 1000 );
}

add_action( 'after_setup_theme', 'sec_conf' );
?>