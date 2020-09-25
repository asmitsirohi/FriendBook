<?php
    $errorAlert = false;

    if(isset($_POST['AdminLogin'])) {
        include('_connection.php');    
        include('_protectXSS.php');    

        $adminEmail = filter_str($_POST['adminEmail']);
        $adminPassword = filter_str($_POST['adminPassword']);

        $encodedPassword = md5($adminPassword);

        $query_check = "SELECT * FROM `admin` WHERE `admin_email` = '$adminEmail' AND `admin_password` = '$encodedPassword'";
        $data_check = mysqli_query($conn,$query_check);
        $row_check = mysqli_num_rows($data_check);

        if($row_check == 1) {
            $result_check = mysqli_fetch_assoc($data_check);
            
            session_start();
            $_SESSION['adminLoggedin'] = true;
            $_SESSION['admin_name'] = $result_check['admin_name'];

            header("location:/FriendBook/admin/dashboard.php");
        } else {
            $errorAlert = "Invalid Email Address and Password";
            header("location:/FriendBook/admin/index.php?errorAlert=".$errorAlert."");
        }
    }
?>