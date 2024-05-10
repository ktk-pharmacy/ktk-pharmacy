@include('frontend.Layouts.headers')
<link rel="stylesheet" href="/assets/css/body-flex.css">
<section style="background: #fff;" class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Product List-
                        @if (isset($sub_category))
                            {{ $sub_category->name }}
                        @else
                            {{ $brand->name ?? 'all Brand' }}
                        @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach ($products as $prod)
                            <div class="col-md-6 col-lg-3 mb-3">
                                <div class="meeting-item">
                                    <div class="thumb">
                                        <a href="{{ url('product_detail', $prod->slug) }}">
                                            <img style="width: 100%;" class="logoimage border-top border-end border-start"
                                            src="{{ $prod->image_url }}"
                                            alt="{{ $prod->name }}">
                                        </a>
                                    </div>
                                    <div class="down-content border-bottom border-end border-start">
                                        <a href="{{ url('product_detail', $prod->slug) }}">
                                            <h4 class="justify-center">{{ $prod->name }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div style="margin-bottom: 20px" class="col-lg-12">
                            <div class="pagination">
                                @include('frontend.share.paginate', [
                                    'paginator' => $products,
                                    $products->links(),
                                    'link_limit' => 4,
                                ])
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4 mt-3 bg-white rounded-2 py-2 ps-3">
                    <h5 class="mb-2">Sub Categories</h2>
                        @foreach ($sub_ctgs as $ctg)
                            <div>
                                <small><a href="">{{ $ctg->nameFilter }}</a></small>
                            </div>
                        @endforeach

                </div> --}}
                {{-- <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link mb-2 bg-red button active" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">Precription</button>
                    <button class="nav-link bg-red button" id="v-pills-otc-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-otc" type="button" role="tab" aria-controls="v-pills-otc"
                        aria-selected="false">OTC</button>
                </div> --}}
                {{-- <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="row"> --}}

                {{-- </div> --}}
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

@include('frontend.Layouts.footer')
