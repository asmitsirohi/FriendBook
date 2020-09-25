<!--Delete user Modal -->
<div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="deleteModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_userHandler.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="deleteId" id="deleteId">
                    Do you want to delete this User?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitDeleteUser">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Truncate user Modal -->
<div class="modal fade" id="truncateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncateModalLabel">Truncate User Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_userHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> user table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncateUser">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Delete Post Modal -->
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
            <form action="partials/_postHandler.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="deletePostId" id="deletePostId">
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

<!--Truncate Post Modal -->
<div class="modal fade" id="truncatePostModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncatePostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncatePostModalLabel">Truncate Post Table
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_postHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> post table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncatePost">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Post Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="messageModalLabel">Send Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_postHandler.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="messageId" id="messageId">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label" id="statusRadio">Message:</label>
                        <textarea class="form-control" id="messageText" name="messageText" placeholder="Write messege here..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="sendMessage">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Truncate Online Status Modal -->
<div class="modal fade" id="truncateOnlineStatusModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncateOnlineStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncateOnlineStatusModalLabel">Truncate Online Status Table
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_otherTableHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> online status table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncateOnlineStatus">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Truncate ChatBox Modal -->
<div class="modal fade" id="truncateChatoxModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncateChatoxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncateChatoxModalLabel">Truncate ChatBox Table
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_otherTableHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> ChatBox table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncateChatBox">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Truncate Comments Modal -->
<div class="modal fade" id="truncateCommentsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncateCommentsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncateCommentsModalLabel">Truncate Comments Table
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_otherTableHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> comments table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncateComments">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Truncate friendRequest Modal -->
<div class="modal fade" id="truncatefriendRequestModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncatefriendRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncatefriendRequestModalLabel">Truncate Friend Request Table
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_otherTableHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> friend request table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncateFriendRequest">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Truncate Friends Modal -->
<div class="modal fade" id="truncateFriendsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncateFriendsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncateFriendsModalLabel">Truncate Friends Table
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_otherTableHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> friends table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncateFriends">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Truncate Admin Modal -->
<div class="modal fade" id="truncateAdminModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="truncateAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="truncateAdminModalLabel">Truncate Admin Table
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_mainAdminHandler.php" method="post">
                <div class="modal-body">
                    Do you want to <strong>Truncate</strong> admin table?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitTruncateAdmin">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Delete Admin Modal -->
<div class="modal fade" id="deleteAdminModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="deleteAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="deleteAdminModalLabel">Delete Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_mainAdminHandler.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="deleteAdminId" id="deleteAdminId">
                    Do you want to delete this Admin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitDeleteAdmin">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Admin Modal -->
<div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="editAdminLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="editAdminLabel">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_mainAdminHandler.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="adminId" id="adminId">
                    <div class="form-group">
                        <label for="editAdminName" class="col-form-label" id="statusRadio">Edit Admin Name
                            :</label>
                        <input type="text" class="form-control" id="editAdminName" name="editAdminName" required>
                    </div>
                    <div class="form-group">
                        <label for="editAdminEmail" class="col-form-label" id="statusRadio">Edit Admin Email
                            :</label>
                        <input type="text" class="form-control" id="editAdminEmail" name="editAdminEmail" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="edit_admin">Update Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Admin Modal -->
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="addAdminLabel">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_mainAdminHandler.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="adminName" class="col-form-label" id="statusRadio">Admin Name :</label>
                        <input type="text" class="form-control" id="adminName" name="adminName" required>
                    </div>
                    <div class="form-group">
                        <label for="adminEmail" class="col-form-label" id="statusRadio">Admin Name :</label>
                        <input type="email" class="form-control" id="adminEmail" name="adminEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="adminPassword" class="col-form-label" id="statusRadio">Admin Password :</label>
                        <input type="password" class="form-control" id="adminPassword" name="adminPassword" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit_admin">Add Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
