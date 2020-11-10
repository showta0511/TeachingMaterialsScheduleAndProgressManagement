@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">

                <strong>できるようにならないといけない事</strong>
            </div>
            <div class="card-body ">

                <h1>{{$goal->title}}</h1>
                <p class="card-text">動機：{{$goal->motive}}</p>
            </div>
                <ul class="li-link" style="list-style: none; padding-left:420px;">
                    <li style="list-style: none;">
                        <a href="{{route('goal.edit',['edit'=>$goal->id])}}" class="btn edit-btn btn-link">編集</a>
                    </li>
                    <li style="list-style: none;" class="ml-3">
                        <a href="{{route('goal.del_conform',['del'=>$goal->id])}}" class="btn delete-btn btn-link" >削除</a>
                    </li>
                </ul>
        </div>

    </div>
</div>
@endsection
