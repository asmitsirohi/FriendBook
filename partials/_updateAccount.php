<?php
    session_start();
    include("_connection.php");
    $successAlert = false;
    $errorAlert = false;

    if(isset($_POST['update'])) {
        $updateUsername = $_POST['updateusername'];
        $updatefname = $_POST['updatefname'];
        $updatelname = $_POST['updatelname'];
        $userid = $_SESSION['user_id'];

        $query_update = "UPDATE `users` SET `username` = '$updateUsername', `fname` = '$updatefname', `lname` = '$updatelname' WHERE `user_id` = '$userid'";

        $data_update = mysqli_query($conn,$query_update);
        
        if($data_update) {
            $query_check = "SELECT * FROM users WHERE `user_id` = '$userid'";
            $data_check = mysqli_query($conn,$query_check);
            $row_check = mysqli_num_rows($data_check);
        

            if($row_check == 1) {
                $result_check = mysqli_fetch_assoc($data_check);
                
                $_SESSION['name'] = $result_check['fname'] ." ". $result_check['lname'];
                $_SESSION['username'] = $result_check['username'];
            }

            $successAlert = "Data updated successfully.";
            header("location:/FriendBook/manageAccount.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Sorry, Data is not updated";
            header("location:/FriendBook/manageAccount.php?errorAlert=".$errorAlert."");
        }
    }
?>