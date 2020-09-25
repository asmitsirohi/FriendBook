<!--Delete Modal -->
<div class="modal fade" id="deletePostModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="deletePostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="deletePostModalLabel">Delete Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_deletePostHandler.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="deleteId" id="deleteId">
                    Do you want to delete this Post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitDeletePost">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>