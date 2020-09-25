<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "friendbook";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn) {
        die("Connection failed beacause of ".mysqli_connect_error());
    }
?>