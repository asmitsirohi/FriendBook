<?php
    session_start();
    include("_connection.php");

    
    if(isset($_POST['message_text'])) {
        $message_text = $_POST['message_text'];
        $friendid = $_POST['friendid'];
        $userid = $_SESSION['user_id'];

        $query_chat = "INSERT INTO `chatbox` (`chat_from`, `chat_to`, `chat_message`, `chat_timestamp`) VALUES ('$userid', '$friendid', '$message_text', CURRENT_TIMESTAMP())";

        $data_chat = mysqli_query($conn,$query_chat);

        if($data_chat) {
            echo true;
        } else {
            echo false;
        }
    }

?>