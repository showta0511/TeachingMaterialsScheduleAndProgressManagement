<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

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

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">


</head>

<body style="background-color: #f9fbfe; margin:0;">
    <div id="header">
        <header class="header sb-slide">
            <div>
                <div class="header-navs">
                    <div style="height: 100%;">


                        <nav class="header-navs__left">
                            <div class="header-div" style="background-color: #2b546a; color: #fff; width: 55px;">
                                <a class="header-navs_logo" href="{{ route('goal.index') }}" style="font-size: 0.82rem; width: 55px;">
                                    <img style="width: 52px; height: 52px;" class="header-logo" src="/TeachingMaterialsScheduleAndProgressManagement/service/resources/images/ヘッダーロゴ.png" alt="">
                                </a>

                            </div>
                            @if(Auth::user())
                            <a href="{{ route('goal.index') }}" style="text-decoration: none; font-size: 0.82rem;" class="" target="_blank">ホーム</a>
                            <!-- <a href="#" style="text-decoration: none; font-size: 0.82rem;" class="" target="_blank">今日の内容</a>
                            <a href="#" style="text-decoration: none; font-size: 0.82rem;" class="" target="_self">カレンダー</a> -->
                            <a href="{{route('teaching_material.index')}}" style="text-decoration: none; font-size: 0.82rem; margin:0px;" class="" target="_self">教材一覧</a>
                            @endif
                        </nav>
                        <span>
                            <div class="header-navs__right">
                                <div style="position: relative; color: rgb(43, 84, 106);">
                                    <div class="header-drop" data-radium="true">
                                        <div id="my-menu-trigger" data-radium="true" style="display: flex; align-items: center; margin-bottom: 5px;">
                                            <div data-radium="true">
                                                <ul class="navbar-nav ml-auto">
                                                    <li class="nav-item dropdown">
                                                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 0.82rem;">
                                                            @if(Auth::user())
                                                            {{Auth::user()->name}}
                                                            @else
                                                            ログインしていません
                                                            @endif
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            @if(Auth::user())
                                                            <!-- <a class="dropdown-item item" href="＃" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="font-size: 0.82rem;">
                                                                プロフィール
                                                            </a> -->
                                                            <div class="dropdown-divider">
                                                            </div>
                                                            <a class="dropdown-item item-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="font-size: 0.82rem;">
                                                                {{ __('ログアウト') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                            @else
                                                            <a class="dropdown-item item" href="{{ route('login') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="font-size: 0.82rem;">
                                                            ログイン
                                                            </a>
                                                            <a class="dropdown-item item" href="{{ route('register') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="font-size: 0.82rem;">
                                                                新規会員登録
                                                            </a>
                                                            @endif
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

    <div id="app">
        <div class="pt-5 mt-3">
            @if(Auth::user())
            @yield('content')
            @else
            ログインしてください
            <a href="{{route('login')}}">ログイン</a>
            @endif
        </div>
    </div>
    </div>
</body>
</html>
