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
                        <a href="#tab2" class="nav-link" data-bs-toggle="tab">メンバー管理</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="ps-1 bd-highlight"><a class="btn btn-light" href="#" role="button">＋新規作成</a></div>
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
                                <div class="col-md-4">
                                    <img class="img-thumbnail" src="{{ asset('img/image1.jpg') }}" alt="Card image cap">
                                </div>
                                <div class="col-md-6 card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">2022/01/01</p>
                                </div>
                                <div class="col-md-2 d-flex">
                                    <div class="edit_event btn btn-light">編集</div>
                                    <div class="delete_event btn btn-light">削除</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="tab2" class="tab-pane">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="ps-1 bd-highlight"><a class="btn btn-light" href="#" role="button">メンバー追加</a></div>
                            <div class="ps-1 bd-highlight"><a class="btn btn-light" href="#" role="button">招待の再送</a></div>
                            <div class="ms-auto ps-1 bd-highlight dropdown">
                                <button class="btn btn-secondary btn-sm btn-light dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  並び順
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight mb-3">
                            <div class="ps-1 bd-highlight">
                                <img src="{{ asset('img/user-shape.png') }}" class="rounded-circle">
                            </div>
                            <div class="ps-5 flex-fill membar_body">
                                <h5 class="card-title">Member name</h5>
                                <p class="card-text">test@example.com</p>
                            </div>
                            <div class="ms-auto ps-1 block_member btn btn-light">ブロック</div>
                            <div class="ms-auto ps-1 delete_member btn btn-light">削除</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection