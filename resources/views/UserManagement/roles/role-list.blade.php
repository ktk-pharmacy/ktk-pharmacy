<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">User List</h4>
                <div class="col-lg-2 mb-7 right py-4 flex ml-auto">
                    @can('role-create')
                        <a type="button" class="btn btn-primary btn-icon-text bg-green" href="{{ route('role_create') }}">
                            <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                        </a>
                    @endcan
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table class="table w-full text-xl border-green" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('role-edit')
                                            <a href="{{ route('role_edit', $role->id) }}" class="mx-2"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                        @endcan
                                        @can('role-delete')
                                            <a href="javascript:void(0)" data-url="{{ route('role_destroy', $role->id) }}"
                                                class="text-danger delete-btn"><i class="fa-solid fa-square-xmark"></i></a>
                                        @endcan
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
