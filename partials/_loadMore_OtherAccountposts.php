<?php
    include("_connection.php");

    if(isset($_POST['postid'])) {
        session_start();
        $userid = $_SESSION['user_id'];

        $postid = $_POST['postid'];
        $getUserid = $_POST['getUserid'];
        $bulk = array();

        include("_dateTime.php");

        $query_post = "SELECT * FROM posts WHERE `post_id` > '$postid' AND `post_user_id` = '$getUserid' LIMIT 4";
        $data_post = mysqli_query($conn,$query_post);
        $rows_post = mysqli_num_rows($data_post);

        if($rows_post > 0) {
            while($results_post = mysqli_fetch_assoc($data_post)) {
                $user_id = $results_post['post_user_id'];

                $query_user = "SELECT * FROM users WHERE `user_id` = '$user_id'";
                $data_user = mysqli_query($conn,$query_user);
                $results_user = mysqli_fetch_assoc($data_user);

                $txt1 = '<div class="border rounded my-4 py-2 px-2 mx-auto" style="width: 90%">
                        <div class="media mb-3">
                            <a href="'.$results_user['profile_pic'].'">
                                <img src="'.$results_user['profile_pic'].'" class="mr-3 rounded-circle img-thumbnail ml-2"
                                    width="70px" alt="profile_pic">
                            </a>
                            <div class="media-body">
                                <a href="otherAccount.php?username='.$results_user['username'].'">
                                    <p class="my-0">'.$results_user['username'].'</p>
                                </a>    
                                <span class="mt-0 text-muted" style="font-size: 14px;">'.filter_dateTime($results_post['post_timestamp']).'</span>
                                <i class="fas fa-globe-africa text-muted" data-toggle="tooltip" data-placement="bottom"
                                    title="Share with public"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text mb-2">'.$results_post['post_text'].'</h5>';
                            if( !$results_post['post_photo'] == "" ) {
                                $txt1 .= '<img src="'.$results_post['post_photo'].'" alt="post" class="d-block mx-auto img-fluid rounded img-thumbnail" width="500px">';
                            }
                            $txt2 = '<br>
                            <span style="font-size: 14px;">
                                <i class="fas fa-thumbs-up"></i><span class="text-muted" id="likeCounter'.$results_post['post_id'].'"> '.$results_post['post_like_id'].'</span>
                            </span>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4 text-center" id="'.$results_post['post_id'].'">
                                    <button class="btn btn-light likeBtn" style="width: 200px;" data-toggle="tooltip" data-placement="bottom"
                                    title="Like Post" id="likeBtn">
                                        <i class="fas fa-thumbs-up"></i>Like
                                    </button>
                                </div>
                                <div class="col-sm-4 text-center" data-toggle="tooltip" data-placement="bottom" title="Add Comment">
                                    <button class="btn btn-light" style="width: 200px;" type="button" data-toggle="collapse"
                                        data-target="#commentCollapse'.$results_post['post_id'].'" aria-expanded="false" aria-controls="commentCollapse'.$results_post['post_id'].'">
                                        <i class="fas fa-comment"></i>
                                        Comment
                                    </button>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <button class="btn btn-light" style="width: 200px;" data-toggle="tooltip" data-placement="bottom" title="Share Post">
                                        <i class="fas fa-share"></i>
                                        Share
                                    </button>
                                </div>
                            </div>
                
                            <div class="collapse mt-4" id="commentCollapse'.$results_post['post_id'].'">
                                <div class="card card-body">
                                    <form action="partials/_commentHandler.php" method="post">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control rounded-left" placeholder="Write a comment"
                                                aria-label="Write a comment" aria-describedby="submit_comment" name="comment_text">
                                                <input type="hidden" name="post_id" value="'.$results_post['post_id'].'">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn input-group-text rounded-right" id="submit_comment"
                                                    name="submit_comment" data-toggle="tooltip" data-placement="bottom"
                                                    title="Post Comment">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    $txt = $txt1 . $txt2;
                    $id = $results_post['post_id'];
                    $post = array($id => $txt);
                    array_push($bulk,$post);
            }
            
            echo json_encode($bulk);
        } else {
            echo -1; 
        }
    }
?>