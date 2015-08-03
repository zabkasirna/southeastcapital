var Home = {
    initFullpage: initFullpage
};

function initFullpage() {
    if ( !$('#js-fullpage').length ) return;

    var $fpEl = $('#js-fullpage');

    $fpEl.fullpage({
        sectionSelector: '.home-section'
    });
}

module.exports = Home;