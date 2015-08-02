/***
 *           __    __       ___       __   __               
 *          |  |  |  |     /   \     |  | |  |              
 *          |  |__|  |    /  ^  \    |  | |  |              
 *          |   __   |   /  /_\  \   |  | |  |              
 *          |  |  |  |  /  _____  \  |  | |  `----.         
 *          |__|  |__| /__/     \__\ |__| |_______|         
 *         _______. __  .______     .__   __.      ___      
 *        /       ||  | |   _  \    |  \ |  |     /   \     
 *       |   (----`|  | |  |_)  |   |   \|  |    /  ^  \    
 *        \   \    |  | |      /    |  . `  |   /  /_\  \   
 *    .----)   |   |  | |  |\  \----|  |\   |  /  _____  \  
 *    |_______/    |__| | _| `._____|__| \__| /__/     \__\ 
 *                                              
 */

var Signature = require('./signature')
,   PHPDebugger = require('./php-debugger')
,   MQ = require('./mq')
,   Logo = require('./logo')
;

(function( $ ) {
    
    $(function() {

        // Setup
        Signature.init();
        PHPDebugger.init();

        // MQ
        MQ.init();

        // Logo
        if ( MQ.getViewportW() > MQ.bp.tp.min ) Logo.insertToNav();

        // MQ Callback
        $(window).on("mqchange.mediaquery", function(e, state) {

            console.log( state );
            if ( state.maxWidth <= MQ.bp.tp.max ) {
                Logo.releaseFromNav();
            }

            else if ( state.maxWidth >= MQ.bp.l.max ) {
                Logo.insertToNav()
            }
        });

    });

})(jQuery);
