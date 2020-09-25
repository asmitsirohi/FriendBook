<?php
    include("_connection.php");

    $bulk = array();

    if(isset($_POST['email'])) {
        $email = $_POST['email'];

        $query_check = "SELECT * FROM users WHERE `email` = '$email'";
        $data_check = mysqli_query($conn,$query_check);
        $row_check = mysqli_num_rows($data_check);

        if($row_check > 0) {
            $result_check = mysqli_fetch_assoc($data_check);
            $bulk = array(
                "name" => $result_check['fname']." ".$result_check['lname'],
                "profile_pic" => $result_check['profile_pic']
            );

            echo json_encode($bulk);
        }
    }
?>