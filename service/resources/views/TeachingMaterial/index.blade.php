@extends('layouts.main')

@section('content')
<div class="container"id="hello">
    <div class="row">
        <h1>教材一覧</h1>
        <div class="col-lg-8 col-lg-offset-2 centered">
            <a href="{{route('teaching_material.create')}}">登録する</a>
        </div>

    @if(!empty($teaching_materials))
        <div　class="container">
            <table>
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>ページ数</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($teaching_materials as $teaching_material)
                    <tr>
                        <td><a href="{{route('teaching_material.show',['teaching_material'=>$teaching_material->id])}}">{{$teaching_material->title}}</a></td>
                        <td>{{$teaching_material->content}}</td>
                        <td>{{$teaching_material->first_page}}ページ〜{{$teaching_material->last_page}}ページ</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    </div>
</div>
@endsection
