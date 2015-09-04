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

    <?php // Favicon
        $shortcut_icon = array(
            "apple_sizes" => array(
                    '57x57',
                    '60x60',
                    '72x72',
                    '76x76',
                    '114x114',
                    '120x120',
                    '144x144',
                    '152x152',
                    '180x180'
                ),
            "default_sizes" => array(
                    '32x32',
                    '194x194',
                    '96x96',
                    '192x192',
                    '16x16'
                ),
            "msapplication_sizes" => array( '144x144' )
        );
    ?>

    <?php foreach ($shortcut_icon['apple_sizes'] as $key => $value) : ?>
        <link
            rel="apple-touch-icon"
            sizes="<?php echo $value ?>"
            href="<?php
                echo get_template_directory_uri() . '/favicons/apple-touch-icon-' . $value . '.png'; ?>">
    <?php endforeach; ?>

    <?php foreach ($shortcut_icon['default_sizes'] as $key => $value) : ?>
        <link
            rel="icon"
            type="image/png"
            href="<?php echo get_template_directory_uri() . '/favicons/favicon-' . $value . '.png'; ?>"
            sizes="<?php echo $value; ?>">
    <?php endforeach; ?>

    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#b05158">
    <meta name="msapplication-TileImage"
        content="<?php echo get_template_directory_uri() . '/favicons/mstile-' . $value . '.png'; ?>">
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
    // $body_class[] = 'is-preload';

    // Add Debuggrr toggler to body class
    if( get_field( 'field_debuggrr_toggler', 'options' ) ) :
        $is_debugged = get_field( 'field_debuggrr_toggler', 'options' );

        if ( $is_debugged ) $body_class[] = 'is-debugged';

    endif;
?>

