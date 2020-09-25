<?php
    include("_connection.php");
    include("_protectXSS.php");

    $successAlert = false;
    $errorAlert = false;

    // Delete Post
    if(isset($_POST['submitDeletePost'])) {

        $deletePostId = $_POST['deletePostId'];

        $query_post = "DELETE FROM `posts` WHERE `post_id` = '$deletePostId'";
        $data_post = mysqli_query($conn, $query_post);

        if($data_post) {
            $successAlert = "Post Deleted.";
            header("location:/FriendBook/admin/posts.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Delete Post.";
            header("location:/FriendBook/admin/posts.php?errorAlert=".$errorAlert."");
        }
    }

    // Truncate Post
    if(isset($_POST['submitTruncatePost'])) {
    
        $query_post = "TRUNCATE `posts`";
        $data_post = mysqli_query($conn, $query_post);

        if($data_post) {
            $successAlert = "Post Table Truncated.";
            header("location:/FriendBook/admin/posts.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate Post Table.";
            header("location:/FriendBook/admin/posts.php?errorAlert=".$errorAlert."");
        }
    }

    // Message Send Post
    if(isset($_POST['sendMessage'])) {

        $messageId = $_POST['messageId'];
        $messageText = filter_str($_POST['messageText']);

        $query_chat = "INSERT INTO `chatbox` (`chat_from`, `chat_to`, `chat_message`, `chat_timestamp`) VALUES ('1', '$messageId', '$messageText', CURRENT_TIMESTAMP())";
        $data_chat = mysqli_query($conn,$query_chat);

        if($data_chat) {
            $successAlert = "Message Send.";
            header("location:/FriendBook/admin/posts.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Send Message.";
            header("location:/FriendBook/admin/posts.php?errorAlert=".$errorAlert."");
        }
    }
?>