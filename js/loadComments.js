function postCommentFunction() {    
    let commentBtn = document.getElementsByClassName("commentBtn");

    Array.from(commentBtn).forEach((element) => {
        element.addEventListener("click", (e) => {
            postid = e.target.parentNode.id;

            $.post('partials/_getComments.php', {
                postid: postid
            }, function (response) {
                if (response != -1) {
                    let obj = JSON.parse(response);
                    obj.forEach((element, index) => {
                        for (const key in element) {
                            if (element.hasOwnProperty(key)) {
                                const e = element[key];
                                $('#commentList' + postid).append(`<div id="moreComments${key}"></div>`);
                                $(`#moreComments${key}`).html(e);
                                $('#commentId' + postid).val(key);
                            }
                        }
                    });
                } else {
                    $('#commentList' + postid).append(`<div id="moreComments"></div>`);
                    $('#moreComments').html(`<h5 class=" pb-4"><span class="badge badge-danger">No Comments Yet!</span></h5>`);
                }
                $('#commentSpinner' + postid).css("display", "none");
            });

            $('#loadCommentBtn' + postid).click(() => {
                $('#nonspinnerLoadComment').css("display", "none");
                $('#spinnerLoadComment').css("display", "block");

                let commentId = $('#commentId' + postid).val();

                $.post('partials/_getMoreComments.php', {
                    commentId: commentId,
                    postid: postid
                }, function (r) {
                    if (r != -1) {
                        let obj2 = JSON.parse(r);
                        obj2.forEach((element, index) => {
                            for (const key in element) {
                                if (element.hasOwnProperty(key)) {
                                    const e = element[key];
                                    $('#commentList' + postid).append(`<div id="moreComments${key}"></div>`);
                                    $(`#moreComments${key}`).html(e);
                                    $('#commentId' + postid).val(key);
                                }
                            }
                        });
                        $('#spinnerLoadComment').css("display", "none");
                        $('#nonspinnerLoadComment').css("display", "block");
                    } else {
                        $('#LoadComment'+postid).html(`<h5 class=" pb-4"><span class="badge badge-danger">No More Comments found!</span></h5>`);
                    }
                });

            });

        });
    });
}

postCommentFunction();

