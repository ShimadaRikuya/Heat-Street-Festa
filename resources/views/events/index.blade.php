@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row">
        <h1 class="section_title">全て</h1>

        <div class="d-flex align-content-stretch flex-wrap">
            @foreach($events as $event)
                <div class="col-sm-4">
                    <div class="card" style="width: 20rem;">
                        <a href="{{ route('events.show', $event->id) }}"><img class="card-img-top" src="{{ $event->image_uploader }}" alt="{{ $event->image_uploader }}"></a>
                        <div class="card-body">
                          <h5 class="card-title">{{ $event->title }}</h5>
                          <p class="card-text">{{ $event->venue }}</p>
                          <p class="card-text"><small class="text-muted">{{ $event->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $events->links() }}
        

    </div>

</div>
@endsection
