<?php
    $schedule=$schedules[1];
    $for_goal_id=$schedule->for_goal_id;
    $setting_schedule_id=$schedule->setting_schedule_id;
?>
@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{var_dump($errors)}}
        @if(!empty($errors))
        @foreach($errors as $error)
        {{ $error }}
        @endforeach
        @endif
        <h1>スケジュール</h1>
        <div class="container">
            <a href="{{route('setting_schedule.show',['setting_schedule'=>$setting_schedule_id])}}">戻る</a>
            <p>作成</p>
            <form action="{{route('schedule.store',['setting_schedule_id'=>$setting_schedule_id])}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" name="for_goal_id" value="{{$for_goal_id}}">
                <input type="hidden" name="setting_schedule_id" value="{{$setting_schedule_id}}">
                <br>
                <input size="10" type="date" value="{{old('date')}}" name="date"><br>
                <label for="page">ページ</label><br>
                <input id="page" class="first_page" name="first_page" size="10" type="number" value="{{old('first_page')}}">~
                <input id="last_page" class="last_page" name="last_page" size="10" type="number" value="{{old('last_page')}}">
                <input type="submit"　value="追加">
            </form>

            <form action="{{route('schedule.all_destroy',['setting_schedule'=>$setting_schedule_id])}}" method="post">
                @csrf
                @method("delete")
                <input type="submit" value="全て削除">
            </form>
            <br>
            @foreach($schedules as $schedule)
            <form action="{{route('schedule.update',['schedule'=>$schedule->id])}}" method="post">
                @csrf
                @method("put")
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" name="for_goal_id" value="{{$schedule->for_goal_id}}">
                <input type="hidden" name="setting_schedule_id" value="{{$schedule->setting_schedule_id}}">
                <label for="date">日程</label><br>
                <input size="10" type="date" value="{{$schedule->date}}" name="date"><br>
                <label for="page">ページ</label><br>
                <input id="page" class="first_page" name="first_page" size="10" type="number" value="{{$schedule->first_page}}">~
                <input id="last_page" class="last_page" name="last_page" size="10" type="number" value="{{$schedule->last_page}}">
                <input type="submit"　value="編集">
            </form>

            <form action="{{route('schedule.destroy',['schedule'=>$schedule->id])}}" method="post">
                @csrf
                @method("delete")
                <input type="submit" value="削除">
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
