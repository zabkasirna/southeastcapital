<?php
/**
 * @package rdt-sec15
 * @subpackage header
 * @since 0.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <?php // force Internet Explorer to use the latest rendering engine available ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title(''); ?></title>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <?php // Favicon ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#b05158">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#b05158">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php // wordpress head functions ?>
    <?php wp_head(); ?>
    <?php // end of wordpress head ?>

    <?php // drop Google Analytics Here ?>
    <?php // end analytics ?>
</head>

<?php
    global $wp_query;
    $__post = $wp_query->post;
    $__post_id = $__post->ID;
    $__post_slug = $__post->post_name;
    $__post_type = $__post->post_type;

    // debuggrr( $__post );
?>

<?php

    // Body css class modifiers

    $body_class = array();

    // Add preload toggler to body class
    $body_class[] = 'is-preload';

    // Add Debuggrr toggler to body class
    if( get_field( 'field_debuggrr_toggler', 'options' ) ) :
        $is_debugged = get_field( 'field_debuggrr_toggler', 'options' );

        if ( $is_debugged ) $body_class[] = 'is-debugged';

    endif;
?>

<body
    <?php body_class( $body_class ); ?>
>

<div id="page" class="hfeed site">

<?php if ( $__post_slug !== 'test' ) : ?>

    <?php
        $_secss_class = "";
        if ( get_field( 'is_sec_slideshow', 'option' ) ) {
            $_secss_class .= 'on-layout  is-secss';
        } else {
            $_secss_class .= 'on-layout';
        }
    ?>

    <header id="main-header" class='<?php echo $_secss_class; ?>'>

        <div class="faux-bg"></div>

        <div id="logo">
            <div class="faux-bg"><div class="faux-arrow"></div></div>

            <a class="logo-anchor" href="<?php echo home_url( '/' ); ?>">
                <img
                    class="js-svg-injector logo-img"
                    src="<?php echo get_template_directory_uri() . '/uploads/images/logo/logo.svg'; ?>"
                    alt="C"
                >
            </a>
        </div>

        <?php 
            $nav_main_defaults = array(
                'theme_location'  => 'main-navi',
                'container'       => 'nav',
                'container_class' => '',
                'container_id'    => 'header-nav',
                'menu_class'      => '',
                'menu_id'         => 'nav-lists',
                'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                'link_before'     => '',
                'after'           => '',
            );

            wp_nav_menu( $nav_main_defaults );
        ?>

    </header>
<?php endif; ?>
