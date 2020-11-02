@extends('layouts.main')

@section('content')
<div class="container">
    <a href="{{route('setting_schedule.edit',['setting_schedule'=>$schedule_content->id])}}">編集</a>
    <form action="{{route('setting_schedule.destroy',['setting_schedule'=>$schedule_content->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <input type="submit" value="設定を削除">
    </form>
    <table>
        <thead>
            <th>教材</th>
            <th>学びたい事</th>
            <th>開始日</th>
            <th>終了日</th>
            <th>開始ページ</th>
            <th>終了ページ</th>
        </thead>
        <tbody>
            <td>{{$schedule_content->teaching_material->title}}</td>
            <td>{{$schedule_content->to_learn}}</td>
            <td>{{$schedule_content->first_day}}</td>
            <td>{{$schedule_content->last_day}}</td>
            <td>{{$schedule_content->first_page}}</td>
            <td>{{$schedule_content->last_page}}</td>
        </tbody>
    </table>
</div>
@endsection
