@include('frontend.Layouts.headers')

<section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Product Catgories</h2>
          </div>
        </div>

        <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
         @foreach($maincategories as $mcat)
          <button class="nav-link bg-red mb-2 button active" 
                  id="v-pills-{{$mcat->id}}-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-{{$mcat->id}}" type="button" role="tab" 
                  aria-controls="v-pills-{{$mcat->id}}" aria-selected="false">{{$mcat->name}}</button>
         @endforeach
          <!-- <button class="nav-link bg-red mb-2 button active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Precription</button>
          <button class="nav-link bg-red button" id="v-pills-otc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-otc" type="button" role="tab" aria-controls="v-pills-otc" aria-selected="false">OTC</button> -->
          <!-- <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button> -->
          <!-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button> -->
        </div>
        <div class="tab-content" id="v-pills-tabContent">
         @foreach($maincategories as $mcat)
          <div class="tab-pane fade show active" id="v-pills-{{$mcat->id}}" role="tabpanel" aria-labelledby="v-pills-{{$mcat->id}}-tab"> <div class="row">
                    @foreach($mcat->children as $subcat)
                    <div class="col-lg-4 mb-4">
                      <div class="meeting-item">
                        <div class="thumb">
                          <div class="price">
                            <!-- <span>$22.00</span> -->
                          </div>
                          <a href="{{route('products')}}"><img  width="416" height="284" src="{{$subcat->image_url}}" alt="Allergy & Immune Care"></a>
                        </div>
                        <div class="down-content">
                          <!-- <div class="date"> -->
                            <!-- <h6>Nov <span>10</span></h6> -->
                          <!-- </div> -->
                          <a href="{{route('products')}}"><h4 class="justify-center">{{$subcat->name}}</h4></a>
                          <!-- <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p> -->
                        </div>
                      </div>
                    </div>
                    @endforeach
                  
                  </div>
          </div>
          <!-- <div class="tab-pane fade" id="v-pills-otc" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="bg-white">This is OTC Testing Area</div>
          </div> -->
        @endforeach
        </div>
      </div>
      </div>
    </div>
  </section>

@include('frontend.Layouts.footer')