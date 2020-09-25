<?php
    session_start();

    if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
        header("location:index.php");
    }
    
    if(!isset($_GET['friend'])) {
        header("location:account.php");
    }

    $friend = $_GET['friend'];
    $userid = $_SESSION['user_id'];
?>
<?php include("partials/_header.php"); ?>
<?php include("partials/_navbar.php"); ?>
<?php include("partials/profile_picModal.php"); ?>
<?php include("partials/_alerts.php"); ?>
<?php include("partials/_connection.php"); ?>
<?php include("partials/clearChatModal.php"); ?>
<?php
    $query_user_friend = "SELECT * FROM users WHERE `username` = '$friend'";
    $data_user_friend = mysqli_query($conn,$query_user_friend);
    $result_user_friend = mysqli_fetch_assoc($data_user_friend);
?>
<div class="container border rounded py-2 mt-2">
    <div class="media">
        <a href="<?php echo $result_user_friend['profile_pic']; ?>">
            <img src="<?php echo $result_user_friend['profile_pic']; ?>" class="mr-3 rounded-circle" alt="profile_pic"
                width="35px">
        </a>
        <div class="media-body row">
            <a href="otherAccount.php?username=<?php echo $result_user_friend['username']; ?>">
                <h5 class="mt-0 mx-2"><?php echo $result_user_friend['username']; ?></h5>
            </a>
            <span class="pt-2" style="font-size:8px;" id="status<?php echo $result_user_friend['user_id']; ?>"><i
                    class="fas fa-circle text-danger"></i></span>
        </div>
        <div class="float-right" id="<?php echo $result_user_friend['user_id']; ?>">
            <a class="text-muted" id="clearChat" data-toggle="tooltip" data-placement="bottom" title="Clear Chat History">Clear Chat</a>
        </div>
    </div>
</div>
<div class="container border rounded my-4">
    <div id="chatbox">
        <div id="chatmessages">
        </div>
        <input type="hidden" id="msgId">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control rounded-left" placeholder="Type a message..."
            aria-label="Type a message..." aria-describedby="message" name="message_text" id="message_text" required>
        <input type="hidden" id="friendid" value="<?php echo $result_user_friend['user_id']; ?>">
        <div class="input-group-append">
            <button type="button" class="btn input-group-text rounded-right" id="send_message" name="send_message"
                data-toggle="tooltip" data-placement="bottom" title="Send Message">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>



<?php include("partials/_footer.php"); ?>
<script src="js/sendMessage.js"></script>
<script src="js/fetch_chat_message.js"></script>
<script src="js/clear_chat_message.js"></script>