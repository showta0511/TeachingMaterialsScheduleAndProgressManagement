@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <strong>なりたい自分</strong>
                <h1>{{$for_goal->title}}</h1>
            </div>
            <div class="col-sm-1">
                <a href="{{route('for_goal.edit',['edit'=>$for_goal->id])}}">編集</a>
            </div>
            <div class="col-sm-1">
                <a href="{{route('for_goal.del_conform',['del'=>$for_goal->id])}}">削除</a>
            </div>
        </div>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>目標達成に必要な要素</th>
                        @if(empty($setting_schedule))
                            <th><a href="{{route('setting_schedule.create',['for_goal_id'=>$for_goal->id])}}">作成する</a></th>
                        @else
                            <th><a href="{{route('setting_schedule.show',['setting_schedule'=>$setting_schedule->id])}}">設定内容</a></th>

                        @endif
                    </tr>
                    <tr>
                        <th>日程</th>
                        <th>ページ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td>{{$schedule->date}}</td>
                            <td>{{$schedule->first_page}}</td>
                            <td>{{$schedule->last_page}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
