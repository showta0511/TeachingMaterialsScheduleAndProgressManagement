@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <table class="">
                <tr>
                    <th>教材名</th>
                    <td>{{$teaching_material->title}}</td>
                </tr>
                <tr>
                    <th>内容</th>
                    <td>{{$teaching_material->content}}</td>
                </tr>
                <tr>
                    <th>ページ数</th>
                    <td>{{$teaching_material->first_page}}ページ~{{$teaching_material->last_page}}ページ</td>
                </tr>
            </table>
        </div>
        <div>
            <div>
                <h1>こちらの教材を本当に削除してよろしいですか？</h1>
                <p>
                削除するとこの教材を使用している教材スケジュールは全て削除されます。
                </p>
                <form action="{{route('teaching_material.destroy',['teaching_material'=>$teaching_material->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn btn-link" type="submit" value="削除する">
                </form>

        </div>
    </div>
@endsection
