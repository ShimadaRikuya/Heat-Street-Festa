@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="box"><div class="title border rounded-pill"><h4 class="title-inner">{{ __('サインイン・ユーザー登録') }}</h4></div></div>
        <div class="col-md-7 mt-5">
            
            <section class="section card">

                <div class="section_inner card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="col-form-label fw-bold">{{ __('E-Mail Address') }}</label>
                            <input 
                                id="email" 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="メールアドレス"
                                required 
                                autocomplete="email" 
                                autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="col-form-label fw-bold">{{ __('Password') }}</label>
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                placeholder="パスワード(8文字以上の半角英数)"
                                required 
                                autocomplete="current-password"
                                aria-describedby="passwordHelp">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (Route::has('password.request'))
                                <a id="passwordHelp" class="link-success text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="col-md-7 offset-md-4">
                                <div class="form-check">
                                    <input 
                                        class="form-check-input"
                                        type="checkbox" 
                                        name="remember" 
                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </section>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="mb-4">初めての方</h3>
                        <p>ユーザー登録をすると、あなたが主催するイベントページをPromoで公開できる「イベント投稿機能」がお使いいただけるようになります。
                            ぜひユーザー登録をして、あなたのイベントの告知にPromoをお役立てください。</p>
                        
                        <a class="btn btn-success" href="{{ route('register') }}">新規ユーザー登録</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
