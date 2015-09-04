var SECSlideshow = {
    initImage: initImage,
    initSlideshow: initSlideshow,
    initFooter: initFooter,
    initContact: initContact
};

function initImage() {
    if ( !$('#sec_slides').length || !$('#sec_slides .slide-item').length ) return;

    var _self = this
    ,   $items = $('#sec_slides .slide-item')
    ;

    $items.each( function( i ) {
        var $item = $(this)
        ,   $bgi = $item.find('.bgi')
        ,   _dataSrc = $item.data( 'src' )
        ;

        $bgi.background({
            "source": {
                "0px": _dataSrc
            }
        });
    });
}

function initSlideshow() {
    if ( !$('#sec_slides').length || !$('#sec_slides .slide-item').length ) return;

    var _self = this
    ,   $el = $('#sec_slides')
    ,   _carouselOptions = {
            infinite: true,
            autoAdvance: true,
            controls: false,
            autoTime: 9000
        }
    ;

    $el.carousel( _carouselOptions );
    $el.on('update.carousel', function(e) {
        // console.log(e);
    });

    return true;
}

function initFooter() {
    if ( !$('#ss-footer').length );

    var $el = $('#ss-footer')
    ,   $toggler = $el.find('.footer-toggle')

    $toggler.on('click', function(e) {
        e.preventDefault();
        $el.toggleClass('is-hidden')
        ;
    })
}

function initContact() {
    if ( !$('.contact-toggle').length && !$('.contact-form-wrapper').length ) return;

    var $toggleEl = $('.contact-toggle')
    ,   $formEl = $('.contact-form-wrapper')
    ,   $selectEl = $formEl.find('.wpcf7-select')
    ,   $closeEl = $('.contact-close', $formEl ) 
    ;

    $toggleEl.on( 'click', function(e) {
        e.preventDefault();
        $formEl.toggleClass( 'open' );
    });

    $selectEl.dropdown();

    $closeEl.on( 'click', function(e) {
        e.preventDefault();
        $toggleEl.trigger('click');
    });
}

module.exports = SECSlideshow;