<?php
    session_start();
    $rand_num = $_SESSION['code'];

    echo $rand_num;
    
?>