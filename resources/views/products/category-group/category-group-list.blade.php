<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Group</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">
                    <a href="{{ route('category_group_create') }}" class="btn btn-primary mb-2 float-left btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                    </a>
                    <button type="button" class="btn btn-danger mb-2 ml-2  float-left btn-icon-text">
                        <i class="mdi mdi-file-upload btn-icon-prepend"></i>Import
                    </button>
                    <a href="{{ route('category_group_export') }}" class="btn btn-success mb-2  ml-2 float-left btn-icon-text">
                        <i class="mdi mdi-file-download btn-icon-prepend"></i>Export
                    </a>
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table id="table" class="table w-full text-xl border-green">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Sorting</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_groups as $category_group)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ $category_group->media->image_url }}" alt="image" />
                                    </td>
                                    <td>{{ $category_group->name }}</td>
                                    <td>
                                        {!! getStatusBadge($category_group->status) !!}
                                    </td>
                                    <td class="px-5">{{ $category_group->sorting }}</td>
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
<script>
    $(document).ready(function() {
        $('#table').DataTable();
        $('.delete-btn').click(function(e) {
            var tr = $(this).parents('tr');
            var url = $(this).data('url');
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Category group has been deleted.',
                        'success'
                    );
                    try {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                        });
                        tr.hide();
                    } catch (error) {
                        Toast.fire({
                            icon: 'error',
                            title: error
                        })
                    }
                }
            })
        });
    });
</script>
