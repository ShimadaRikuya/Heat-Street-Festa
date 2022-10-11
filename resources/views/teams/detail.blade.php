@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>チーム名： {{ $team->name }}</h1>
        <h2>オーナー： </h2>
        <h2>問い合わせメールアドレス： {{ $team->email }}</h2>
        <h2>問い合わせ連絡先： {{ $team->phone }}</h2>

        <div>
            <h3>メンバー</h3>
            @foreach($team->users as $team_user)
                <p>{{ $team_user->name }}</p>
            @endforeach
        </div>
        
    </div>
</div>
@endsection