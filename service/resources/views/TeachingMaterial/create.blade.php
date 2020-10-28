@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('teaching_material.store')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <div class="mb-3">
                <label for="title">タイトル</label>
            </div>
            <div class="mb-9 form-group">
                <input type="text" id="title" class="is-invalid" name="title" value="{{old('title')}}">
                @if($errors->has('title'))
                    @foreach($errors->get('title') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="mb-3">
                <label for="content">内容</label>
            </div>
            <div class="mb-9 form-group">
                <textarea type="text" id="content" class="is-invalid" name="content" >{{old('content')}}</textarea>
                @if($errors->has('content'))
                    @foreach($errors->get('content') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="mb-3">
                <label for="page">ページ数</label>
            </div>
            <div class="mb-9">
                <input type="text" id="page" class="is-invalid" name="first_page" value="{{old('first_page')}}">
                @if($errors->has('first_page'))
                @foreach($errors->get('first_page') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
                @endif
                ~
                <input type="text" id="page" class="is-invalid" name="last_page" value="{{old('last_page')}}">
                @if($errors->has('last_page'))
                @foreach($errors->get('last_page') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
                @endif
            </div>
            <input type="submit" value="作成">
        </form>
    </div>
</div>
@endsection
