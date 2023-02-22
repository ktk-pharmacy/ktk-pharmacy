<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>KTK Pharmacy</title>

    <!-- Bootstrap core CSS -->
 
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="shortcut icon" href="assets/images/ktk_icon_3tp.png" />
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
    <style type="text/css">
        /* .img {
            content: url("/path/here/to/image.png");
        } */

    </style>
<!--


-->
  </head>

<body>
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky background-header">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="{{url('/')}}" class="logo">
                            <!-- {{asset('assets/images/ktk_icon_3tp.png')}} -->
                            <img width="50" height="100" class="img" src="" alt="">
                            <!-- <img width="50" height="100" alt=""> -->
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                         <li><a href="{{url('home')}}">Home</a></li>
                          <!-- <li class="scroll-to-section"><a href="{{url('home')}}">Home</a></li> -->
                          <li><a href="{{url('about')}}">About Us</a></li>
                          <li class="has-sub">
                              <a href="{{ url('products') }}">Products</a>
                              <ul class="sub-menu">
                                @foreach($cateorygroup as $catg)
                                  <li><a href="{{ url('categories') }}">{{$catg->name}}</a></li>
                                @endforeach  
                              </ul>
                          </li>
                          <li><a href="{{url('blogs')}}">News & Blog</a></li> 
                          <li class="has-sub">
                              <a href="javascript:void(0)">Contact Us</a>
                              <ul class="sub-menu">
                                  <li><a href="{{url('contact')}}">Contact Us</a></li>
                                  <li><a href="meeting-details.html">CSR</a></li>
                              </ul>
                          </li>
                          <li class="has-sub">
                              <a href="javascript:void(0);"
															id="change-language"
															data-url="{{ route('language', 'en') }}">Language</a>
                              <ul class="sub-menu">
                                  <li> 
                                    <a class="dropdown-item" href="#">
                                        <i class="footerimage"><img class="footerimage" src="assets/images/united-kingdom.png" alt=""> </i>English
                                        <i class="fa fa-check text-success ms-2"></i></a>
                                    </li>
                                  <li>
                                    <a href="javascript:void(0);"
															id="change-language"
															data-url="{{ route('language', 'mm') }}">
                                        <i class="footerimage"><img class="footerimage" src="assets/images/myanmar.png" alt=""> </i>မြန်မာ
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