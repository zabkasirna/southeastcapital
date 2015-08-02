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
    
    insertToNav();

    $(window).on("mqchange.mediaquery", function(e, state) {
        if ( state.maxWidth === 980 ) console.log( state );
    });

    function insertToNav() {
        $logo.insertAfter( $siblingTarget );
    }
}

module.exports = Logo;