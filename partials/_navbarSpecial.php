<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a href="assests/logo.png" target="_blank">
        <img src="assests/logo.png" class="navbar-brand rounded-circle bg-light" alt="logo" width="35px"
            data-toggle="tooltip" data-placement="bottom" title="FriendBook">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="account.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <form class="form-inline my-2 my-lg-0 mx-2" action="search.php" method="GET">
                <div class="input-group">
                    <input type="search" id="query" name="query" class="form-control" placeholder="Search"
                        aria-label="Search" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom"
                            title="Search"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </ul>
        <div class="row">
            <button class="btn" data-toggle="modal" data-target="#chatBoxModal">
                <i class="fab fa-facebook-messenger text-light" id="icons" data-toggle="tooltip" data-placement="bottom"
                    title="Chat Box"></i>
            </button>

            <!-- <button class="btn">
                <i class="fas fa-bell text-light" id="icons" data-toggle="tooltip" data-placement="bottom"
                    title="Notifications"></i>
            </button> -->

            <div class="dropdown mx-3">
                <button class="btn dropdown-toggle rounded-circle" type="button" id="userFunction"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo $_SESSION['profile_pic']; ?>" alt="image" width="35px"
                        class="rounded rounded-circle">
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userFunction">
                    <a type="button" data-toggle="modal" data-target="#profile_picModal">
                        <img src="<?php echo $_SESSION['profile_pic']; ?>" alt="image" width="45px"
                            class="rounded rounded-circle mx-auto d-block">
                    </a>

                    <h5 class="text-center mt-3">
                        <span class="badge badge-success">
                            <?php
                                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo $_SESSION['name']; 
                                } 
                            ?>
                        </span>
                    </h5>

                    <a class="btn mx-2" href="logout.php">
                        <i class="fas fa-sign-out-alt" style="font-size:25px;" data-toggle="tooltip"
                            data-placement="bottom" title="Logout">
                        </i>
                    </a>
                    <a class="btn mx-2 float-right" href="manageAccount.php">
                        <i class="fas fa-user-cog" style="font-size:25px;" data-toggle="tooltip" data-placement="bottom"
                            title="Manage account">
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>