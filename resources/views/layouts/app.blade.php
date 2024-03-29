<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://kit.fontawesome.com/11c5c25076.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @yield('navbar')

        <!-- フラッシュメッセージ -->
        @if (session('msg_success'))
            <div class="alert alert-success">
                {{ session('msg_success') }}
            </div>
        @elseif (session('msg_danger'))
            <div class="alert alert-success">
                {{ session('msg_danger') }}
            </div>
        @endif
        
        <main class="py-4">
            @yield('content')
        </main>

        @yield('footer')
    </div>

    <!-- swiper.js -->
    <script src="path-to/swiper-bundle.min.js"></script>
    <script src="{{ mix('js/swiper.js') }}"></script>
    <!-- new_member.js -->
    <script src="{{ mix('js/new_member.js') }}"></script>
    <!-- preview.js -->
    <script src="{{ mix('js/preview.js') }}"></script>

</body>
</html>
