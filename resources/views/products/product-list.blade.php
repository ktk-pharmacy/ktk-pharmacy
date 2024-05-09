<x-app-layout>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Products</h4>
                <div class="col-lg-6 mb-10 right py-4 flex ml-auto">
                    @can('create')
                        <a href="{{ route('product_create') }}" class="btn btn-primary mb-2 float-left btn-icon-text">
                            <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                        </a>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-danger mb-2 ml-2  float-left btn-icon-text">
                            <i class="mdi mdi-file-upload btn-icon-prepend"></i>Import
                        </button>
                    @endcan

                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h3 class="mb-2">Import Products</h3>
                                    <form action="{{ route('product_import') }}" id="import_category_groups"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label for="file" class="form-label mb-1">Please choose a file</label>
                                        <input type="file" id="name" name="file" class="form-control">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" form="import_category_groups"
                                        class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('product_export') }}" class="btn btn-success mb-2  ml-2 float-left btn-icon-text">
                        <i class="mdi mdi-file-download btn-icon-prepend"></i>Export
                    </a>
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table class="table  w-full text-xl border-green" id="datatable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Availability</th>
                                <th>Category</th>
                                <th>Category_MM</th>
                                <th>Distributed_By</th>
                                <th>Status</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ $product->image_url }}" alt="">
                                    </td>
                                    <td>
                                        <a style="text-decoration: none" class=" text-dark"
                                            href="{{ route('product_edit', $product->id) }}"><b>{{ $product->name }}</b></a>
                                    </td>
                                    <td>
                                        {!! getAvaliableBadge($product->availability) !!}
                                    </td>
                                    <td>
                                        {{ $product->sub_category->name??'Test' }}
                                    </td>
                                    <td>
                                        {{ $product->sub_category->name_mm??'Myanmar' }}
                                    </td>
                                    <td>{{ $product->distributed_by }}</td>
                                    <td>
                                        {!! getStatusBadge($product->status) !!}
                                    </td>
                                    <td>
                                        @can('edit')
                                        <a href="{{ route('product_edit', $product->id) }}" class="mx-2"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        @endcan
                                        @can('delete')
                                          <a href="javascript:void(0)"
                                            data-url="{{ route('product_destroy', $product->id) }}"
                                            class="text-danger delete-btn"><i class="fa-solid fa-square-xmark"></i></a>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '/product/ssd',
        columns: [{
                data: 'image_url',
                name: ''
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'availability',
                name: 'availability'
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: 'category_mm',
                name: 'category_mm'
            },
            {
                data: 'distributed_by',
                name: 'distributed_by'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                class: 'text-center'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
            }
        ],
        order: [
            [8, 'desc']
        ],
        columnDefs: [{
            target: 8,
            visible: false
        }],
        initComplete: function() {
        },
        error: function() {
            reject('An error occurred while initializing the DataTable.');
        }
    });
</script>
