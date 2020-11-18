@extends('layouts.main')

@section('content')
<div class="container">
    <a href="{{route('setting_schedule.edit',['setting_schedule'=>$setting_schedule->id])}}">編集</a>
    <form action="{{route('setting_schedule.destroy',['setting_schedule'=>$setting_schedule->id])}}" method="post">
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
            <td>{{$setting_schedule->teaching_material->title}}</td>
            <td>{{$setting_schedule->to_learn}}</td>
            <td>{{$setting_schedule->first_day}}</td>
            <td>{{$setting_schedule->last_day}}</td>
            <td>{{$setting_schedule->first_page}}</td>
            <td>{{$setting_schedule->last_page}}</td>
        </tbody>
    </table>
    @if(!empty($schedule))
        <a href="{{route('schedule.edit',['schedule'=>$schedule->setting_schedule_id])}}">スケージュール編集</a>
    @endif

    @if(empty($schedule))
        <a href="{{route('schedule.generation_schedule',['setting_schedule'=>$setting_schedule->id])}}">スケジュール作成</a>
    @endif
    <a href="{{route('for_goal.show',['for_goal'=>$setting_schedule->for_goal_id])}}">戻る</a>
</div>
@endsection
