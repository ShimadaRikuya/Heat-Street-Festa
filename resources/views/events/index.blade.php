@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row">
        @if (!empty($category))
            <h1 class="section_title">{{ $category }}</h1>
        @else
            <h1 class="section_title">全て</h1>
        @endif

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

        {{ $events->links() }}
        

    </div>

</div>
@endsection
