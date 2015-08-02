var Logo = {
    init: init
};

function init() {
    if ( !$('#main-header').length ||
        !$('#nav-lists').length ||
        !$('#logo').length
    ) return;

    var $logo = $('#logo')
    ,   $siblingTarget = $('#nav-lists > .menu-item').eq(2)
    ;

    console.log( $logo, $siblingTarget );
}

module.exports = Logo;