<body
    <?php body_class( $body_class ); ?>
    <?php if ( is_home() ) : ?>
        data-section="#intro"
    <?php endif; ?>
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

        <div id="logo" >
            <div class="faux-bg"><div class="faux-arrow"></div></div>

            <?php
                $_logo_href = "";
                if ( get_field( 'is_sec_slideshow', 'option' ) ) {
                    $_logo_href = 'javascript:void(0);';
                } else {
                    $_logo_href .= home_url( '/' ) . '#intro';
                }
            ?>

            <a class="logo-anchor"
                <?php echo "href=" . $_logo_href; ?>
                >

                <svg xmlns="http://www.w3.org/2000/svg"
                    width="160"
                    height="64"
                    viewBox="0 0 160 64"
                    class="logo-img">
                  <g fill="#838393">
                    <path d="M67.176 39.514c-1.605 0-2.714-1.337-2.714-2.943v-.026c0-1.606 1.137-2.917 2.714-2.917.938 0 1.675.4 2.397 1.057l1.31-1.512c-.868-.856-1.927-1.445-3.692-1.445-2.876 0-4.883 2.18-4.883 4.844v.027c0 2.69 2.047 4.816 4.803 4.816 1.806 0 2.876-.64 3.84-1.672l-1.312-1.325c-.735.67-1.39 1.1-2.462 1.1zM96.06 31.888h2.06v9.365h-2.06zM88.857 31.888H85.03v9.365h2.06v-2.817h1.81c1.985-.085 3.543-1.2 3.543-3.283v-.028c0-1.913-1.352-3.237-3.586-3.237zm1.5 3.304c0 .803-.603 1.42-1.634 1.42H87.09v-2.865h1.594c1.03 0 1.673.496 1.673 1.418v.027zM77.638 31.373l-4.473 8.365v1.515h1.528l.774-1.515 2.17-4.252 2.172 4.252.773 1.515h1.527v-1.515M115.906 31.373l-4.472 8.365v1.515h1.527l2.946-5.767 2.946 5.767h1.525v-1.515"></path>
                    <g>
                      <path d="M101.695 33.787h2.85v7.466h2.062v-9.366h-4.912M106.607 31.888c0 1.05.85 1.9 1.9 1.9h.95v-1.9h-2.85z"></path>
                    </g>
                    <g>
                      <path d="M128.01 39.38c-1.036 0-1.875.84-1.875 1.873h4.67V39.38h-2.795z"></path>
                      <path d="M124.075 31.888h2.06v9.365h-2.06z"></path>
                    </g>
                    <g>
                      <path d="M62.617 25.668l.636-.756c.576.5 1.152.782 1.9.782.652 0 1.065-.3 1.065-.756v-.018c0-.43-.24-.662-1.358-.92-1.28-.31-2.002-.687-2.002-1.796v-.017c0-1.03.86-1.744 2.053-1.744.878 0 1.574.266 2.184.756l-.568.798c-.54-.404-1.082-.62-1.632-.62-.62 0-.98.32-.98.714v.017c0 .463.275.67 1.427.944 1.273.31 1.935.765 1.935 1.762v.017c0 1.126-.885 1.796-2.148 1.796-.92 0-1.788-.318-2.51-.962zM70.085 23.554v-.017c0-1.693 1.306-3.11 3.153-3.11 1.848 0 3.137 1.4 3.137 3.093v.017c0 1.693-1.306 3.11-3.154 3.11-1.846 0-3.135-1.4-3.135-3.093zm5.182 0v-.017c0-1.17-.85-2.14-2.046-2.14-1.194 0-2.027.954-2.027 2.123v.017c0 1.17.85 2.14 2.045 2.14 1.195 0 2.03-.955 2.03-2.123zM79.43 23.992V20.53h1.058v3.42c0 1.116.576 1.718 1.52 1.718.938 0 1.513-.567 1.513-1.676V20.53h1.057v3.41c0 1.796-1.013 2.698-2.586 2.698-1.562 0-2.56-.902-2.56-2.646zM95.322 20.53h1.057v2.5h2.87v-2.5h1.056v6.014H99.25V24.01h-2.87v2.534H95.32V20.53zM103.693 20.528h4.46v.945h-3.403v1.564h3.017v.945h-3.017v1.616h3.446v.945h-4.503v-6.015zM118.72 25.667l.635-.756c.576.5 1.152.783 1.9.783.652 0 1.065-.3 1.065-.756v-.017c0-.43-.24-.662-1.358-.92-1.28-.31-2.002-.687-2.002-1.796v-.017c0-1.03.86-1.744 2.054-1.744.877 0 1.572.266 2.183.756l-.568.798c-.542-.404-1.083-.62-1.633-.62-.62 0-.98.32-.98.714v.017c0 .463.275.67 1.427.944 1.272.31 1.934.765 1.934 1.762v.017c0 1.126-.886 1.796-2.148 1.796-.92 0-1.79-.32-2.51-.963zM116.284 25.794l-2.76-5.472-2.766 5.488v.733h.73l2.037-4.04 2.03 4.04h.73M87.442 21.508h1.908v5.036h1.065V20.53h-2.973M90.415 20.53c0 .54.438.98.98.98h.928v-.98h-1.908zM125.925 21.508h1.908v5.036h1.066V20.53h-2.975M128.9 20.53c0 .54.437.98.98.98h.927v-.98H128.9z"></path>
                    </g>
                  </g>
                  <path fill="#838393" d="M47.898 51.412l-6.675 3.854-6.675-3.854v2.006l6.675 3.854 6.675-3.854"></path>
                  <path fill="#A05D5D" d="M52.256 35.21v8.544l-11.032 6.37-11.032-6.37v-22.92h22.064v5.684h1v-6.685H29.193V44.31l12.03 6.945 12.03-6.945v-9.1"></path>
                  <path fill="#A05D5D" d="M48.248 35.21v6.328l-7.024 4.055-7.024-4.056V16.824h14.048v9.694h1V15.82H33.2v26.273l8.024 4.632 8.023-4.63V35.21"></path>
                  <path fill="#A05D5D" d="M46.243 35.21v5.22l-5.02 2.898-5.017-2.897V14.82h10.037v11.7h.998V13.815H35.208v27.17l6.017 3.475 6.017-3.473V35.21"></path>
                  <path fill="#A05D5D" d="M50.253 35.21v7.435l-9.03 5.213-9.028-5.213V18.83h18.058v7.688h.998v-8.69H31.198V43.2l10.027 5.79L51.25 43.2v-7.99"></path>
                  <path fill="#A05D5D" d="M44.237 35.21v4.114l-3.013 1.74-3.012-1.74V12.812h6.025v13.706h.998v-14.71h-8.022V39.88l4.01 2.315 4.012-2.315v-4.67"></path>
                  <path fill="#838393" d="M35.248 6.73H47.28v1.736H35.248z"></path>
                  <path fill="#A05D5D" d="M41.79 41.63h-1.132M37.213 39.88l1-.556"></path>
                </svg>
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
                'walker'          => new SEC_Walker()
            );

            wp_nav_menu( $nav_main_defaults );
        ?>

        <a class="contact-toggle" href="#"><span>CONTACT US</span></a>

        <div class="contact-form-wrapper">
            <div class="contact-form">
                <?php echo do_shortcode( '[contact-form-7 id="40" title="SC Contact Form"]' ); ?>
                <a class="contact-close" href="#"><span class="fa fa-close close-icon"></span></a>
            </div>
        </div>

    </header>
<?php endif; ?>
