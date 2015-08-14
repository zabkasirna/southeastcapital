var MainNav = {
    init: init
};

function init() {
    if ( !$('#nav-lists').length ) return;

    var $navProject = $('#nav-lists').find('a[href="#projects"]')
    ;

    $navProject.on('click', function(e) {
        console.log( e );
    });
}

module.exports = MainNav;