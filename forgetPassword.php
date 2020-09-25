<?php
    include('partials/_alerts.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
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
                        <img src="assests/logo.png" class="mr-4" alt="...">
                        <div class="media-body">
                            <h1 class="mt-4 pt-4 text-primary" style="font-family: 'Anton', sans-serif;">FriendBook</h1>
                        </div>
                    </div>
                    <p>Welcome to FriendBook Password Reset Page. Please Enter <b>Email</b> to Continue.</p>

                    <form action="partials/_forgetPassHandeler.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="forgetEmail" id="emailAdd"
                                placeholder="Enter Email" required>
                            <small id="wrongEmail" class="form-text invalid-feedback">
                                Please, Enter a valid Email
                            </small>
                            <small id="correctEmail" class="form-text valid-feedback">
                                Valid Email
                            </small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="submitUser"
                                id="addUser">Continue
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

<script src="js/addAccountValdation.js"></script>