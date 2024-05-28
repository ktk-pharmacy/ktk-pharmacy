@include('frontend.Layouts.headers')

<!-- ***** Main Banner Area Start ***** -->
<section class="section main-banner" id="top" data-section="section1">
    {{-- <video autoplay muted loop id="bg-video">
        <source src="assets/images/doctor-26732.mp4" type="video/mp4" />
    </video> --}}

    <div style="z-index: 1;" class="video-overlay header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="caption">
                        <!-- <h6>Hello Customer</h6> -->
                        <h2>{{ site_settings()['site_title'] }}</h2>
                        <p>{{ site_settings()['header_text'] }}</p>
                        <div class="main-button-red">
                            <div class="scroll-to-section"><a href="{{ route('ContactUs') }}">Inquiry Us for more detail!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 68vh;" id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            @foreach (App\Models\HeroSlider::all() as $index => $slider)
              <div
              style="
                background: url({{ asset($slider->image) }});
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100%;
              "
              class="carousel-item {{ $index == 0 ? 'active' : '' }}"
              >
                {{-- <img src="{{ $slider->image }}" class="d-block w-100" alt="..."> --}}
              </div>
            @endforeach
        </div>
    </div>

    <div style="z-index: 1;" class="service-text w-75 pb-4 border-secondary border-bottom">
        <h3 class="text-white">{{ __('root.services') }}</h3>
    </div>
</section>
<button id="modal_call" data-bs-toggle="modal" data-bs-target="#exampleModal" class="d-none">Modal</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-dialog-centered">
            <div class="modal-body" id="modal_container">
                <a href="javascript:void(0)" class="float-end text-dark" data-bs-dismiss="modal"><i
                        class="fa-solid fa-xmark"></i></a>
                <img src="{{ asset(site_settings()['pop_up']) }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row h-100">
                    <button
                      style="display: none;"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal"
                      id="model-hide-btn"
                    >
                        md-btn
                    </button>
                    @foreach ($service_settings as $service)
                        <a
                          href="javascript:void(0)"
                          class="modal-open-btn mb-4 col-4"
                          data-url="{{ route('service_setting_show', $service->id) }}"
                        >
                            <div style="height: 300px;background-image: url({{ $service->bg_url }});" class="item py-3"
                                data-bs-bg="">
                                <div class="icon">
                                    <img src="{{ $service->image_url }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4
                                      class="text-black"
                                    >
                                      {{ $service->titleFilter }}
                                    </h4>

                                    <p
                                      class="text-black"
                                    >
                                      {{ $service->shortDesc }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-courses" id="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading mt-0 partner">
                    <h2
                     class="text-black">{{ __('root.partners') }}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-courses-item owl-carousel">
                    @foreach ($brands as $brand)
                        <a href="{{ route('brand_products', $brand->slug) }}">
                            <div class="item border">
                                <img width="230" src="{{ $brand->image_url }}" alt="Course One">
                                <div class="down-content">
                                    <h4>{{ $brand->name }}</h4>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <h5 class=" text-end">
                <a style="text-decoration: underline !important;" href="{{ route('brand_products', 'all') }}" class="text-black d-inline-block py-2 px-1">All Products...</a>
            </h5>
        </div>
    </div>
</section>

<section class="our-courses mb-5" id="courses">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading mt-0 partner">
                    <h2
                     class="text-black">{{ __('root.featured products') }}</h2>
                </div>
            </div>
            <div class="">

                <div id="featured-products" class="row">
                    @foreach ($featureProducts as $prod)
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
                                        <h4 class="justify-center">{{ $prod->name }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

<section class="our-facts">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{ __('root.facts_or_co.lt') }}</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="count-area-content">
                                    <div class="count-title">{{ site_settings()['default_staffs'] }} +</div>
                                    <div class="count-title">{{ __('root.staffs') }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="count-area-content">
                                    <!-- <div class="count-digit">250+</div> -->
                                    <div class="count-title">{{ site_settings()['default_curr_partner'] }} +</div>
                                    <div class="count-title">{{ __('root.current partners') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <!--  new-students -->
                                <div class="count-area-content">
                                    <div class="count-title">{{ site_settings()['default_products'] }} +</div>
                                    <div class="count-title">{{ __('header.products') }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="count-area-content">
                                    <div class="count-title">{{ site_settings()['default_dist_region'] }} +</div>
                                    <div class="count-title">{{ __('root.distributed_region') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="video">
                    <video
                     style="width: 100%; border-radius: 10px"
                     autoplay muted loop>
                        <source
                        src="{{asset('assets/images/db-2.mp4')}}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.Layouts.footer')
<script>
    $(document).ready(function() {
        let pop_up_status = "{{ site_settings()['pop_up_status'] }}";

        if (JSON.parse(pop_up_status)) {
            setTimeout(() => {
                $('#modal_call').click()
            }, 1500);
        }
        $('.modal-open-btn').click(function(e) {
            e.preventDefault();
            var url = $(this).data('url')
            $.ajax({
                type: "GET",
                url: url,
                success: function(view) {
                    $('#modal_container').html(view);
                    $('#model-hide-btn').click();
                }
            });
        });

    });
</script>
