$(document).ready(() => {
    $('#addUser').click(() => {

        var email = $('#emailAdd').val();
        var sameEmail = null;


        let FriendBook_account = localStorage.getItem("FriendBook_account");

        if (FriendBook_account == null) {
            FriendBook_accountObj = [];
        } else {
            FriendBook_accountObj = JSON.parse(FriendBook_account);
            
            Array.from(FriendBook_accountObj).forEach(function (element) {
                if(element == email) {
                    sameEmail = 1;
                    
                }
            });
        }

        if(sameEmail != 1) {
            FriendBook_accountObj.push(email);
            localStorage.setItem("FriendBook_account", JSON.stringify(FriendBook_accountObj));
        }

        
    });
});