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

//
//  SVG — hasClass, addClass, removeClass, toggleClass
//  Source:
//  https://gist.github.com/branneman/8436956
//  Taken and adapted from:
//  http://toddmotto.com/hacking-svg-traversing-with-ease-addclass-removeclass-toggleclass-functions/
//

if (SVGElement && SVGElement.prototype) {

    SVGElement.prototype.hasClass = function (className) {
        return new RegExp('(\\s|^)' + className + '(\\s|$)').test(this.getAttribute('class'));
    };

    SVGElement.prototype.addClass = function (className) {
        if (!this.hasClass(className)) {
            this.setAttribute('class', this.getAttribute('class') + ' ' + className);
        }
    };

    SVGElement.prototype.removeClass = function (className) {
        var removedClass = this.getAttribute('class').replace(new RegExp('(\\s|^)' + className + '(\\s|$)', 'g'), '$2');
        if (this.hasClass(className)) {
            this.setAttribute('class', removedClass);
        }
    };

    SVGElement.prototype.toggleClass = function (className) {
        if (this.hasClass(className)) {
            this.removeClass(className);
        } else {
            this.addClass(className);
        }
    };
}
 
var Signature = require('./signature')
,   PHPDebugger = require('./php-debugger')
,   MQ = require('./mq')
,   Logo = require('./logo')
,   Home = require('./home')
,   Excitement = require('./excitement')
// ,   SECLocation = require('./sec-location')
,   Contact = require('./contact')
,   SECSlideshow = require('./sec-slideshow')
;

(function( $ ) {
    
    $(function() {

        // Setup
        // Signature.init();
        PHPDebugger.init();

        // MQ
        MQ.init();

        // Logo
        Logo.injectSVG();
        if ( MQ.getViewportW() > MQ.bp.tp.min ) Logo.insertToNav( true );
        else Logo.releaseFromNav( true );

        // MQ Callback
        $(window).on("mqchange.mediaquery", function(e, state) {

            if ( state.maxWidth <= MQ.bp.tp.min ) {
                Logo.releaseFromNav();
            }

            else if ( state.maxWidth >= MQ.bp.l.max ) {
                Logo.insertToNav()
            }
        });

        // SECSlideshow
        SECSlideshow.initImage();
        SECSlideshow.initSlideshow();

        // Home
        Home.layout();
        Home.init();

        // Excitement
        Excitement.Single.initGallery();

        // SECLocation
        // SECLocation.init();
        
        // Contact
        Contact.init();
    });
})(jQuery);
