@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-3" style="width: 30rem; height:500px; margin:0 auto;">
            <div class="card-header">{{ __('Login') }}</div>
            <div class="card-body" style="margin: 0 auto;">
                <form action="{{route('teaching_material.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <div class="">
                        <label for="title">タイトル</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <input id="title" type="text" style="box-shadow: none !important; width:380px; margin: 0;" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="motive">内容</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <textarea type="text" id="motive" style="box-shadow: none !important; width:380px; margin: 0;" class="form-control @error('motive') is-invalid @enderror" name="motive" value="{{ old('motive') }}" required autocomplete="motive" autofocus name="motive">{{old('motive')}}</textarea>
                        @error('motive')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="page">ページ数</label>
                    </div>
                    <div class="mb-9 form-group" style="width:380; margin: 0 auto; padding:0 auto;">
                        <input type="text" style="width: 150px; margin:0px; display: inline;" class="form-control @error('page') is-invalid @enderror" name="first_page" value="{{old('first_page')}}">〜<input type="text" style="width: 150px; margin:0px; display: inline;" class="form-control @error('page') is-invalid @enderror" name="last_page" value="{{old('last_page')}}">

                    </div>
                        <input type="submit" class="btn edit-btn btn-link mt-5" style="width: 180px; margin: 100px " value="作成">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
