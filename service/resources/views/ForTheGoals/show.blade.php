@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <strong>なりたい自分</strong>
                <h1>{{$for_goal->title}}</h1>
            </div>
            <div class="col-sm-1">
                <a href="{{route('for_goal.edit',['edit'=>$for_goal->id])}}">編集</a>
            </div>
            <div class="col-sm-1">
                <a href="{{route('for_goal.del_conform',['del'=>$for_goal->id])}}">削除</a>
            </div>
        </div>
    </div>
</div>
@endsection
