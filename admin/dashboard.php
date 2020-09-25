<?php
    session_start();

    if(!isset($_SESSION['adminLoggedin']) && $_SESSION['adminLoggedin'] != true) {
        header("location:/FriendBook/admin/login.php");
    }

    $admin_name = $_SESSION['admin_name'];
?>

<?php include("partials/_header.php"); ?>
<?php include("partials/_navbar.php"); ?>

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
                    <a href="otherTables.php" class="nav-link">Other Tables</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9 dashboard">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="box-title">DashBoard </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Hello, <?php echo $admin_name; ?></h1>
                                <p class="lead">From Here, You can control your FriendBook.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("partials/_footer.php"); ?>