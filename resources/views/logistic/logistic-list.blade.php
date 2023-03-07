<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Logistics</h4>
                <div class="col mb-7 right py-4 flex ml-auto">
                    <a href="{{ route('logistic_create') }}"
                        class="btn btn-primary mb-2 float-right btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add Logistic
                    </a>

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
                                <th>Type</th>
                                <th>City/Township</th>
                                <th>Normal</th>
                                <th>Premium</th>
                                <th class="justify-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logistics as $index => $logistic)
                     <tr>
                        <td>{{ ++$index }}</td>
                        <td>
                           <a class="text-decoration-none" href="{{ route('logistic_edit',$logistic->id) }}">
                              {{ $logistic->type }}
                           </a>
                        </td>
                        <td>{{ $logistic->city->name .'/'. $logistic->township->name }}</td>
                        @foreach ($logistic->deliveryCharges as $deliveryCharge)
                            <td>{{ $deliveryCharge->amount }}</td>
                        @endforeach
                        <td>
                            <a href="{{ route('logistic_edit',$logistic->id) }}"
                                class="mx-2"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="javascript:void(0)"
                                data-url="{{ route('logistic_destroy',$logistic->id) }}"
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
