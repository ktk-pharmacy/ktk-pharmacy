<div class="modal-body">
    <form method="post" action="{{ route('slider_update', $slider->id) }}" id="brand_form" enctype="multipart/form-data"
        class="forms-sample">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="brand_name" class="form-label d-block">Url</label>
            <div class="">
                <input type="text" value="{{ $slider->url }}" class="form-control" name='url' id="brand_name"
                    placeholder="Enter Url">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="form-label d-block">Image</label>
            <div id="brand_image">
                <input type="file" id="image" name="image" data-max-file-size="1000K"
                    data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]'
                    data-default-file="{{ $slider->image_url }}" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <div class="checkbox checkbox-success checkbox-circle mb-2">
                <input id="category_group_status" type="checkbox" name="status" @checked($slider->status)
                    value="1">
                <label for="category_group_status">
                    Active
                </label>
            </div>
        </div>
        <div class=" d-flex justify-content-center">
            <button type="button" class="btn btn-sm btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </form>
</div>
