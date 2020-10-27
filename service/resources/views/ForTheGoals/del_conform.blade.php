@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div>
                <strong>なりたい自分</strong>
                <h2>{{$for_goal->title}}</h2>
            </div>
        </div>
        <div>
            <section><br>
                <h1>こちらの目標を本当に削除してよろしいですか？</h1>
                <p>
                削除すると選択している必要な要素に紐付いたや教材スケジュールなどが全て削除されます。
                </p>
                <form action="{{route('for_goal.destroy',['del'=>$for_goal->id])}}" method="post">
                    @csrf
                    @method("delete")
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn btn-link" type="submit" value="削除する">
                </form>
            </section>
        </div>
    </div>
</div>
@endsection
