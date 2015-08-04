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

    /*---- {{ DATA: CONCEPT IMAGE }} ----*/
    $project_bgi = get_field( 'project_bgi', 'option' )['url'];
    debuggrr( $project_bgi );
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
                        <?php include_once( get_stylesheet_directory() . '/preloader.svg' ); ?>
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
            <section class="home-section" id="hsProject"  data-anchor="projects">
                <div class="hs-bg">
                    <div class="bgi"
                        data-src="<?php echo $project_bgi; ?>"
                    ></div>
                </div>
                <div class="hs-content">
                    <div class="inner">
                        <div class="hsc-title">
                            <!--  -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-section" data-anchor="exciting">
                <h1>EXCITING</h1>
            </section>
            <section class="home-section" data-anchor="masterplan">
                <h1>MASTERPLAN</h1>
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
