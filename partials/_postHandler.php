<?php
    session_start();

    $userid = $_SESSION['user_id'];

    if(isset($_POST['submit_post'])) {
        include("_connection.php");
        include("_protectXSS.php");

        $WhatsNew = filter_str($_POST['WhatsNew']);

        if(empty($WhatsNew) && empty($_FILES['postPhoto']['name'])) {
            $errorAlert = "You have nothing to post.";
            header("location:/FriendBook/account.php?errorAlert=".$errorAlert."");
        } else if(empty($_FILES['postPhoto']['name'])){
            $query_post = "INSERT INTO `posts` (`post_text`, `post_photo`, `post_user_id`,`post_like_id` , `post_timestamp`) VALUES ('$WhatsNew', '', '$userid', '0',CURRENT_TIMESTAMP())";
    
            $data_post = mysqli_query($conn,$query_post);

            if($data_post) {
                $successAlert = "Your idea is being posted.";
                header("location:/FriendBook/account.php?successAlert=".$successAlert."");
                exit();
            }
        } else {    
            $target_dir = "posts/";
            $target_file = $target_dir . basename(time().$_FILES['postPhoto']['name']);
            $errorAlert = false;
            $successAlert = false;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
            $check = getimagesize($_FILES['postPhoto']['tmp_name']);
    
            if($check !== false) {
                if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                    
                    move_uploaded_file($_FILES["postPhoto"]["tmp_name"], $target_file);
                    
                    $query_post = "INSERT INTO `posts` (`post_text`, `post_photo`, `post_user_id`,`post_like_id` , `post_timestamp`) VALUES ('$WhatsNew', 'partials/$target_file', '$userid', '0',CURRENT_TIMESTAMP())";
    
                    $data_post = mysqli_query($conn,$query_post);
    
                    if($data_post) {
                        $successAlert = "Your idea is being posted.";
                        header("location:/FriendBook/account.php?successAlert=".$successAlert."");
                        exit();
                    }
                } else {
                    $errorAlert = "Sorry, only JPG, JPEG, PNG files are allowed.";
                    header("location:/FriendBook/account.php?errorAlert=".$errorAlert."");
                    exit();
                }
    
            } else {
                $errorAlert = "Please, upload a valid image file.";
                header("location:/FriendBook/account.php?errorAlert=".$errorAlert."");
            }

        }


    }
?>