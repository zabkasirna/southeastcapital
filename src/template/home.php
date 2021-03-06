<?php
/**
 * @package rdt-sec15
 * @subpackage home
 * @since 0.0.0
 */

require_once( 'hex2rgba.php' );
require_once( 'Phone_Sanitize.php' );

get_header();
?>

<?php
    $is_sec_slideshow = get_field( 'is_sec_slideshow', 'option' );
    // debuggrr( $is_sec_slideshow );
?>

<?php if ( !$is_sec_slideshow ) : ?>

<?php
    /*---- {{ DATA: CONCEPT SLIDESHOW }} ----*/
    $concept_slide_items = get_field( 'concept_slide_items', 'option' );
    $_csi = array();

    foreach ($concept_slide_items as $concept_slide_item_key => $concept_slide_item_val) {
        $_csi[] = array(
            'bgi' => $concept_slide_item_val['concept_image']['url'],
            'body' => $concept_slide_item_val['concept_body']
        );
    }

    /*---- {{ DATA: PROJECT IMAGE }} ----*/
    $project_bgi = get_field( 'project_bgi', 'option' )['url'];
    // debuggrr( $project_bgi );
    
    /*---- {{ DATA: PROJECT BODY }} ----*/
    $project_body = get_field( 'project_body', 'option' );
    // debuggrr( $project_body );
    
    /*---- {{ DATA: POST TYPES }} ----*/
    $sec_post_types = get_post_types();
    // debuggrr( $sec_post_types );
