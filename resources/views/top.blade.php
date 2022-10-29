@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    @include('layouts.slider')

    <!-- NEW ARRIVALS -->
    <h2 class="section_title">NEW ARRIVALS</h2>

    <div class="row">
        @foreach($events as $event)
            <div class="col-sm-4 mb-3">
                <div class="card mx-auto" style="width: 20rem;">
                    <a href="{{ route('events.show', $event->id) }}"><img class="card-img-top" src="{{ asset($event->image_uploader) }}" alt="{{ $event->image_uploader }}" style="height: 200px; object-fit:cover;"></a>
                    <div class="card-body">
                      <h5 class="card-title">{{ $event->title }}</h5>
                      <p class="card-text"><small class="text-muted">{{ $event->category->name }}</small></p>
                      <p class="card-text"><small class="text-muted">{{ $event->event_start }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-grid gap-2 col text-center-6 mx-auto">
        <button class="btn btn-outline-dark" type="button">VIEW ALL</button>
    </div>

    <!-- PICKUP POST -->
    <h2 class="section_title">PICKUP POST</h2>

    <div class="row">

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image3.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
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
    <h2 class="section_title">TREND</h2>
    
    <div class="row">

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image3.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/image2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
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
