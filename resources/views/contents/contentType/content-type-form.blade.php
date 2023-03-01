<div class="modal-body">
    <form method="post" id="content_type_form">
        <input type="hidden" name="_method" id="content_type_method">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label d-block">Content Type Name</label>
            <div class="">
                <input type="text" class="form-control" name='name' id="name" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-group">
            <label for="name_mm" class="form-label d-block">Content Type Name MM</label>
            <div class="">
                <input type="text" class="form-control" name='name_mm' id="name_mm" placeholder="Enter Name">
            </div>
        </div>
        <div class=" d-flex justify-content-center">
            <button type="button" class="btn btn-sm btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-success">Save</button>
        </div>
    </form>
</div>
