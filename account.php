<?php
    session_start();

    if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
        header("location:index.php");
    }

    $id = null;
?>
<?php include("partials/_header.php"); ?>
<?php include("partials/_navbar.php"); ?>
<?php include("partials/profile_picModal.php"); ?>
<?php include("partials/_alerts.php"); ?>
<?php include("partials/_connection.php"); ?>
<?php include("partials/_dateTime.php"); ?>


<div class="container mb-4">
    <div class="border rounded my-4 py-4 px-2">
        <div class="media">
            <a href="<?php echo $_SESSION['profile_pic']; ?>">
                <img src="<?php echo $_SESSION['profile_pic']; ?>" class="mr-3 rounded img-thumbnail ml-2" width="100px"
                    alt="profile_pic">
            </a>
            <div class="media-body">
                <h4 class="mt-0">
                    <span class="badge badge-danger">Hi, <?php echo $_SESSION['name']; ?></span>
                </h4>
                <form action="partials/_postHandler.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="form-control" id="WhatsNew" rows="2" name="WhatsNew"
                            placeholder="What's on your mind, <?php echo $_SESSION['name']; ?>"></textarea>
                    </div>

                    <button class="btn btn-light font-weight-bold" type="button" data-toggle="collapse"
                        data-target="#photoSelect" aria-expanded="false" aria-controls="photoSelect">
                        <i class="fas fa-images"></i> Photo
                    </button>
                    <div class="collapse mt-4" id="photoSelect">
                        <div class="card card-body">
                            <p class="text-danger">
                                <i class="fas fa-times-circle"></i> You are able to upload images only.
                            </p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="postPhoto" name="postPhoto">
                                <label class="custom-file-label" for="postPhoto">Choose photo</label>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-info btn-block mt-3 font-weight-bold" name="submit_post">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container pb-4">
    <div id="results">
        <?php
            $query_post = "SELECT * FROM posts ORDER BY `post_id` DESC LIMIT 8";
            $data_post = mysqli_query($conn,$query_post);
            $rows_post = mysqli_num_rows($data_post);

            if($rows_post > 0) {
                while($results_post = mysqli_fetch_assoc($data_post)) {
                    $user_id = $results_post['post_user_id'];

                    $query_user = "SELECT * FROM users WHERE `user_id` = '$user_id'";
                    $data_user = mysqli_query($conn,$query_user);
                    $results_user = mysqli_fetch_assoc($data_user);

                    echo '<div class="border rounded my-4 py-2 px-2 mx-auto" style="width: 90%">
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
                                    echo '<a href="'.$results_post['post_photo'].'">
                                            <img src="'.$results_post['post_photo'].'" alt="post" class="d-block mx-auto img-fluid rounded img-thumbnail" width="500px">
                                        </a>';
                                }
                                echo '<br>
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
                                    <div class="col-sm-4 text-center" data-toggle="tooltip" data-placement="bottom" title="Add Comment" id="'.$results_post['post_id'].'">
                                        <button class="btn btn-light commentBtn" style="width: 200px;" type="button" data-toggle="collapse"
                                            data-target="#commentCollapse'.$results_post['post_id'].'" aria-expanded="false" aria-controls="commentCollapse'.$results_post['post_id'].'">
                                            <i class="fas fa-comment"></i>
                                            Comment
                                        </button>
                                    </div>
                                    
                                </div>
                    
                                <div class="collapse mt-4" id="commentCollapse'.$results_post['post_id'].'">
                                    <div class="card card-body">
                                        <div id="commentList'.$results_post['post_id'].'" class="mb-4 commentList">
                                            <div class="text-center">
                                                <div class="spinner-grow text-danger" role="status" id="commentSpinner'.$results_post['post_id'].'">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center pb-4" id="LoadComment'.$results_post['post_id'].'">
                                            <input type="hidden" id="commentId'.$results_post['post_id'].'" value="0">
                                            <div id="nonspinnerLoadComment">
                                                <button class="btn btn-primary btn-sm" id="loadCommentBtn'.$results_post['post_id'].'">Load more</button>
                                            </div>
                                            <div id="spinnerLoadComment" style="display:none;">
                                                <button class="btn btn-primary btn-sm" type="button" disabled>
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    Loading...
                                                </button>    
                                            </div>
                                        </div>
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

                        $id = $results_post['post_id'];
                } 
            } else {
                echo '<h4 class=" pb-4"><span class="badge badge-danger">No Posts found!</span></h4>'; 
            }
        ?>
    </div>

    <div class="text-center pb-4" id="mainId">
        <input type="hidden" id="postid" value="<?php echo $id; ?>">

        <?php
            if($rows_post > 0) {
                echo '<div id="nonspinner">
                        <button class="btn btn-primary" id="loadMore">Load more</button>
                    </div>';

                echo '<div id="spinner" style="display:none;">
                    <button class="btn btn-primary" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>    
                    </div>';
            }
        ?>

    </div>

</div>

<?php include("partials/_footer.php"); ?>
<script src="js/likePost.js"></script>
<script src="js/loadMorePost.js"></script>
<script src="js/loadComments.js"></script>



