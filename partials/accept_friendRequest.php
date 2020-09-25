<?php
    session_start();
    include("_connection.php");

    if(isset($_POST['request_id'])) {
        $request_id = $_POST['request_id'];
        $user_id = $_SESSION['user_id'];

        $query_friend = "INSERT INTO `friends` (`friend_from`, `friend_to`, `friend_timestamp`) VALUES ('$user_id', '$request_id', CURRENT_TIMESTAMP())";

        $data_friend = mysqli_query($conn,$query_friend);

        if($data_friend) {
            $query_delete = "DELETE FROM `friendrequests` WHERE `friendRequest_from` = '$request_id' AND `friendRequest_to` = '$user_id'";

            $data_delete = mysqli_query($conn,$query_delete);

            if($data_delete) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
?>