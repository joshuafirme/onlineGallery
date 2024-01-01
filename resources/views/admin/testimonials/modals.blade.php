<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" action="{{ route('testimonials.store') }}" method="POST" class="row" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Update card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">

                <div class="col-md-6 mb-3">
                    <label for="formFile" class="form-label">Profile Image</label>
                    <input class="form-control file-upload" type="file" name="profile_img" required>
                    <div class="mt-3">Preview</div>
                    <div class="overflow-auto img-container mt-2">
                        <img width="100%" class="img-preview" id="profile_img" style="max-height: 200px;" />
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Testimonial</label>
                    <textarea name="description" class="form-control" required rows="3"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" action="{{ url('/vendors/import') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Import</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-12 mb-3">
                    <a target="_blank" href="{{ url('/vendors/export?is_template=true&type=xlsx') }}" class="btn btn-success">Download excel template</a>
                </div>
                <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">Upload excel file</label>
                    <input class="form-control" name="file" type="file" id="formFile" accept=".csv,.xlsx" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