?>

    <main
        id="main"
        role="main"
    >

        <div id="js-fullpage">

            <section class="home-section" id="hsConcept" data-anchor="intro" >

                <div class="hs-bg">
                    <div class="bgi-outer">
                        <?php foreach ( $_csi as $_csi_key => $_csi_val ) : ?>

                        <div class="bgi" data-src="<?php echo $_csi_val['bgi']; ?>"></div>

                        <?php endforeach; ?>
                    </div>
                    <div class="content-faux-bg"></div>
                    <div class="preloader" >
                        <?php include( get_stylesheet_directory() . '/preloader.svg' ); ?>
                    </div>
                </div>
                <div class="hs-content">
                    <div class="hsc-title">
                        <p class="hsc-title-text"><span
                            class="t-1">Life</span><span
                            class="t-2">Reimagined</span>
                        </p>
                    </div>
                    <div class="hsc-body">
                        <?php foreach ( $_csi as $_csi_key => $_csi_val ) : ?>

                        <div class="inner">
                            <p class="hsc-body-text"><span><?php echo $_csi_val['body']; ?></span></p>
                        </div>

                        <?php endforeach; ?>

                        <!-- <a class="hsc-btn" href="javascript:void(0);">Find More<span class="gt">&gt;</span></a> -->
                    </div>
                </div>
            </section>

            <section class="home-section" id="hsProject" data-anchor="concept">
                <div class="hs-bg">
                    <div class="bgi"
                        data-src="<?php echo $project_bgi; ?>"
                    ></div>
                </div>
                <div class="hs-content">
                    <div class="inner">
                        <div class="hsc-title">
                            <div class="bgi-outer is-preloading">
                                <div class="bgi"
                                    data-src='<?php echo bloginfo('template_url') . "/uploads/images/living/connected.png"; ?>'
                                ></div>
                            </div>
                        </div>
                        <div class="hsc-body-outer is-preloading">
                            <div class="hsc-body-inner">
                                <div class="hsc-body">
                                    <div class="hsc-body-content">
                                        <p class="bodycopy"><?php echo $project_body; ?></p>
                                    </div>

                                    <!-- <a class="hsc-btn" href="#masterplan">Find More<span class="gt">&gt;</span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="preloader" >
                    <?php include( get_stylesheet_directory() . '/preloader.svg' ); ?>
                </div>
            </section>

            <section class="home-section" id="hsMasterplan" data-anchor="projects">
                <div class="hsc-body">
                    <div class="mp-zoom-wrapper">
                        <div class="mp-svg-wrapper">
                            <?php include( get_stylesheet_directory() . '/masterplan-svg.php' ); ?>
                        </div>
                    </div>
                    <?php
                        $has_mp_controls = false;
                        if ( $no_mp_controls ) :
                    ?>
                    <div class="mp-controls">
                        <a href="#" class="mp-zoom-btn zoom-in"><span class="fa fa-plus"></span></a><a
                           href="#" class="mp-zoom-btn zoom-out"><span class="fa fa-minus"></span></a>
                    </div>
                    <?php endif; ?>
                </div>
            </section>

            <section class="home-section" id="hsExcitement" data-anchor="exciting">
                <div class="hsc-body-outer">

                <?php

                    /**------------------------------------------------------**\
                     * LOOP: EXCITEMENT CPT.
                     * Check if current post type is "excitement"
                     **------------------------------------------------------**/

                    if ( have_posts() ) :

                        while ( have_posts() ) : the_post();

                            if ( get_post_type() === "excitement" ) :
                ?>

                <?php
                    $_excitement_slug = basename( get_permalink() );
                    if ( $_excitement_slug === "features" || $_excitement_slug === "public-spaces" ) :
                ?>

                <div class="hsc-body">
                    <?php
                        $_excitement_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                        // debuggrr( $_excitement_thumb );
                    ?>

                    <div class="bgi"
                        data-src='<?php echo $_excitement_thumb[0]; ?>'
                    ></div>

                    <div class="faux-hit js-hit">

                        <a href="<?php echo the_permalink(); ?>"
                            class="hsex-btn">
                            <svg class="high-arrow-svg"
                                width="48px" height="60px"
                                x="0px" y="0px"
                                viewBox="0 0 48 60"
                                >
                                <polyline class="high-arrow-line" points="29,12.179 19,29.5 29,46.821 "/>
                            </svg>
                            <span class="hsex-text"><?php echo the_title(); ?></span>
                        </a>

                    </div>
                </div>

                <?php endif; ?>

                <?php
                            endif;

                        endwhile;

                    endif;
                ?>
                </div>
            </section>

            <section class="home-section" id="hsUpdate" data-anchor="updates">
                
                <div class="faux-bg"></div>

                <div class="update-header">
                    <h2 class="update-title"
                        ><span class="first">NEWS &amp;</span
                        ><span class="second">UPDATES</span></h2
                    >
                </div>

                <?php

                    /**------------------------------------------------------**\
                     * LOOP: POST WP PT.
                     * Check if current post type is "post"
                     **------------------------------------------------------**/

                    if ( have_posts() ) :
                ?>
                <div class="loops">

                <?php
                        while ( have_posts() ) : the_post();

                            if ( get_post_type() === "post" ) :
                ?>

                <?php
                    /**------------------------------------------------------**\
                     * DATA: POST WP PT.
                     **------------------------------------------------------**/

                    $__update_thumb = 
                        wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ) ?:
                        ''
                    ;
                    // debuggrr( $__update_thumb );

                ?>

                    <div class="loop-item">
                        <?php if ( $__update_thumb !== '' ) : ?>
                        <a class="item-thumb-outer"
                            href="<?php echo the_permalink(); ?>"
                            >
                            <img
                                class="item-thumb"
                                width="100%"
                                src='<?php echo $__update_thumb[0]; ?>'
                                alt=""
                            >
                        </a>
                        <?php endif; ?>

                        <div class="item-header">
                            <p class="item-time"><?php echo the_time('F jS, Y'); ?></p>
                            <a class="item-title-link" href="<?php echo the_permalink(); ?>" >
                                <h3 class="item-title"><?php echo the_title(); ?></h3>
                            </a>
                        </div>

                        <div class="item-body">
                            <?php echo the_excerpt(); ?>
                        </div>

                        <a class="item-link"
                            href="<?php echo the_permalink(); ?>"
                        >Read more &nbsp;&gt;</a>
                    </div>

                <?php
                            endif;

                        endwhile;
                ?>

                </div>

                <?php
                    endif;
                ?>
            </section>

            <section class="home-section" id="hsLocation" data-anchor="location">
                <div class="sec-map-preloader">
                    <p><span class="smp-text">Loading google map ...</span><span class="faux-border"></span></p>
                </div>
                <div id="sec_map"></div>
            </section>

            <section class="home-section" id="hsContact" data-anchor="contact">
                <?php /*echo do_shortcode( '[contact-form-7 id="40" title="SC Contact Form"]' );*/ ?>
                <div class="faux-bg"></div>
                <div class="hsc-head">
                    <div class="hsch-first">
                        <h3 class="h2 text">CONNECT WITH US!</h3>
                    </div>
                    <p class="hsch-second">Please complete your contact details <br/>we'll get back to you soon!</p>
                </div>
                <form class="hsc-body" >
                    <div class="control-group-row">
                        <div class="control-wrapper control-size-narrow">
                            <div class="faux-label"><span class="faux-label-inner">First Name</span></div>
                            <label class="control-group one-liner" for="first-name">
                                <span class="control-label-inner">First Name</span>
                                <input class="control-input" type="text" placeholder="">
                            </label>
                        </div>
                        <div class="control-wrapper control-size-narrow">
                            <div class="faux-label"><span class="faux-label-inner">Last Name</span></div>
                            <label class="control-group one-liner" for="first-name">
                                <span class="control-label-inner">Last Name</span>
                                <input class="control-input" type="text" placeholder="">
                            </label>
                        </div>
                    </div>

                    <div class="control-group-row">
                        <div class="control-wrapper control-size-narrow">
                            <div class="faux-label"><span class="faux-label-inner">E-mail</span></div>
                            <label class="control-group one-liner" for="e-mail">
                                <span class="control-label-inner">E-mail</span>
                                <input class="control-input" type="text" placeholder="">
                            </label>
                        </div>
                        <div class="control-wrapper control-size-narrow">
                            <div class="faux-label"><span class="faux-label-inner">Subject</span></div>
                            <label class="control-group borderless xx" for="subject">
                                <select class="control-input" name="subject" >
                                    <option value="General Inquiries">General Inquiries</option>
                                    <option value="Lorem Ipsum">Lorem Ipsum</option>
                                    <option value="Sample Text">Sample Text</option>
                                </select>
                                <span class="control-label-xx-inner"><span>Subject</span></span>
                            </label>
                        </div>
                    </div>
                    <div class="control-group-row">
                        <div class="control-wrapper control-size-large">
                            <textarea class="control-input"
                                name="sc_message"
                                id="sc_message"
                                rows="6"
                                placeholder="MESSAGE"
                                ></textarea>
                        </div>
                    </div>

                    <div class="control-group-row">
                        <a class="control-submit" href="javascript:void(0);"><span>SUBMIT</span></a>
                    </div>
                </form>
            </section>
        </div>

    </main>

