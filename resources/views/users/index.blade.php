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
                    <div class="username">{{ $user->name }}</div>
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
                <div class="d-flex justify-content-center flex-grow-1">
                    @if(Auth::id() != $user_flg)
                        @if (Auth::user()->isFollowing($user->id))
                            <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                @csrf 
                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                            </form>
                        @else
                            <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">フォローする</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
                


            {{-- イベント記事 --}}
            <div class="col-12 col-lg-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab1" class="nav-link active" data-bs-toggle="tab">イベント</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <div class="card mx-auto">
                            <div class="row align-items-center">
                                @foreach($events as $event)
                                    <div class="col-md-2">
                                        <a href="{{ route('events.show', $event->id) }}">
                                            <img class="card-img-top" src="{{ asset($event->image_uploader) }}" alt="{{ $event->image_uploader }}" style="height: 100px; object-fit:cover;">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->title }}</h5>
                                            <p class="card-text"><small class="text-muted">{{ $event->category->name }}</small></p>
                                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $event->category->name }}</small></span>
                                            <span class="card-text"><i class="fa-regular fa-heart"></i><small class="text-muted">{{ $event->users()->count() }}</small></span>
                                            <p class="card-text"><small class="text-muted">作成日：{{ date('Y/m/d', strtotime($event->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                @endforeach

                                {{ $events->links() }}
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection