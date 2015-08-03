var Logo = {
    injectSVG,
    insertToNav: insertToNav,
    releaseFromNav: releaseFromNav
};

function injectSVG() {
    if ( !$('.logo-img').length ) return;

    var $el = $( '#logo' ).find('img.js-svg-injector')
    ;

    if ( typeof SVGInjector === 'function' && $el.length ) {
        SVGInjector( $el[0] );
    }
}

function insertToNav( initial ) {
    if ( !$('#main-header').length ||
        !$('#nav-lists').length ||
        !$('#logo').length
    ) return;

    var $logo = $('#logo')
    ,   $siblingTarget = $('#nav-lists > .menu-item').eq(2)
    ;

    if ( $logo.parent().attr('id') === 'nav-lists' ) return;

    $logo.insertAfter( $siblingTarget );

    if ( initial ) $('#main-header').removeClass('on-layout');
}

function releaseFromNav() {
    if ( !$('#main-header').length ||
        !$('#logo').length
    ) return;

    var $logo = $('#logo')
    ,   $containerTarget = $('#main-header')
    ;

    if ( $logo.parent().attr('id') === 'main-header' ) return;
    $logo.prependTo( $containerTarget );
}

module.exports = Logo;