var Home = {
    initFullpage: initFullpage
};

function initFullpage() {
    if ( !$('#js-fullpage').length ) return;

    var $fpEl = $('#js-fullpage');

    $fpEl.fullpage({
        sectionSelector: '.home-section',
        anchors: ['concept', 'projects', 'exciting', 'updates', 'location', 'contact']
    });
}

module.exports = Home;