let showPrompt = function(title, content, yesAction, noAction) {
    $(".prompt-title").html(title);
    $(".prompt-content").html(content);
    $(".prompt-yes").click(yesAction);
    $(".prompt-no").click(noAction || function() {});
    $(".prompt-box")
        .modal({
            closable: false
        })
        .modal('show');
}

let showMessage = function(title, content) {
    $(".message-title").html(title);
    $(".message-content").html(content);
    $(".message-box")
        .modal({
            closable: false
        })
        .modal('show');
}