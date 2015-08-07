<?php
/**
 * @package rdt-sec15
 * @subpackage home
 * @since 0.0.0
 */

get_header(); ?>

<?php
    $is_sec_slideshow = get_field( 'is_sec_slideshow', 'option' );
    debuggrr( $is_sec_slideshow );
?>

<?php if ( !is_sec_slideshow ) : ?>

<?php
    /*---- {{ DATA: CONCEPT IMAGE }} ----*/
    $concept_bgi = get_field( 'concept_bgi', 'option' )['url'];
    // debuggrr( $concept_bgi );

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
            <section class="home-section" id="hsConcept" data-anchor="concept">
                <div class="hs-bg">
                    <div class="bgi"
                        data-src="<?php echo $concept_bgi; ?>"
                    ></div>
                    <div class="content-faux-bg"></div>
                    <div class="preloader" >
                        <?php include( get_stylesheet_directory() . '/preloader.svg' ); ?>
                    </div>
                </div>
                <div class="hs-content">
                    <div class="inner">
                        <div class="hsc-title">
                            <p class="hsc-title-text"><span
                                class="t-1">Life</span><span
                                class="t-2">Reimagined</span>
                            </p>
                        </div>
                        <p class="hsc-body">Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur.</p>
                        <!-- <a class="hsc-btn" href="javascript:void(0);">Find More<span class="gt">&gt;</span></a> -->
                    </div>
                </div>
            </section>

            <section class="home-section" id="hsProject" data-anchor="projects">
                <div class="hs-bg">
                    <div class="bgi"
                        data-src="<?php echo $project_bgi; ?>"
                    ></div>
                    <div class="preloader" >
                        <?php include( get_stylesheet_directory() . '/preloader.svg' ); ?>
                    </div>
                </div>
                <div class="hs-content">
                    <div class="inner">
                        <div class="hsc-title">
                            <div class="bgi-outer">
                                <div class="bgi"
                                    data-src='<?php echo bloginfo('template_url') . "/uploads/images/living/connected.png"; ?>'
                                ></div>
                            </div>
                        </div>
                        <div class="hsc-body-outer">
                            <div class="hsc-body-inner">
                                <div class="hsc-body">
                                    <div class="hsc-body-content">
                                        <p class="bodycopy"><?php echo $project_body; ?></p>
                                    </div>

                                    <a class="hsc-btn" href="#masterplan">Find More<span class="gt">&gt;</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="home-section" id="hsMasterplan" data-anchor="masterplan">
                <div class="hsc-body">
                    <div class="mp-svg-wrapper">
                        <?php include( get_stylesheet_directory() . '/masterplan-svg.php' ); ?>
                    </div>
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
                <div id="sec_map"></div>
            </section>

            <section class="home-section" id="hsContact" data-anchor="contact">
                <?php /*echo do_shortcode( '[contact-form-7 id="40" title="SC Contact Form"]' );*/ ?>
                <div class="faux-bg"></div>
                <div class="hsc-head">
                    <div class="hsch-first">
                        <h3 class="h2 text">CONNECT <br>WITH US!</h3>
                    </div>
                    <p class="hsch-second">Please complete your contact details <br/>we'll get back to you soon!</p>
                </div>
                <div class="hsc-body" >
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
                </div>
            </section>
        </div>

    </main>

<?php else: ?>

    <?php
        $__sec_slideshow_gall = get_field('sec_slide_gall', 'option');
        debuggrr( $__sec_slideshow_gall );
    ?>

    <div id="sec_slides">
        <?php
            if ( array_filter( $__sec_slideshow_gall ) ) :
            foreach ( $__sec_slideshow_gall as $secs_key => $secs_val ) :
        ?>
        <div class="slide-item"
            data-src='<?php echo $secs_val['url'];?>'
        ></div>
        <?php endforeach; endif; ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
