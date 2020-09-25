<!--Edit  Modal -->
<div class="modal fade" id="editPostModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="editPostModalLabel">Edit this Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_editPostHandler.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="editId" id="editId">
                    <div class="form-group">
                        <label for="textEdit" class="ml-3 font-weight-bold">Your Post Text</label>
                        <textarea id="textEdit" name="textEdit" class="form-control ml-3 mb-3"
                            style="width:92%; height:100px;" placeholder="Nothing to show..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photoEdit" class="ml-3 mt-3 font-weight-bold">You can upload different photo</label>
                        <input type="file" class="form-control-file ml-3 mb-3" id="photoEdit" name="photoEdit">
                    </div>
                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name="submitEditPost">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>