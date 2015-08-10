var Masterplan = {
    setup: setup,
    initZoom: initZoom
};

function inject() {
    if ( !$('#hsMasterplan').length ) return;

    var $el = $( '#hsMasterplan' ).find('img.js-svg-injector')
    ;

    if ( typeof SVGInjector === 'function' && $el.length ) {
        SVGInjector( $el[0] );
    }
}

function setup() {

    if ( !$('#hsMasterplan').length ) return;

    var $parentHTML = $('#hsMasterplan')
    ,   $parentSVG = $parentHTML.find('.mp-svg')
    ,   $spots = $parentSVG.find('.spot')
    ;

    $spots.each( function( i ) {
        var $spot = $(this);
        
        $spot.hover(
            function(e) {
                spotEnter( $spot );
            },
            function(e) {
                spotLeave( $spot );
            }
        );
    });

    function spotEnter( $el ) {
        var $parent = $el.closest('.mp-area');
        $parent[0].addClass('is-hovered');
    }

    function spotLeave( $el ) {
        var $parent = $el.closest('.mp-area');
        $parent[0].removeClass('is-hovered');
    }
}

function initZoom() {
    var $mp = $('.mp-zoom-wrapper')
    ,   $in = $('.mp-zoom-btn.zoom-in')
    ,   $out = $('.mp-zoom-btn.zoom-out')
    ;

    if ( !$mp.length || !$in.length || !$out.length ) return;

    // console.log( $mp );

    $mp.panzoom({
        $zoomIn: $in,
        $zoomOut: $out
    });
}

module.exports = Masterplan;