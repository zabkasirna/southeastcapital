var ExcitementSingle = {
    initGallery: initGallery
};

function initGallery() {

    if ( !$('.loop-excitement-gall').length || !$('.gall-img').length ) return;

    var $imgs = $('.gall-img');

    $imgs.each( function( i ) {
        var $el = $(this)
        ,   _dataSrc = $(this).data('src')
        ;

        $el.background({
            "source": {
                "0px": _dataSrc
            }
        });
    });

    // 

}

module.exports = ExcitementSingle;