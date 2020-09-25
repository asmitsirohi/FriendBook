$(document).ready(() => {
    $('#send_message').click(() => {
        let message_text = $('#message_text').val();
        let friendid = $('#friendid').val();

        if (message_text != "") {
            $.post('partials/_chatMessages.php', {
                message_text: message_text,
                friendid: friendid
            }, function (response) {
                if(response) {
                    $('#message_text').val("");
                }
            });
        }
    });
});