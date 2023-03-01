<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Service Setting</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">
                    <a href="{{ route('service_setting_create') }}"
                        class="btn btn-primary mb-2 float-right btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                    </a>
                    <!-- Modal -->
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table id="table" class="table w-full text-xl border-green">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Title MM</th>
                                <th>Status</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $key => $service)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td class="py-1">
                                        <img src="{{ $service->image_url }}" alt="image" />
                                    </td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->title_mm }}</td>
                                    <td>
                                        {!! getStatusBadge($service->status) !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('service_setting_edit', $service->id) }}" class="mx-2"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)"
                                            data-url="{{ route('service_setting_destroy', $service->id) }}"
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
