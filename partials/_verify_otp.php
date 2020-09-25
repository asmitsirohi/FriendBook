<?php   
    session_start();
    include("_connection.php");
    include("_alerts.php");

    $successAlert = false;
    $errorAlert = false;
    
    if(!isset($_SESSION['otp'])) {
        $errorAlert = "OTP doesn't send. Enter a valid Email Address.";
        header("location:/FriendBook/index.php?errorAlert=".$errorAlert."");
    } 

    if(isset($_POST['verify'])) {
        
        $otp = $_POST['otp'];
        $username = $_SESSION['username']; 
        $email = $_SESSION['email'];
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $gender = $_SESSION['gender'];
        $password = $_SESSION['password'];

        $otpToVerify = $_SESSION['otp'];

        if($otp == $otpToVerify) {
            $encoded_password = md5($password);
            $profile_pic = "assests/1.jpg";

            $query_insert = "INSERT INTO `users` (`fname`, `lname`, `username`, `email`, `pass`,`gender`, `profile_pic`, `created`) VALUES ('$fname', '$lname', '$username', '$email', '$encoded_password','$gender', '$profile_pic', CURRENT_TIMESTAMP())";
            $data_insert = mysqli_query($conn,$query_insert);

            $query_user = "SELECT * FROM `users` WHERE `email` = '$email'";
            $data_user = mysqli_query($conn, $query_user);
            $result_user = mysqli_fetch_assoc($data_user);
            $userId = $result_user['user_id'];

            $query_friend = "INSERT INTO `friends` (`friend_from`, `friend_to`, `friend_timestamp`) VALUES ('1', '$userId', CURRENT_TIMESTAMP())";
            $data_friend = mysqli_query($conn,$query_friend);

            if($data_insert) {
                $successAlert = "Account created successfully. Now you can Login.";
                header("location:/FriendBook/index.php?successAlert=".$successAlert."");
            } else {
                $errorAlert = "Problem in creating account. Try again.";
                header("location:/FriendBook/index.php?errorAlert=".$errorAlert."");
            }
        } else {
            $errorAlert = "OTP is not verify. Try agian.";
            header("location:/FriendBook/index.php?errorAlert=".$errorAlert."");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assests/logo.png" type="image/x-icon">
    <title>Verify OTP-FriendBook</title>
    <link rel="stylesheet" href="/FriendBook/libs/css/bootstrap.min.css">
    <script src="/FriendBook/libs/jquery-3.4.1.min.js"></script>
    <script src="/FriendBook/libs/popper.min.js"></script>
    <script src="/FriendBook/libs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="my-3">Verify OTP</h1>
                <br>
                <h3>OTP is sent at <?php echo $_SESSION['email']; ?></h3>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group">
                        <label for="otp">Enter OTP</label>
                        <input type="number" class="form-control" id="otp" name="otp" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted" required>Do not share your OTP with anyone
                            else.</small>
                    </div>

                    <button type="submit" class="btn btn-primary" name="verify">Verify OTP</button>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</body>

</html>