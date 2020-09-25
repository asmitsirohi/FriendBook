<?php
    include('partials/_alerts.php');

    if(isset($_POST['submitUser'])) {
        include("partials/_connection.php");
        include("partials/_protectXSS.php");

        $loginPassword = filter_str($_POST['loginPassword']);
        $encoded = md5($loginPassword);

        $query_entry = "SELECT * FROM `admin_entry` WHERE `entry_password` = '$encoded'";
        $data_entry = mysqli_query($conn,$query_entry);
        $row_entry = mysqli_num_rows($data_entry);

        if($row_entry == 1) {
            session_start();
            $_SESSION['adminEntered'] = true;

            header("location: /FriendBook/admin/login.php");
        } else {
            $errorAlert = "Wrong Password!";
            header("location:/FriendBook/admin/index.php?errorAlert=".$errorAlert."");
        }

        
    }
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
                        <img src="../assests/logo.png" class="mr-4" alt="...">
                        <div class="media-body">
                            <h1 class="mt-4 pt-4 text-primary" style="font-family: 'Anton', sans-serif;">FriendBook</h1>
                        </div>
                    </div>
                    <p>Welcome to FriendBook Admin Page. Please Enter Password to Continue.</p>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Enter Password..." required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="submitUser">Enter in Admin Panel</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>