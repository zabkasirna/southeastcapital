<?php
/**
 * @package rdt-sec15
 * @subpackage footer
 * @since 0.0.0
 */
?>

</div>

<?php /*debuggrr(get_current_template());*/ ?>

<?php if ( get_field( 'is_sec_slideshow', 'option' ) ) : ?>
<div id="ss-footer" class="is-hidden" >
    <div class="foot-wrapper">
        <div class="foot2">
            <p class="f-copyright">COPYRIGHT &copy; 2015. ALLRIGHTS RESERVED. TRIVO GROUP</p>
            <p class="f-mandatory hidden">DESIGN - CODE BY <span class="reversed-r">R</span>+R</p>
        </div>
        <div class="foot1">
            <p class="f-company-name">PT SAYANA INTERGA PROPERTI</p>
            <p class="f-company-address">TRIVO BUILDING <br>JL. KH WAHID HASYIM NO. 157 <br> Jakarta 10240, Indonesia</p>
        </div>
        <div class="foot2">
            <a class="f-info"
                href="tel:+62213910707"
                ><span
                class="f-info-key">T.</span><span
                class="f-info-val">+6221 391 0707</span></a>
            <a class="f-info"
                href="tel:+62213910606"
                ><span
                class="f-info-key">F.</span><span
                class="f-info-val">+6221 391 0606</span></a>
            <a class="f-info"
                href="mailto:someone@example.com?Subject=Hello@SOUTHEAST"
                ><span
                class="f-info-key">T.</span><span
                class="f-info-val">info@southeastcapital.id</span></a>
        </div>
        <div class="foot1">
            <p class="devby">DEVELOPED BY</p>
            <a class="devby-logo"
                href="javascript:void(0);"
                ><img class="devby-logo-img"
                    src='<?php echo get_template_directory_uri() . '/uploads/images/logo/trivo.png'; ?>'
                    alt="trivo"
                ><span class="devby-text">trivo.id</span></a>
        </div>
    </div>

    <a href="#" class="footer-toggle"><span class="fa fa-arrow-up toggle-icon"></span></a>

</div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
