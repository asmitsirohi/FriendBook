<?php
    session_start();

    if(!isset($_SESSION['forgetPasswordSet']) && $_SESSION['forgetPasswordSet'] != true) {
        header("location:/FriendBook/index.php");
    } 

    include('partials/_alerts.php');

    $forgetEmail = $_SESSION['forgetEmail'];

    if(isset($_POST['submitNewPass'])) {
        include('partials/_connection.php');
        include("partials/_userDataValid.php");

        $resetPass = test_input($_POST['resetPass']);

        $encodedResetPass = md5($resetPass);

        $query_reset = "UPDATE `users` SET `pass` = '$encodedResetPass' WHERE `email` = '$forgetEmail'";
        $data_reset = mysqli_query($conn, $query_reset);

        if($data_reset) {
            session_unset();
            session_destroy();

            $successAlert = "Password Changed Successfully";
            header("location:/FriendBook/index.php?successAlert=".$successAlert."");
        } else {
            $errorAlert = "Fail to Change Password";
            header("location:/FriendBook/index.php?errorAlert=".$errorAlert."");
        }

    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="shortcut icon" href="assests/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <script src="libs/jquery-3.4.1.min.js"></script>
    <script src="libs/popper.min.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <style>
    body {
        background-color: #dfd9d9;
    }

    .center {
        margin-top: 20%;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="center border border-primary p-3 rounded">
                    <div class="media ">
                        <img src="assests/logo.png" class="mr-4" alt="image">
                        <div class="media-body">
                            <h1 class="mt-4 pt-4 text-primary" style="font-family: 'Anton', sans-serif;">FriendBook</h1>
                        </div>
                    </div>
                    <p>Welcome to FriendBook Password Rest Page. Please Enter <b>New Password</b> to Reset Password.</p>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <input type="password" class="form-control" name="resetPass" id="resetPass"
                                placeholder="New Password" required>
                            
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="submitNewPass"
                                id="submitNewPass">Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>
