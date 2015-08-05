var Masterplan = require('../masterplan');

var Home = {
    init: init,
    layout: layout,
    initConcept: initConcept,
    initProject: initProject,
    initMasterplan: initMasterplan,
    initExcitement: initExcitement
};

function init() {
    var _self = this;

    _self.initConcept();
    _self.initProject();
    _self.initMasterplan();
    _self.initExcitement();
}

function layout() {
    if ( !$('#js-fullpage').length ) return;

    var $fpEl = $('#js-fullpage');

    $fpEl.fullpage({
        sectionSelector: '.home-section',
        anchors: ['concept', 'projects', 'masterplan', 'exciting', 'updates', 'location', 'contact'],
        // autoScrolling: false,
        normalScrollElements: '.bodycopy'
    });
}

function initConcept() {
    if ( !$('#hsConcept').length ) return;

    var $el = $('#hsConcept .bgi')
    ,   _bgiSrc = $el.attr('data-src')
    ,   $preloader = $el.closest('.hs-bg').find('.preloader')
    ,   $title = $el.closest('#hsConcept').find('.hsc-title')
    ;

    $el.background({
        "source": {
            "0px": _bgiSrc,
            "980px": _bgiSrc
        }
    });

    $el.on('loaded.background', function(e) {
        $preloader.addClass('has-loaded');
        $title.addClass('has-loaded');
    });
}

function initProject() {
    if ( !$('#hsProject').length ) return;

    var $el1 = $('#hsProject .hs-bg .bgi')
    ,   _bgi1Src = $el1.attr('data-src')
    ,   $preloader = $el1.closest('.hs-bg').find('.preloader')
    ,   $title = $el1.closest('#hsProject').find('.hs-content .hsc-title')
    ,   $el2 = $title.find('.bgi')
    ,   _bgi2Src = $el2.attr('data-src')
    ;

    $el1.background({
        "source": {
            "0px": _bgi1Src,
            "980px": _bgi1Src
        }
    });

    // console.log( $title, $el2, _bgi2Src );
    // console.log( $el1.closest('#hsProject').find('.hs-content') );

    $el2.background({
        "source": {
            "0px": _bgi2Src,
            "980px": _bgi2Src
        }
    });

    $el1.on('loaded.background', function(e) {
        $preloader.addClass('has-loaded');
        // $title.addClass('has-loaded');
    });
}

function initMasterplan() {
    Masterplan.setup();
}

function initExcitement() {
    if ( !$('#hsExcitement').length ) return;

    var $sectionWrapper = $('#hsExcitement')
    ,   $loopWrapper = $sectionWrapper.find('.hsc-body-outer')
    ,   $postItems = $sectionWrapper.find('.hsc-body')
    ;

    $postItems.each( function( i ) {

        var $el = $(this)
        ,   $bgi = $el.find('.bgi')
        ,   _dataSrc = $bgi.data('src')
        ;

        $bgi.background({
            "source": {
                "0px": _dataSrc
            }
        });
    });
}

module.exports = Home;