<?php else: ?>

    <?php

        /**------------------------------------------------------**\
         * DATA: SEC_SLIDESHOW
         **------------------------------------------------------**/

        $_sec_slide_items = get_field('sec_slide_items', 'option');
        $_ssi = array();

        foreach ( $_sec_slide_items as $_ssi_key => $_ssi_val ) {
            $_ssi[] = array(
                'src'  => $_ssi_val['ssi_image']['url'],
                'title' => $_ssi_val['ssi_title'],
                'body' => $_ssi_val['ssi_body'],
                'bgc' => "background-color: " . hex2rgba( $_ssi_val['ssi_overlay_hex'], $_ssi_val['ssi_overlay_opacity'] ) . "; ",
            );
        }

        // debuggrr( $_ssi );
    ?>

    <?php
        /**------------------------------------------------------**\
         * DATA: AGENT_LISTS
         **------------------------------------------------------**/

        $_sec_agent_lists = get_field('agent_lists', 'option');
        $_aal = array();

        foreach ( $_sec_agent_lists as $_sal_key => $_sal_val ) {
            $_sal[] = array(
                'agent_region'      => $_sal_val['agent_region'],
                'agency_name'       => $_sal_val['agency_name'],
                'agency_picture'    => $_sal_val['agency_picture']['sizes']['thumbnail'],
                'agent_name'        => $_sal_val['agent_name'],
                'agent_picture'     => $_sal_val['agent_picture']['sizes']['thumbnail'],
                'agent_info'        => $_sal_val['agent_info'],
                'agent_phone'       => $_sal_val['agent_phone'],
                'agent_fax'         => $_sal_val['agent_fax'],
                'agent_mail'        => $_sal_val['agent_mail']
            );
        }
        debuggrr($_sal);
    ?>

    <?php
        /**------------------------------------------------------**\
         * VIEW: SLIDESHOW
         **------------------------------------------------------**/
    ?>

    <?php if ( array_filter( $_ssi ) ) : ?>

    <div id="sec_slides" >

    <?php foreach ( $_ssi as $_item_key => $_item_val ) : ?>

        <div class="slide-item"
            data-src='<?php echo $_item_val[ "src" ] ?>'
            >
            <div class="bgi"></div>

            <?php if ( $_item_val[ 'title' ] !== '' &&  $_item_val[ 'body' ] !== '' ) : ?>

            <div class="si-content-outer">
                <div class="si-content"
                     style="<?php echo $_item_val[ 'bgc' ] ?>"
                    >
                    <h2 class="sic-title"><?php echo $_item_val[ 'title' ]; ?></h2>
                    <p class="sic-body"><?php echo $_item_val[ 'body' ]; ?></p>
                </div>
            </div>

            <?php endif; ?>
        </div>

    <?php endforeach; ?>

    </div>

    <?php
        /**------------------------------------------------------**\
         * VIEW: AGENT_LISTS
         **------------------------------------------------------**/
    ?>

    <?php if ( array_filter( $_sal) ) : ?>
    
    <div id="sec_agents" class="" >

        <div class="sec-agents-overlay"></div>

        <div class="sec-agent-lists">

            <div class="agent-lists-header">
                <div class="header-title">
                    <p>Our Representative Agents</p>
                </div>
            </div>
        <?php foreach ( $_sal as $_sal_key => $_sal_val ) : ?>

            <div class="agent-list">
                <div class="agent-left">
                    <div class="img-wrapper agency-picture">
                        <img
                            src='<?php echo $_sal_val['agency_picture']; ?>'
                            alt='<?php echo $_sal_val['agency_name']; ?>'
                        >
                    </div>
                </div>
                <div class="agent-right">
                    <div class="agent-meta-row">
                        <div class="img-wrapper agent-picture agent-meta-key">
                            <img
                                src='<?php echo $_sal_val['agent_picture']; ?>'
                                alt='<?php echo $_sal_val['agent_name']; ?>'
                            >
                        </div>
                        <div class="agent-meta-val">
                            <p class="agent-name"><?php echo $_sal_val['agent_name']; ?></p>
                            <p class="agent-sub"><?php echo $_sal_val['agent_info']; ?></p>
                        </div>
                    </div>
                    <div class="agent-meta-row">
                        <?php
                            $_agent_region = "";
                            switch ($_sal_val['agent_region']) {
                                case 'region_a': $_agent_region = 'Jakarta Barat'; break;
                                case 'region_b': $_agent_region = 'Jakarta Pusat'; break;
                                case 'region_c': $_agent_region = 'Jakarta Selatan'; break;
                                case 'region_d': $_agent_region = 'Jakarta Timur'; break;
                                case 'region_e': $_agent_region = 'Jakarta Utara'; break;
                                
                                default:
                                    $_agent_region = 'DKI JAKARTA';
                                    break;
                            }
                        ?>
                        <div class="agent-meta-key"><p>Region <span class="colon">:</span></p></div>
                        <div class="agent-meta-val"><p><?php echo $_agent_region; ?></p></div>
                    </div>
                    <div class="agent-meta-row">
                        <?php
                            $_agent_raw_phone = $_sal_val['agent_phone'];
                            $_agent_sane_phone = sanitize_phone( $_agent_raw_phone );
                        ?>
                        <div class="agent-meta-key"><p>Phone <span class="colon">:</span></p></div>
                        <div class="agent-meta-val"><a
                            href="tel:<?php echo $_agent_sane_phone; ?>"
                            ><?php echo $_sal_val['agent_phone']; ?></a></div>
                    </div>
                    <div class="agent-meta-row">
                        <?php
                            $_agent_raw_fax = $_sal_val['agent_fax'];
                            $_agent_sane_fax = sanitize_phone( $_agent_raw_fax );
                        ?>
                        <div class="agent-meta-key"><p>Fax <span class="colon">:</span></p></div>
                        <div class="agent-meta-val"><a
                            href="tel:<?php echo $_agent_sane_fax; ?>"
                            ><?php echo $_sal_val['agent_fax']; ?></a></div>
                    </div>
                    <div class="agent-meta-row">
                        <div class="agent-meta-key"><p>Email <span class="colon">:</span></p></div>
                        <div class="agent-meta-val"><a
                                href='<?php echo "mailto:" . $_sal_val['agent_mail'] . "\?Subject=Hello, SOUTHEAST" ?>'
                            ><?php echo $_sal_val['agent_mail']; ?></a></div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        </div>
        <a href="#" class="sec-agent-close"><span class="fa fa-close"></span></a>
    </div>

    <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>

<?php get_footer(); ?>
