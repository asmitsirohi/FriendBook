<?php
    session_start();
    include("_connection.php");

    if(isset($_POST['cancel_id'])) {
        $cancel_id = $_POST['cancel_id'];
        $user_id = $_SESSION['user_id'];

            $query_delete = "DELETE FROM `friendrequests` WHERE `friendRequest_from` = '$cancel_id' AND `friendRequest_to` = '$user_id'";

            $data_delete = mysqli_query($conn,$query_delete);

            if($data_delete) {
                echo true;
            } else {
                echo false;
            }
    }
?>