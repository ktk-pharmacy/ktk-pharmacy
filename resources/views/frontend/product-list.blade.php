@include('frontend.Layouts.headers')

<section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Product List- {{$products[0]->sub_category->name}}</h2>
          </div>
        </div>

      <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link mb-2 bg-red button active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Precription</button>
          <button class="nav-link bg-red button" id="v-pills-otc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-otc" type="button" role="tab" aria-controls="v-pills-otc" aria-selected="false">OTC</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                  @foreach($products as $prod)
                   <div class="col-lg-8">
                      <div class="meeting-item">
                        <div class="thumb">
                          <a href="{{url('product_detail',$prod->slug)}}"><img  class="logoimage" width="416" height="284" src="{{$prod->image_url}}" alt=""></a>
                        </div>
                        <div class="down-content">
                          <a href="{{url('product_detail',$prod->slug)}}"><h4 class="justify-center">{{$prod->name}}</h4></a>
                        </div>
                      </div>
                    </div>
                  @endforeach
              </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>

@include('frontend.Layouts.footer')
