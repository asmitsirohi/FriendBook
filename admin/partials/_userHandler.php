<?php
    include("_connection.php");

    $successAlert = false;
    $errorAlert = false;

    // Delete User
    if(isset($_POST['submitDeleteUser'])) {

        $deleteId = $_POST['deleteId'];

        $query_user = "DELETE FROM `users` WHERE `user_id` = '$deleteId'";
        $data_user = mysqli_query($conn, $query_user);

        $query_post = "DELETE FROM `posts` WHERE `post_user_id` = '$deleteId'";
        $data_post = mysqli_query($conn, $query_post);

        $query_online = "DELETE FROM `onlinestatus` WHERE `online_user_id` = '$deleteId'";
        $data_post = mysqli_query($conn, $query_online);

        $query_friends = "DELETE FROM `friends` WHERE `friend_from` = '$deleteId' OR `friend_to` = '$deleteId'";
        $data_post = mysqli_query($conn, $query_friends);

        $query_friendRequest = "DELETE FROM `friendrequests` WHERE `friendRequest_from` = '$deleteId' OR `friendRequest_to` = '$deleteId'";
        $data_post = mysqli_query($conn, $query_friendRequest);

        $query_comments = "DELETE FROM `comments` WHERE `comment_user_id` = '$deleteId'";
        $data_post = mysqli_query($conn, $query_comments);

        $query_chatBox = "DELETE FROM `chatbox` WHERE `chat_from` = '$deleteId' OR `chat_to` = '$deleteId'";
        $data_post = mysqli_query($conn, $query_chatBox);

        if($data_user) {
            $successAlert = "User Deleted.";
            header("location:/FriendBook/admin/users.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Delete User.";
            header("location:/FriendBook/admin/users.php?errorAlert=".$errorAlert."");
        }
    }

    // Truncate User
    if(isset($_POST['submitTruncateUser'])) {
    
        $query_user = "TRUNCATE `users`";
        $data_user = mysqli_query($conn, $query_user);

        if($data_user) {
            $successAlert = "User Table Truncated.";
            header("location:/FriendBook/admin/users.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate User Table.";
            header("location:/FriendBook/admin/users.php?errorAlert=".$errorAlert."");
        }
    }
?>