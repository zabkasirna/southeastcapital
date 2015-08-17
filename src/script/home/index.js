var Masterplan = require('../masterplan')
,   MQ = require( '../mq' )
,   SECLocation = require( '../sec-location' )
;

var Home = {
    init: init,
    layout: layout,
    setActiveLink: setActiveLink,
    initActiveLink: initActiveLink,
    activeLink: $(),
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

    var _self = this;
    _self.initActiveLink();

    function setBodyDataSection ( section ) {
        var $body = $('body');
        if ( !$body.data( 'section' ) || !section ) return;
        $body.attr('data-section', section);
    }

    // Fullpage JS
    var $fpEl = $('#js-fullpage');
    $fpEl.fullpage({
        sectionSelector: '.home-section',
        normalScrollElements: '.bodycopy, .home-section#hsProject .hsc-body-content, .home-section#hsUpdate .loops, .home-section#hsContact .hsc-body',
        normalScrollElementTouchThreshold: 12,
        onLeave: function( index, nextIndex, direction ) {
            var _testString = '#' + $fpEl
                .children('.home-section')
                .eq( nextIndex - 1 )
                .data('anchor')

            ,   $navItems = $('#header-nav').children( '.menu-item' )
            ,   $el = $('#header-nav .menu-item a[href="' + _testString + '"]')
            ;

            $el = ( $el.length ) ? $el : $();

            _self.setActiveLink( $el );

            setBodyDataSection( _testString );

            switch ( _testString ) {
                case '#concept': 
                    $( '#hsProject .is-preloading' ).removeClass( 'is-preloading' );
                break;
                case '#projects': 
                    $('.mp-zoom-wrapper').addClass('is-active');
                break;
                case '#exciting': 
                break;
                case '#updates': 
                break;
                case '#location': 
                    if ( !SECLocation.hasInitialized ) SECLocation.init( SECLocation.hasInitialized );
                break;
                case '#contact': 
                break;
            }
        }
    });
}

function setActiveLink( $el ) {

    if ( !$('#header-nav').find( '.menu-item' ).length || MQ.getViewportW() < MQ.bp.l.min ) return;
    
    var _self = this
    ,   $navItems = $('#header-nav').find( '.menu-item' )
    ;

    $navItems
        .children('a')
        .removeClass('is-active');

    _self.activeLink = ( $el instanceof jQuery )
        ? $el
        : $()
    ;

    _self.activeLink.addClass('is-active');
}

function initActiveLink( hasInitialized ) {
    if ( hasInitialized ) return;
    if ( !$('#header-nav').find( '.menu-item' ).length ) return;

    var _self = this
    ,   $navItems = $('#header-nav').find( '.menu-item' )
    ;

    $navItems.each( function( i ) {
        var $navLink = $(this).find( 'a' );
        $navLink.on( 'click', function( e ) {
            $navItems
                .children('a')
                .removeClass('is-active');

            _self.activeLink = $(this).addClass('is-active');
        });
    });
}

function initConcept() {
    if ( !$('#hsConcept').length ) return;

    var _carouselOptions = {
            infinite: true,
            autoAdvance: true,
            controls: false,
            autoTime: 9000,
            pagination: true
        }
    ,   $bgiOuter = $('#hsConcept .bgi-outer')
    ,   $preloader = $bgiOuter.closest('.hs-bg').find('.preloader')
    ,   $title = $bgiOuter.closest('#hsConcept').find('.hsc-title')
    ;

    // CAROUSEL
    var $_carousel = $bgiOuter.carousel( _carouselOptions )
    ,   $_pagination = $_carousel.find('.fs-carousel-pagination')
    ,   $_newPaginationTarget = $_carousel.closest('.hs-bg').next()
    ;
    // @HACK: THIS IS FUCKING HACK. Find a better way please!
    $_pagination.appendTo( $_newPaginationTarget );
    var $_paginationBtn = $_pagination.find('button')
    ,   _paginationLn = $_paginationBtn.length
    ;

    // @TODO: Bug on FORMSTONE/CAROUSEL
    // for ( var _pi = 0; _pi < _paginationLn; _pi ++ ) {
    //     $($_paginationBtn[ _pi ]).on('click', function(e) {
    //         e.preventDefault();
    //         console.log( $(this).index() );
    //         // $_carousel.carousel( 'jump', $(this).index() );
    //         // $_carousel.carousel( 'jump', 2 );
    //     })
    // }

    // BGI
    $bgiOuter.find('.bgi').each(
        function( i ) {
            var $bgi = $(this)
            ,   _bgiSrc = $bgi.data( 'src' )
            ;

            $bgi.background({
                source: {
                    '0px': _bgiSrc
                }
            });
        }
    );

    // imagesLoaded
    $bgiOuter.imagesLoaded()
        .done( function() {
            $preloader.addClass('has-loaded');
            $title.addClass('has-loaded');
        });
}

function initProject() {
    if ( !$('#hsProject').length ) return;

    var $section = $('#hsProject')
    ,   $el1 = $section.find('.hs-bg .bgi')
    ,   _bgi1Src = $el1.attr('data-src')
    ,   $title = $section.find('.hs-content .hsc-title')
    ,   $el2 = $title.find('.bgi')
    ,   _bgi2Src = $el2.attr('data-src')
    ,   $preloader = $section.find('.preloader')
    ;

    $el1.background({
        "source": {
            "0px": _bgi1Src
        }
    });

    $el2.background({
        "source": {
            "0px": _bgi2Src
        }
    });

    $section.imagesLoaded()
        .done( function() {
            $preloader.addClass('has-loaded');
        });
}

function initMasterplan() {
    Masterplan.setup();
    // Masterplan.initZoom();
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

        var $hit = $el.find('.js-hit');
        $hit.hover(
            function() {
                $hit.closest('.hsc-body')
                    .attr('class', 'hsc-body has-entered')
                    .siblings()
                    .attr('class', 'hsc-body has-leave')
                ;

                // console.log( 'enter', $hit.closest('.hsc-body').index() );
            },
            function() {
                $hit.closest('.hsc-body')
                    .attr('class', 'hsc-body has-leave')
                    .siblings()
                    .attr('class', 'hsc-body has-entered')
                ;

                // console.log( 'leave', $hit.closest('.hsc-body').index() );
            }
        );
    });
}

module.exports = Home;