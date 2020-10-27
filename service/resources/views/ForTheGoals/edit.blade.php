@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('for_goal.update',['update'=>$form->id])}}" method="post">
                @csrf
                @method("put")
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="form-group">
                    <label for="title">理想に必要な要素</label>
                    <input type="text" class="form-control is-invalid" id="title" name="title" value="{{$form->title}}">
                    @if($errors->has('title'))
                    @foreach($errors->get('title') as $message)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @endforeach
                    @endif
                </div>
                <input type="submit" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
