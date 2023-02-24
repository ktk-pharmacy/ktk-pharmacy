<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Permission</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form action="" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title mt-5 mt-sm-0">Permission Name</h4>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="name" placeholder="Enter permission name" required>
                                    </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <h4 class="header-title mt-5 mt-sm-0">Assign Roles To Permission</h4>
                                <div class="mt-3">
                                    @foreach ($roles as $role)
                                        <div class="custom-control custom-checkbox">
                                            <input name="roles[]" type="checkbox" class="custom-control-input" id="role{{ $role->id }}" value="{{ $role->id }}">
                                            <label class="custom-control-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mt-3 mb-3">
                                    <a href="{{ route('permission_list') }}" class="btn btn-light mx-2">Cancel</a>
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
