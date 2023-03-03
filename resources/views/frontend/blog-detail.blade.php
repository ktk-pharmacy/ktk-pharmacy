@include('frontend.Layouts.headers')
<style>
    .content-dsc img {
        width: 100px;
        height: 100px;
    }
</style>

<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-lg-9 mx-auto">
                <div class="meeting-single-item">
                    <div class="">
                        <img src="{{ $content->image_url }}" class="w-100" alt="">
                    </div>
                    <div class="py-4 px-5 bg-white rounded-2">
                        <h3 class="mb-3">{{ $content->title }}</h3>
                        <p class="content-dsc">{!! $content->description !!}</p>
                        <p class="mt-3">{{ "#{$content->type->name}" }}</p>
                    </div>
                </div>
            </div>
            <div class="col-11 my-5 mx-auto">
                <h3 class="text-white mb-4 text-center">Related Contents</h3>
                <div class="row">
                    @foreach ($rlated_contents as $related_content)
                        <div class="col-lg-4 mb-3">
                            <div style="height: 400px" class="card">
                                <img src="{{ $related_content->image_url }}" class="card-img-top" alt="...">
                                <div class="card-body position-relative">
                                    <h5 class="card-title">{{ $related_content->title }}</h5>
                                    <div class=" pb-4 ">
                                        <p class="card-text mb-3">{!! $related_content->shortDesc !!}</p>
                                        <div>
                                            <a style="left: 15px;bottom:5px;"
                                                href="{{ route('content_show', $related_content->slug) }}"
                                                class="btn btn-primary position-absolute">Read
                                                More ...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.Layouts.footer')
