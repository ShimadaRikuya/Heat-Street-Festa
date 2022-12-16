@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row w-75 m-auto">
        <h1 class="section_title">検索結果</h1>
        <p>{{ $events->count() }}件</p>

        <div class="row">
            @forelse($events as $event)
                <!-- PCサイズ -->
                <div class="col-lg-4 my-3 d-none d-lg-block">
                    <div class="card">
                        <a href="{{ route('events.show', $event->id) }}" class="img">
                            <img class="card-img-top" src="{{ Storage::disk('s3')->url("events/$event->image_uploader") }}" alt="画像">
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
                            <span class="card-text"><small class="text-muted">{{ $event->category->name }}</small></span><br>
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
                            <img class="bd-placeholder-img card-img-top" src="{{ Storage::disk('s3')->url("events/$event->image_uploader") }}" alt="画像">
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
                            <span class="card-text"><small class="text-muted">{{ $event->category->name }}</small></span><br>
                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $event->users()->count() }}</small></span>
                            <p class="card-text"><small class="text-muted">{{ $event->event_start }}</small></p>
                        </div>
                    </div>
                </div>
                <!--/ SPサイズ -->
            @empty
                <td>該当するイベントは存在しません。</td>
            @endforelse
        </div>

        {{ $events->links() }}
        
    </div>
</div>
@endsection
