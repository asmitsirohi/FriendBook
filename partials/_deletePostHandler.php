<?php
    $successAlert = false;
    $errorAlert = false;

    if(isset($_POST['submitDeletePost'])) {
        include("_connection.php");

        $deleteId = $_POST['deleteId'];

        $query = "DELETE FROM `posts` WHERE `post_id` = '$deleteId' ";

        $data = mysqli_query($conn,$query);

        if($data) {
            $successAlert = "Post deleted successfully.";
            header("location:/FriendBook/manageAccount.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Post is not deleted!";
            header("location:/FriendBook/manageAccount.php?errorAlert=".$errorAlert."");
        }
    }
?>