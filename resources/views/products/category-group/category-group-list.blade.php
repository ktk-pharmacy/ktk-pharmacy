<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Group</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">
                    <a href="{{ route('category_group_create') }}" class="btn btn-primary mb-2 float-left btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                    </a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-danger mb-2 ml-2  float-left btn-icon-text">
                        <i class="mdi mdi-file-upload btn-icon-prepend"></i>Import
                    </button>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h3 class="mb-2">Import Category Groups</h3>
                                    <form action="{{ route('category_group_import') }}" id="import_category_groups" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="file" class="form-label mb-1">Please choose a file</label>
                                        <input type="file" id="name"
                                            name="file"
                                            class="form-control">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" form="import_category_groups" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('category_group_export') }}"
                        class="btn btn-success mb-2  ml-2 float-left btn-icon-text">
                        <i class="mdi mdi-file-download btn-icon-prepend"></i>Export
                    </a>
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table id="table" class="table w-full text-xl border-green">
                        <thead>
                            <tr>
                                <th>Sorting</th>
                                <th>Name</th>
                                <th>Name_mm</th>
                                <th>Status</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_groups as $key => $category_group)
                                <tr>
                                    <td class="px-5">{{ $category_group->sorting }}</td>
                                    <td>{{ $category_group->name }}</td>
                                    <td>{{ $category_group->name_mm??$category_group->name }}</td>
                                    <td>
                                        {!! getStatusBadge($category_group->status) !!}
                                    </td>

                                    <td>
                                        <a href="{{ route('category_group_edit', $category_group->id) }}"
                                            class="mx-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)"
                                            data-url="{{ route('category_group_destroy', $category_group->id) }}"
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
