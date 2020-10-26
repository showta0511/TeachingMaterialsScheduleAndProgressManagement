@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        @if(empty($goal))
            <div class="col-md-8">
                <h1>ようこそ！</h1>
                <p>さっそく理想の入力しよう！</p>
                <a href="{{route('goal.create')}}">作成する</a>
            </div>
        @endif
        @if(!empty($goal))
            <div　class="container">
                <span><strong>なりたい自分</strong></span>
                <h1>{{$goal->title}}</h1>
            </div>
            <div　class="container">
                <span>
                    @if(!empty($for_the_goals))
                        @foreach($for_the_goals as $for_the_goal)
                            <h2>{{$for_the_goal}}</h2>
                        @endforeach
                    @endif
                </span>
                <div　class="container">
                    <h3>理想に近づく為に必要な要素はなにかな？</h3>
                    <p>好きなだけ作成しよう</p>
                    <form action="#">
                        <label for="#">必要な要素</label>
                        <input id="#" type="text">
                        <input type="submit" value="作成する">
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
