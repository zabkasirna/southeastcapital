<?php
/**
 * @package rdt-sec15
 * @subpackage home
 * @since 0.0.0
 */

get_header(); ?>

    <main
        class="<?php echo get_post_type(); ?>"
        id="main"
        role="main"
    >

        <div id="js-fullpage">
            <section class="home-section" id="hs-concept" data-anchor="concept">
                <div class="faux-bg"></div>
                <h1>CONCEPT</h1>
            </section>
            <section class="home-section" data-anchor="projects">
                <h1>PROJECTS</h1>
            </section>
            <section class="home-section" data-anchor="masterplan">
                <h1>MASTERPLAN</h1>
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
