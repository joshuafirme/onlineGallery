<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" action="{{ url('/uses-sliders/store') }}" method="POST" class="row" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">

                <input type="hidden" name="uses_id" value="{{ $uses->id }}">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control file-upload" type="file" name="image">
                    <div class="mt-3">Preview</div>
                    <div class="overflow-auto img-container mt-2">
                        <img width="100%" class="img-preview" id="image" style="max-height: 200px;" />
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
