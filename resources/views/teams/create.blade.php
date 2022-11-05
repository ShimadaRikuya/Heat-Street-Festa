@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    <div class="row">
        <!-- Bootstrapの定形コード… -->
        <div class="card-body">
            <div class="card-title">
                投稿フォーム
            </div>
            <!-- 投稿フォーム -->
            @if( Auth::check() )
            <form action="{{ url('teams') }}" method="POST" class="form-horizontal">
                @csrf
                <!-- チーム名 -->
                <div class="form-group">
                    チーム名
                    <div class="col-sm-6">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- 問い合わせメールアドレス -->
                <div class="form-group">
                    問い合わせメールアドレス
                    <div class="col-sm-6">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- 問い合わせ連絡先 -->
                <div class="form-group">
                    問い合わせ連絡先
                    <div class="col-sm-6">
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- 登録ボタン -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
            @endif
        </div>
        <!-- 全てのチームリスト -->
    </div>
</div>
@endsection