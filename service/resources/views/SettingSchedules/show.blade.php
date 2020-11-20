@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container content-card p-3 pb-5 mt-5">
        <h1 class="content-title pt-3">スケジュール内容</h1>
        <div class="card-body">
            <h3 class="mt-3">設定内容</h2>
                @if(!empty($schedule))
                <a href="{{route('schedule.edit',['schedule'=>$schedule->setting_schedule_id])}}" 　class="btn edit-btn btn-link mt-1 mb-3 mr-5" style="width: 200px;">スケージュール編集</a>
                @endif

                @if(empty($schedule))
                <a href="{{route('schedule.generation_schedule',['setting_schedule'=>$setting_schedule->id])}}" 　style="width: 200px;" class="btn edit-btn btn-link mt-1 mb-3 mr-5" >スケジュール作成</a>
                @endif
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>教材</th>
                            <th>学びたい、習得したい事</th>
                            <th>開始日</th>
                            <th>ページ数</th>
                            <th>一日の学習ページ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$teaching_material->title}}</td>
                            <td>{{$setting_schedule->to_learn}}</td>
                            <td>{{$setting_schedule->first_day}}</td>
                            <td>{{$setting_schedule->first_page}}~{{$setting_schedule->last_page}}</td>
                            <td>{{$setting_schedule->daily_learning_page}}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn edit-btn btn-link mt-1 mr-5" style="width:150px;" href="{{route('setting_schedule.edit',['setting_schedule'=>$setting_schedule->id])}}">設定編集</a>
                <form action="{{route('setting_schedule.destroy',['setting_schedule'=>$setting_schedule->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" style="width: 150px;" class="btn delete-btn btn-link mt-1" value="設定を削除">
                </form>
        </div>
    </div>
</div>
@endsection
