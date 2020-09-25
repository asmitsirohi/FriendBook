<?php
    session_start();
    include("_connection.php");

    
    if(isset($_POST['friend_id'])) {
        $friend_id = $_POST['friend_id'];
        $userid = $_SESSION['user_id'];
        $bulk = array();

        $query_chat_fetch = "SELECT * FROM chatbox WHERE (`chat_from` = '$userid' AND `chat_to` = '$friend_id') OR (`chat_from` = '$friend_id' AND `chat_to` = '$userid')";

        $data_chat_fetch = mysqli_query($conn,$query_chat_fetch);
        $rows_chat_fetch = mysqli_num_rows($data_chat_fetch);

        if($rows_chat_fetch > 0) {
            while($results_chat_fetch = mysqli_fetch_assoc($data_chat_fetch)) {
                if($results_chat_fetch['chat_from'] == $userid) {
                    $msg = '<div class="media-body float-right">
                                <div class="border m-1 p-2 rounded-lg bg-primary">
                                    <p class="text-white">'.$results_chat_fetch['chat_message'].'</p>
                                </div>
                            </div>
                            <br><br><br>';

                    $id = $results_chat_fetch['chat_id'];        
                } else {
                    $query_user_friend2 = "SELECT * FROM users WHERE `user_id` = '$friend_id'";
                    $data_user_friend2 = mysqli_query($conn,$query_user_friend2);
                    $result_user_friend2 = mysqli_fetch_assoc($data_user_friend2);

                    $msg = '<div class="media">
                                <img src="'.$result_user_friend2['profile_pic'].'" class="mr-3 rounded-circle" alt="profile_pic"
                                    width="35px">
                                <div class="media-body">
                                    <div class="border m-1 p-2 rounded-lg" style="width: 50%;">
                                        <p>'.$results_chat_fetch['chat_message'].'</p>
                                    </div>
                                </div>
                            </div>';
                            
                    $id = $results_chat_fetch['chat_id'];
                }

                $chatMessage = array($id => $msg);
                array_push($bulk,$chatMessage);
            }
            echo json_encode($bulk);    
        } else {
            echo -1;
        }

        
    }

?>