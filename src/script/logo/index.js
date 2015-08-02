var Logo = {
    insertToNav: insertToNav,
    releaseFromNav: releaseFromNav
};

function insertToNav() {
    if ( !$('#main-header').length ||
        !$('#nav-lists').length ||
        !$('#logo').length
    ) return;

    var $logo = $('#logo')
    ,   $siblingTarget = $('#nav-lists > .menu-item').eq(2)
    ;

    if ( $logo.parent().attr('id') === 'nav-lists' ) return;

    $logo.insertAfter( $siblingTarget );
}

function releaseFromNav() {
    if ( !$('#main-header').length ||
        !$('#logo').length
    ) return;

    var $logo = $('#logo')
    ,   $containerTarget = $('#main-header')
    ;

    if ( $logo.parent().attr('id') === 'main-header' ) return;

    console.log( $logo.parent(), $containerTarget );
    $logo.prependTo( $containerTarget );
}

module.exports = Logo;