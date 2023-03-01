<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Sliders</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-url="{{ route('slider_create') }}"
                        id="add-btn" class="btn btn-primary form-btn mb-2 float-right btn-icon-text">
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
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table id="table" class="table w-full text-xl border-green">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $key => $slider)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td class="py-1">
                                        <img style="width:80px;height:40px;" src="{{ $slider->image_url }}"
                                            alt="image" />
                                    </td>
                                    <td><b>{{ $slider->url }}</b></td>
                                    <td>
                                        {!! getStatusBadge($slider->status) !!}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            data-url="{{ route('slider_edit', $slider->id) }}" class="mx-2 form-btn"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)"
                                            data-url="{{ route('slider_destroy', $slider->id) }}"
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
