<div>
    <style>
        .item {
            text-align: center;
        }
    </style>
    <div class="item py-3">
        <div class="icon">
            <img style="width: 80px;height:80px;" src="{{ $service->image_url }}" alt="">
        </div>
        <div class="down-content">
            <h4>{{ $service->titleFilter }}</h4>
            <p>{{ $service->description }}</p>
        </div>
    </div>
</div>
