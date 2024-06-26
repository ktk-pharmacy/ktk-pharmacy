<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <meta
    name="description"
    content="KTK pharmacy who's selling the Pharmaceuticals & Consumer Daily Needs with fair prices in one place">

    <meta
    name="keywords"
    content="KTK, Medicines, Wholesale, FDA Products, Customer Service"
    >

    <link rel="canonical" href="https://ktkpharmacy.com">


    <meta property="og:title" content="KTK Pharmacy">
    <meta property="og:description"
    content="KTK pharmacy who's selling the Pharmaceuticals & Consumer Daily Needs with fair prices in one place.">

    <meta property="og:image" content="{{ asset('assets/images/ktk_icon.jpg') }}">
    <meta property="og:url" content="https://ktkpharmacy.com">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="KTK Pharmacy">
    <meta name="twitter:description" content="KTK pharmacy who's selling the Pharmaceuticals & Consumer Daily Needs with fair prices in one place.">
    <meta name="twitter:image" content="{{ asset('assets/images/ktk_icon.jpg') }}">
    <meta name="twitter:url" content="https://ktkpharmacy.com">

    <meta name="author" content="Ling Myat Aung">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="refresh" content="30">

    <title>KTK Pharmacy</title>

    <!-- Bootstrap core CSS -->


    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/lightbox.css') }}">
    <link rel="shortcut icon" href="{{ asset('/assets/images/ktk_icon_3tp.png') }}" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- endFontAwesome -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/engine1/style.css') }}" />
    <script type="text/javascript" src="{{ asset('assets/engine1/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/contact.js') }}"></script>
    <style type="text/css">
        button.slick-arrow {
            width: 50px;
            position: absolute;
            top: 50%;
            font-size: 40px;
            border: none;
            background-color: #fff;
        }

        button.slick-next {
            right: -6%;
        }

        button.slick-prev {
            left: -6%;
        }

        a.ft-lk {
            color: #fff !important;
            transition: all 0.5s;
        }

        a.ft-lk:hover {
            color: #eea425 !important;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('assets/libs/slick-slider/slick-slider.css') }}">
    <!--


-->
</head>

<body style="overflow-x: hidden">
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="main-nav h-100 d-flex justify-content-between">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">
                            <!-- {{ asset('assets/images/ktk_icon_3tp.png') }} -->
                            <img width="50" height="100" class="img" src="" alt="">
                            <!-- <img width="50" height="100" alt=""> -->
                        </a>
                        <!-- ***** Logo End ***** -->

                        <form class="d-flex align-items-center justify-items-center" action="" method="get">
                            <div class="input-group">
                                <input class="form-control border border-danger" type="text" name="search" id="search" placeholder="Product Search">
                                <button class="btn-sm btn-danger">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                        <!-- ***** Menu Start ***** -->
                        @php
                            $categorygroup = getGroupCategories();
                            $site_settings = site_settings();
                        @endphp

                        <ul class="nav">
                            <li><a href="{{ url('home') }}">{{ __('header.home') }}</a></li>
                            <!-- <li class="scroll-to-section"><a href="{{ url('home') }}">Home</a></li> -->
                            <li><a href="{{ url('about') }}">{{ __('header.about_us') }}</a></li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">{{ __('header.products') }}</a>
                                <ul style="overflow:visible !important;" class="sub-menu">
                                    @foreach ($categorygroup as $catg)
                                        <li class="ctg-hover position-relative">
                                            <a href="{{ url('categories/' . $catg->slug) }}">{{ $catg->nameFilter }}</a>
                                            <div
                                              class="hidden-ctegory"
                                            >
                                                <div class="d-flex flex-column">
                                                    @foreach ($catg->main_categories as $mcat)
                                                    <div class="main-ctg">
                                                        <a href="javascript:void(0)">
                                                            {{ $mcat->nameFilter }}
                                                        </a>

                                                        <div class="inner-hidden">
                                                            <div class="d-flex flex-column">
                                                                @foreach ($mcat->sub_categories as $scat)
                                                                    <a
                                                                    href="{{ url('products', $scat->id) }}"
                                                                    >
                                                                        {{ $scat->nameFilter }}
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">{{ __('header.content') }}</a>
                                {{-- <a href="{{ url('blogs') }}">News & Blog</a> --}}
                                <ul class="sub-menu">
                                    @foreach (getContentType() as $type)
                                        <li><a href="{{ url("contents/$type->slug") }}">{{ $type->nameFilter }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ url('contact') }}">{{ __('header.contact_us') }}</a></li>
                            {{-- <li class="has-sub">
                                <a href="javascript:void(0)">Contact Us</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                    <li><a href="meeting-details.html">CSR</a></li>
                                </ul>
                            </li> --}}
                            <li class="has-sub">
                                <a href="javascript:void(0);" id="change-language"
                                    data-url="{{ route('change', 'en') }}">{{ __('header.language') }}</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/language/en') }}">
                                            <i class="footerimage"><img class="footerimage"
                                                    src="/assets/images/united-kingdom.png" alt=""> </i>English
                                            @if (session()->get('locale') == 'en')
                                                <i class="fa fa-check text-success ms-2"></i>
                                            @endif
                                        </a>


                                    </li>
                                    <li>
                                        <a href="{{ url('/language/mm') }}" {{-- data-url="{{ route('change', 'mm') }}" --}}>
                                            <i class="footerimage"><img class="footerimage"
                                                    src="/assets/images/myanmar.png" alt=""> </i>မြန်မာ
                                            @if (session()->get('locale') == 'mm')
                                                <i class="fa fa-check text-success ms-2"></i>
                                            @endif
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
