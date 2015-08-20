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

        // Modal
        
        var $parent = $el.closest('.gall-link')
        ,   $modal = $('.excitement-modal')
        ,   $modalClose = $modal.find('.modal-close')
        ,   $modalTitle = $modal.find('.title p')
        ,   $modalDesc = $modal.find('.desc p')
        ,   _title = $parent.find('.gall-title p').text()
        ,   _desc = $parent.find('.js-gall-caption').text();
        ;

        $parent.on('click', function(e) {
            if ( $modal.hasClass('is-active') ) return;

            $modalTitle.text( _title );
            $modalDesc.text( _desc );
            
            var $modalImg = $modal
                .find('.modal-content')
                .append( $('<div class="modal-img"></div>') )
            ;

            $modalImg = $modalImg.find('.modal-img');

            $modalImg.background({
                "source": {
                    "0px": _dataSrc
                }
            });

            $modal.appendTo( $('#page') );
            $modal.addClass('is-active');

            var $modalOverlay = $modal.find('.modal-overlay');
            $modalOverlay.one('click', function(e) {
                $modalClose.trigger('click');
            })

        });

        $modalClose.on('click', function(e) {
            if ( !$modal.hasClass('is-active') ) return;

            $modal
                .removeClass('is-active')
                .find('.modal-img')
                .remove()
            ;
            $modal.appendTo( $('#main') );
        })
    });

    var $scrollArea = $('.inner', '.loop-excitement-gall');
    $scrollArea.scrollbar();
}

module.exports = ExcitementSingle;