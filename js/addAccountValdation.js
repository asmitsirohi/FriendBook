$(document).ready(() => {
    
    $('#emailAdd').keyup(() => {
        let email = $('#emailAdd').val();
        $.post('partials/validEmailUsername.php',{
            email : email
        }, function(response) {
            if(response) {
                $("#wrongEmail").hide();
                $("#correctEmail").show();
                $("#correctEmail").html('Valid Email!');
                $("#addUser").prop('disabled', false);
                
            } else {
                $("#correctEmail").hide();
                $("#wrongEmail").show();
                $("#wrongEmail").html('Email is not registered');
                $("#addUser").prop('disabled', true); 
                
            }
        });        
        
    });
});