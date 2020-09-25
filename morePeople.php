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
    <h1 class="my-4">People you may know</h1>
    <hr>
    <?php
        $user_id = $_SESSION['user_id'];

        $query_people = "SELECT * FROM users";
        $data_people = mysqli_query($conn,$query_people);
        $rows_people = mysqli_num_rows($data_people);

    
        if($rows_people > 0) {
            while($result_people = mysqli_fetch_assoc($data_people)) {
                $query_request = "SELECT * FROM friendrequests WHERE `friendRequest_to` = '$user_id' AND `friendRequest_from` = '$result_people[user_id]'";
                $data_request = mysqli_query($conn,$query_request);
                $result_request = mysqli_fetch_assoc($data_request);

                $query_request2= "SELECT * FROM friendrequests WHERE `friendRequest_to` = '$result_people[user_id]' AND `friendRequest_from` = '$user_id'";
                $data_request2 = mysqli_query($conn,$query_request2);
                $rows_request2 = mysqli_num_rows($data_request2);

                $query_friends = "SELECT * FROM friends WHERE (`friend_from` = '$user_id' AND `friend_to` = '$result_people[user_id]') OR (`friend_from` = '$result_people[user_id]' AND `friend_to` = '$user_id')";
                $data_friends = mysqli_query($conn,$query_friends);
                $rows_friends = mysqli_num_rows($data_friends);
                
                if($rows_friends != 1) {
                    if($result_request['friendRequest_from'] != $result_people['user_id']) {
                        if($result_people['user_id'] != $user_id) {
                            echo '<div class="media">
                                    <img src="'.$result_people['profile_pic'].'" class="mr-3 rounded-circle" width="55px" alt="profile_pic">
                                    <div class="media-body">
                                        <h5 class="mt-0">'.$result_people['username'].'</h5>';
                                        if($rows_request2 == 1) {
                                            echo'<button class="btn btn-primary btn-sm addFriend" id="'.$result_people['user_id'].'" disabled>Request Sent</button>';
                                        } else {
                                            echo '<button class="btn btn-primary btn-sm addFriend" id="'.$result_people['user_id'].'">Add Friend</button>';

                                        }
                                    echo '</div>
                                </div>';
                        }                           

                    }
                }
    
            }
        }
    ?>
</div>


<?php include("partials/_footer.php"); ?>
