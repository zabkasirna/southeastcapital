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
    // _self.setActiveLink();

    // Fullpage JS
    var $fpEl = $('#js-fullpage');
    $fpEl.fullpage({
        sectionSelector: '.home-section',
        normalScrollElements: '.bodycopy, .home-section#hsUpdate .loop',
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

            // Set Google Maps on Location Section
            if ( _testString === '#location' && !SECLocation.hasInitialized )
                SECLocation.init( SECLocation.hasInitialized );

            if ( _testString === '#projects' ) {
                $('.mp-zoom-wrapper').addClass('is-active');
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
            autoTime: 9000
        }
    ,   $bgiOuter = $('#hsConcept .bgi-outer')
    ,   $preloader = $bgiOuter.closest('.hs-bg').find('.preloader')
    ,   $title = $bgiOuter.closest('#hsConcept').find('.hsc-title')
    ;

    // CAROUSEL
    $bgiOuter.carousel( _carouselOptions );

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