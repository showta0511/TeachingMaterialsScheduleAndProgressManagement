@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div>
                <strong>なりたい自分</strong>
                <h2>{{$goal->title}}</h2>
            </div>
        </div>
        <div>
            <span><strong>動機</strong></span>
            <h3>{{$goal->motive}}</h3>
        </div>
        <div>
            <section><br>
                <h1>こちらの目標を本当に削除してよろしいですか？</h1>
                <p>
                削除すると目標に紐付いた必要な要素や教材スケジュールなどが全て削除されます。
                </p>
                <form action="{{route('goal.destroy',['del'=>$goal->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn btn-link" type="submit" value="削除する">
                </form>
            </section>
        </div>
    </div>
</div>
@endsection
