<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assests/logo.png" type="image/x-icon">
    <title>Error Login-FriendBook</title>
    <link rel="stylesheet" href="/FriendBook/libs/css/bootstrap.min.css">
    <script src="/FriendBook/libs/jquery-3.4.1.min.js"></script>
    <script src="/FriendBook/libs/popper.min.js"></script>
    <script src="/FriendBook/libs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>

<?php include("partials/_alerts.php"); ?>

<div class="container">
    <h1 class="text-danger my-4"><i class="fas fa-times"></i> Invalid Details. Try Again.</h1>

    <form action="partials/_loginHandler.php" method="POST">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required placeholder="Email Address">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block" name="submit_login">Submit</button>
    </form>
</div>

</html>