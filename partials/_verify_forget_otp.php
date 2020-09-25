<?php   
    session_start();
    include("_connection.php");
    include("_alerts.php");

    $successAlert = false;
    $errorAlert = false;
    
    if(!isset($_SESSION['otp'])) {
        $errorAlert = "OTP doesn't send. Enter a valid Email Address.";
        header("location:/FriendBook/forgetPassword.php?errorAlert=".$errorAlert."");
    } 

    if(isset($_POST['verify_forget'])) {
        
        $otp = $_POST['otp'];
        
        $forgetEmail = $_SESSION['forgetEmail'];
    
        $otpToVerify = $_SESSION['otp'];

        if($otp == $otpToVerify) {
            $_SESSION['forgetPasswordSet'] = true;
            
            header("location:/FriendBook/resetPassword.php");
            
        } else {
            $errorAlert = "OTP is not verify. Try agian.";
            header("location:/FriendBook/forgetPassword.php?errorAlert=".$errorAlert."");
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
                <h3>OTP is sent at <?php echo $_SESSION['forgetEmail']; ?></h3>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group">
                        <label for="otp">Enter OTP</label>
                        <input type="number" class="form-control" id="otp" name="otp" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted" required>Do not share your OTP with anyone
                            else.</small>
                    </div>

                    <button type="submit" class="btn btn-primary" name="verify_forget">Verify OTP</button>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</body>

</html>