<x-app-layout>

    <div class="col-lg-6 grid-margin stretch-card mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" placeholder="Enter Name Here" id="name" name="name"
                                class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product-category">Categories <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="sub_category_id" id="product-category" required>
                                <option value="">--Select Category--</option>
                                @foreach ($main_categories as $main_category)
                                    <optgroup label="{{ $main_category->name }}">
                                        @foreach ($main_category->children as $sub_category)
                                            <option value="{{ $sub_category->id }}">
                                                {{ $sub_category->name }}
                                                ({{ $sub_category->parent->name }})
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="product-brand">Brands <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="brand_id" id="product-brand" required>
                                <option value="">--Select Brand--</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Product Description <span
                                    class="text-danger">*</span></label>
                            <textarea class=".summernote" id="summernote" name="description"></textarea>
                        </div>
                        <div class="mb3 row">
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Packaging<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter packaging" id="" name="packaging"
                                    class="form-control" value="{{ old('packaging') }}">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">MOU <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter MOU" id="" name="MOU"
                                    class="form-control" value="{{ old('MOU') }}">
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                                    <label for="image" class="form-label">Category Group Image</label>
                                    <input type="file" id="image" name="image"  data-max-file-size="1000K"
                                    data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]' required class="form-control">
                                </div> --}}
                        <div class="mb-3">
                            <div class="checkbox checkbox-success checkbox-circle mb-2">
                                <input id="category_group_status" type="checkbox" name="status" checked=""
                                    value="1">
                                <label for="category_group_status">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="{{ route('product_list') }}" class="btn btn-light mx-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
            // set editor height
            minHeight: null,
            // set minimum height of editor
            maxHeight: null,
            // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote

            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['help']]
            ]
        });
    });
</script>
