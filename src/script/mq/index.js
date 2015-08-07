var bp = {
    'h'    : { min: 0, max: 479 },
    'hl'   : { min: 480, max: 767 },
    'tp'   : { min: 768, max: 980 },
    'l'    : { min: 981, max: 1800 },
    'hr'   : { min: 1801, max: 6000 },
    'minH' : { min: 400, max: 800 },
    'maxH' : { min: 800, max: 400 }
}

var MQ = {
    bp: bp,
    init: init,
    getViewportW: getViewportW
}

function init() {

    var bp = this.bp;

    $.mediaquery({
        minWidth     : [ bp.h.min, bp.hl.min, bp.tp.min, bp.l.min, bp.hr.min ],
        maxWidth     : [ bp.hr.max, bp.l.max, bp.tp.max, bp.hl.max, bp.h.max ],
        minHeight    : [ bp.minH.min, bp.maxH.min ],
        maxHeight    : [ bp.minH.max, bp.maxH.max ]
    });
}

function getViewportW() {
    return verge.viewportW();
}

module.exports = MQ;