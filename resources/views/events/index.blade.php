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

        <form class="d-flex form-inline" role="search" method="GET" action="{{ route('events.keyword') }}">
            <input type="search" name="search"  value="{{request('search')}}" class="form-control me-2" placeholder="キーワードを入力" aria-label="検索...">
            <button type="submit" class="btn btn-outline-success flex-shrink-0">検索</button>
        </form>

        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 mb-3">
                    <div class="card mx-auto">
                        <a href="{{ route('events.show', $event->id) }}"><img class="bd-placeholder-img card-img-top" src="{{ asset($event->image_uploader) }}" alt="{{ $event->image_uploader }}" style="height: 200px; object-fit:cover;"></a>
                        <div class="card-body">
                            @if (Auth::check())
                                <a class="card-text" href="{{ route('user.show', Auth::id()) }}">{{ $event->team->user->name }}</a>
                            @else
                                <a class="card-text" href="{{ route('user.index', $event->team->user->name) }}">{{ $event->team->user->name }}</a>
                            @endif
                            <h5 class="card-title" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">{{ $event->title }}</h5>
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
