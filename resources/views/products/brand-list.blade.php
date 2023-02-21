<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Brand</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-url="{{ route('brand_create') }}" id="add-btn" class="btn btn-primary mb-2 float-right btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                            </div>
                        </div>
                    </div>
                    {{-- <button type="button" class="btn btn-danger mb-2 ml-2  float-left btn-icon-text">
                        <i class="mdi mdi-file-upload btn-icon-prepend"></i>Import
                    </button>
                    <a href="{{ route('category_group_export') }}" class="btn btn-success mb-2  ml-2 float-left btn-icon-text">
                        <i class="mdi mdi-file-download btn-icon-prepend"></i>Export
                    </a> --}}
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table id="table" class="table w-full text-xl border-green">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key=>$brand)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td class="py-1">
                                        <img src="{{ $brand->image_url }}" alt="image" />
                                    </td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        {!! getStatusBadge($brand->status) !!}
                                    </td>
                                    <td>
                                        <button data-bs-toggle="modal" style="border: none;outline:none;" data-bs-target="#exampleModal" data-url="{{ route('brand_edit',$brand->id) }}"
                                            class="mx-2 text-primary edit-btn"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <a href="javascript:void(0)"
                                            data-url="{{ route('brand_destroy',$brand->id) }}"
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

        $('#add-btn').click(function (e) {
            e.preventDefault();
            var url = $(this).data('url');

            $.ajax({
                type: "GET",
                url: url,
                success: function (view) {
                    $('.modal-content').html(view);
                    $('#image').dropify();
                }
            });
        });

        $('.edit-btn').click(function (e) {
            e.preventDefault();
            var url = $(this).data('url');

            $.ajax({
                type: "GET",
                url: url,
                success: function (view) {
                    $('.modal-content').html(view);
                    $('#image').dropify();
                }
            });
        });
    });
</script>
