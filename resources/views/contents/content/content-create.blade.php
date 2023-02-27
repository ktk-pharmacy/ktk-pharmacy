<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Content</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form action="{{ route('content_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title mt-5 mt-sm-0">Content Title <span class="text-danger">*</span>
                                </h4>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Enter content title" required>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <h4 class="header-title mt-5 mt-sm-0">Content Type <span class="text-danger">*</span>
                                </h4>
                                <div class="mt-3">
                                    <select name="content_type" class="select2 form-control " id="">
                                        @foreach ($content_types as $type)
                                            <option value="{{ $type->id }}">
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-7">
                                <h4 class="header-title mt-5 mt-sm-0">Description <span class="text-danger">*</span>
                                </h4>
                                <textarea name="description" class="summernote"></textarea>
                            </div>

                            <div class="col-md-5">
                                <h4 class="header-title mt-5 mt-sm-0">Image <span class="text-danger">*</span></h4>
                                <input type="file" id="image" name="image" data-max-file-size="1000K"
                                    data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]'
                                    class="form-control">

                                <div class="mt-3">
                                    <div class="checkbox checkbox-success checkbox-circle mb-2">
                                        <input id="category_status" type="checkbox" name="status" checked=""
                                            value="1">
                                        <label for="category_status">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mt-3 mb-3">
                                    <a href="{{ route('content_list') }}" class="btn btn-light mx-2">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
