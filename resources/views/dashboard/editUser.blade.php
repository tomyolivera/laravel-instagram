<div class="modal fade" id="editUser_{{ $modal_id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" value="{{ $user->id }}" disabled class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $user->name }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" value="{{ $user->email }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="{{ $user->username }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="verified">Verified</label>
                        <input type="number" value="{{ $user->verified }}" class="form-control">
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>