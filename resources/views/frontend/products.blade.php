@include('frontend.Layouts.headers')

<section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Product Catgories</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="categories">
            <h4>Product Catgories</h4>
            <ul>
              <li><a href="#">All Prescription Medicine</a></li>
              <li><a href="#">OTC Medicine</a></li>
            </ul>
            <!-- <div class="main-button-red">
              <a href="meetings.html">All Prescription Medicine</a>
            </div> -->
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <!-- <span>$22.00</span> -->
                  </div>
                  <a href="meeting-details.html"><img  width="416" height="284" src="assets/images/Allergic-immunecate.jpg" alt="Allergy & Immune Care"></a>
                </div>
                <div class="down-content">
                  <!-- <div class="date"> -->
                    <!-- <h6>Nov <span>10</span></h6> -->
                  <!-- </div> -->
                  <a href="meeting-details.html"><h4 class="justify-center">Allergy & Immune Care</h4></a>
                  <!-- <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p> -->
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <!-- <span>$36.00</span> -->
                  </div>
                  <a href="meeting-details.html"><img width="416" height="284" src="assets/images/anti-infection.jpg" alt="Anti-Infectivess"></a>
                </div>
                <div class="down-content">
                  <!-- <div class="date">
                    <h6>Nov <span>24</span></h6>
                  </div> -->
                  <a href="meeting-details.html"><h4>Anti-Infectives</h4></a>
                  <!-- <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p> -->
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <!-- <span>$14.00</span> -->
                  </div>
                  <a href="meeting-details.html"><img width="416" height="284" src="assets/images/blood.jpg" alt="Blood Loss Prevention"></a>
                </div>
                <div class="down-content">
                  <!-- <div class="date">
                    <h6>Nov <span>26</span></h6>
                  </div> -->
                  <a href="meeting-details.html"><h4>Blood Loss Prevention</h4></a>
                  <!-- <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p> -->
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <!-- <span>$48.00</span> -->
                  </div>
                  <a href="meeting-details.html"><img width="416" height="284" src="assets/images/brain-care.jpg" alt="Brain Care"></a>
                </div>
                <div class="down-content">
                  <!-- <div class="date">
                    <h6>Nov <span>30</span></h6>
                  </div> -->
                  <a href="meeting-details.html"><h4>Brain Care</h4></a>
                  <!-- <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@include('frontend.Layouts.footer')