@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8　container">
            <div class="">
                <h1>使い方</h1>
            </div>
            <div class="max">
                <div class="max">
                    <p>教材の進捗を管理しよう</p>
                    <p>目標を設定して自分を理想に近づけよう！</p>
                </div>
                <div>
                    <p><a href="{{route('register')}}">登録</a></p>
                    <p><a href="{{route('goal.index')}}">使う</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
