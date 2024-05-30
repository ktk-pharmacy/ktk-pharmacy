<x-app-layout>
    <div class="col-lg-6 grid-margin stretch-card mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">
                    @php
                        $promotion = $product->hasDiscount()
                    @endphp
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form action="" method="POST" id="product_form" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" placeholder="Enter Name Here" id="name" name="name"
                                class="form-control" value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="name_mm" class="form-label">Product Name MM<span
                                    class="text-danger">*</span></label>
                            <input type="text" placeholder="Enter Name Mm Here" id="name_mm" name="name_mm"
                                class="form-control" value="{{ old('name_mm', $product->name_mm) }}">
                        </div>
                        <div class="mb-3">
                            <label for="product_code" class="form-label">Product Code<span
                                    class="text-danger">*</span></label>
                            <input type="text" placeholder="Enter Product Code Here" id="product_code"
                                name="product_code" class="form-control"
                                value="{{ old('product_code', $product->product_code) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block" for="product-category">Categories <span
                                    class="text-danger">*</span></label>
                            <select class="form-control w-100 select2" name="category" id="product-category" required>
                                <option value="">--Select Category--</option>
                                @foreach ($main_categories as $main_category)
                                    <optgroup label="{{ $main_category->name }}">
                                        @foreach ($main_category->children as $sub_category)
                                            <option value="{{ $sub_category->id }}" @selected($sub_category->id == $product->sub_category_id)>
                                                {{ $sub_category->name }}
                                                ({{ $sub_category->parent->name }})
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block" for="product-brand">Brands </label>
                            <select class="form-control w-100 select2" name="brand_id" id="product-brand">
                                <option value="">--Select Brand--</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected($brand->id == $product->brand_id)>{{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Product Description <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="12"
                                placeholder="Enter Description">{{ $product->description }}</textarea>
                        </div>
                        <div class="mb3 row">
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Price</label>
                                <input type="text" placeholder="Enter price" id="" name="price"
                                    class="form-control" value="{{ old('price', $product->price) }}">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Sale Price</label>
                                <input type="text" placeholder="Enter sale_price" id="" name="sale_price"
                                    class="form-control" value="{{ old('sale_price', $product->sale_price) }}">
                            </div>
                        </div>
                        <div class="mb3 row">
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Packaging</label>
                                <input type="text" placeholder="Enter packaging" id="" name="packaging"
                                    class="form-control" value="{{ old('packaging', $product->packaging) }}">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">UOM <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter UOM" id="" name="MOU"
                                    class="form-control" value="{{ old('UOM', $product->MOU) }}">
                            </div>
                        </div>
                        <div class="mb3 row">
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Availability<span
                                        class="text-danger">*</span></label>
                                <select name="availability" class="form-control" id="">
                                    <option value="">Select Availability</option>
                                    <option value="1" @selected($product->availability)>In Stock</option>
                                    <option value="0" @selected(!$product->availability)>Out Of Stock</option>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Distributed By </label>
                                <input type="text" placeholder="Enter Distributed By" id=""
                                    name="distributed_by" class="form-control"
                                    value="{{ old('distributed_by', $product->distributed_by) }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            {{-- <div class="checkbox checkbox-success checkbox-circle mb-2">
                                <input id="category_group_status" type="checkbox" name="status" checked=""
                                    value="1">
                                <label for="category_group_status">
                                    Active
                                </label>
                            </div> --}}
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Manufacturer</label>
                                <input type="text" placeholder="Enter manufacturer" id=""
                                    name="manufacturer" class="form-control"
                                    value="{{ old('manufacturer', $product->manufacturer) }}">
                            </div>
                            <div class="col-6 d-flex">
                                <div class="form-group mb-3 mr-5">
                                    <label for="product-status">Active</label> <br>
                                    <input type="checkbox" name="status" class="switchery" id="product-status"
                                        @checked($product->status) value="1" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-status">New</label> <br>
                                    <input type="checkbox" name="is_new" class="switchery" id="product-status"
                                        @checked($product->is_new) value="1" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            {{-- <div class="checkbox checkbox-success checkbox-circle mb-2">
                                <input id="category_group_status" type="checkbox" name="status" checked=""
                                    value="1">
                                <label for="category_group_status">
                                    Active
                                </label>
                            </div> --}}
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Stock</label>
                                <input type="text" placeholder="Enter stock" id="" name="stock"
                                    class="form-control" value="{{ old('stock', $product->stock) }}">
                            </div>
                            <div class="mb-3 col-6">
                                <div class="form-group mb-3">
                                    <label for="product-status">Add to Feature</label> <br>
                                    <input
                                    type="checkbox"
                                    name="featured"
                                    class="switchery"
                                    id="product-status"
                                    value="1"
                                    @checked($product->featured)
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group mb-3">
                                  <label for="discount-amount">Discount Amount</label>
                                  <input type="number" name="discount_amount" class="form-control" value="{{ $product->discount_amount }}" id="discount-amount" placeholder="Enter amount">
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group mb-3">
                                  <label for="discount-type">Discount Type</label>
                                  <select class="form-control" name="discount_type" id="discount-type">
                                     <option value=>--Select Type--</option>
                                     <option value="PERCENT" @selected($product->discount_type == 'PERCENT')>Percent(%)</option>
                                     <option value="FIX" @selected($product->discount_type == 'FIX')>Fix</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group mb-3">
                                  <label>Discount Period</label>
                                  <input type="text" name="discount_period" id="range-datepicker"
                                  placeholder="2018-10-03 to 2018-10-10" class="form-control" >
                               </div>
                            </div>
                         </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-6 mb-7 right py-2 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image <span
                                class="text-danger">*</span></label>
                        <input form="product_form" type="file" id="image" name="image"
                            data-max-file-size="1000K"
                            data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]'
                            data-default-file="{{ $product->image_url }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Detail </label>
                        <textarea form="product_form" style="width: auto" class="summernote" id="product_detail" name="product_details">{{ $product->product_details }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Other Information </label>
                        <textarea form="product_form" style="width: auto" class="summernote" id="other_info" name="other_information">{{ $product->other_information }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 text-center">
        <a href="{{ route('product_list') }}" class="btn btn-light mx-2">Cancel</a>
        <button type="submit" form="product_form" class="btn btn-primary">Save</button>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        const promotion = "{{ $promotion }}";
        let arr;
        if (promotion) {

            arr = ["{{ $product->discount_from }}","{{ $product->discount_to }}"];
            console.log(arr);
        }else{
            arr = [];
            console.log(promotion);
        }
        $("#range-datepicker").flatpickr({
                mode: "range",
                dateFormat: "Y-m-d",
                defaultDate: arr
            });

    });
</script>
