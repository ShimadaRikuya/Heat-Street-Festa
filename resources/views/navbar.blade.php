@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Promo') }}
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
                            <li><a class="dropdown-item" href="{{ route('events.index') }}">全て</a></li>
                            <li><a class="dropdown-item" href="{{ url('events', ['category_id' => 1, '$category' => 'パーティー']) }}">パーティー</a></li>
                            <li><a class="dropdown-item" href="{{ url('events', ['category_id' => 2, '$category' => 'ミュージック']) }}">ミュージック</a></li>
                            <li><a class="dropdown-item" href="{{ url('events', ['category_id' => 3, '$category' => 'グルメ']) }}">グルメ</a></li>
                            <li><a class="dropdown-item" href="{{ url('events', ['category_id' => 4, '$category' => 'ゲーム']) }}">ゲーム</a></li>
                            <li><a class="dropdown-item" href="{{ url('events', ['category_id' => 5, '$category' => 'スポーツ']) }}">スポーツ</a></li>
                            <li><a class="dropdown-item" href="{{ url('events', ['category_id' => 6, '$category' => 'ビジネス']) }}">ビジネス</a></li>
                        </ul>
                    </li>

                    <form class="d-flex" role="search" method="GET" action="{{ route('events.keyword') }}">
                        <input type="search" name="search"  value="{{ request('search') }}" class="form-control me-2" placeholder="キーワードを入力" aria-label="検索...">
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
                        <div class="ps-1 bd-highlight"><a class="btn" href="{{ route('team.select') }}" role="button">イベントを作成</a></div>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href={{ route('user.show', Auth::id()) }}>マイページ</a>
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
@endsection