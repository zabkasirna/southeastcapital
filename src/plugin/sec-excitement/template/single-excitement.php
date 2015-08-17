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

                // debuggrr( $_x_galls );

            endif;

            /**------------------------------------------------------**\
             * DATA: EXCITEMENT SIBLING
             **------------------------------------------------------**/
            if ( get_field( 'excitement_sibling' ) ) {
                $_excitement_sibling = get_field( 'excitement_sibling' );
                $_excitement_sibling_permalink = get_post_permalink( $_excitement_sibling->ID );
                $_excitement_sibling_title = $_excitement_sibling->post_title;
                debuggrr( $_excitement_sibling_permalink );
                debuggrr( $_excitement_sibling_title );
            }
        ?>

            <div class="excitement-header">
                <div class="eh-links">
                    <a
                        href='<?php echo esc_url( home_url( '/' ) ) . "/#exciting"; ?>'
                        class="eh-link-sibling"
                        ><span class="fa fa-home"></span><span class="text">home</span></a>
                    <a class="eh-link-sibling" href='<?php echo $_excitement_sibling_permalink; ?>'
                        ><span class="fa fa-angle-left"></span><span class="text"><?php echo $_excitement_sibling_title; ?></span></a>
                </div>
                <h1 class="eh-title" ><span><?php echo the_title(); ?></span></h1>
            </div>

        <?php
            /**------------------------------------------------------**\
             * TEMPLATE: EXCITEMENT GALLERY
             **------------------------------------------------------**/
        ?>

        <?php if ( isset( $_x_galls ) && array_filter( $_x_galls ) ) : ?>

            <div class="loop-excitement-gall">

                <div class="inner">
                
                <?php foreach ( $_x_galls as $_x_gall_key => $_x_gall_val ) : ?>
                    
                    <a class="gall-link" href="javascript:void(0);">
                        <div
                            class="gall-img"
                            data-src="<?php echo $_x_gall_val['url']; ?>"
                        ></div>
                        <div class="gall-title">
                            <p><?php echo $_x_gall_val['title']; ?></p>
                        </div>
                        <div class="js-gall-caption">
                            <?php echo $_x_gall_val['caption']; ?>
                        </div>
                    </a>

                <?php endforeach; ?>
                </div>
            </div>

            <div class="excitement-modal">
                <div class="modal-overlay"></div>
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="title">
                            <p></p>
                        </div>
                        <div class="desc">
                            <p></p>
                        </div>
                    </div>
                    <a href="#"
                        class="modal-close"
                    ><span>&times;</span></a>
                </div>
            </div>

        <?php endif; ?>

        <?php endwhile; ?>

    <?php else : ?>

        <p>no excitements found</p>
    <?php endif; ?>
    </main>

<?php get_footer(); ?>
