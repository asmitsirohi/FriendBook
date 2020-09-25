<?php
    session_start();

    if(!isset($_SESSION['adminEntered']) && $_SESSION['adminEntered'] != true) {
        header("location:/FriendBook/admin/index.php");
    }

    include('partials/_alerts.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <link rel="shortcut icon" href="../assests/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <script src="../libs/jquery-3.4.1.min.js"></script>
    <script src="../libs/popper.min.js"></script>
    <script src="../libs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Admin Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span></span><img src="../assests/logo.png" alt="" style="width: 80px;"></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="partials/_adminLoginHandler.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="username" name="adminEmail" required>

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="adminPassword" required>
                        </div>
                        <div class="form-group my-4 py-4">
                            <input type="submit" value="Login" class="btn float-right login_btn btn-block"
                                name="AdminLogin">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        This is Admin panel Login.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>