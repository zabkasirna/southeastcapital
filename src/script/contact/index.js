var Contact = {
    init: init
};

function init() {
    
    if ( !$( '.control-input' ).length ) return;

    var $inputs = $( 'input.control-input' )
    ,   $selects = $( 'select.control-input' )
    ;

    $inputs.each( function( i ) {
        var $input = $(this)
        ,   $parent = $input.closest( '.control-group' )
        ,   $fauxLabel = $parent.siblings( '.faux-label' )
        ;

        $input.on( 'focus', function(e) {
            // console.log( $parent );
            $parent.addClass( 'is-focus' );
            $fauxLabel.addClass( 'is-focus' );
        });

        $input.on( 'focusout', function(e) {
            // console.log( $input.val() );
            if ( !$input.val() ) {
                $parent.removeClass( 'is-focus' );
                $fauxLabel.removeClass( 'is-focus' );
            }
        });
    });

    $selects.each( function(i) {
        var $select = $(this)
        ,   $parent = $select.closest( '.control-group' )
        ,   $fauxLabel = $parent.siblings( '.faux-label' )
        ;
        $select.dropdown();
    });

    var $xx = $('.xx');
    $xx.find('button')
        .on('focusin', function(e) {
            $xx.addClass('is-focus')
                .siblings('.faux-label').addClass('is-focus');
        })
        // .on('focusout', function(e) {
        //     $xx.removeClass('is-focus')
        //         .siblings('.faux-label').removeClass('is-focus');
        // });

}

module.exports = Contact;