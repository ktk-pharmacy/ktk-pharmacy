@include('frontend.Layouts.headers')

<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="meeting-single-item">
                            <div style="min-height: 25vh;" class="d-flex justify-content-center align-items-center">
                                <div style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#exampleModal" class="">
                                    <img style="width:360px;" src="{{ $product->image_url }}" alt="">
                                </div>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div style="min-width: 675px !important;max-height: 100vh !important;" class="modal-dialog modal-dialog-centered">
                                      <div style="min-width: 675px !important;" class="modal-content">
                                        <div class="modal-body">
                                            <img class="w-100" src="{{ $product->image_url }}" alt="">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                {{-- <div class="exzoom" id="exzoom">
                                    <div class="exzoom_img_box">
                                        <ul class='exzoom_img_ul'>
                                            <li><img style="width:400px;" src="{{ $product->image_url }}" /></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="down-content">
                                <a href="#">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <p class="description">
                                    {{ $product->description }}
                                </p>
                                <p>Availability :
                                    @if ($product->availability == 1)
                                        <span class="p-1 bg-success text-white"> In Stock </span>
                                    @else
                                        <span class="p-1 bg-danger text-white"> Out Of Stock </span>
                                    @endif
                                </p>
                                <p>Packaging : {{ $product->packaging }} </p>
                                <p>UOM : {{ $product->mou }} </p>
                                <div class="row py-2">
                                    <div class="col-lg-4">
                                        <div class="hours">
                                            <h5>Category</h5>
                                            <p>{{ $product->sub_category->name }} </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="location">
                                            <h5>Manufacturer</h5>
                                            <p>{{ $product->manufacturer }} </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <div class="book now">
                                            <h5>Distribute By</h5>
                                            {{-- @dd($product->brand) --}}
                                            @if ($product->brand && !$product->brand->deleted_at)
                                                <p>
                                                    <a style="text-decoration: underline !important" class="text-dark"
                                                        href="{{ route('brand_products', $product->brand->slug) }}">
                                                        {{ $product->distributed_by }}
                                                    </a>
                                                </p>
                                            @else
                                                <p>{{ $product->distributed_by }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 border mt-10 py-4 mb-10 px-4 pb-10">
                                        <div class="nav flex-row nav-pills me-3 bg-red" id="v-pills-tab" role="tablist"
                                            aria-orientation="horizontal">
                                            <button class="nav-link button active" id="v-pills-home-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
                                                role="tab" aria-controls="v-pills-home" aria-selected="true">Product
                                                Detail</button>
                                            <button class="nav-link button" id="v-pills-otc-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-otc" type="button" role="tab"
                                                aria-controls="v-pills-otc" aria-selected="false">Other
                                                Information</button>
                                        </div>
                                        <div class="d-flex align-items-start py-4">

                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                    aria-labelledby="v-pills-home-tab">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="meeting-item">
                                                                <div class="down-content">
                                                                    {!! $product->product_details !!}
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-otc" role="tabpanel"
                                                    aria-labelledby="v-pills-profile-tab">
                                                    <div class="col-lg-12">
                                                        <div class="meeting-item">
                                                            <div class="down-content">
                                                                {!! $product->other_information !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Top Related-->
                    <div class="col-lg-12 ml-4">
                        {{--  <div><h2>Top Related Product</h2></div>  --}}
                        <div class="col-lg-12 mr-5">
                            <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                                <!-- Top Rated Product Widget -->
                                <div class="widget ltn__top-rated-product-widget">
                                    <h4 class="ltn__widget-title text-black ltn__widget-title-border mb-3">Related Products</h4>

                                    <div id="related-products" class="row mb-5">
                                        @foreach ($top_related_products as $prod)
                                            <div class="mx-2">
                                                <div class="meeting-item">
                                                    <div class="thumb">
                                                        <a href="{{ url('product_detail', $prod->slug) }}">
                                                            <img style="width: 100%;"
                                                                class="logoimage border-top border-end border-start"
                                                                src="{{ $prod->image_url }}" alt="{{ $prod->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="down-content border-bottom border-end border-start">
                                                        <a href="{{ url('product_detail', $prod->slug) }}">
                                                            <h4 class="justify-center h5">{{ $prod->name }}</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <!-- Banner Widget -->
                                {{-- <div class="widget ltn__banner-widget">
                                  <a href="shop.html"><img src="img/banner/2.jpg" alt="#"></a>
                               </div> --}}
                            </aside>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>

@include('frontend.Layouts.footer')
