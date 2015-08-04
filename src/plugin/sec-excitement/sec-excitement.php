<?php
/**
 * @package rdt-sec15
 * @subpackage plugin/sec-excitement
 * @version 0.0.0
 * @since 0.0.0
 */
/*
Plugin Name: SEC Excitement
Plugin URI: http://github.com/zabkasirna/excitement
Description: Plugin for Excitement Custom Post
Author: Sirna
Version: 0.0.0
Author URI: http://github.com/zabkasirna
*/

// Register Custom Post Type
function register_cpt_excitement() {

    $labels = array(
        'name'                => _x( 'Excitements', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Excitement', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Excitement', 'text_domain' ),
        'name_admin_bar'      => __( 'Excitement', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Excitement:', 'text_domain' ),
        'all_items'           => __( 'All Excitements', 'text_domain' ),
        'add_new_item'        => __( 'New Excitement Setup', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Excitement', 'text_domain' ),
        'edit_item'           => __( 'Edit Excitement', 'text_domain' ),
        'update_item'         => __( 'Update Excitement', 'text_domain' ),
        'view_item'           => __( 'View Excitement', 'text_domain' ),
        'search_items'        => __( 'Search Excitement', 'text_domain' ),
        'not_found'           => __( 'Excitement Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Excitement Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'excitement', 'text_domain' ),
        'description'         => __( 'SEC Excitement Custom Post Type', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', 'post-formats' ),
        'taxonomies'          => array( 'excitement_type' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-post',
        'show_in_admin_bar'   => false,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
    );
    register_post_type( 'excitement', $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_cpt_excitement', 0 );

/**
 * Include the template files from the plugin dir
 * [http://code.tutsplus.com/tutorials/a-guide-to-wordpress-custom-post-types-taxonomies-admin-columns-filters-and-archives--wp-27898]
 */

function include_excitement_template( $template_path ) {

    if ( get_post_type() == 'excitement' ) {

        // Include single template
        if ( is_single() ) {

            if ( $theme_file = locate_template( array( 'single-excitement.php' ) ) ) {
                $template_path = $theme_file;
            }

            else {
                $template_path = plugin_dir_path( __FILE__ ) . 'template/single-excitement.php';
            }
        }

        // Include archive template
        elseif ( is_archive() && !is_tax('excitement_type') ) {

            if ( $theme_file = locate_template( array( 'archive-excitement.php' ) ) ) {
                $template_path = $theme_file;
            }

            else {
                $template_path = plugin_dir_path( __FILE__ ) . 'template/archive-excitement.php';
            }
        }
    }

    return $template_path;
}

add_filter( 'template_include', 'include_excitement_template', 1 );
?>