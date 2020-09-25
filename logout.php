<?php
    session_start();
    include('partials/_connection.php');
    
    $user_id = $_SESSION['user_id'];

    $query_delete = "DELETE FROM `onlinestatus` WHERE `online_user_id` = '$user_id'";
    $data_delete = mysqli_query($conn,$query_delete);

    session_unset();
    session_destroy();
    
    header("location: index.php?successAlert=You Logout Successfully.");
?>