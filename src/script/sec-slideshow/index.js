var SECSlideshow = {
    initImage: initImage,
    initSlideshow: initSlideshow
};

function initImage() {
    if ( !$('#sec_slides').length || !$('#sec_slides .slide-item').length ) return;

    var _self = this
    ,   $items = $('#sec_slides .slide-item')
    ;

    $items.each( function( i ) {
        var $item = $(this)
        ,   _dataSrc = $item.data( 'src' )
        ;

        $item.background({
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
            infinite: true
        }
    ;

    $el.carousel( _carouselOptions );
    $el.on('update.carousel', function(e) {
        console.log(e);
    });

    return true;
}

module.exports = SECSlideshow;