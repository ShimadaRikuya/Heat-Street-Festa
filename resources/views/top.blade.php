@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    <section class="section slider">
        @include('layouts.slider')
    </section>
    

    <section class="section new_event">

        <div class="row w-75 mx-auto">
            <!-- NEW ARRIVALS -->
            <h2 class="section_title">新規記事</h2>

            @foreach($events as $event)
                <!-- PCサイズ -->
                <div class="col-lg-4 my-3 d-none d-lg-block">
                    <div class="card">
                        <a href="{{ route('events.show', $event->id) }}"><img class="card-img-top" src="{{ asset($event->image_uploader) }}" alt="{{ $event->image_uploader }}" style="height: 150px; object-fit:cover;"></a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $event->team->user->name) }}">{{ $event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $event->category->name }}</small></span>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $event->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ PCサイズ -->

                <!-- SPサイズ -->
                <div class="col col-md-6 my-3 d-lg-none">
                    <div class="card">
                        <a href="{{ route('events.show', $event->id) }}"><img class="bd-placeholder-img card-img-top" src="{{ asset($event->image_uploader) }}" alt="{{ $event->image_uploader }}" style="height: 100px; object-fit:cover;"></a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $event->team->user->name) }}">{{ $event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $event->category->name }}</small></span>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $event->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ SPサイズ -->

            @endforeach
            <div class="text-center">
                <button class="btn btn-outline-dark btn-lg rounded-pill" type="button">VIEW ALL</button>
            </div>
        </div>
    </section>


    <section class="section ranking_event">

        <div class="row w-75 mx-auto">
            <!-- PICKUP POST -->
            <h2 class="section_title">ランキング</h2>

            @foreach($ranking_events as $ranking_event)
                <!-- PCサイズ -->
                <div class="col-lg-3 my-3 d-none d-lg-block">
                    <div class="card">
                        <a href="{{ route('events.show', $ranking_event->id) }}"><img class="card-img-top" src="{{ asset($ranking_event->image_uploader) }}" alt="{{ $ranking_event->image_uploader }}" style="height: 150px; object-fit:cover;"></a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $ranking_event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $ranking_event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $ranking_event->team->user->name) }}">{{ $ranking_event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $ranking_event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $ranking_event->category->name }}</small></span>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $ranking_event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $ranking_event->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ PCサイズ -->

                <!-- SPサイズ -->
                <div class="col col-md-6 my-3 d-lg-none">
                    <div class="card">
                        <a href="{{ route('events.show', $ranking_event->id) }}"><img class="bd-placeholder-img card-img-top" src="{{ asset($ranking_event->image_uploader) }}" alt="{{ $ranking_event->image_uploader }}" style="height: 100px; object-fit:cover;"></a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $ranking_event->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $ranking_event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $ranking_event->team->user->name) }}">{{ $ranking_event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $ranking_event->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $ranking_event->category->name }}</small></span>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $ranking_event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $event->ranking_event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ SPサイズ -->

            @endforeach

            <!-- もっと見る -->
            <div class="text-center">
                <button class="btn btn-outline-dark btn-lg rounded-pill" type="button">VIEW ALL</button>
            </div>
            <!--/ もっと見る -->

        </div>
    </section>


    <section class="section trend_event">

        <div class="row w-75 mx-auto">
            <!-- TREND -->
            <h2 class="section_title">トレンド</h2>

            @foreach($trends as $trend)
                <!-- PCサイズ -->
                <div class="col-lg-4 my-3 d-none d-lg-block">
                    <div class="card">
                        <a href="{{ route('events.show', $trend->id) }}"><img class="card-img-top" src="{{ asset($trend->image_uploader) }}" alt="{{ $trend->image_uploader }}" style="height: 150px; object-fit:cover;"></a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $trend->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $trendt->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $trend->team->user->name) }}">{{ $trend->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $trend->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $trend->category->name }}</small></span>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $trend->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $trend->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ PCサイズ -->

                <!-- SPサイズ -->
                <div class="col col-md-6 my-3 d-lg-none">
                    <div class="card">
                        <a href="{{ route('events.show', $trend->id) }}"><img class="bd-placeholder-img card-img-top" src="{{ asset($trend->image_uploader) }}" alt="{{ $trend->image_uploader }}" style="height: 100px; object-fit:cover;"></a>
                        <div class="card-body">
                            @if (Auth::check() && Auth::User() == $trend->team->user)
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $trend->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $trend->team->user->name) }}">{{ $trend->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $trend->title }}</h5>
                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $trend->category->name }}</small></span>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $trend->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $trend->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ SPサイズ -->

            @endforeach
            <div class="text-center">
                <button class="btn btn-outline-dark btn-lg rounded-pill" type="button">VIEW ALL</button>
            </div>
        </div>
    </section>

    
</div>
@endsection
