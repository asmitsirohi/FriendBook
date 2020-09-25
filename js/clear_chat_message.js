let clearChat = document.getElementById("clearChat");

clearChat.addEventListener('click', (event) => {
    let friendId = event.target.parentNode.id;
    
    friendChatId.value = friendId;
    
    $('#clearChatModal').modal('toggle');
});