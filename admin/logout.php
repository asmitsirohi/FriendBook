<?php
    if(!isset($_SESSION['adminLoggedin']) && $_SESSION['adminLoggedin'] != true) {
        header("location:/FriendBook/admin/login.php");
    }
    session_start();
    session_unset();
    session_destroy();

    header("location:/FriendBook/admin/login.php");
?>