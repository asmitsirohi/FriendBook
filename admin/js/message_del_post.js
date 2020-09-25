let messageUser = document.getElementsByClassName('messageUser');

Array.from(messageUser).forEach((element) => {
    element.addEventListener('click', (event) => {
        let Id = event.target.id;

        messageId.value = Id;
        
        $('#messageModal').modal('toggle');
    });
});


let deletePost = document.getElementsByClassName('deletePost');

Array.from(deletePost).forEach((element) => {
    element.addEventListener('click', (event) => {
        let Id = event.target.id;

        deletePostId.value = Id;
        
        $('#deletePostModal').modal('toggle');
    });
});