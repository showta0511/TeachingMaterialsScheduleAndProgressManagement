<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '理想追求と教材スケジュール管理') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <!-- style CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    <!-- style CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/add.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<div id="contents">

    <body>
        <div id="header">
            <header class="header sb-slide">
                <div>
                    <div class="header-navs">
                        <div style="height: 100%;">


                            <nav class="header-navs__left">
                                <div class="header-div mr-5" style="background-color: #2b546a; color: #fff;">
                                    <a class="header-navs_logo pl-1" href="{{ route('goal.index') }}">
                                        学習スケジュールと理想追求
                                    </a>

                                </div>
                                <a href="{{ route('goal.index') }}" style="text-decoration: none;" class="" target="_blank">ホーム</a>
                                <a href="/slides" style="text-decoration: none;" class="" target="_blank">今日の内容</a>
                                <a href="/rankings?period=day" style="text-decoration: none;" class="" target="_self">カレンダー</a>
                                <a href="{{route('teaching_material.index')}}" style="text-decoration: none;" class="" target="_self">教材一覧</a>
                            </nav>
                            <span>
                                <div class="header-navs__right">
                                    <div style="position: relative; color: rgb(43, 84, 106);">
                                        <div data-radium="true" style="cursor: pointer; transition: background-color 0.2s ease 0s; padding: 0px 15px;">
                                            <div id="my-menu-trigger" data-radium="true" style="display: flex; align-items: center; margin-bottom: 5px;">
                                                <div data-radium="true">
                                                    <ul class="navbar-nav ml-auto">
                                                        <li class="nav-item dropdown">
                                                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{Auth::user()->name}}
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                <a class="dropdown-item item" href="＃" onclick="event.preventDefault();document.getElementById('logout-form').submit();">プロフィール</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item item-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        </span>

                    </div>
                </div>
        </div>
        </header>

</div>
<div id="app">
    <main class="py-4">
        <br><br>


        @if(Auth::user())
        @yield('content')
        @else
        ログインしてください
        <a href="{{route('login')}}">ログイン</a>
        @endif
    </main>
</div>
</body>
</div>


</html>
