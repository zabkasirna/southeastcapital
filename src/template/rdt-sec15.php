<?php
/**
 * Core rdt-sec15 file
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 */

/**
 * HEAD CLEANUP
 */

function sec_head_cleanup() {

    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'sec_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'sec_remove_wp_ver_css_js', 9999 );

} /* end po15 head cleanup */

// remove WP version from RSS
function sec_rss_version() { return ''; }

// remove WP version from scripts
function sec_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) ) $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS from gallery
function sec_gallery_style($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/**
 * SCRIPTS & ENQUEUEING
 */

function sec_scripts_and_styles() {

    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    if (!is_admin()) {

        // modernizr
        wp_register_script( 'sec-modernizr', get_template_directory_uri() . '/script/vendor/modernizr/modernizr.js', array(), '', false );

        // jquery
        wp_register_script( 'sec-jquery', get_template_directory_uri() . '/script/vendor/jquery/dist/jquery.js', array(), '', true );

        // isotope
        // wp_register_script( 'sec-isotope', get_template_directory_uri() . '/script/vendor/isotope/dist/isotope.pkgd.js', array( 'sec-jquery' ), '', true );
        // wp_register_script( 'sec-isotope-fitrows', get_template_directory_uri() . '/script/vendor/isotope/js/layout-modes/fit-rows.js', array( 'sec-jquery', 'sec-isotope' ), '', true );
        // wp_register_script( 'sec-isotope-masonry', get_template_directory_uri() . '/script/vendor/isotope/js/layout-modes/masonry.js', array( 'sec-jquery', 'sec-isotope' ), '', true );
        // wp_register_script( 'sec-isotope-vertical', get_template_directory_uri() . '/script/vendor/isotope/js/layout-modes/vertical.js', array( 'sec-jquery', 'sec-isotope' ), '', true );

        // svg-injector
        wp_register_script( 'sec-svg-injector', get_template_directory_uri() . '/script/vendor/svg-injector/svg-injector.js', array(), '', true );

        // Snap.svg
        wp_register_script( 'sec-snap', get_template_directory_uri() . '/script/vendor/Snap.svg/dist/snap.svg.js', array(), '', true );

        // chroma
        // wp_register_script( 'sec-chroma', get_template_directory_uri() . '/script/vendor/chroma-js/chroma.js', array(), '', true );

        // waypoints
        wp_register_script( 'sec-waypoints', get_template_directory_uri() . '/script/vendor/waypoints/lib/jquery.waypoints.js', array( 'sec-jquery' ), '', true );
        wp_register_script( 'sec-waypoints-inview', get_template_directory_uri() . '/script/vendor/waypoints/lib/shortcuts/inview.js', array( 'sec-jquery', 'sec-waypoints' ), '', true );

        // verge
        wp_register_script( 'sec-verge', get_template_directory_uri() . '/script/vendor/verge/verge.js', array( 'sec-jquery' ), '', true );

        // jquery transit
        wp_register_script( 'sec-transit', get_template_directory_uri() . '/script/vendor/jquery.transit/jquery.transit.js', array( 'sec-jquery' ), '', true );

        // jquery flexslider
        wp_register_script( 'sec-fullpagejs', get_template_directory_uri() . '/script/vendor/fullpage.js/jquery.fullPage.js', array( 'sec-jquery' ), '', true );

        // formstone
        wp_register_script( 'sec-formstone-core', get_template_directory_uri() . '/script/vendor/formstone/dist/js/core.js', array( 'sec-jquery' ), '', true );
        wp_register_script( 'sec-formstone-transition', get_template_directory_uri() . '/script/vendor/formstone/dist/js/transition.js', array( 'sec-jquery', 'sec-formstone-core' ), '', true );
        wp_register_script( 'sec-formstone-mediaquery', get_template_directory_uri() . '/script/vendor/formstone/dist/js/mediaquery.js', array( 'sec-jquery', 'sec-formstone-core' ), '', true );
        wp_register_script( 'sec-formstone-touch', get_template_directory_uri() . '/script/vendor/formstone/dist/js/touch.js', array( 'sec-jquery', 'sec-formstone-core' ), '', true );
        wp_register_script( 'sec-formstone-carousel', get_template_directory_uri() . '/script/vendor/formstone/dist/js/carousel.js', array( 'sec-jquery', 'sec-formstone-core', 'sec-formstone-mediaquery', 'sec-formstone-touch' ), '', true );
        wp_register_script( 'sec-formstone-bg', get_template_directory_uri() . '/script/vendor/formstone/dist/js/background.js', array( 'sec-jquery', 'sec-formstone-core', 'sec-formstone-transition' ), '', true );
        wp_register_script( 'sec-formstone-dropdown', get_template_directory_uri() . '/script/vendor/formstone/dist/js/dropdown.js', array( 'sec-jquery', 'sec-formstone-core', 'sec-formstone-touch' ), '', true );

        // google map API
        wp_register_script('sec-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCtOSYUVdF-oELojMbyd_WD73PiRbBV5gk&sensor=true', array(), '3.15', true);

        // site
        wp_register_script( 'sec-js', get_template_directory_uri() . '/script/main.js', array( 'sec-jquery' ), '', true );

        // enqueue scripts
        wp_enqueue_script( 'sec-modernizr' );
        wp_enqueue_script( 'sec-jquery' );
        wp_enqueue_script( 'sec-svg-injector' );
        wp_enqueue_script( 'sec-snap' );
        wp_enqueue_script( 'sec-waypoints' );
        wp_enqueue_script( 'sec-waypoints-inview' );
        wp_enqueue_script( 'sec-verge' );
        wp_enqueue_script( 'sec-transit' );
        wp_enqueue_script( 'sec-fullpagejs' );
        wp_enqueue_script( 'sec-formstone-core' );
        wp_enqueue_script( 'sec-formstone-mediaquery' );
        wp_enqueue_script( 'sec-formstone-touch' );
        wp_enqueue_script( 'sec-formstone-transition' );
        wp_enqueue_script( 'sec-formstone-carousel' );
        wp_enqueue_script( 'sec-formstone-bg' );
        wp_enqueue_script( 'sec-formstone-dropdown' );
        // wp_enqueue_script( 'sec-google-maps-api' );
        wp_enqueue_script( 'sec-js' );

        // dequeue scripts
        wp_deregister_script( 'jquery-migrate' );
        wp_deregister_script( 'jquery-core' );

        // gs stylesheet
        wp_register_style( 'sec-gs-stylesheet', get_stylesheet_directory_uri() . '/gs.css', array(), '' );
        // main stylesheet
        wp_register_style( 'sec-stylesheet', get_stylesheet_directory_uri() . '/style.css', array( 'sec-gs-stylesheet' ), '', 'all' );
        // ie-only stylesheet
        // wp_register_style( 'sec-ie-stylesheet', get_stylesheet_directory_uri() . '/style.ie.css', array(), '' );

        // enqueue styles
        wp_enqueue_style( 'sec-gs-stylesheet' );
        wp_enqueue_style( 'sec-stylesheet' );
        // wp_enqueue_style( 'sec-ie-stylesheet' );

        // $wp_styles->add_data( 'sec-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet
    }
}

// Admin script queue
function sec_admin_scripts_and_styles() {}

/**
 * THEME SUPPORT
 */

function sec_theme_support() {

    // wp thumbnails (sizes handled in functions.php)
    add_theme_support( 'post-thumbnails' );

    // image sizes
    set_post_thumbnail_size(1200, 9999);

    // wp rss
    // add_theme_support('automatic-feed-links');
}

/**
 * MENUS
 */

// Register Navigation Menus
function sec_register_nav_menus() {

    $locations = array(
        'main-navi' => __( 'Site main navigations', 'text_domain' ),
        'mobile-navi' => __( 'Mobile main navigations', 'text_domain' ),
        'footer-navi' => __( 'footer links', 'text_domain' )
    );
    register_nav_menus( $locations );
}

function sec_toggle_nav_class( $classes, $item ) {
    if ( in_array( 'current-menu-item', $classes ) ) {
        $classes[] = 'active';
    }

    return $classes;
}


/**
 * OTHER CLEANUPS
 */

// remove the p from around imgs
// [ http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/ ]
function sec_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// Move author metabox on wp-admin
function remove_author_metabox() {
    remove_meta_box( 'authordiv', 'post', 'normal' );
}

function move_author_to_publish_metabox() {
    global $post_ID;
    $post = get_post( $post_ID );
    $_inline_style = 'style="border-top-style:solid; border-top-width:1px; border-top-color:#EEEEEE; border-bottom-width:0px;"';
    echo '<div id="author" class="misc-pub-section"' . $_inline_style . '>Author: ';
    post_author_meta_box( $post );
    echo '</div>';
}

function sec_get_posts( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'page', 'excitement', 'update' ) );

    return $query;
}

?>
