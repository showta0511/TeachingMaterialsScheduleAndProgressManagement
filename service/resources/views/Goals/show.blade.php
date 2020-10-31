@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <strong>なりたい自分</strong>
                <h1>{{$goal->title}}</h1>
            </div>
            <div class="col-sm-1">
                <a href="{{route('goal.edit',['edit'=>$goal->id])}}">編集</a>
            </div>
            <div class="col-sm-1">
                <a href="{{route('goal.del_conform',['del'=>$goal->id])}}">削除</a>
            </div>
        </div>
        <div　class="container">
            <span><strong>動機</strong></span>
            <h3>{{$goal->motive}}</h3>
        </div>
    </div>
</div>
@endsection
