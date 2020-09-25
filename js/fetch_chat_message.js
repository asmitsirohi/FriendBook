$(document).ready(() => {
    let friend_id = $('#friendid').val();
    
    $.post('partials/_fetch_messeges.php',{
        friend_id : friend_id
    },function(response) {
        if(response != -1) {
            obj = JSON.parse(response);
            obj.forEach((element,index) => {
                for (const key in element) {
                    if (element.hasOwnProperty(key)) {
                        const e = element[key];
                        $('#chatmessages').append(`<div id="newMsg${key}"></div>`);
                        $(`#newMsg${key}`).html(e);
                        $('#msgId').val(key);
                    }
                }
            });
        }
    });

    setInterval(() => {
        let msgId = $('#msgId').val();

        $.post('partials/_dynamic_chatting.php',{
            friend_id : friend_id,
            msgId : msgId
        },function(response) {
            if(response != -1) {
                obj = JSON.parse(response);
                obj.forEach((element,index) => {
                    for (const key in element) {
                        if (element.hasOwnProperty(key)) {
                            const e = element[key];
                            $('#chatmessages').append(`<div id="newMsg${key}"></div>`);
                            $(`#newMsg${key}`).html(e);
                            $('#msgId').val(key);
                        }
                    }
                });
            }
        });            
    }, 1000);
});