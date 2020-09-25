<?php
    session_start();

    $userid = $_SESSION['user_id'];

    if(isset($_POST['submit_image'])) {
        include("_connection.php");
        // include("_compressImage.php");


        $target_dir = "profile_pic/";
        $target_file = $target_dir . basename(time().$_FILES['image']['name']);
        $errorAlert = false;
        $successAlert = false;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['image']['tmp_name']);

        if($check !== false) {
            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                
                $query_profile = "UPDATE `users` SET `profile_pic` = 'partials/$target_file' WHERE `user_id` = '$userid'";
                $data_profile = mysqli_query($conn,$query_profile);

                if($data_profile) {
                    $_SESSION['profile_pic'] = "partials/".$target_file;
                    $successAlert = "Profile picture updated successfully.";
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
?>