<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Category List</h4>
                <div class="col mb-7 right py-4 flex ml-auto">
                    @can('create')
                    <a href="{{ route('category_create', 'sub-category') }}"
                        class="btn btn-primary mb-2 float-right btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add Sub Category
                    </a>
                    <a href="{{ route('category_create', 'main-category') }}"
                        class="btn btn-primary mb-2 mx-2 float-right btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add Main Category
                    </a>
                    @endcan


                    {{-- <button type="button" class="btn btn-danger mb-2 ml-2  float-left btn-icon-text">
                                <i class="mdi mdi-file-upload btn-icon-prepend"></i>Import
                        </button>
                        <button type="button" class="btn btn-success mb-2  ml-2 float-left btn-icon-text">
                                <i class="mdi mdi-file-download btn-icon-prepend"></i>Export
                        </button> --}}
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table class="table w-full text-xl border-green" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Name MM</th>
                                <th>Image</th>
                                <th>status</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index=0;
                            @endphp
                            @foreach ($main_categories as $main_category)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>
                                        <b>{{ $main_category->name . ' (' . $main_category->group->name . ')' }}</b>
                                    </td>
                                    <td>
                                        <b>{{ $main_category->name_mm}}</b>
                                    </td>
                                    <td>

                                    </td>
                                    <td>{!! getStatusBadge($main_category->status) !!}</td>
                                    <td>
                                        @can('edit')
                                        <a href="{{ route('category_edit',[$main_category->slug,'main-category']) }}" class="mx-2"><i class="fa-regular fa-pen-to-square"></i></a>

                                        @endcan
                                        @if (!$main_category->children->count())
                                            @can('delete')
                                             <a href="javascript:void(0)" data-url="{{ route('category_destroy',[$main_category->slug,'main-category']) }}"
                                                class="text-danger delete-btn"><i
                                                    class="fa-solid fa-square-xmark"></i></a>
                                            @endcan
                                        @endif
                                    </td>
                                </tr>
                                @foreach ($main_category->children as $sub_category)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>--{{ $sub_category->name }}</td>
                                        <td>--{{ $sub_category->name_mm }}</td>
                                        <td>
                                            <img src="{{ $sub_category->image_url }}" alt="">
                                        </td>
                                        <td>{!! getStatusBadge($sub_category->status) !!}</td>
                                        <td>
                                            @can('edit')
                                            <a href="{{ route('category_edit',[$sub_category->slug,'sub-category']) }}" class="mx-2"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('delete')
                                            <a href="javascript:void(0)" data-url="{{ route('category_destroy',[$sub_category->slug,'sub-category']) }}"
                                                class="text-danger delete-btn"><i
                                                    class="fa-solid fa-square-xmark"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
</script>
