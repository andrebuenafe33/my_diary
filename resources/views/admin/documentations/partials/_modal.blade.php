<!-- Modal -->
<div class="modal fade" id="newDocumentation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header rounded-3">
          <h5 class="modal-title" id="#exampleModalLabel">New Documentation</h5>
        </div>
            <form action="{{route('documentations.store')}}" id="documentation-upload" method="POST" enctype="multipart/form-data">  
              @csrf
              <div class="modal-body rounded-3">
                
                <input type="file" class="dropify" name="doc_img" id="doc-img" data-max-file-size="5M" data-show-errors="true" data-max-file-size-preview="5M">
                <input type="text" class="form-control col-12 mt-2" name="caption" value="{{ old('caption') }}" placeholder="Write your caption here.">
                
              </div>
              <div class="modal-footer rounded-3">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" value="Save" id="submit-doc" class="btn btn-success btn-sm">
              </div>
            </form>    
      </div>
    </div>
  </div>
  <!-- End Modal -->