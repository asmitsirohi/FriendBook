function showAccounts() {
    let FriendBook_account = localStorage.getItem("FriendBook_account");

    if (FriendBook_account != null) {
        FriendBook_accountObj = JSON.parse(FriendBook_account);
    } else {
        FriendBook_accountObj = [];
    }

    let account = "";

    Array.from(FriendBook_accountObj).forEach(function (element, index) {
        $.post('partials/getAccountDetails.php', {
            email: element
        }, function (response) {
            let obj = JSON.parse(response);
            account += ` <div class="card text-light bg-dark">
                            <button type="button" class="close text-light" aria-label="Close" id="${index}" onclick="deleteAccount(this.id);">
                                <span aria-hidden="true" class="badge badge-danger">&times;</span>
                            </button>
                            <div data-toggle="modal"
                            data-target="#loginAccountModal" style="cursor:pointer;" class="emails">
                                <div class="card-body">
                                    <img src="${obj.profile_pic}" alt="${element}" width = "100%">
                                </div>
                                <div class="card-footer" id="nxtDiv">
                                    <p class="text-center" id="user">${obj.name}</p>
                                </div>
                            </div>
                            
                        </div>`;

            $('#accounts').html(account);
            populateEmail();
        });

        
    });

}

showAccounts();




function deleteAccount(index) {
    let FriendBook_account = localStorage.getItem("FriendBook_account");

    if (FriendBook_account != null) {
        FriendBook_accountObj = JSON.parse(FriendBook_account);
    }

    FriendBook_accountObj.splice(index, 1);
    localStorage.setItem("FriendBook_account", JSON.stringify(FriendBook_accountObj));
    showAccounts();

}

function populateEmail() {
    let emails = document.getElementsByClassName("emails");

    Array.from(emails).forEach(function(element) {
        element.addEventListener("click", function(e) {

            emailLogin.value = e.target.alt;
            $("#emailLogin").prop('readonly', true); 
        }); 
    });
}