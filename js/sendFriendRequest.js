let addFriend = document.getElementsByClassName("addFriend");

Array.from(addFriend).forEach((element) => {
    element.addEventListener('click', (e) => {
        sentUser_id = e.target.id;

        $.post('partials/sentFriendRequest.php',{
            sentUser_id : sentUser_id
        }, function(response) {
            if(response) {
                $("#"+sentUser_id).html('Request Sent');
                $("#"+sentUser_id).prop('disabled', true); 
            } else {
                
            }
        });
        
    });
});