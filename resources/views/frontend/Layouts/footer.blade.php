
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
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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
                <img  class="footerimage" src="../assets/images/phone.png" alt=""> +95 9 976 822711
              </p>
              <p>
                <img  class="footerimage" src="../assets/images/email.png" alt=""> ktkpharmacy.info@gmail.com
              </p>
              <p>
                <img  class="footerimage" src="../assets/images/home.png" alt=""> No A (11), 30 Street, Between 56 x 57 Street, Mandalay, Myanmar
              </p>
              <p>
                <img  class="footerimage" src="../assets/images/webpage.png" alt=""> www.ktkpharmacy.com
              </p>
      </div>
      <p>Copyright © 2023 KTK Pharmacy Co., Ltd. All Rights Reserved.</p>
          <!-- <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p> -->
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->

  <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>

   <script src="../assets/js/isotope.js"></script>
    {{--   <script src="../assets/js/isotope.min.js"></script>  --}}

    <script src="../assets/js/tabs.js"></script>


    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/lightbox.js"></script>

    <script src="../assets/js/video.js"></script>
    <script src="../assets/js/slick-slider.js"></script>
    <script src="../assets/js/custom.js"></script>

    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });

        // var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
        // triggerTabList.forEach(function (triggerEl) {
        //   var tabTrigger = new bootstrap.Tab(triggerEl)

        //   triggerEl.addEventListener('click', function (event) {
        //     event.preventDefault()
        //     tabTrigger.show()
        //   })
        // })

        $(document).on('click', '#change-language', function () {
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type:"POST",
            success:function(data){
                window.location.reload(true);
            }
        });
      });

      $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    </script>
</body>
</html>
