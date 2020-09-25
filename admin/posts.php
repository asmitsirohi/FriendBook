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
                    <a href="posts.php" class="nav-link disabled" style="text-decoration:underline;">Posts</a>
                </li>
                <li class="menu-title">
                    <a href="otherTables.php" class="nav-link">Other Tables</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9 dashboard ">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="box-title">Posts </h4>
                    <button class="btn btn-danger mt-4 btn-sm" data-toggle="modal"
                        data-target="#truncatePostModal">Truncate Posts</button>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">SNo.</th>
                                    <th>Username</th>
                                    <th>Text</th>
                                    <th>Image</th>
                                    <th>Message</th>
                                    <th>Time</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="scroll">
                                <?php
                                    $query_post = "SELECT posts.*,users.username FROM `posts`, `users` WHERE posts.post_user_id = users.user_id";
                                    $data_post = mysqli_query($conn, $query_post);
                                    $rows_post = mysqli_num_rows($data_post);
                                    $sno = 1;

                                    if($rows_post > 0) {
                                        while($result_post = mysqli_fetch_assoc($data_post)) {
                                            echo '<tr>
                                                    <td class="serial">'.$sno.'</td>
                                                    <td>'.$result_post['username'].'</td>
                                                    <td>'.$result_post['post_text'].'</td> 
                                                    <td><a href="../'.$result_post['post_photo'].'"><img src="../'.$result_post['post_photo'].'" alt="Image" width="50px" class="rounded"></a></td> 
                                                    <td><button class="messageUser btn btn-warning btn-sm" id="'.$result_post['post_user_id'].'">Message</button></td>
                                                    <td>'.filter_dateTime($result_post['post_timestamp']).'</td> 
                                                   <td> <button class="deletePost btn btn-danger btn-sm" id="'.$result_post['post_id'].'">Delete</button> </td>
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
<script src="js/message_del_post.js"></script>