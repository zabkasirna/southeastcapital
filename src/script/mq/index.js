var MQ = {
    init: init
}

function init() {
    $.mediaquery({
        minWidth     : [ 0, 480, 768, 1250, 1801 ],
        maxWidth     : [ 600, 1800, 980, 767, 479 ],
        minHeight    : [ 400, 800 ],
        maxHeight    : [ 800, 400 ]
    });
}

module.exports = MQ;