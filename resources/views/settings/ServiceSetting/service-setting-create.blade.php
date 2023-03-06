<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h4 class="card-title">Create Service</h4>
                                <div class="mb-7 right py-4 flex ml-auto">

                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Service Title</label>
                                    <input type="text" placeholder="Enter Title Here" id="title" name="title"
                                        class="form-control" value="{{ old('title') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="title_mm" class="form-label">Service Title MM</label>
                                    <input type="text" placeholder="Enter Title Here" id="title_mm" name="title_mm"
                                        class="form-control" value="{{ old('title_mm') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Service Description</label>
                                    {{-- <input type="text" placeholder="Enter Name Here" id="description" name="description"
                                class="form-control" value="{{ old('description') }}"> --}}
                                    <textarea name="description" id="description" class="form-control" placeholder="Enter Description Here" rows="12">{{ old('description') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <div class="checkbox checkbox-success checkbox-circle mb-2">
                                        <input id="status" type="checkbox" name="status" checked=""
                                            value="1">
                                        <label for="status">
                                            Active
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Service Image</label>
                                    <input type="file" class="dropify" id="image" name="image"
                                        data-max-file-size="1000K"
                                        data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]'
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Background Image</label>
                                    <input type="file" class="dropify" id="" name="bg_url"
                                        data-max-file-size="1000K"
                                        data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]'
                                        class="form-control" {{-- data-default-file="{{ asset('assets/images/service-item-bg.jpg') }}" --}}>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3 mb-3 text-center">
                                <a href="{{ route('service_setting_list') }}" class="btn btn-light mx-2">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
