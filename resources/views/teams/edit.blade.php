@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
        <form action="{{ url('teams/update') }}" method="POST">
            <!-- team_name -->
            <div class="form-group">
                <label for="team_name">チーム名</label>
                <input type="text" name="name" class="form-control" value="{{ $team->name }}">
            </div>
            <!--/ team_name -->
            <!-- team_email -->
            <div class="form-group">
                <label for="team_emai">問い合わせメールアドレス</label>
                <input type="text" name="email" class="form-control" value="{{ $team->email }}">
            </div>
            <!--/ team_email -->
            <!-- team_phone -->
            <div class="form-group">
                <label for="team_phone">問い合わせ連絡先</label>
                <input type="text" name="phone" class="form-control" value="{{ $team->phone }}">
            </div>
            <!--/ team_phone -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$team->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection