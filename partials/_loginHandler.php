<?php
    $errorAlert = false;

    if(isset($_POST['submit_login'])) {
        include("_connection.php");
        include("_alerts.php");
        include("_userDataValid.php");

        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

        $encoded_password = md5($password);

        $query_check = "SELECT * FROM users WHERE `email` = '$email' AND `pass` = '$encoded_password'";
        $data_check = mysqli_query($conn,$query_check);
        $row_check = mysqli_num_rows($data_check);
       

        if($row_check == 1) {
            $result_check = mysqli_fetch_assoc($data_check);
            
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $result_check['fname'] ." ". $result_check['lname'];
            $_SESSION['username'] = $result_check['username'];
            $_SESSION['profile_pic'] = $result_check['profile_pic'];
            $_SESSION['user_id'] = $result_check['user_id'];

            $query_online = "INSERT INTO `onlinestatus` (`online_user_id`, `online_timestamp`) VALUES ('$result_check[user_id]', CURRENT_TIMESTAMP())";

            $data_online = mysqli_query($conn,$query_online);

            header("location:/FriendBook/account.php");
        } else {
            $errorAlert = "Invalid Email Address and Password";
            header("location:/FriendBook/errorLogin.php?errorAlert=".$errorAlert."");
        }
        
    }
?>