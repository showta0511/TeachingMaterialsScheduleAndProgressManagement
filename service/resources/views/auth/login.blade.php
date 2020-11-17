@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5" style="height:700px;">
            <div class="card mt-3" style="width: 38rem; height:500px; margin:0 auto;">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col div-label mt-3">
                                <label for="email">{{ __('メール') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin: 0 auto;">
                                <input id="email" type="email" style="box-shadow: none !important; width:380px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-4 col-form-label text-md-right"></div> -->
                            <div class="col div-label mt-5">
                                <label for="password">{{ __('パスワード') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin: 0 auto;">
                                <input id="password" type="password" style="box-shadow: none !important; width:380px;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form">
                            <div class="col" style="width:400px; margin: 0 auto; ">
                                <br>
                                <input type="submit" value="ログイン" class="btn edit-btn btn-link mt-3 mb-1" style="width: 380px; margin: 0 auto;">

                                <br>
                                <div class="form-check mt-2" style="padding:0 0 0 255px;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('メールを保存する') }}
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                <div class="col" style="padding:0 0 0 185px;">
                                    <a class="link" href="{{ route('password.request') }}">
                                        パスワードを忘れましたか？
                                    </a>
                                </div>

                                @endif
                                <a class="btn edit-btn btn-link mt-3" style="width:380px; margin: 0 auto;" href="{{route('login.guest')}}">ゲストログイン</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
