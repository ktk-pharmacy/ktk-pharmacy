<x-app-layout>

    <div class="col-lg-7 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Create Logistic</h4>
                        <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                        </div>
                        <div class="table-responsive">
                            <!-- table table-striped -->
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="loation">Location <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="location" id="loation" required>
                                       <option value="">--Select City/Region--</option>
                                       @foreach ($locations as $township)
                                       <option value="{{ $township->id }},{{ $township->region->id }}">
                                          {{ $township->name }} ({{ $township->region->name }})
                                       </option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="type">Type<span class="text-danger">*</span></label>
                                    <input type="text"  name="type" parsley-trigger="change" required placeholder="Enter delivery type"
                                       class="form-control" id="type">
                                </div>
                                <div class="form-group">
                                   <label for="min_order_total">Minimum Order Total<span class="text-danger">*</span></label>
                                   <input type="number" name="min_order_total" parsley-trigger="change" min="0" required placeholder="Enter amount"
                                      class="form-control" id="min_order_total">
                                </div>
                                @foreach (config('custom_value.delivery_types') as $key => $value)
                                    <div class="form-group">
                                      <label for="delivery_fee_{{ $key }}">Delivery Charges ({{ $value }})<span class="text-danger">*</span></label>
                                      <input type="number" name="delivery_charges[{{ $value }}]" parsley-trigger="change" min="0" placeholder="Enter amount"
                                         class="form-control" id="delivery_fee_{{ $key }}">
                                   </div>
                                @endforeach
                                <div class="form-group">
                                   <label for="area_description">Area Description</label>
                                   <textarea name="area_description" rows="5" parsley-trigger="change"
                                      class="form-control" id="area_description" placeholder="Enter area description"></textarea>
                                </div>
                                <div class="mb-3 text-center">
                                    <a href="{{ route('logistic_list') }}" class="btn btn-light mx-2">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
    </x-app-layout>
