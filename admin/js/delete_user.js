let deleteUser = document.getElementsByClassName('deleteUser');

Array.from(deleteUser).forEach((element) => {
    element.addEventListener('click', (event) => {
        let Id = event.target.id;

        deleteId.value = Id;
        
        $('#deleteModal').modal('toggle');
    });
});