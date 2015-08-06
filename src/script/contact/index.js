var Contact = {
    init: init
};

function init() {
    
    if ( !$( '.control-input' ).length ) return;

    var $inputs = $( '.control-input' )
    ;

    $inputs.each( function( i ) {
        var $input = $(this)
        ,   $parent = $input.closest( '.control-group' )
        ,   $fauxLabel = $parent.siblings( '.faux-label' )
        ;

        $input.on( 'focus', function(e) {
            console.log( $parent );
            $parent.addClass( 'is-focus' );
            $fauxLabel.addClass( 'is-focus' );
        });

        $input.on( 'focusout', function(e) {
            console.log( $input.val() );
            if ( !$input.val() ) {
                $parent.removeClass( 'is-focus' );
                $fauxLabel.removeClass( 'is-focus' );
            }
        });
    });

}

module.exports = Contact;