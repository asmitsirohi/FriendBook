<?php
    session_start();
    include("_connection.php");

    if(isset($_POST['sentUser_id'])) {
        $sentUser_id = $_POST['sentUser_id'];
        $user_id = $_SESSION['user_id'];

        $query_request = "INSERT INTO `friendrequests` (`friendRequest_from`, `friendRequest_to`, `friendRequest_sent`, `friendRequest_timestamp`) VALUES ('$user_id', '$sentUser_id', '1', CURRENT_TIMESTAMP())";

        $data_request = mysqli_query($conn,$query_request);

        if($data_request) {
            echo true;
        } else {
            echo false;
        }
    }
?>