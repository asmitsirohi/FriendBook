<?php
    if(isset($_POST['post_id'])) {
        include("_connection.php");

        $post_id = $_POST['post_id'];
        $present_like = $_POST['present_like'];
        $present_like++;

        $query_like = "UPDATE `posts` SET `post_like_id` = '$present_like' WHERE `post_id` = '$post_id'";
        $data_like = mysqli_query($conn,$query_like);

        if($data_like) {
            echo true;
        } else {
            echo false;
        }
    }
?>