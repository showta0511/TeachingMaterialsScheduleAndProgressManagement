@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('teaching_material.update',['teaching_material'=>$form->id])}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control is-invalid" id="title" name="title" value="{{$form->title}}">
                    @if($errors->has('title'))
                    @foreach($errors->get('title') as $message)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="content">内容</label>
                    <textarea class="form-control is-invalid" id="content" rows="3" name="content" >{{$form->content}}</textarea>

                    @if($errors->has('content'))
                        <span class="invalid-feedback">
                        {{$errors->first('content')}}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="page">ページ数</label>
                    <input class="form-control is-invalid" id="page" rows="3" name="first_page" value="{{$form->first_page}}">〜
                    <input class="form-control is-invalid" id="page" rows="3" name="last_page" value="{{$form->last_page}}">

                    @if($errors->has('first_page'))
                        <span class="invalid-feedback">
                        {{$errors->first('first_page')}}
                        </span>
                    @endif
                    @if($errors->has('last_page'))
                        <span class="invalid-feedback">
                        {{$errors->first('last_page')}}
                        </span>
                    @endif
                </div>
                <input type="submit" class="btn edit-btn btn-link">
        </form>
    </div>
</div>
@endsection
