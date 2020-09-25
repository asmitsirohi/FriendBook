<?php
    include("_connection.php");
    include("_protectXSS.php");

    $successAlert = false;
    $errorAlert = false;

    // Truncate ChatBox
    if(isset($_POST['submitTruncateChatBox'])) {
    
        $query_chatbox = "TRUNCATE `chatbox`";
        $data_chatbox = mysqli_query($conn, $query_chatbox);

        if($data_chatbox) {
            $successAlert = "ChatBox Table Truncated.";
            header("location:/FriendBook/admin/otherTables.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate ChatBox Table.";
            header("location:/FriendBook/admin/otherTables.php?errorAlert=".$errorAlert."");
        }
    }

    // Truncate Comments
    if(isset($_POST['submitTruncateComments'])) {
    
        $query_comments = "TRUNCATE `comments`";
        $data_comments = mysqli_query($conn, $query_comments);

        if($data_comments) {
            $successAlert = "Comments Table Truncated.";
            header("location:/FriendBook/admin/otherTables.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate Comments Table.";
            header("location:/FriendBook/admin/otherTables.php?errorAlert=".$errorAlert."");
        }
    }

    // Truncate Friend Requests
    if(isset($_POST['submitTruncateFriendRequest'])) {
    
        $query_requests = "TRUNCATE `friendrequests`";
        $data_requests = mysqli_query($conn, $query_requests);

        if($data_requests) {
            $successAlert = "Friend Request Table Truncated.";
            header("location:/FriendBook/admin/otherTables.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate Friend Request Table.";
            header("location:/FriendBook/admin/otherTables.php?errorAlert=".$errorAlert."");
        }
    }

    // Truncate Friend 
    if(isset($_POST['submitTruncateFriends'])) {
    
        $query_friends = "TRUNCATE `friends`";
        $data_friends = mysqli_query($conn, $query_friends);

        if($data_friends) {
            $successAlert = "Friends Table Truncated.";
            header("location:/FriendBook/admin/otherTables.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate Friends Table.";
            header("location:/FriendBook/admin/otherTables.php?errorAlert=".$errorAlert."");
        }
    }

    // Truncate Online Status 
    if(isset($_POST['submitTruncateOnlineStatus'])) {
    
        $query_online = "TRUNCATE `onlinestatus`";
        $data_online = mysqli_query($conn, $query_online);

        if($data_online) {
            $successAlert = "Online Status Table Truncated.";
            header("location:/FriendBook/admin/otherTables.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate Online Status Table.";
            header("location:/FriendBook/admin/otherTables.php?errorAlert=".$errorAlert."");
        }
    }
?>