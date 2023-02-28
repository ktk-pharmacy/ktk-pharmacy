@include('frontend.Layouts.headers')
<!-- ***** Main Banner Area Start ***** -->
<section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/doctor-26732.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="caption">
                        <!-- <h6>Hello Customer</h6> -->
                        <h2>{{ site_settings()['site_title'] }}</h2>
                        <p>{{ site_settings()['header_text'] }}</p>
                        <div class="main-button-red">
                            <div class="scroll-to-section"><a href="{{ route('ContactUs') }}">Inquiry Us for more
                                    detail!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>{{ __('root.services') }}</h2>
                    </div>
                </div>
                <div class="owl-service-item owl-carousel col-12">
                    @foreach ($service_settings as $service)
                        <div class="item">
                            <div class="icon">
                                <img src="{{ $service->image_url }}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{ $service->titleFilter }}</h4>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="item">
                        <div class="icon">
                            <img src="/assets/images/service-icon-02.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Warehousing</h4>
                            <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non
                                vestibulum.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="/assets/images/service-icon-03.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Distribution</h4>
                            <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non
                                vestibulum.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="assets/images/service-icon-02.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Wholesales</h4>
                            <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non
                                vestibulum.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blank-space" height="700px">
    <div height="200px">
        <h2>sdadas</h2>
    </div>
</section>
<section class="our-courses" id="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading partner">
                    <h2>{{ __('root.partners') }}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-courses-item owl-carousel">
                    @foreach ($brands as $brand)
                        <div class="item">
                            <img width="270" height="170" src="{{ $brand->image_url }}" alt="Course One">
                            <div class="down-content">
                                <h4>{{ $brand->name }}</h4>
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
                                    <div class="count-title">{{ site_settings()['default_dist_region'] }}</div>
                                    <div class="count-title">{{ __('root.distributed_region') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="video">
                    <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img
                            src="assets/images/play-icon.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.Layouts.footer')
