@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>ページ数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{$teaching_material->title}}
                        </td>
                        <td>{{$teaching_material->content}}</td>
                        <td>{{$teaching_material->first_page}}ページ〜{{$teaching_material->last_page}}ページ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <ul class="li-link" style="list-style: none; padding-left:420px;">
            <li style="list-style: none;">
                <a href="{{route('teaching_material.edit',['teaching_material'=>$teaching_material->id])}}" class="btn edit-btn btn-link">編集</a>
            </li>
            <li style="list-style: none;" class="ml-3">
                <a href="{{route('teaching_material.del_conform',['teaching_material'=>$teaching_material->id])}}" class="btn delete-btn btn-link">削除</a>
            </li>
        </ul>
    </div>
</div>
</div>
@endsection
