<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide">
                
                <a href="{{ route('events.show', $slide->id) }}" class="img">
                    <img class="img-fluid" src="{{ Storage::disk('s3')->url("events/$slide->image_uploader") }}"/>
                    <h3 class="title-text">{{ $slide->title }}</h3>
                </a>

            </div>
        @endforeach
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
</div>