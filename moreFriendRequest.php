<?php
    session_start();

    if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
        header("location:index.php");
    }

    $id = null;
?>
<?php include("partials/_header.php"); ?>
<?php include("partials/_navbarSpecial.php"); ?>
<?php include("partials/profile_picModal.php"); ?>
<?php include("partials/_alerts.php"); ?>
<?php include("partials/_connection.php"); ?>
<?php include("partials/_dateTime.php"); ?>

<div class="container">
    <h1 class="my-4">Friend Requests</h1>
    <hr>
    <?php
        $user_id = $_SESSION['user_id'];
        
        $query_request_fetch = "SELECT * FROM friendrequests WHERE `friendRequest_to` = '$user_id'";
        $data_request_fetch = mysqli_query($conn,$query_request_fetch);
        $rows_request_fetch = mysqli_num_rows($data_request_fetch);

        if($rows_request_fetch > 0) {
            while($result_request_fetch = mysqli_fetch_assoc($data_request_fetch)) {
                $query_people_fetch = "SELECT * FROM users WHERE `user_id` = '$result_request_fetch[friendRequest_from]'";
                $data_people_fetch = mysqli_query($conn,$query_people_fetch);
                $rows_people_fetch = mysqli_num_rows($data_people_fetch);

                if($rows_people_fetch > 0) {
                    while($result_people_fetch = mysqli_fetch_assoc($data_people_fetch)) {
                        echo '<div class="media" id="'.$result_people_fetch['user_id'].'">
                                <img src="'.$result_people_fetch['profile_pic'].'" class="mr-3 rounded-circle" width="55px"
                                    alt="profile_pic">
                                <div class="media-body">
                                    <h5 class="mt-0">'.$result_people_fetch['username'].'</h5>
                                    <div id="friends'.$result_people_fetch['user_id'].'">
                                        <button class="btn btn-primary btn-sm confirmRequest" id="'.$result_people_fetch['user_id'].'">Confirm</button>
                                        <button class="btn btn-danger btn-sm cancelRequest" id="'.$result_people_fetch['user_id'].'">Cancel</button>
                                    </div>
                                </div>
                            </div>';
                    }
                }
            }
        } else {
            echo '<h5 class=""><span class="badge badge-danger">No Friend Requests</span></h5>';
        }                        
    ?>
</div>


<?php include("partials/_footer.php"); ?>
