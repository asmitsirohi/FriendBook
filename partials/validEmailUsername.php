<?php
    include("_connection.php");
    
    if(isset($_POST['username'])) {

        $username = $_POST['username'];

        $query_username = "SELECT * FROM users WHERE username = '$username'";
        $data_username = mysqli_query($conn,$query_username);
        $rows_username = mysqli_num_rows($data_username);

        if($rows_username > 0) {
            echo true;
        } else {
            echo false;
        }
    }
    if(isset($_POST['email'])) {
        $email = $_POST['email'];

        $query_email = "SELECT * FROM users WHERE email = '$email'";
        $data_email = mysqli_query($conn,$query_email);
        $rows_email = mysqli_num_rows($data_email);

        if($rows_email > 0) {
            echo true;
        } else {
            echo false;
        }
    }
?>