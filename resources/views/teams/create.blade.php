@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            投稿フォーム
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('teams') }}" method="POST" class="form-horizontal">
            @csrf
            <!-- チーム名 -->
            <div class="form-group">
                チーム名
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <!-- 問い合わせメールアドレス -->
            <div class="form-group">
                問い合わせメールアドレス
                <div class="col-sm-6">
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            <!-- 問い合わせ連絡先 -->
            <div class="form-group">
                問い合わせ連絡先
                <div class="col-sm-6">
                    <input type="text" name="phone" class="form-control">
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
    
@endsection