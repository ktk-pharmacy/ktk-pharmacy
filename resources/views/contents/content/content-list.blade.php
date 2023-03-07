<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Contents</h4>
                <div class="col mb-7 right py-4 flex ml-auto">
                    @can('create')
                    <a href="{{ route('content_create') }}" class="btn btn-primary mb-2 float-right btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add Content
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
                                <th>Title</th>
                                <th>Type</th>
                                <th>At</th>
                                <th>status</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $key => $content)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>
                                        <h5>
                                            <span class="badge badge-primary">
                                                {{ $content->type->name }}
                                            </span>
                                        </h5>
                                    </td>
                                    <td>
                                        {{ $content->created_at->diffForHumans() }}
                                    </td>
                                    <td>{!! getStatusBadge($content->status) !!}</td>
                                    <td>
                                        @can('edit')
                                        <a href="{{ route('content_edit', $content->id) }}" class="mx-2"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        @endcan
                                        @can('delete')
                                         <a href="javascript:void(0)"
                                          data-url="{{ route('content_destroy', $content->id) }}"
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
