<div>
    <style>
        .item {
            text-align: center;
        }
    </style>
    <div class="item position-relative py-3">
        <a href="javascript:void(0)" class="position-absolute top-0 end-0 text-dark" data-bs-dismiss="modal"><i
                class="fa-solid fa-xmark"></i></a>
        <div class="icon">
            <img style="width: 80px;height:80px;" src="{{ $service->image_url }}" alt="">
        </div>
        <div class="down-content">
            <h4>{{ $service->titleFilter }}</h4>
            <p>{{ $service->description }}</p>
        </div>
    </div>
</div>
