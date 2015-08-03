var Home = {
    init: init,
    layout: layout,
    initConcept: initConcept
};

function init() {
    var _self = this;

    _self.initConcept();
}

function layout() {
    if ( !$('#js-fullpage').length ) return;

    var $fpEl = $('#js-fullpage');

    $fpEl.fullpage({
        sectionSelector: '.home-section',
        anchors: ['concept', 'projects', 'exciting', 'updates', 'location', 'contact']
    });
}

function initConcept() {
    if ( !$('#hsConcept').length ) return;

    var $el = $('#hsConcept .bgi')
    ,   _bgiSrc = $el.attr('data-src')
    ,   $preloader = $el.closest('.hs-bg').find('.preloader')
    ;

    $el.background({
        "source": {
            "0px": _bgiSrc,
            "980px": _bgiSrc
        }
    });

    $el.on('loaded.background', function(e) {
        $preloader.addClass('has-loaded');
    });
}

module.exports = Home;