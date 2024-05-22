<footer style="margin-top: auto;">
    <section class="footer">
        <div class="pt-4 px-5">

            <div class="d-flex justify-content-evenly text-start">
                <div class="">
                    <a class="text-white mb-2" href="{{ url('about') }}">
                        <p>ABOUT US</p>
                    </a>

                    <p>
                        <b>MISSION</b>
                        {{-- <small>{{ site_settings()['mission'] }}</small> --}}
                    </p>

                    <p>
                        <b>VISSION</b>
                        {{-- <small>{{ site_settings()['mission'] }}</small> --}}
                    </p>
                    <p>
                        <b>CORE VALUE</b>
                        {{-- <small>{{ site_settings()['mission'] }}</small> --}}
                    </p>
                </div>
                <div class="">
                    <p class="mb-2">CONTACT INFO</p>

                    <p>{{ site_settings()['default_address'] }}</p>

                    <p>
                        <b>EMAIL &#160;&#160;:</b>
                        <a class="text-white" href="mailto:{{ site_settings()['default_email'] }}">
                            {{ site_settings()['default_email'] }}
                        </a>
                    </p>

                    <p>
                        <b>PHONE :</b>
                        <a class="text-white" href="tel:+959 960 907 555">
                            +959 960 907 555
                        </a>,
                        <a class="text-white" href="tel:{{ site_settings()['default_phone_number'] }}">
                            {{ site_settings()['default_phone_number'] }}
                        </a>
                    </p>
                </div>
                <div class="">
                    <p class="mb-2">FOLLOW US ON</p>

                    <div class="right-icons">
                        <ul class="d-flex gap-2">
                            <li>
                                <a href="{{ site_settings()['social_facebook'] }}">
                                    <img style="width:40px !important" src="{{ asset('assets/images/fb.png') }}"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ site_settings()['social_twitter'] }}">
                                    <img style="width:40px !important" src="{{ asset('assets/images/twitter.png') }}"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ site_settings()['social_instagram'] }}">
                                    <img style="width:35px !important" src="{{ asset('assets/images/insta.png') }}"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ site_settings()['social_linkedin'] }}">
                                    <img style="width:35px !important" src="{{ asset('assets/images/link.png') }}"
                                        alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="mt-3">{{ site_settings()['footer_copyright_text'] }}</p>
        </div>
    </section>
</footer>

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
{{-- <script src="{{ asset('assets/zoom/jquery.zoom.js') }}"></script> --}}
<script src="{{ asset('assets/ex-zoom/jquery.exzoom.js') }}"></script>

<script>
    $(document).ready(function() {
        // $('#ex1').zoom();

        $("#exzoom").exzoom({
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
            // autoplay
            "autoPlay": false,
        });
    });
</script>


</body>

</html>
