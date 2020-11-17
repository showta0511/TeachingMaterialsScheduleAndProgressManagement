@extends('layouts.main')

@section('content')
<div class="container content-card mt-5 p-5">
    <div class="row justify-content-center">
        <form action="{{route('goal.store')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <div class="form-group">
                <label for="title">なりたい自分</label>
                <input id="title" type="text" style="box-shadow: none !important; width:380px;" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="motive">なぜなりたい？</label>
                <textarea id="motive" type="text" style="box-shadow: none !important; width:380px;" class="form-control @error('motive') is-invalid @enderror" name="motive" required autocomplete="motive" autofocus>{{ old('motive') }}</textarea>
                @error('motive')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <input type="submit" class="btn edit-btn btn-link mt-3" style="width: 180px; margin-left:180px;" value="作成する">
        </form>
    </div>
</div>
@endsection
