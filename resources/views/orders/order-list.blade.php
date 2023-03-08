<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Order List</h4>
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
                    <table class="table table-centered table-nowrap mb-0">
                       <thead class="thead-light">
                          <tr>
                             <th style="width: 20px;">No.</th>
                             <th>Order ID</th>
                             <th>Customer Name</th>
                             <th>Date</th>
                             <th>Payment Method</th>
                             <th>Total</th>
                             <th>Order Status</th>
                             <th style="width: 125px;">Action</th>
                          </tr>
                       </thead>
                       <tbody>
                          @foreach ($orders as $order)
                          <tr>
                             <td>
                                {{ ++$index }}
                             </td>

                             <td>
                                <a
                                   href="{{ route('orders.edit', $order->id) }}"
                                   class="text-body font-weight-bold">
                                   #{{ $order->id }}
                                </a>
                             </td>
                             <td>{{ $order->customer->name }}</td>
                             <td>
                                {{ $order->created_at->format('d-M-Y') }}
                                <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                             </td>
                             <td>
                                {{ $order->payment_method }}
                             </td>
                             <td>
                                {{ $order->delivery_charge==Null?$order->order_total-$order->coupon_amount:$order->delivery_charge+$order->order_total-$order->coupon_amount }}
                             </td>

                             <td>
                                {!! statusBadge($order->status, 'ORDERSTATUS') !!}
                             </td>
                             <td>
                                <a href="{{ route('orders.detail', $order->id) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
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
