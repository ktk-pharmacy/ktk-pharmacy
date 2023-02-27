@include('frontend.Layouts.headers')

<section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <a href="meeting-details.html"><img src="{{$products[0]->image_url}}" alt=""></a>
                </div>

                <div class="down-content">
                  <a href="meeting-details.html"><h4>{{$products[0]->name}}</h4></a>
                  <p class="description">
                    {{$products[0]->description}}
                  </p>
                  <p>Availability :
                     @if($products[0]->availability==1)
                      <span> In Stock </span>
                    @else
                    <span> Out Of  Stock </span>
                    @endif
                  </p>
                  <p>Packaging : {{$products[0]->packaging}} </p>
                  <p>MOU : {{ $products[0]->mou }} </p>
                  <div class="row py-2">
                    <div class="col-lg-4">
                      <div class="hours">
                        <h5>Category</h5>
                        <p>{{$products[0]->sub_category->name }} </p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="location">
                        <h5>Manufacturer</h5>
                        <p>{{$products[0]->manufacturer}} </p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="book now">
                        <h5>Distribute By</h5>
                        <p>{{$products[0]->distributed_by}} </p>
                      </div>
                    </div>
                    <div class="col-lg-12 border mt-10 py-4 mb-10 px-4 pb-10">
                    <div class="nav flex-row nav-pills me-3 bg-red" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                            <button class="nav-link  button active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Product Detail</button>
                            <button class="nav-link  button" id="v-pills-otc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-otc" type="button" role="tab" aria-controls="v-pills-otc" aria-selected="false">Other Information</button>
                    </div>
                    <div class="d-flex align-items-start py-4">

                         <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                               <div class="row">
                                     <div class="col-lg-8">
                                        <div class="meeting-item">
                                          <div class="down-content">
                                            {!!$products[0]->product_details!!}
                                          </div>
                                        </div>
                                      </div>

                               </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-otc" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                  <div class="col-lg-8">
                                      <div class="meeting-item">
                                        <div class="down-content">
                                          {!!$products[0]->other_information!!}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="share">
                        <h5>Share:</h5>
                        <ul>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#">Twitter</a>,</li>
                          <li><a href="#">Linkedin</a>,</li>
                          <li><a href="#">Intagram</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

@include('frontend.Layouts.footer')
