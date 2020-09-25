<?php
    session_start();
    $userid = $_SESSION['user_id'];

    if(isset($_POST['submit_comment'])) {
        include("_connection.php");
        include("_protectXSS.php");

        $successAlert = false;
        $errorAlert = false;

        $comment_text = filter_str($_POST['comment_text']);
        $post_id = $_POST['post_id'];

        $query_comment = "INSERT INTO `comments` (`comment_description`, `comment_post_id`, `comment_user_id`, `comment_timestamp`) VALUES ('$comment_text', '$post_id', '$userid', CURRENT_TIMESTAMP())";

        $data_comment = mysqli_query($conn,$query_comment);

        if($data_comment) {
            $successAlert = "Your Comment is being posted.";
            header("location:/FriendBook/account.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Your Comment is not posted.";
            header("location:/FriendBook/account.php?errorAlert=".$errorAlert."");
        }
    }
?>