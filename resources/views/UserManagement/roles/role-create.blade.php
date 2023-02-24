<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Role</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title mt-5 mt-sm-0">Role Name</h4>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="name" placeholder="Enter role name" required>
                                    </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <h4 class="header-title mt-5 mt-sm-0">Assign Permissions To Role</h4>
                                <div class="mt-3">
                                    @foreach ($permissions as $permission)
                                        <div class="custom-control custom-checkbox">
                                            <input name="permissions[]" type="checkbox" class="custom-control-input" id="permission{{ $permission->id }}" value="{{ $permission->id }}">
                                            <label class="custom-control-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mt-3 mb-3">
                                    <a href="{{ route('role_list') }}" class="btn btn-light mx-2">Cancel</a>
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
