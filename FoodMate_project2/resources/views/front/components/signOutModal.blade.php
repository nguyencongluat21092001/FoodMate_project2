<!-- Signout confirm Modal -->
<div class="modal fade" id="signout" tabindex="-1" role="dialog" aria-labelledby=""
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Sign Out Comfirm.</h5> -->
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to sign out ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">No
                </button>
                <button type="button" class="btn red-bg" style="color: white;" onclick="window.location.href = '/logout';">Yes
                </button>
            </div>
        </div>
    </div>
</div>
