var Masterplan = {
    inject: inject
};

function inject() {
    if ( !$('#hsMasterplan').length ) return;

    var $el = $( '#hsMasterplan' ).find('img.js-svg-injector')
    ;

    if ( typeof SVGInjector === 'function' && $el.length ) {
        SVGInjector( $el[0] );
    }
}

module.exports = Masterplan;