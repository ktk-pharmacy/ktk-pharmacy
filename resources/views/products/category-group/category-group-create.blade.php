<x-app-layout>

    <div class="col-lg-7 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Create Category Group</h4>
                        <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                        </div>
                        <div class="table-responsive">
                            <!-- table table-striped -->
                            <form action="{{ route('category_group_create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Group Name</label>
                                    <input type="text" placeholder="Enter Name Here" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="name_mm" class="form-label">Category Group Name MM (Optional)</label>
                                    <input type="text" placeholder="Enter Name Here" id="name_mm" name="name_mm" class="form-control" value="{{ old('name_mm') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="sorting" class="form-label">Category Group Sorting</label>
                                    <input type="number" placeholder="Eg. 1" id="sorting" name="sorting" class="form-control" value="{{ old('sorting') }}">
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="image" class="form-label">Category Group Image</label>
                                    <input type="file" id="image" name="image"  data-max-file-size="1000K"
                                    data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]' required class="form-control">
                                </div> --}}
                                <div class="mb-3">
                                    <div class="checkbox checkbox-success checkbox-circle mb-2">
                                        <input id="category_group_status" type="checkbox" name="status" checked="" value="1">
                                        <label for="category_group_status">
                                            Active
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 text-center">
                                    <a href="{{ route('category_group_list') }}" class="btn btn-light mx-2">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
    </x-app-layout>
