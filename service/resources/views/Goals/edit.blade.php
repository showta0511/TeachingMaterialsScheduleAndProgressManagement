@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('goal.update',['update'=>$form->id])}}" method="post">
                @csrf
                @method("put")
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="form-group">
                    <label for="title">なりたい自分</label>
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
                    <label for="motive">なぜなりたい？</label>
                    <textarea class="form-control is-invalid" id="motive" rows="3" name="motive" >{{$form->motive}}</textarea>

                    @if($errors->has('motive'))
                        <span class="invalid-feedback">
                        {{$errors->first('motive')}}
                        </span>
                    @endif
                </div>
                <input type="submit" class="btn edit-btn btn-link">
        </form>
    </div>
</div>
@endsection
