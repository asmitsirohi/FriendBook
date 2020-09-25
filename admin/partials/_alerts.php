<?php
    if(isset($_GET['successAlert'])) {
        $successAlert = $_GET['successAlert'];
        echo '<div class="alert alert-success alert-dismissible fade show sticky-top my-0" role="alert">
                <strong>Success: </strong> '.$successAlert.' 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }

    if(isset($_GET['errorAlert'])) {
        $errorAlert = $_GET['errorAlert'];
        echo '<div class="alert alert-danger alert-dismissible fade show sticky-top my-0" role="alert">
                <strong>Error: </strong> '.$errorAlert.' 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
?>