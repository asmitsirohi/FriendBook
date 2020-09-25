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
                    <a href="users.php" class="nav-link disabled" style="text-decoration:underline;">Users</a>
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
                    <h4 class="box-title">Users </h4>
                    <button class="btn btn-danger mt-4 btn-sm" data-toggle="modal" data-target="#truncateModal">Truncate
                        Users</button>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">SNo.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Profile Pic</th>
                                    <th>Gender</th>
                                    <th>Time</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="scroll">
                                <?php
                                    $query_user = "SELECT * FROM `users`";
                                    $data_user = mysqli_query($conn, $query_user);
                                    $rows_user = mysqli_num_rows($data_user);
                                    $sno = 1;

                                    if($rows_user> 0) {
                                        while($result_user = mysqli_fetch_assoc($data_user)) {
                                            echo '<tr>
                                                    <td class="serial">'.$sno.'</td>
                                                    <td>'.$result_user['fname'].' '.$result_user['lname'].'</td>
                                                    <td>'.$result_user['username'].'</td> 
                                                    <td>'.$result_user['email'].'</td> 
                                                    <td><a href="../'.$result_user['profile_pic'].'"><img src="../'.$result_user['profile_pic'].'" alt="Image" width="50px" class="rounded"></a></td> 
                                                    <td>'.$result_user['gender'].'</td> 
                                                    <td>'.filter_dateTime($result_user['created']).'</td> 
                                                   <td> <button class="deleteUser btn btn-danger btn-sm" id="'.$result_user['user_id'].'">Delete</button> </td>
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
<script src="js/delete_user.js"></script>