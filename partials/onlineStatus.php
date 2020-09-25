<?php
    session_start();
    include("_connection.php");
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['userId'])) {

        $other_userId = $_POST['userId'];
        
        $query_online = "SELECT * FROM onlinestatus WHERE `online_user_id` = '$other_userId' AND `online_user_id` != '$user_id'";

        $data_online = mysqli_query($conn,$query_online);
        $row_online = mysqli_num_rows($data_online);

        if($row_online > 0) {
            echo true;
        } else {
            echo false;
        }
    }
    
?>