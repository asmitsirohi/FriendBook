let editAdmin = document.getElementsByClassName('editAdmin');

Array.from(editAdmin).forEach((element) => {
    element.addEventListener('click', (event) => {
        let Id = event.target.id;
        let parent = event.target.parentNode.parentNode;
        let adminName = parent.getElementsByTagName('td')[1].innerText;
        let adminEmail = parent.getElementsByTagName('td')[2].innerText;
        
        editAdminName.value = adminName;
        editAdminEmail.value = adminEmail;
        adminId.value = Id;
        
        $('#editAdmin').modal('toggle');
    });
});

let deleteAdmin = document.getElementsByClassName('deleteAdmin');

Array.from(deleteAdmin).forEach((element) => {
    element.addEventListener('click', (event) => {
        let Id = event.target.id;

        deleteAdminId.value = Id;
        
        $('#deleteAdminModal').modal('toggle');
    });
});