@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ url('teams/update') }}" method="POST">
            @csrf
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$team->id}}" />
            <!--/ id 値を送信 -->

            <!-- team_name -->
            <div class="form-group">
                <label for="team_name">チーム名</label>
                <input type="text" name="name" value="{{ old('name')?: $team->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--/ team_name -->
            <!-- team_email -->
            <div class="form-group">
                <label for="team_emai">問い合わせメールアドレス</label>
                <input type="text" name="email" value="{{ old('email')?: $team->email }}" class="form-control  @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--/ team_email -->
            <!-- team_phone -->
            <div class="form-group">
                <label for="team_phone">問い合わせ連絡先</label>
                <input type="text" name="phone" value="{{ old('phone')?: $team->phone }}" class="form-control  @error('phone') is-invalid @enderror">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--/ team_phone -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->

        </form>
    </div>
</div>
@endsection