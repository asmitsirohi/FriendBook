<?php
    include("_connection.php");
    $user_id = $_SESSION['user_id'];
?>

<div class="modal fade" id="friendRequest" tabindex="-1" role="dialog" aria-labelledby="friendRequestLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="friendRequestLabel">Friend Requests</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $query_request_fetch = "SELECT * FROM friendrequests WHERE `friendRequest_to` = '$user_id'";
                    $data_request_fetch = mysqli_query($conn,$query_request_fetch);
                    $rows_request_fetch = mysqli_num_rows($data_request_fetch);

                    if($rows_request_fetch > 0) {
                        while($result_request_fetch = mysqli_fetch_assoc($data_request_fetch)) {
                            $query_people_fetch = "SELECT * FROM users WHERE `user_id` = '$result_request_fetch[friendRequest_from]' LIMIT 3";
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
                        echo '<p class="mt-3 text-center">
                                <a href="moreFriendRequest.php">View More</a>
                            </p>';
                    } else {
                        echo '<h5 class="text-center"><span class="badge badge-danger">No Friend Requests</span></h5>';
                    }                        
                ?>
                <hr>
                <h5 class="modal-title" id="friendRequestLabel">People you may know</h5>
                <hr>

                <?php
                    $query_people = "SELECT * FROM users LIMIT 3";
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

                <p class="mt-3 text-center">
                    <a href="morePeople.php">View More</a>
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
