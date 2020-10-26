@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8　container">
            <div class="">
                <h1>使い方</h1>
            </div>
            <div class="row">
                <div class="col-sm">
                    <p>教材の進捗を管理しよう</p>
                    <p>目標を設定して自分を理想に近づけよう！</p>
                </div>
            </div>
            <div class="row">
                まずは目標を設定
            </div>
            <p><a href="{{route('register')}}">登録</a></p>
            <p><a href="{{route('goal.index')}}">使う</a></p>
            <section>
            </section>



        </div>
    </div>
</div>
@endsection
