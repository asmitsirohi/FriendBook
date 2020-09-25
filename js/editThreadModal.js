function editPostFunc() {
    let editPost = document.getElementsByClassName("editPost");

    Array.from(editPost).forEach((element) => {
        element.addEventListener("click", (e) => {

            postid = e.target.id;
            div = e.target.parentNode.parentNode.nextElementSibling;
            text = div.getElementsByTagName('h5')[0].innerText;
        
            editId.value = postid;
            textEdit.value = text;
            $('#editPostModal').modal('toggle');
        });
    });

    let deletePost = document.getElementsByClassName("deletePost");

    Array.from(deletePost).forEach((element) => {
        element.addEventListener("click", (e) => {
            
            deleteId.value = e.target.id;

            $('#deletePostModal').modal('toggle');

        });
    });
}

editPostFunc();