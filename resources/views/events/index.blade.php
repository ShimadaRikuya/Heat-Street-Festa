@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row w-75 m-auto">
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
        </div>

        {{ $events->links() }}
        

    </div>

</div>
@endsection
