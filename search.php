<?php
    session_start();

    if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
        header("location:index.php");
    }

    if(!isset($_GET['query'])) {
        header("location:account.php");
    }

    $query = $_GET['query'];
?>
<?php include("partials/_header.php"); ?>
<?php include("partials/_navbar.php"); ?>
<?php include("partials/profile_picModal.php"); ?>
<?php include("partials/_alerts.php"); ?>
<?php include("partials/_connection.php"); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h1 class="my-4">Search results for <em>"<?php echo $query; ?>"</em></h1>

            <?php
                    $query_search = "SELECT * FROM `users` WHERE MATCH (`fname`,`lname`,`username`,`email`) against ('$query')";

                    $data_search = mysqli_query($conn,$query_search);
                    $rows_search = mysqli_num_rows($data_search);
                 
                    if($rows_search > 0) {
                        while($result_search = mysqli_fetch_assoc($data_search)) {
                            echo '<div class="media">
                                    <a href="'.$result_search['profile_pic'].'">
                                        <img src="'.$result_search['profile_pic'].'" class="mr-3 rounded-circle" alt="profile_pic" width="55px">
                                    </a>
                                    <div class="media-body">
                                        <a href="otherAccount.php?username='.$result_search['username'].'">
                                            <h5 class="mt-0 text-dark">'.$result_search['username'].'</h5>
                                        </a>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo '<h4 class=" pb-4"><span class="badge badge-danger">No Results found!</span></h4>';
                    }    
         
                ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

<?php include("partials/_footer.php"); ?>