@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<section class="section swipe">
    @include('layouts.slider')
</section>
<div class="container">

    <section class="section new_event p-5">

        <div class="row mx-auto">
            <!-- NEW ARRIVALS -->
            <h2 class="section_title text-center">新規記事</h2>

            @foreach($events as $event)
                <!-- PCサイズ -->
                <div class="col-lg-4 my-3 d-none d-lg-block">
                    <div class="card">
                        <a href="{{ route('events.show', $event->id) }}" class="img">
                            <img class="img-fluid" src="{{ Storage::disk('s3')->url("events/$event->image_uploader") }}" alt="画像">
                                @if ($event->event_start <= now())
                                    <h5><span class="img-badge badge bg-success">イベント・開催中</span></h5>
                                @else
                                    <h5><span class="img-badge badge bg-success">イベント・開催前</span></h5>
                                @endif
                        </a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $event->team->user->name) }}">{{ $event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $event->category->name }}</small></span><br>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $event->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ PCサイズ -->

                <!-- SPサイズ -->
                <div class="col-12 col-md-6 my-3 d-lg-none">
                    <div class="card">
                        <a href="{{ route('events.show', $event->id) }}" class="img">
                            <img class="bd-placeholder-img img-fluid" src="{{ Storage::disk('s3')->url("events/$event->image_uploader") }}" alt="画像">
                                @if ($event->event_start <= now())
                                    <h5><span class="img-badge badge bg-success">イベント・開催中</span></h5>
                                @else
                                    <h5><span class="img-badge badge bg-success">イベント・開催前</span></h5>
                                @endif
                        </a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $event->team->user->name) }}">{{ $event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $event->category->name }}</small></span><br>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $event->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ SPサイズ -->

            @endforeach

            <div class="text-center mt-5">
                <button type="button" class="btn btn-outline-dark btn-lg rounded-pill" onclick="location.href='{{ route('events.index') }}'">
                    VIEW ALL
                </button>
            </div>

        </div>
    </section>


    <section class="section ranking_event p-5">

        <div class="row mx-auto">
            <!-- PICKUP POST -->
            <h2 class="section_title text-center">ランキング</h2>

            @foreach($ranking_events as $ranking_event)
                <!-- PCサイズ -->
                <div class="col-lg-3 my-3 d-none d-lg-block">
                    <div class="card">
                        <a href="{{ route('events.show', $ranking_event->id) }}" class="img">
                            <img class="img-fluid" src="{{ Storage::disk('s3')->url("events/$ranking_event->image_uploader") }}" alt="画像">
                                @if ($ranking_event->event_start <= now())
                                    <h5><span class="img-badge badge bg-success">イベント・開催中</span></h5>
                                @else
                                    <h5><span class="img-badge badge bg-success">イベント・開催前</span></h5>
                                @endif
                        </a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $ranking_event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $ranking_event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $ranking_event->team->user->name) }}">{{ $ranking_event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $ranking_event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $ranking_event->category->name }}</small></span><br>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $ranking_event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $ranking_event->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ PCサイズ -->

                <!-- SPサイズ -->
                <div class="col-12 col-md-6 my-3 d-lg-none">
                    <div class="card">
                        <a href="{{ route('events.show', $ranking_event->id) }}" class="img">
                            <img class="bd-placeholder-img img-fluid" src="{{ Storage::disk('s3')->url("events/$ranking_event->image_uploader") }}" alt="画像">
                                @if ($ranking_event->event_start <= now())
                                    <h5><span class="img-badge badge bg-success">イベント・開催中</span></h5>
                                @else
                                    <h5><span class="img-badge badge bg-success">イベント・開催前</span></h5>
                                @endif
                        </a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $ranking_event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $ranking_event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $ranking_event->team->user->name) }}">{{ $ranking_event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $ranking_event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $ranking_event->category->name }}</small></span><br>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $ranking_event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $event->ranking_event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ SPサイズ -->

            @endforeach

        </div>
    </section>

    <section class="section trend_event p-5">

        <div class="row mx-auto">
            <!-- TREND -->
            <h2 class="section_title text-center">トレンド</h2>

            @foreach($trends as $trend)
                <!-- PCサイズ -->
                <div class="col-lg-4 my-3 d-none d-lg-block">
                    <div class="card">
                        <a href="{{ route('events.show', $trend->id) }}" class="img">
                            <img class="img-fluid" src="{{ Storage::disk('s3')->url("events/$trend->image_uploader") }}" alt="画像">
                                @if ($trend->event_start <= now())
                                    <h5><span class="img-badge badge bg-success">イベント・開催中</span></h5>
                                @else
                                    <h5><span class="img-badge badge bg-success">イベント・開催前</span></h5>
                                @endif
                        </a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $trend->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $trend->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $trend->team->user->name) }}">{{ $trend->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $trend->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $trend->category->name }}</small></span><br>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $trend->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $trend->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ PCサイズ -->

                <!-- SPサイズ -->
                <div class="col-12 col-md-6 my-3 d-lg-none">
                    <div class="card">
                        <a href="{{ route('events.show', $trend->id) }}" class="img">
                            <img class="bd-placeholder-img img-fluid" src="{{ Storage::disk('s3')->url("events/$trend->image_uploader") }}" alt="画像">
                                @if ($trend->event_start <= now())
                                    <h5><span class="img-badge badge bg-success">イベント・開催中</span></h5>
                                @else
                                    <h5><span class="img-badge badge bg-success">イベント・開催前</span></h5>
                                @endif
                        </a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $trend->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $trend->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $trend->team->user->name) }}">{{ $trend->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $trend->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $trend->category->name }}</small></span><br>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $trend->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $trend->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ SPサイズ -->

            @endforeach

            <div class="text-center mt-5">
                <button type="button" class="btn btn-outline-dark btn-lg rounded-pill" onclick="location.href='{{ url('events', ['category_id' => 1, '$category' => 'パーティー']) }}'">
                    VIEW ALL
                </button>
            </div>

        </div>
    </section>

</div>
@endsection
