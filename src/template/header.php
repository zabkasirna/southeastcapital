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

    <?php // @todo Add all icons & favicons here ?>

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

    // debuggrr( $__post_slug );
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

    <header id="main-header">

        <div id="logo">
            <div class="faux-bg"><div class="faux-arrow"></div></div>
            <a class="logo-anchor" href="#">
                <img
                    class="js-svg-injector logo-img"
                    src="<?php echo get_template_directory_uri() . '/uploads/images/logo/logo.svg'; ?>"
                    alt="C"
                >
                <!-- <img class="inject-me" src="image-one.svg"> -->
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

            if ( $__post_slug !== 'test' ) {
                wp_nav_menu( $nav_main_defaults );
            }
        ?>
    </header>
