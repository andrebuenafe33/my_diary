<div class="modal fade" id="edit-profile-pic" tabindex="-1" aria-labelledby="editProfilePic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$profile->name}}'s Profile Pic</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('users.updateProfilePic',$profile->id) }}" method="post" enctype="multipart/form-data" id="profile-pic-form">
            @csrf
            <div class="modal-body">
                @if ($profile->img == Null)
                    <input type="file" name="profilePic" id="profilePic" data-default-file="">
                @else
                    <input type="file" name="profilePic" id="profilePic" data-default-file="{{ asset('storage/'.$profile->img) }}">
                @endif
            </div>
            @method('PUT')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="save-profile-pic">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
  