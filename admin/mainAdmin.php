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
                    <a href="mainAdmin.php" class="nav-link disabled" style="text-decoration:underline;">Admin</a>
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
        <div class="col-lg-9 dashboard ">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="box-title">Admin</h4>
                    <div class="form-group">
                        <button class="btn btn-danger btn-sm mt-2" data-toggle="modal"
                            data-target="#truncateAdminModal">Truncate
                            Admin</button>
                    </div>
                    <div class="form-group">
                        <a class="text-muted" data-toggle="modal" data-target="#addAdmin" id="arrow">
                            <i class="fas fa-plus-circle"></i> Add Admin
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">SNo.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="scroll">
                                <?php
                                    $query_admin = "SELECT * FROM `admin`";
                                    $data_admin = mysqli_query($conn, $query_admin);
                                    $rows_admin = mysqli_num_rows($data_admin);
                                    $sno = 1;

                                    if($rows_admin> 0) {
                                        while($result_admin = mysqli_fetch_assoc($data_admin)) {
                                            echo '<tr>
                                                    <td class="serial">'.$sno.'</td>
                                                    <td>'.$result_admin['admin_name'].'</td>
                                                    <td>'.$result_admin['admin_email'].'</td> 
                                                    <td>'.filter_dateTime($result_admin['admin_timestamp']).'</td> 
                                                    <td> <button class="editAdmin btn btn-warning btn-sm" id="'.$result_admin['admin_id'].'">Edit</button> </td>
                                                   <td> <button class="deleteAdmin btn btn-danger btn-sm" id="'.$result_admin['admin_id'].'">Delete</button> </td>
                                                </tr>';
                                            $sno++;    
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("partials/_footer.php"); ?>
<script src="js/del_edit_admin.js"></script>