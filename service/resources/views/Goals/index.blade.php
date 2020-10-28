@extends('layouts.main')

@section('content')
<div class="container"id="hello">
    <div class="row">
    @if(empty($goal))
        <div class="col-lg-8 col-lg-offset-2 centered">
            <h1>ようこそ！</h1>
            <p>さっそく理想の入力しよう！</p>
            <a href="{{route('goal.create')}}">作成する</a>
        </div>
    @endif
    @if(!empty($goal))
        <div　class="container">
            <span><strong><a href="{{route('goal.show',['goal'=>$goal->id])}}">なりたい自分</a></strong></span>
            <h1>{{$goal->title}}</h1>
        </div>
        <div　class="container">
            <div　class="container">
                <h3>理想に近づく為に必要な要素はなにかな？</h3>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <br>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    作成する
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                    <p>好きなだけ作成しよう</p>
                        <form action="{{route('for_goal.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="goal_id" value="{{$goal->id}}">
                            <label for="title">必要な要素</label>
                            <input id="title" name="title" type="text" value="{{old('title')}}">
                            <input type="submit" value="作成する">
                        </form>
                    </div>
                </div>
                <div>
                @if(!empty($for_goals))
                    @foreach($for_goals as $for_goal)
                        <h2>{{$for_goal->title}}</h2>
                        <a href="{{route('for_goal.show',['for_goal'=>$for_goal->id])}}">・・・</a>
                    @endforeach
                @endif
            </div>
            </div>
        </div>
        @endif
        </div>
    </div>
</div>
@endsection
