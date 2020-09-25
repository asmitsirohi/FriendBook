<!--Clear Chat Modal -->
<div class="modal fade" id="clearChatModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="clearChatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger font-weight-bold" id="clearChatModalLabel">Clear Chat History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_clearChatHandler.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="friendChatId" id="friendChatId">
                    Do you want to clear chat history?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submitClearChat">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
