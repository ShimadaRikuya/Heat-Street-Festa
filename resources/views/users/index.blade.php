@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <div class="container">
        <div class="row">

            {{-- プロフィール --}}
            <div class="col-12 col-lg-4 mb-5">
                <div class="box">
                    <div class="prof">
                        <div class="prof-inner mb-4" id="">
                            @if ($user->profile_picture)
                                <img src="{{ Storage::disk('s3')->url("profile_pictures/".$user->profile_picture) }}" class="rounded-circle">
                            @else
                                <img src="{{ asset('storage/profiles/user-shape.jpg') }}" class="rounded-circle">
                            @endif
                            <div class="username">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="prof-ul d-flex justify-content-between mb-4">
                            <div class="prof-ul-list">
                                <a href="{{ route('user.show', Auth::id()) }}" class="link-dark text-decoration-none">
                                    投稿
                                    <div class="event_count">{{ $events->total() }}</div>
                                </a>
                            </div>
                            <div class="prof-ul-list">フォロー
                                <a href="" class="link-dark text-decoration-none">
                                    <div class="follow_count">{{ $follow_count }}</div>
                                </a>
                            </div>
                            <div class="prof-ul-list">フォロワー
                                <a href="" class="link-dark text-decoration-none">
                                    <div class="follwer_count">{{ $follower_count }}</div>
                                </a>
                            </div>
                        </div>
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
                </div>
            </div>
                


            {{-- イベント記事 --}}
            <div class="col-12 col-lg-8 bg-white">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab1" class="nav-link active" data-bs-toggle="tab">イベント</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <div class="d">
                            <div class="row gy-1 align-items-center">
                                @foreach($events as $event)
                                    <div class="col-lg-3 text-center p-1">
                                        <a href="{{ route('events.show', $event->id) }}">
                                            <img class="img-fluid" src="{{ Storage::disk('s3')->url("events/$event->image_uploader") }}" alt="画像">
                                        </a>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->title }}</h5>
                                            <span class="card-text"><i class="fa-solid fa-tag"></i><small class="text-muted">{{ $event->category->name }}</small></span><br>
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