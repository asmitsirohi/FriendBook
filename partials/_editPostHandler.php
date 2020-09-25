<?php
    $successAlert = false;
    $errorAlert = false;

    if(isset($_POST['submitEditPost'])) {
        include("_connection.php");
        include("_protectXSS.php");

        $editId = $_POST['editId'];
        $textEdit = filter_str($_POST['textEdit']);

        if(empty($textEdit) && empty($_FILES['photoEdit']['name'])) {
            $errorAlert = "You have nothing to update.";
            header("location:/FriendBook/manageAccount.php?errorAlert=".$errorAlert."");
            exit();

        } else if(empty($_FILES['photoEdit']['name'])){
            $query = "UPDATE `posts` SET `post_text` = '$textEdit' WHERE `post_id` = '$editId'";

            $data = mysqli_query($conn,$query);

            if($data) {
                $successAlert = "Post updated successfully.";
                header("location:/FriendBook/manageAccount.php?successAlert=".$successAlert."");
                exit();
            } else {
                $errorAlert = "Post is not updated!";
                header("location:/FriendBook/manageAccount.php?errorAlert=".$errorAlert."");
                exit();
            }
        } else {    
            $target_dir = "posts/";
            $target_file = $target_dir . basename(time().$_FILES['photoEdit']['name']);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
            $check = getimagesize($_FILES['photoEdit']['tmp_name']);
    
            if($check !== false) {
                if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                    
                    move_uploaded_file($_FILES["photoEdit"]["tmp_name"], $target_file);

                    $query = "UPDATE `posts` SET `post_text` = '$textEdit' , `post_photo` = 'partials/$target_file' WHERE `post_id` = '$editId'";

                    $data = mysqli_query($conn,$query);

                    echo var_dump($data);

                    if($data) {
                        $successAlert = "Post updated successfully.";
                        header("location:/FriendBook/manageAccount.php?successAlert=".$successAlert."");
                        exit();
                    } else {
                        $errorAlert = "Post is not updated!";
                        header("location:/FriendBook/manageAccount.php?errorAlert=".$errorAlert."");
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