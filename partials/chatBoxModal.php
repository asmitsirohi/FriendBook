<?php
    include("_connection.php");
    $user_id = $_SESSION['user_id'];
?>

<!-- ChatBox Modal -->
<div class="modal fade" id="chatBoxModal" tabindex="-1" role="dialog" aria-labelledby="chatBoxModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatBoxModalLabel">Chat Box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4><span class="badge badge-success mb-3">Friends</span></h4>

                <?php
                  $query_friends = "SELECT * FROM friends WHERE `friend_from` = '$user_id' OR `friend_to` = '$user_id'";
                  $data_friends = mysqli_query($conn,$query_friends);
                  $rows_friends = mysqli_num_rows($data_friends);

                  if($rows_friends > 0) {
                    while($results_friends = mysqli_fetch_assoc($data_friends)) {
                      $query_peoples = "SELECT * FROM users WHERE (`user_id` = '$results_friends[friend_from]' OR `user_id` = '$results_friends[friend_to]') AND `user_id` != '$user_id'";

                      $data_peoples = mysqli_query($conn,$query_peoples);
                      $result_peoples = mysqli_fetch_assoc($data_peoples);

                      echo '<div class="media mb-2">
                                <a href="chatBox.php?friend='.$result_peoples['username'].'">
                                    <img src="'.$result_peoples['profile_pic'].'" class="mr-3 rounded-circle" alt="profile_pic"   
                                    width="55px">
                                </a>    
                              <div class="media-body row onlineDiv" id="'.$result_peoples['user_id'].'">
                                  <a href="chatBox.php?friend='.$result_peoples['username'].'">
                                    <h5 class="mt-0 mx-2">'.$result_peoples['username'].'</h5>
                                  </a>  
                                  <span class="pt-2" style="font-size:8px;"><i class="fas fa-circle text-danger"></i></span>
                              </div>
                          </div>';                      
                    }
                  } else {
                    echo '<h5><span class="badge badge-danger">No Friends Yet!</span></h5>';
                  }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>