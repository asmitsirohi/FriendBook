<?php
    session_start();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("location:account.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FriendBook">
    <link rel="shortcut icon" href="assests/logo.png" type="image/x-icon">
    <title>Home-FriendBook</title>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <script src="libs/jquery-3.4.1.min.js"></script>
    <script src="libs/popper.min.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/captcha.js"></script>
    <script src="js/tooltip.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <a href="assests/logo.png" target="_blank">
            <img src="assests/logo.png" class="navbar-brand rounded-circle mr-4 ml-4 mb-4 mt-2 bg-light" alt="logo"
                width="40px" data-toggle="tooltip" data-placement="bottom" title="FriendBook">
        </a>
        <h1 class="text-light ml-4 mb-4 mt-2" id="login">FriendBook</h1>
        <form action="partials/_loginHandler.php" method="post" class="form-inline ml-auto">
            <div class="input-group mr-sm-4 mb-4 mt-2">
                <div class="input-group-prepend" id="symbol">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Email Address" name="email" required>
            </div>
            <div class="input-group mb-4 mr-sm-4 mt-2">
                <div class="input-group-prepend" id="symbol">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="password" name="password" required>
            </div>
            <button class="btn btn-primary mb-4 mr-sm-4 mt-2" id="login" name="submit_login">Log In</button>
        </form>
        <a href="forgetPassword.php" class="text-light" id="forget">Forget Password?</a>
    </nav>

    <?php include("partials/_alerts.php");?>
    <?php include("partials/addAccountModal.php");?>
    <?php include("partials/loginAccountModal.php");?>
    <?php include("partials/deleteAccountModal.php");?>

    <div class="container mb-4">
        <div class="row">
            <div class="col-sm-6 mt-2">
                <h1>Recent logins</h1>
                <h5 class="mb-4">Click your picture or add an account</h5>
                <div class="card-columns">
                    <div id="accounts"></div>
                    <div class="card text-light bg-dark" style="cursor:pointer;" data-toggle="modal"
                        data-target="#addAccountModal" data-whatever="@mdo" type=button>
                        <div class="card-body">
                            <p class="text-center mt-auto" id="plus">
                                <i class="fas fa-plus-circle"></i>
                            </p>
                        </div>
                        <div class="card-footer">
                            <p class="text-center" id="user">Add account</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-2">
                <h1>Create a new account</h1>
                <h5 class="mb-4">It's quick and easy.</h5>

                <form id="createAccount" action="partials/_signupHandler.php" method="POST">
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control mr-sm-4 mb-3" id="fname"
                                    placeholder="First Name" required>
                                <small id="passwordHelpBlock" class="form-text invalid-feedback">
                                    Enter valid name
                                </small>
                                <small id="passwordHelpBlock" class="form-text valid-feedback">
                                    Great!
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="lname" class="form-control mb-3" id="lname"
                                    placeholder="Last Name" required>
                                <small id="passwordHelpBlock" class="form-text invalid-feedback">
                                    Enter valid surname
                                </small>
                                <small id="passwordHelpBlock" class="form-text valid-feedback">
                                    Great!
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                            required autocomplete="off">
                        <small id="wrongUsername" class="form-text invalid-feedback">
                            Please, Enter a valid Email
                        </small>
                        <small id="correctUsername" class="form-text valid-feedback">
                            Valid Email
                        </small>
                    </div>
                    <div class="form-group mb-2">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email address"
                            required>
                        <small id="wrongsEmail" class="form-text invalid-feedback">
                            Please, Enter a valid Email
                        </small>
                        <small id="correctsEmail" class="form-text valid-feedback">
                            Valid Email
                        </small>
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="password" class="form-control" id="pass" placeholder="New Password"
                            required>
                        <small id="passwordHelpBlock" class="form-text invalid-feedback">
                            Enter a strong password
                        </small>
                        <small id="passwordHelpBlock" class="form-text valid-feedback">
                            Strong password!
                        </small>
                    </div>
                    <p id="gen">Gender</p>
                    <div class="custom-control custom-radio custom-control-inline mb-3">
                        <input type="radio" id="male" class="custom-control-input" name="gender" value="male" required>
                        <label for="male" class="custom-control-label">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mb-3">
                        <input type="radio" id="female" class="custom-control-input" name="gender" value="female"
                            required>
                        <label for="female" class="custom-control-label">Female</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mb-3">
                        <input type="radio" id="other" class="custom-control-input" name="gender" value="other"
                            required>
                        <label for="other" class="custom-control-label">Other</label>
                    </div>
                    <p id="gen">Captacha</p>
                    <div class="form-group">
                        <img src="captcha.php" alt="captacha" class="rounded img-thumbnail" id="captchaImg">
                        <button class="btn" onclick="changeCaptcha();"><i class="fas fa-sync-alt"></i></button>
                    </div>
                    <div class="form-group">
                        <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" id="captcha"
                            required autocomplete="off">
                        <small id="wrongCaptcha" class="form-text invalid-feedback">
                            Enter captcha
                        </small>
                        <small id="correctCaptcha" class="form-text valid-feedback">
                            Looks good!
                        </small>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" id="create" name="submit" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="js/validation.js"></script>
<script src="js/saveAccount.js"></script>
<script src="js/fetchSavedAccount.js"></script>
<script src="js/addAccountValdation.js"></script>

</html>