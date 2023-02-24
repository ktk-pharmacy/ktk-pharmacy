<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">User List</h4>
                <div class="col-lg-2 mb-7 right py-4 flex ml-auto">
                    <a type="button" class="btn btn-primary btn-icon-text bg-green" href="{{ route('register') }}">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                    </a>
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table class="table w-full text-xl border-green" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Permission Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <a href=""
                                            class="mx-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)"
                                            data-url=""
                                            class="text-danger delete-btn"><i class="fa-solid fa-square-xmark"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
