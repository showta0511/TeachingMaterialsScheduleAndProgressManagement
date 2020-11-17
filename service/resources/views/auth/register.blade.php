@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5" style="height:700px;">
            <div class="card" style="width: 38rem; height:700px; margin:0 auto;">
                <div class="card-header">{{ __('新規会員登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col div-label mt-2">
                                <label for="name">{{ __('名前') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin: 0 auto;">
                                <input id="name" type="text" style="box-shadow: none !important; width:380px;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col div-label mt-4">
                                <label for="email">{{ __('メール') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin: 0 auto;">
                                <input id="email" type="email" style="box-shadow: none !important; width:380px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col div-label mt-4">
                                <label for="password">{{ __('パスワード') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin: 0 auto;">
                                <input id="password" style="box-shadow: none !important; width:380px;" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col div-label mt-4">
                                <label for="password-confirm">{{ __('確認用パスワード') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin: 0 auto;">
                                <input id="password-confirm" style="box-shadow: none !important; width:380px;" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form">
                            <div class="col" style="width:400px; margin: 0 auto; ">
                                <br>
                                <input type="submit" value="会員登録" class="btn edit-btn btn-link mt-5 mb-1" style="width: 380px; margin: 0 auto;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
