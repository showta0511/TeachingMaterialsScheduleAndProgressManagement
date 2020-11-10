@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <strong>なりたい自分</strong>
                <h1>{{$for_goal->title}}</h1>
            </div>
            <ul class="li-link" style="list-style: none; padding-left:520px;">
                    <li style="list-style: none;">
                        <a href="{{route('for_goal.edit',['edit'=>$for_goal->id])}}" class="btn edit-btn btn-link">編集</a>
                    </li>
                    <li style="list-style: none;" class="ml-3">
                        <a href="{{route('for_goal.del_conform',['del'=>$for_goal->id])}}" class="btn delete-btn btn-link" >削除</a>
                    </li>
                </ul>
        </div>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>目標達成に必要な要素</th>
                        @if(empty($setting_schedule))
                            <th><a class="btn btn-primary title-btn" href="{{route('setting_schedule.create',['for_goal_id'=>$for_goal->id])}}">作成する</a></th>
                        @else
                            <th><a style="border-color: none; padding:3;" class="btn btn-primary title-btn" href="{{route('setting_schedule.show',['setting_schedule'=>$setting_schedule->id])}}">設定内容</a></th>

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
