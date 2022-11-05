@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    @include('layouts.slider')

    <!-- NEW ARRIVALS -->
    <h2 class="section_title">新規記事</h2>

    <div class="row w-75 mx-auto">
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
                        <span class="card-text"><small class="text-muted">{{ $event->category->name }}</small></span>
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
                        <span class="card-text"><small class="text-muted">{{ $event->category->name }}</small></span>
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

    <!-- PICKUP POST -->
    <h2 class="section_title">ランキング</h2>

    <div class="row">

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image3.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image3.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

    </div>

    <div class="d-grid gap-2 col text-center-6 mx-auto">
        <button class="btn btn-outline-dark" type="button">VIEW ALL</button>
    </div>

    <!-- TREND -->
    <h2 class="section_title"></h2>
    
    <div class="row">

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image3.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image3.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

    </div>
    <div class="d-grid gap-2 col text-center-6 mx-auto">
        <button class="btn btn-outline-dark" type="button">VIEW ALL</button>
    </div>
    
</div>
@endsection
