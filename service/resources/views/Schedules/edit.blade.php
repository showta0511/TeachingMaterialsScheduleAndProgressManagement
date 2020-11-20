<?php
$schedule = $schedules[1];
$for_goal_id = $schedule->for_goal_id;
$setting_schedule_id = $schedule->setting_schedule_id;
?>
@extends('layouts.main')

@section('content')
<div class="container">
    <div>
        <h1>スケジュール</h1>
        <a style="display: inline; text-decoration:none; box-shadow:none !important;" href="{{route('setting_schedule.show',['setting_schedule'=>$setting_schedule_id])}}">戻る</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th><label for="date">日程</label></th>
                    <th><label for="page">ページ数</label></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if(!empty($errors))
                    @foreach($errors as $error)
                    <td>{{ $error }}</td>
                    @endforeach
                    @endif
                </tr>

                <tr>
                    <td>
                        <form action="{{route('schedule.store',['setting_schedule_id'=>$setting_schedule_id])}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <input type="hidden" name="for_goal_id" value="{{$for_goal_id}}">
                            <input type="hidden" name="setting_schedule_id" value="{{$setting_schedule_id}}">
                            <input size="10" type="date" value="{{old('date')}}" name="date">
                            <input id="page" class="first_page" name="first_page" size="10" type="number" value="{{old('first_page')}}">~
                            <input id="last_page" class="last_page" name="last_page" size="10" type="number" value="{{old('last_page')}}">
                            <input type="submit" class="btn edit-btn btn-link" style="width:108px;" 　value="新しく追加">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('schedule.all_destroy',['setting_schedule'=>$setting_schedule_id])}}" method="post">
                            @csrf
                            @method("delete")
                            <input type="submit" class="btn delete-btn btn-link mt-1" style="width:108px;" value="全て削除">
                        </form>
                    </td>
                </tr>
                @foreach($schedules as $schedule)
                <tr>
                    <td>
                        <form action="{{route('schedule.update',['schedule'=>$schedule->id])}}" method="post">
                            @csrf
                            @method("put")
                            <input type="hidden" name="user_id" value="{{Auth::id()}}" class="">
                            <input type="hidden" name="for_goal_id" value="{{$schedule->for_goal_id}}">
                            <input type="hidden" name="setting_schedule_id" value="{{$schedule->setting_schedule_id}}">
                            <span display="block">
                                <input size="10" type="date" value="{{$schedule->date}}" name="date">
                                <input id="page" class="first_page" name="first_page" size="10" type="number" value="{{$schedule->first_page}}">
                                ~
                                <input id="last_page" class="last_page" name="last_page" size="10" type="number" value="{{$schedule->last_page}}">
                            </span>
                            <input type="submit" class="btn edit-btn btn-link mt-1" 　value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('schedule.destroy',['schedule'=>$schedule->id])}}" method="post">
                            @csrf
                            @method("delete")
                            <input type="submit" class="btn delete-btn btn-link mt-1" value="削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
