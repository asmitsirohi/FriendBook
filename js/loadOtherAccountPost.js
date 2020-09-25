$(document).ready(() => {
    $('#loadMore').click(() => {
        $('#nonspinner').css("display", "none");
        $('#spinner').css("display", "block");

        let postid = $('#postid').val();
        let getUserid = $('#getUserid').val();
        $.post('partials/_loadMore_OtherAccountposts.php', {
            postid: postid,
            getUserid: getUserid
        }, function (response) {
            if (response != -1) {
                let obj = JSON.parse(response);
                obj.forEach((element, index) => {
                    for (const key in element) {
                        if (element.hasOwnProperty(key)) {
                            const e = element[key];
                            $('#managePosts').append(`<div id="moreData${key}"></div>`);
                            $(`#moreData${key}`).html(e);
                            $('#postid').val(key);
                        }
                    }
                });
                $('#spinner').css("display", "none");
                $('#nonspinner').css("display", "block");
                likePostFunction();
                postCommentFunction();

            } else {
                $('#mainId').html(`<h5 class=" pb-4"><span class="badge badge-danger">No More Posts found!</span></h5>`);
            }
        });
    });
});