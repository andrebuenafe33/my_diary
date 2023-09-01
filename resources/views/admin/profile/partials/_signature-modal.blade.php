<div class="modal fade" id="edit-signature" tabindex="-1" aria-labelledby="editSignature" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$profile->name}}'s Signature</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('users.updateSignature',$profile->id) }}" method="post" enctype="multipart/form-data" id="signature-form">
            @csrf
            <div class="modal-body">
                @if ($profile->signature == Null)
                    <input type="file" name="signature" id="signature">
                @else
                    <input type="file" name="signature" id="signature" data-default-file="{{ asset('storage/uploads/signatures/'.$profile->img) }}">
                @endif
            </div>
            @method('PUT')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="save-signature">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
  