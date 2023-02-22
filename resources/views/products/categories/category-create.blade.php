<x-app-layout>

    <div class="col-lg-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create {{ $type == 'main-category' ? 'Main' : 'Sub' }} Category</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form action="{{ route('category_create',$type) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="category">Category <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="category" id="category" required>
                                @if ($type == 'main-category')
                                    <option value="">--Select Category Group--</option>
                                @else
                                    <option value="">--Select Main Category--</option>
                                @endif

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                        @if ($type == 'sub-category')
                                            ({{ $category->group->name }})
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" placeholder="Enter Name Here" id="name" name="name"
                                class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="name_mm" class="form-label">Name MM (Optional)</label>
                            <input type="text" placeholder="Enter Name Here" id="name_mm" name="name_mm"
                                class="form-control" value="{{ old('name_mm') }}">
                        </div>
                        @if ($type == 'sub-category')
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" id="image" name="image" data-max-file-size="1000K"
                                    data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]' required
                                    class="form-control">
                            </div>
                        @endif
                        <div class="mb-3">
                            <div class="checkbox checkbox-success checkbox-circle mb-2">
                                <input id="category_status" type="checkbox" name="status" checked=""
                                    value="1">
                                <label for="category_status">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="{{ route('category_list') }}" class="btn btn-light mx-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
