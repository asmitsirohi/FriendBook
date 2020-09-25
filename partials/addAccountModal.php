<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h3 class="modal-title text-light font-weight-bold" id="addAccountModalLabel">Login and Add account to FriendBook</h3>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_loginHandler.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="emailAdd" name="email" placeholder="Email" required>
                        <small id="wrongEmail" class="form-text invalid-feedback">
                            Please, Enter a valid Email
                        </small>
                        <small id="correctEmail" class="form-text valid-feedback">
                            Valid Email
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="passwordAdd" class="form-control" placeholder="Password"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="addUser" name="submit_login">Log In</button>
                </div>
            </form>
        </div>
    </div>
</div>




