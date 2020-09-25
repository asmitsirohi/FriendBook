<?php
    if(isset($_POST['postid'])) {
        include("_connection.php");

        $postid = $_POST['postid'];
        $commentId = $_POST['commentId'];
        $bulk = array();

        $query_comment = "SELECT * FROM comments WHERE `comment_post_id` = '$postid' AND `comment_id` > '$commentId' LIMIT 5";
        $data_comment = mysqli_query($conn,$query_comment);
        $rows_comment = mysqli_num_rows($data_comment);

        if($rows_comment > 0) {
            while($results_comment = mysqli_fetch_assoc($data_comment)) {
                $user_id = $results_comment['comment_user_id'];

                $query_user = "SELECT * FROM users WHERE `user_id` = '$user_id'";
                $data_user = mysqli_query($conn,$query_user);
                $results_user = mysqli_fetch_assoc($data_user);

                $txt = '<div class="media">
                            <a href="'.$results_user['profile_pic'].'">
                                <img src="'.$results_user['profile_pic'].'" class="mr-3 rounded-circle" width="45px" alt="pic">
                            </a>    
                            <div class="media-body">
                                <a href="otherAccount.php?username='.$results_user['username'].'">  
                                    <h6 class="mt-0 font-weight-bold">'.$results_user['username'].'</h6>
                                </a>    
                                <p>'.$results_comment['comment_description'].'</p>
                            </div>
                        </div>';

                $id = $results_comment['comment_id']; 
                
                $comments = array($id => $txt);
                array_push($bulk,$comments);
            }
            echo json_encode($bulk);
        } else {
            echo -1;
        }
    }
?>