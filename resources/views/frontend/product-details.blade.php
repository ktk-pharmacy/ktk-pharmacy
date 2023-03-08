@include('frontend.Layouts.headers')

<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="meeting-single-item">
                            <div class="thumb">
                                <a href="#"><img src="{{ $product->image_url }}" alt=""></a>
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
                                        <span> In Stock </span>
                                    @else
                                        <span> Out Of Stock </span>
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
                                    <div class="col-lg-4">
                                        <div class="book now">
                                            <h5>Distribute By</h5>
                                            <p>{{ $product->distributed_by }} </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 border mt-10 py-4 mb-10 px-4 pb-10">
                                        <div class="nav flex-row nav-pills me-3 bg-red" id="v-pills-tab" role="tablist"
                                            aria-orientation="horizontal">
                                            <button class="nav-link  button active" id="v-pills-home-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
                                                role="tab" aria-controls="v-pills-home" aria-selected="true">Product
                                                Detail</button>
                                            <button class="nav-link  button" id="v-pills-otc-tab" data-bs-toggle="pill"
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

                                <div class="col-lg-12">
                                    <div class="share">
                                        <h5>Share:</h5>
                                        <ul>
                                            <li><a href="#">Facebook</a>,</li>
                                            <li><a href="#">Twitter</a>,</li>
                                            <li><a href="#">Linkedin</a>,</li>
                                            <li><a href="#">Intagram</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Top Related-->
                    <div class="col-lg-4 ml-4">
                        {{--  <div><h2>Top Related Product</h2></div>  --}}
                        <div class="col-lg-12 mr-5">
                            <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                               <!-- Top Rated Product Widget -->
                               <div class="widget ltn__top-rated-product-widget">
                                  <h4 class="ltn__widget-title ltn__widget-title-border mb-3">Top Rated Products</h4>
                                  <ul class="rounded-2">
                                     @foreach ($top_related_products as $top_related_product)
                                        <li class="mb-2">
                                           <div class="top-rated-product-item clearfix">
                                              <div class="">
                                                 <a href="{{ route('product_detail', $top_related_product->slug) }}">
                                                    <img src="{{ $top_related_product->image_url }}" alt="#">
                                                 </a>
                                              </div>
                                              <div class="top-rated-product-info bg-white p-3 ">
                                                 <h6>
                                                    <a class="text-dark" href="{{ route('product_detail', $top_related_product->slug) }}">
                                                       {{ $top_related_product->name }}
                                                    </a>
                                                 </h6>
                                              </div>
                                           </div>
                                        </li>
                                     @endforeach
                                  </ul>
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
