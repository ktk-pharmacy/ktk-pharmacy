@include('frontend.Layouts.headers')
<section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
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
        <div class="col-lg-5">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>09 976 822711</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>ktkpharmacy.info@gmail.com</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>No A (11), 30 Street, Between 56 * 57 Street, Mandalay, Myanmar</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.ktkpharmacy.com</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('frontend.Layouts.footer')