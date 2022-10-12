@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>チーム名： {{ $team->name }}</h1>
        <h2>オーナー： {{ $team->user->name }}</h2>
        <h2>問い合わせメールアドレス： {{ $team->email }}</h2>
        <h2>問い合わせ連絡先： {{ $team->phone }}</h2>

        <div>
            <h3>メンバー</h3>
            @foreach($team->users as $team_user)
                <p>{{ $team_user->name }}</p>
            @endforeach
            <!-- クリックしたらモーダルを表示するボタン -->
            <button class="modal-toggle btn btn-light" href="#" role="button" data-modal="modalOne">メンバーの追加</button>

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
@endsection