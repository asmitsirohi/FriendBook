<?php
    include("_connection.php");
    include("_protectXSS.php");

    $successAlert = false;
    $errorAlert = false;

    // Add Admin
    if(isset($_POST['submit_admin'])) {

        $adminName = filter_str($_POST['adminName']);
        $adminEmail = filter_str($_POST['adminEmail']);
        $adminPassword = filter_str($_POST['adminPassword']);

        $encodedAdminPass = md5($adminPassword);


        $query_admin = "INSERT INTO `admin` (`admin_name`, `admin_email`, `admin_password`, `admin_timestamp`) VALUES ('$adminName', '$adminEmail', ' $encodedAdminPass', CURRENT_TIMESTAMP())";
        $data_admin = mysqli_query($conn, $query_admin);

        if($data_admin) {
            $successAlert = "Admin Added.";
            header("location:/FriendBook/admin/mainAdmin.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Add Admin.";
            header("location:/FriendBook/admin/mainAdmin.php?errorAlert=".$errorAlert."");
        }
    }

    // Edit Admin 
    if(isset($_POST['edit_admin'])) {
        $editAdminName = filter_str($_POST['editAdminName']);
        $editAdminEmail = filter_str($_POST['editAdminEmail']);
        $adminId = filter_str($_POST['adminId']);

        $query_admin = "UPDATE `admin` SET `admin_name` = '$editAdminName', `admin_email` = ' $editAdminEmail' WHERE `admin_id` = '$adminId'";
        $data_admin = mysqli_query($conn, $query_admin);

        if($data_admin) {
            $successAlert = "Admin Updated.";
            header("location:/FriendBook/admin/mainAdmin.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Update Admin.";
            header("location:/FriendBook/admin/mainAdmin.php?errorAlert=".$errorAlert."");
        }
    }

    // Delete Admin
    if(isset($_POST['submitDeleteAdmin'])) {

        $deleteAdminId = $_POST['deleteAdminId'];

        $query_admin = "DELETE FROM `admin` WHERE `admin_id` = '$deleteAdminId'";
        $data_admin = mysqli_query($conn, $query_admin);

        if($data_admin) {
            $successAlert = "Admin Deleted.";
            header("location:/FriendBook/admin/mainAdmin.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Delete Admin.";
            header("location:/FriendBook/admin/mainAdmin.php?errorAlert=".$errorAlert."");
        }
    }

    // Truncate Admin
    if(isset($_POST['submitTruncateAdmin'])) {
    
        $query_admin = "TRUNCATE `admin`";
        $data_admin = mysqli_query($conn, $query_admin);

        if($data_admin) {
            $successAlert = "Admin Table Truncated.";
            header("location:/FriendBook/admin/mainAdmin.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Truncate Admin Table.";
            header("location:/FriendBook/admin/mainAdmin.php?errorAlert=".$errorAlert."");
        }
    }
?>