@include('frontend.Layouts.headers')

<section class="contact-us" id="contact">
    <div class="container">
      
    
    <div class="googlemap">
      <div class="mapouter">
        <div class="gmap_canvas">
          <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=KTK Pharmacy Mandalay&t=&z=16&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
          </iframe>
          <style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5">
          <div class="right-info">
            <ul>
              <li>
              <!-- <h6></h6> -->
              <span>
                   <a href="{{url('/')}}" class="footerimage">
                            <!-- {{asset('assets/images/ktk_icon_3tp.png')}} -->
                            <img width="50" height="100" class="contactus-logo" src="{{asset('assets/images/ktk_icon_1.png')}}" alt="">
                            <!-- <img width="50" height="100" alt=""> -->
                    </a>
                    KTK Pharmacy company limited
              </span>
              </li>
              <li>
                <h6>Phone Number</h6>
                <span><img class="footerimage" src="../assets/images/phone.png" alt=""> +95 9 976 822711</span>
              </li>
              <li>
                <h6>Email Address</h6>
               
                <span> <img class="footerimage" src="../assets/images/email.png" alt=""> ktkpharmacy.info@gmail.com</span>
              </li>
              <li>
                <h6>Street Address</h6>
               
                <span><img class="footerimage" src="../assets/images/home.png" alt=""> No A (11), 30 Street, Between 56 * 57 Street, Mandalay, Myanmar</span>
              </li>
              <li>
                <h6>Website URL</h6>
               
                <span><img class="footerimage" src="../assets/images/webpage.png" alt=""> www.ktkpharmacy.com</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-7 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                  </div>
                  <div class="col-lg-12">
                    <h6>Name:</h6>
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <h6>Email:</h6>
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <h6>Age:</h6>
                    <fieldset>
                      <input name="age" type="text" id="age" placeholder="Age...">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <h6>Subject:</h6>
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@include('frontend.Layouts.footer')