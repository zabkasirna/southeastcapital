<?php
/**
 * Template Name: Test Page
 * Description: Use this page template for dev purpose only
 * @package rdt-sec15
 * @subpackage page
 * @since 0.0.0
 */

get_header(); ?>

    <main
        class="<?php echo get_post_type(); ?> sec-test-page"
        id="main"
        role="main"
    >
        <div class="g-all-c">

            <section id="test_site" class="g-all-full">
                <h3>Site Specific Implementation *</h3>
                <article class="g-d-24 g-hr-24 g-l-24 g-tp-12 g-hl-6 g-h-6">
                    <div class="g-d-3 g-hr-3 g-l-3 g-tp-12 g-hl-6 g-h-6">
                        <div class="mueller-test-box"><p>A</p></div>
                    </div>
                    <div class="g-d-3 g-hr-3 g-l-3 g-tp-12 g-hl-6 g-h-6">
                        <div class="mueller-test-box"><p>B</p></div>
                    </div>
                    <div class="g-d-3 g-hr-3 g-l-3 g-tp-12 g-hl-6 g-h-6">
                        <div class="mueller-test-box"><p>C</p></div>
                    </div>
                    <!--  -->
                    <div class="g-d-snap-6 g-hr-snap-6 g-l-snap-6 g-tp-12 g-hl-6 g-h-6">
                        <div class="mueller-test-box"><p>LOGO</p></div>
                    </div>
                    <!--  -->
                    <div class="g-d-3 g-hr-3 g-l-3 g-tp-12 g-hl-6 g-h-6">
                        <div class="mueller-test-box"><p>D</p></div>
                    </div>
                    <div class="g-d-3 g-hr-3 g-l-3 g-tp-12 g-hl-6 g-h-6">
                        <div class="mueller-test-box"><p>E</p></div>
                    </div>
                    <div class="g-d-3 g-hr-3 g-l-3 g-tp-12 g-hl-6 g-h-6 g-d-l g-hr-l g-l-l g-tp-l g-hl-l g-h-l">
                        <div class="mueller-test-box"><p>F</p></div>
                    </div>
                </article>
            </section>

            <!--
            <section id="test_site" class="g-all-full">
                <h3>TEST</h3>
                <article class="g-d-24 g-hr-24 g-l-24 g-tp-12 g-hl-6 g-h-6">
                    <div class="g-hr-snap-3 g-l-3 g-hr-f g-l-f">
                        <div class="mueller-test-box"><p>T</p></div>
                    </div>
                    <div class="g-hr-snap-3 g-l-snap-3">
                        <div class="mueller-test-box"><p>T</p></div>
                    </div>
                    <div class="g-hr-3 g-l-3">
                        <div class="mueller-test-box"><p>T</p></div>
                    </div>
                </article>
            </section>
            -->

            <section id="examples" class="g-all-full">
                <h3>Media</h3>
                <article id="example_media" class="g-d-24 g-hr-24 g-l-24 g-tp-12 g-hl-6 g-h-6">
                    <p>Defining Columns with basic media-classes. The class&ndash;names are changed with visibility&ndash;selectors.</p>
                    <div class="g-d-6 g-hr-6 g-l-6 g-tp-3 g-hl-2 g-h-2">
                        <div class="mueller-test-box">
                            <p class="d-show">g-d-6</p>
                            <p class="hr-show">g-hr-6</p>
                            <p class="l-show">g-l-6</p>
                            <p class="tp-show">g-tp-3</p>
                            <p class="hl-show">g-hl-2</p>
                            <p class="h-show">g-h-2</p>
                        </div>
                    </div>
                    <div class="g-d-6 g-hr-6 g-l-6 g-tp-3 g-hl-2 g-h-2">
                        <div class="mueller-test-box">
                            <p class="d-show">g-d-6</p>
                            <p class="hr-show">g-hr-6</p>
                            <p class="l-show">g-l-6</p>
                            <p class="tp-show">g-tp-3</p>
                            <p class="hl-show">g-hl-2</p>
                            <p class="h-show">g-h-2</p>
                        </div>
                    </div>
                    <div class="g-d-12 g-d-l g-hr-12 g-hr-l g-l-12 g-l-l g-tp-6 g-tp-l g-hl-2 g-hl-l g-h-2 g-h-l">
                        <div class="mueller-test-box">
                            <p class="d-show">g-d-12</p>
                            <p class="hr-show">g-hr-12</p>
                            <p class="l-show">g-l-12</p>
                            <p class="tp-show">g-tp-6</p>
                            <p class="hl-show">g-hl-2</p>
                            <p class="h-show">g-h-2</p>
                        </div>
                    </div>
                </article>
            </section>

            <section>
                <h3>Layouts</h3>
                <article id="test_layout_1" class="l-1c">
                    <p>1-column layout</p>
                    <div class="c-1">
                        <div class="mueller-test-box">
                            <p>c1</p>
                        </div>
                    </div>
                </article>
                <article id="test_layout_2" class="l-2c">
                    <p>2-column layout</p>
                    <div class="c-1">
                        <div class="mueller-test-box">
                            <p>c1</p>
                        </div>
                    </div>
                    <div class="c-2">
                        <div class="mueller-test-box">
                            <p>c2</p>
                        </div>
                    </div>
                </article>
                <article id="test_layout_3" class="l-2cr">
                    <p>2-column layout, switched columns</p>
                    <div class="c-1">
                        <div class="mueller-test-box">
                            <p>c1</p>
                        </div>
                    </div>
                    <div class="c-2">
                        <div class="mueller-test-box">
                            <p>c2</p>
                        </div>
                    </div>
                </article>
                <article id="test_layout_4" class="l-3c">
                    <p>3-column layout</p>
                    <div class="c-1">
                        <div class="mueller-test-box">
                            <p>c1</p>
                        </div>
                    </div>
                    <div class="c-2">
                        <div class="mueller-test-box">
                            <p>c2</p>
                        </div>
                    </div>
                    <div class="c-3">
                        <div class="mueller-test-box">
                            <p>c3</p>
                        </div>
                    </div>
                </article>
                <article id="test_layout_5" class="l-4c">
                    <p>
                        4-column layout<br />
                        Note the shift with desktop, portrait &amp; handheld.
                    </p>
                    <div class="c-1">
                        <div class="mueller-test-box">
                            <p>c1</p>
                        </div>
                    </div>
                    <div class="c-2">
                        <div class="mueller-test-box">
                            <p>c2</p>
                        </div>
                    </div>
                    <div class="c-3">
                        <div class="mueller-test-box">
                            <p>c3</p>
                        </div>
                    </div>
                    <div class="c-4">
                        <div class="mueller-test-box">
                            <p>c4</p>
                        </div>
                    </div>
                </article>
            </section>
            <section>
                <h3>Fractions</h3>
                <article id="example_invariant_1" class="l-1c">
                    <p>1-column layout with fractions for half</p>
                    <div class="c-1">
                        <div class="g-all-half g-all-f">
                            <div class="mueller-test-box">
                                <p>g-all-half</p>
                            </div>
                        </div>
                        <div class="g-all-half g-all-l">
                            <div class="mueller-test-box">
                                <p>g-all-half</p>
                            </div>
                        </div>
                    </div>
                </article>
                <article id="example_invariant_2" class="l-1c">
                    <p>1-column layout with fractions for thirds</p>
                    <div class="c-1">
                        <div class="g-all-thirds g-all-f">
                            <div class="mueller-test-box">
                                <p>g-all-thirds</p>
                            </div>
                        </div>
                        <div class="g-all-thirds">
                            <div class="mueller-test-box">
                                <p>g-all-thirds</p>
                            </div>
                        </div>
                        <div class="g-all-thirds g-all-l">
                            <div class="mueller-test-box">
                                <p>g-all-thirds</p>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </main>

<?php get_footer(); ?>

