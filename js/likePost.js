function likePostFunction() {
    let likeBtn = document.getElementsByClassName("likeBtn");

    Array.from(likeBtn).forEach((element) => {
        element.addEventListener("click", (e) => {

            let post_id = e.target.parentNode.id;
            let parent = e.target.parentNode.parentNode.parentNode;
            let present_like = parent.getElementsByTagName('span')[0].innerText;

            let id = 'likeCounter' + post_id;

            $.post('partials/_getLike.php', {
                post_id: post_id,
                present_like: present_like
            }, function (response) {
                if (response) {
                    document.getElementById(id).innerText = " " + ++present_like;
                }
            });

        });
    });
}

likePostFunction();