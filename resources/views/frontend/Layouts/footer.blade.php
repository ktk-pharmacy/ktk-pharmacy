<!-- Sub Header -->
<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <div class="left-content">
                    <!-- <p>This is an Pharmacy  <em>HTML CSS</em> template by TemplateMo website.</p> -->
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">

                <div class="right-icons">
                    <ul>
                        <li><a href="{{ site_settings()['social_facebook'] }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ site_settings()['social_twitter'] }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ site_settings()['social_instagram'] }}"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ site_settings()['social_linkedin'] }}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<section class="footer">
    <div class="footer">
        <div class="content-left">
            <p>
                <img class="footerimage" src="../assets/images/phone.png" alt="">
                {{ site_settings()['default_phone_number'] }}
            </p>
            <p>
                <img class="footerimage" src="../assets/images/email.png" alt="">
                {{ site_settings()['default_email'] }}
            </p>
            <p>
                <img class="footerimage" src="../assets/images/home.png"
                    alt="">{{ site_settings()['default_address'] }}
            </p>
            <p>
                <img class="footerimage" src="../assets/images/webpage.png" alt="">
                {{ site_settings()['site_url'] }}
            </p>
        </div>
        <p>{{ site_settings()['footer_copyright_text'] }}</p>
        <!-- <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p> -->
    </div>
</section>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->

<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!--  -->
<script src="{{ asset('assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/lightbox.js') }}"></script>
<script src="{{ asset('assets/js/tabs.js') }}"></script>
<script src="{{ asset('assets/js/video.js') }}"></script>
<script src="{{ asset('assets/js/slick-slider.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>


<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
</body>

</html>
