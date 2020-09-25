<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-2">
    <h1 class="text-light ml-4 mb-2 mt-2" id="login">FriendBook</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="user-area dropdown ml-auto">
            <a href="#" class="active nav-link nameText" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" data-display="static">Welcome <?php  echo $_SESSION['admin_name']; ?></a>
            <div class="user-menu dropdown-menu dropdown-menu-sm-right">
                <a class="nav-link logout" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </div>
    </div>
</nav>