@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <div class="container">
        <div class="row">

            {{-- プロフィール --}}
            <div class="col-12 col-md-3">
                <div class="profile" id="">
                    <img src="{{ asset('img/user-shape.png') }}" class="rounded-circle">
                    <div class="username">{{ Auth::user()->name }}</div>
                </div>
                <ul class="list-group list-group-horizontal list-group-flush">
                    <li class="list-group-item flex-fill">投稿</li>
                    <li class="list-group-item flex-fill">フォロー</li>
                    <li class="list-group-item flex-fill">フォロワー</li>
                </ul>
                <a class="btn btn-outline-dark common-btn edit-profile-btn" href="{{ route('user.edit', Auth::user()->id ) }}">プロフィールを編集する</a>
            </div>
                


            {{-- イベント記事 --}}
            <div class="col-12 col-md-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab1" class="nav-link active" data-bs-toggle="tab">イベント</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab2" class="nav-link" data-bs-toggle="tab">主催者チーム管理</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="ps-1 bd-highlight"><a class="btn btn-light" href="{{ route('events.create') }}" role="button">＋新規作成</a></div>
                            <div class="ms-auto ps-1 bd-highlight dropdown">
                                <button class="btn btn-secondary btn-sm btn-light dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  並び順
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mx-auto">
                            <div class="row gy-1 align-items-center">
                                @foreach($events as $event)
                                    <div class="col-md-4">
                                        <a href="{{ route('events.show', $event->id) }}">
                                            <img class="img-thumbnail" src="{{ asset($event->image_uploader) }}" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="col-md-6 card-body">
                                        <h5 class="card-title">{{ $event->title }}</h5>
                                        <p class="card-text">2022/01/01</p>
                                    </div>
                                    <div class="col-md-2 d-flex">
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
                            </div>
                        </div>

                    </div>
                    <div id="tab2" class="tab-pane">
                        
                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-1 bd-highlight">一覧</div>
                            <!-- クリックしたらモーダルを表示するボタン -->
                            <div class="ms-auto ps-1 bd-highlight">
                                <button class="modal-toggle btn btn-light" href="#" role="button" data-modal="modalOne">メンバーの招待</button>

                                <!-- モーダルウィンドウ -->
                                <div id="modalOne" class="modal">
                                    <div class="modal-content">
                                        <div class="modal-top">
                                            <span class="modal-close">x</span>
                                        </div>

                                        <div class="modal-container">
                                            @include('teams.invitationform')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-1 bd-highlight dropdown">
                                <div class="ms-auto ps-1 bd-highlight dropdown">
                                    <button class="btn btn-secondary btn-sm btn-light dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      並び順
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight mb-3">
                            @include('teams.index')
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection