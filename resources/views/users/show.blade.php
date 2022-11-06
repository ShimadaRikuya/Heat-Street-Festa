@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <div class="container">
        <div class="row">

            {{-- プロフィール --}}
            <div class="col-12 col-lg-3">
                <div class="profile" id="">
                    @if ($user->profile_picture)
                        <img src="{{ asset('storage/profiles/'.$user->profile_picture) }}" class="rounded-circle">
                    @else
                        <img src="{{ asset('storage/profiles/'.$user->profile_picture) }}" class="rounded-circle">
                    @endif
                    <div class="username">{{ Auth::user()->name }}</div>
                </div>
                <ul class="list-group list-group-horizontal list-group-flush">
                    <li class="list-group-item flex-fill">投稿
                        <div class="count">{{ $events->total() }}</div>
                    </li>
                    <li class="list-group-item flex-fill">フォロー
                        <div class="count">{{ $follow_count }}</div>
                    </li>
                    <li class="list-group-item flex-fill">フォロワー
                        <div class="count">{{ $follower_count }}</div>
                    </li>
                </ul>
                @if (Auth::check())
                    <a class="btn btn-outline-dark common-btn edit-profile-btn" href="{{ route('user.edit', Auth::user()->id ) }}">プロフィールを編集する</a>
                @endif
            </div>
                


            {{-- イベント記事 --}}
            <div class="col-12 col-lg-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab1" class="nav-link active" data-bs-toggle="tab">イベント</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab2" class="nav-link" data-bs-toggle="tab">主催者チーム管理</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab3" class="nav-link" data-bs-toggle="tab">いいね</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="ps-1 bd-highlight"><a class="btn btn-light" href="{{ route('teams.select') }}" role="button">＋新規作成</a></div>
                        </div>
                        <div class="card mx-auto">
                            <div class="row gy-1 align-items-center">
                                @foreach($events as $event)
                                    <div class="col-md-2">
                                        <a href="{{ route('events.show', $event->id) }}">
                                            <img class="card-img-top" src="{{ asset($event->image_uploader) }}" alt="{{ $event->image_uploader }}" style="height: 100px; object-fit:cover;">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->title }}</h5>
                                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $event->category->name }}</small></span>
                                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $event->users()->count() }}</small></span>
                                            <p class="card-text"><small class="text-muted">作成日：{{ date('Y/m/d', strtotime($event->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex justify-content-center">
                                        <input
                                            type="button" 
                                            onclick="location.href='{{ route('events.edit', $event->id) }}'" 
                                            class="edit_event btn btn-light" 
                                            value="編集"
                                        />
                                        <form class="delete_event" method="post" action="{{ route('events.destroy', $event) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-light" value="削除">
                                        </form>
                                    </div>
                                @endforeach

                                {{ $events->links() }}
                                
                            </div>
                        </div>

                    </div>
                    <div id="tab2" class="tab-pane">
                        
                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-1 bd-highlight">一覧</div>
                        </div>
                        <div class="d-flex bd-highlight mb-3">
                            @include('teams.index')
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane">
                        
                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-1 bd-highlight">一覧</div>
                        </div>
                        <div class="d-flex bd-highlight mb-3">
                            <div class="row gy-1 align-items-center">
                                @foreach ($likes as $like)
                                    <div class="col-md-2">
                                        <a href="{{ route('events.show', $like->id) }}">
                                            <img class="card-img-top" src="{{ asset($like->image_uploader) }}" alt="{{ $like->image_uploader }}" style="height: 100px; object-fit:cover;">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $like->title }}</h5>
                                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $like->category->name }}</small></span>
                                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $like->users()->count() }}</small></span>
                                            <p class="card-text"><small class="text-muted">作成日：{{ date('Y/m/d', strtotime($like->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection