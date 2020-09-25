let confirmRequest = document.getElementsByClassName('confirmRequest');

Array.from(confirmRequest).forEach((element) => {
    element.addEventListener('click', (e) => { 
        let request_id = e.target.id;
        let canelbtn = e.target.nextElementSibling.id;    
    
        $.post('partials/accept_friendRequest.php',{
            request_id : request_id
        }, function(response) {
            if(response) {
                $('#friends'+canelbtn).html(`<button class="btn btn-light"><i class="fas fa-check"></i> Friends</button>`);
            }
        });
    });
});

let cancelRequest = document.getElementsByClassName('cancelRequest');

Array.from(cancelRequest).forEach((element) => {
    element.addEventListener('click', (e) => {
        let cancel_id = e.target.id;
        let hide_id = e.target.parentNode.parentNode.parentNode.id;

        $.post('partials/cancel_friendRequest.php',{
            cancel_id : cancel_id
        },function(response) {
            if(response) {
                $('#'+hide_id).css("display", "none");
            }
        });
        
        
    });
});