@include('frontend.Layouts.headers')
<section class="upcoming-meetings mt-0" id="meetings">
    <div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                @foreach ($sliders as $slider)
                    <li>
                        <a href="{{ $slider->url }}">
                            <img src="{{ $slider->image_url }}" />
                        </a>
                    </li>
                @endforeach
                {{-- <li><img src="{{ asset('assets/images/carousel/banner_1.jpg') }}" alt="banner_1" title="banner_1" /></li>
                <li><img src="{{ asset('assets/images/carousel/banner_2.jpg') }}" alt="banner_2" title="banner_2" /></li>
                <li><a href="http://wowslider.net"><img src="{{ asset('assets/images/carousel/banner_3.jpg') }}"
                            alt="css slider" title="banner_3" /></a></li>
                <li><img src="{{ asset('assets/images/carousel/banner_3.jpg') }}" alt="banner_4" title="banner_4" />
                </li>
                <li><img src="{{ asset('assets/images/carousel/banner_3.jpg') }}" alt="banner_5" title="banner_5" />
                </li> --}}
            </ul>
        </div>
        <div class="ws_shadow"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Product Catgories</h2>
                </div>
            </div>

            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    {{-- @foreach ($maincategories as $mcat)
                        <button class="nav-link bg-red mb-2 button {{ $mcat->id ? 'active' : '' }}"
                            id="v-pills-{{ $mcat->id }}-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-{{ $mcat->id }}" type="button" role="tab"
                            aria-controls="v-pills-{{ $mcat->id }}"
                            @if ($mcat->id == '#v-pills-$mcat->id') aria-selected="true" @else aria-selected="false" @endif>{{ $mcat->nameFilter }}</button>
                    @endforeach --}}

                    @for ($i = 0; $i < count($maincategories); $i++)
                        <button class="nav-link mb-2 button {{ $i == 0 ? ' active' : '' }}"
                            id="v-pills-{{ $maincategories[$i]->slug }}-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-{{ $maincategories[$i]->slug }}" type="button" role="tab"
                            aria-controls="v-pills-{{ $maincategories[$i]->slug }}"
                            aria-selected="{{ $i == 0 ? 'true' : 'false' }}">{{ $maincategories[$i]->nameFilter }}</button>
                    @endfor

                </div>
                <div class="tab-content" id="v-pills-tabContent">

                    @foreach ($maincategories as $key => $mcat)
                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="v-pills-{{ $mcat->slug }}"
                            role="tabpanel" aria-labelledby="v-pills-{{ $mcat->slug }}-tab">
                            <div class="row">
                                @foreach ($mcat->children as $subcat)
                                    <div class=" mb-4 {{ count($mcat->children) == 1 ? 'col-md-8' : 'col-lg-4' }}">
                                        <div class="meeting-item">
                                            <div class="thumb">
                                                <div class="price">
                                                </div>
                                                <a href="{{ url('products', $subcat->id) }}"><img width="416"
                                                        height="284" src="{{ $subcat->image_url }}"
                                                        alt="Allergy & Immune Care"></a>
                                            </div>
                                            <div class="down-content">
                                                <a href="{{ url('products', $subcat->id) }}">
                                                    <h4 class="justify-center">{{ $subcat->nameFilter }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.Layouts.footer')
