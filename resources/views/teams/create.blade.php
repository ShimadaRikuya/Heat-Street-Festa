@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    <div class="row">
        <div class="box">
            <div class="title border rounded-pill"><h4 class="title-inner">主催者の新規作成</h4></div>
            
            <section class="create_cont">
                <div class="create_cont-inner">
                    <!-- 投稿フォーム -->
                    @if( Auth::check() )
                        <form action="{{ url('teams') }}" method="POST" class="form-horizontal">
                            @csrf
                            <!-- チーム名 -->
                            <div class="form-group mb-4">
                                <label for="team_name" class="form-label">主催者名<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="主催者名">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <!-- 問い合わせ連絡先 -->
                            <div class="form-group mb-4">
                                <label for="team_phone" class="form-label">問い合わせ電話番号</label>
                                <input 
                                    type="text" 
                                    name="phone" 
                                    value="{{ old('phone') }}" 
                                    class="form-control @error('phone') is-invalid @enderror"
                                    aria-describedby="phoneHelp" 
                                    placeholder="問い合わせ電話番号">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <div id="phoneHelp" class="form-text">※記号を使用せず、半角数字のみで入力してください。</div>
                            </div>
                            <!-- 登録ボタン -->
                            <!-- 問い合わせメールアドレス -->
                            <div class="form-group mb-4">
                                <label for="team_email" class="form-label">問い合わせメールアドレス</label>
                                <input 
                                    type="text" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="問い合わせメールアドレス">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="create_cont-btn well well-sm">
                                <a class="btn btn-outline-secondary" href="{{ route('teams.select') }}">戻る</a>
                                <button type="submit" class="btn btn-success">主催者を登録する</button>
                            </div>

                        </form>
                    @endif
                    <!-- 全てのチームリスト -->
                </div>
            </section>
        </div>
    </div>
</div>
@endsection