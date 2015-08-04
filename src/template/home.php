<?php
/**
 * @package rdt-sec15
 * @subpackage home
 * @since 0.0.0
 */

get_header(); ?>

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
?>

    <main
        class="<?php echo get_post_type(); ?>"
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
                        <a class="hsc-btn" href="javascript:void(0);">Find More<span class="gt">&gt;</span></a>
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
                <div class="hs-bg">
                    <div class="mp-svg-wrapper">
                        <?php include( get_stylesheet_directory() . '/masterplan-svg.php' ); ?>
                    </div>
                </div>
            </section>
            <section class="home-section" data-anchor="exciting">
                <h1>EXCITING</h1>
            </section>
            <section class="home-section" data-anchor="updates">
                <h1>UPDATES</h1>
            </section>
            <section class="home-section" data-anchor="location">
                <h1>LOCATION</h1>
            </section>
            <section class="home-section" data-anchor="contact">
                <h1>CONTACT</h1>
            </section>
        </div>

    </main>

<?php get_footer(); ?>
