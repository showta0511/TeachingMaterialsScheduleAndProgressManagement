@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>ページ数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$teaching_material->title}}</td>
                        <td>{{$teaching_material->content}}</td>
                        <td>{{$teaching_material->first_page}}ページ〜{{$teaching_material->last_page}}ページ</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-sm-1">
                <a href="{{route('teaching_material.edit',['teaching_material'=>$teaching_material->id])}}">編集</a>
            </div>
            <div class="col-sm-1">
                <a href="{{route('teaching_material.del_conform',['teaching_material'=>$teaching_material->id])}}">削除</a>
            </div>
        </div>
    </div>
</div>
@endsection
