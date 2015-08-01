<?php
/**
 * @package rdt-sec15
 * @subpackage index
 * @since 0.0.0
 */

get_header(); ?>

    <main
        class="<?php echo get_post_type(); ?>"
        id="main"
        role="main"
    >

    <?php if ( have_posts() ) : ?>

        <div class="loop-outer">
            <?php while ( have_posts() ) : the_post(); ?>

            <?php // LOOP ?>
            <div class="loop" data-id="<?php echo the_id(); ?>">
                <section>
                    <?php the_content(); ?>
                </section>
            </div>
            <?php endwhile; ?>
        </div>

    <?php endif; ?>

    </main>

<?php get_footer(); ?>
