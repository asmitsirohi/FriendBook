<!--Profile Pic Modal -->
<div class="modal fade" id="profile_picModal" tabindex="-1" role="dialog" aria-labelledby="profile_picModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile_picModalLabel">Select profile photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_profile_picHandler.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body my-4 py-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" required>
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-left">
                        <a href="<?php echo $_SESSION['profile_pic']; ?>"  class="btn btn-warning btn-sm">View profile pic</a>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit_image">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>