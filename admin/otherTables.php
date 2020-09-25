<?php
    session_start();

    if(!isset($_SESSION['adminLoggedin']) && $_SESSION['adminLoggedin'] != true) {
        header("location:/FriendBook/admin/login.php");
    }

    $admin_name = $_SESSION['admin_name'];
?>

<?php include("partials/_connection.php"); ?>
<?php include("partials/_header.php"); ?>
<?php include("partials/_navbar.php"); ?>
<?php include("partials/_alerts.php"); ?>
<?php include("partials/_protectXSS.php"); ?>
<?php include("partials/modals.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav navbar-nav">
                <li class="menu-title">Menu</li>

                <li class="menu-title">
                    <a href="mainAdmin.php" class="nav-link">Admin</a>
                </li>
                <li class="menu-title">
                    <a href="users.php" class="nav-link">Users</a>
                </li>
                <li class="menu-title">
                    <a href="posts.php" class="nav-link">Posts</a>
                </li>
                <li class="menu-title">
                    <a href="otherTables.php" class="nav-link disabled" style="text-decoration:underline;">Other
                        Tables</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9 dashboard ">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="display-4 box-title">Other Tables </h4>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <div class="form-group">
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#truncateChatoxModal">Truncate
                                ChatBox Table</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#truncateCommentsModal">Truncate
                                Comments Table</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#truncatefriendRequestModal">Truncate
                                Friend Requests Table</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#truncateFriendsModal">Truncate
                                Friends Table</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#truncateOnlineStatusModal">Truncate
                                Online Status Table</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("partials/_footer.php"); ?>
<script src="js/delete_user.js"></script>