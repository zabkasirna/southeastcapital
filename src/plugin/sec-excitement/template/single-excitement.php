<?php
/**
 * @package rdt-sec15
 * @subpackage plugin/sec-excitement
 * @version 0.0.0
 * @since 0.0.0
 */

?>

<?php get_header(); ?>

    <main
        class="<?php echo get_post_type(); ?>"
        id="main"
        role="main"
    >

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php endwhile; ?>

    <?php else : ?>

        <p>no excitements found</p>
    <?php endif; ?>
    </main>

<?php get_footer(); ?>
