$(document).ready(function () {
    $("#username").keyup(function () {
        let username = $("#username").val();
        $.post('partials/validEmailUsername.php', {
            username: username
        }, function (response) {
            if (response) {
                $("#correctUsername").hide();
                $("#wrongUsername").show();
                $("#wrongUsername").html('Not Available');
                $("#create").prop('disabled', true);             
            } else {
                $("#wrongUsername").hide();
                $("#correctUsername").show();
                $("#correctUsername").html('Available!');
                $("#create").prop('disabled', false);
            }
        });
    });

    $("#email").change(function(){
        let email = $("#email").val();
        $.post('partials/validEmailUsername.php',{
            email : email
        },function(response){
            if(response) {
                $("#correctsEmail").hide();
                $("#wrongsEmail").show();
                $("#wrongsEmail").html('Already registered!');
                $("#create").prop('disabled', true); 

            } else {
                $("#wrongsEmail").hide();
                $("#correctsEmail").show();
                $("#correctsEmail").html('Available!');
                $("#create").prop('disabled', false);
                
            }
        });
    });

    $("#captcha").keyup(function () {
        $.post('partials/validCaptcha.php', function (response) {

            if (captcha.value == response) {
                $("#wrongCaptcha").hide();
                $("#correctCaptcha").show();
                $("#correctCaptcha").html('Captcha Matched!');
                $("#create").prop('disabled', false);
            } else {
                $("#correctCaptcha").hide();
                $("#wrongCaptcha").show();
                $("#wrongCaptcha").html('Invalid Captcha!');
                $("#create").prop('disabled', true);
            }
        });
    });
});


