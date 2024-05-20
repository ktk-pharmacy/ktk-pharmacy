<div class="modal-body">
    <form method="post" action="{{ route('hero_slider_create') }}" id="brand_form" enctype="multipart/form-data"
        class="forms-sample">
        @csrf

        <div class="form-group">
            <label for="" class="form-label d-block">Image</label>
            <div id="brand_image">
                <input type="file" id="image" name="image" data-max-file-size="1000K"
                    data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]' required
                    class="form-control">
            </div>
        </div>
        <div class=" d-flex justify-content-center">
            <button type="button" class="btn btn-sm btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </form>
</div>
