<?php
    $successAlert = false;
    $errorAlert = false;

    if(isset($_POST['submitClearChat'])) {
        session_start();
        include("_connection.php");

        $friendChatId = $_POST['friendChatId'];
        $userid = $_SESSION['user_id'];

        $query_chat_clear = "DELETE FROM `chatbox` WHERE ((`chat_from` = '$userid' AND `chat_to` = '$friendChatId') OR (`chat_from` = '$friendChatId' AND `chat_to` = '$userid'))";
        $data_chat_clear = mysqli_query($conn, $query_chat_clear);

        if($data_chat_clear) {
            $successAlert = "Chat History Cleared";
            header("location:/FriendBook/account.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to clear chat history";
            header("location:/FriendBook/account.php?errorAlert=".$errorAlert."");
        }
    }
?>