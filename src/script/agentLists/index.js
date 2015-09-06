var AgentLists = {
    init: init
};

function init() {
    if ( ! $('.agent-toggle').length || ! $('#sec_agents').length ) return;
    var $toggleEl = $('.agent-toggle')
    ,   $targetEl = $('#sec_agents')
    ,   $closeEl = $('.sec-agents-overlay, .sec-agent-close')
    ;

    $toggleEl.on('click', function(e) {
        e.preventDefault();
        $targetEl.addClass('is-active');
    });

    $closeEl.on('click', function(e) {
        e.preventDefault();
        $targetEl.removeClass('is-active');
    });
}

module.exports = AgentLists;