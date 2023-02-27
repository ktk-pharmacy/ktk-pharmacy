<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">User List</h4>
                <div class="col-lg-2 mb-7 right py-4 flex ml-auto">
                    <a type="button" class="btn btn-primary btn-icon-text bg-green" href="{{ route('user_create') }}">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                    </a>
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table class="table w-full text-xl border-green">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $role)
                                                <h5><span
                                                        class="badge badge-primary">{{ $role }}</span>
                                                </h5>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('user-edit')
                                            <a href="{{route('user_edit',$user->id)}}" class="mx-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                        @endcan
                                        @if (!$user->hasrole('Superadmin'))
                                            @can('user-delete')
                                                <a href="javascript:void(0)" data-url="{{route('user_destroy',$user->id)}}"
                                                    class="text-danger delete-btn"><i
                                                        class="fa-solid fa-square-xmark"></i></a>
                                            @endcan
                                        @endif
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
