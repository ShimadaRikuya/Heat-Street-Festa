<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">イベントを探す</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{url ('event/all')}}">全て</a></li>
                                <li><a class="dropdown-item" href="">パーティー</a></li>
                                <li><a class="dropdown-item" href="">ミュージック</a></li>
                                <li><a class="dropdown-item" href="">グルメ</a></li>
                                <li><a class="dropdown-item" href="">ゲーム</a></li>
                                <li><a class="dropdown-item" href="">スポーツ</a></li>
                                <li><a class="dropdown-item" href="">ビジネス</a></li>
                            </ul>
                        </li>

                        <form class="d-flex" role="search">
                            <input type="search" class="form-control me-2" placeholder="検索..." aria-label="検索...">
                            <button type="submit" class="btn btn-outline-success flex-shrink-0">検索</button>
                        </form>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="footer_inner">
                        <h3 class="d-flex align-items-center justify-content-center">
                            フォローして情報をGET!
                        </h3>

                        <div class="d-flex align-items-center justify-content-center sns_btn">sns</div>

                        <div class="container">
                            <div class="row row-cols-7">
                                <a class="col link-secondary" href="#" style="text-decoration: none;">お問い合わせ</a>
                                <a class="col link-secondary" href="#" style="text-decoration: none;">運営会社</a>
                                <a class="col link-secondary" href="#" style="text-decoration: none;">利用規約</a>
                                <a class="col link-secondary" href="#" style="text-decoration: none;">個人情報の保護について</a>
                                <a class="col link-secondary" href="#" style="text-decoration: none;">Promoについて</a>
                                <a class="col link-secondary" href="#" style="text-decoration: none;">あサイトに関するFAQ</a>
                                <a class="col link-secondary" href="#" style="text-decoration: none;">お知らせ</a>
                            </div>
                        </div>

                        <p class="d-flex align-items-center justify-content-center copylight">©Promo</p>

                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{-- JavaScript 
        swiper.js
    --}}
    <script src="{{ mix('js/swiper.js') }}"></script>

</body>
</html>
