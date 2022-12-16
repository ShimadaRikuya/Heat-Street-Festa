<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide">
                
                <a href="{{ route('events.show', $slide->id) }}" class="img">
                    <img class="img-fluid" src="{{ Storage::disk('s3')->url("events/$slide->image_uploader") }}"/>
                        @if ($slide->event_start <= now())
                            <h5><span class="img-bg badge bg-success">イベント・開催中</span></h5>
                        @else
                            <h5><span class="img-bg badge bg-success">イベント・開催前</span></h5>
                        @endif
                    <h3 class="title-text">{{ $slide->title }}</h3>
                </a>

            </div>
        @endforeach
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
</div>