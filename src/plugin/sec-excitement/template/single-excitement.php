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
        class="type-<?php echo get_post_type(); ?>"
        id="main"
        role="main"
    >

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php
            /**------------------------------------------------------**\
             * DATA: EXCITEMENT GALLERY
             **------------------------------------------------------**/

            $_x_galls = array();

            if ( get_field( 'excitement_gall' ) ) :
                foreach( get_field( 'excitement_gall' ) as $_x_gall ) :

                    $_x_galls[] = array(
                        'title' => $_x_gall['title'],
                        'url' => $_x_gall['url'],
                        'caption' => $_x_gall['caption']
                    );

                endforeach;

                debuggrr( $_x_galls );

            endif;
        ?>

        <?php
            /**------------------------------------------------------**\
             * TEMPLATE: EXCITEMENT GALLERY
             **------------------------------------------------------**/
        ?>

        <?php if ( isset( $_x_galls ) && array_filter( $_x_galls ) ) : ?>

            <div class="loop-excitement-gall">
                
                <?php foreach ( $_x_galls as $_x_gall_key => $_x_gall_val ) : ?>
                    
                    <a class="gall-link" href="javascript:void(0);">
                        <div
                            class="gall-img"
                            data-src="<?php echo $_x_gall_val['url']; ?>"
                        ></div>
                        <div class="gall-title">
                            <p><?php echo $_x_gall_val['title']; ?></p>
                        </div>
                        <div class="gall-caption">
                            <?php echo $_x_gall_val['caption']; ?>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <?php endwhile; ?>

    <?php else : ?>

        <p>no excitements found</p>
    <?php endif; ?>
    </main>

<?php get_footer(); ?>
