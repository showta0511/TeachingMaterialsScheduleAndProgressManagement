@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div class="container content-card mt-5">
                <h1 class="content-title mt-3">目標達成に必要な要素
                    <a href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample" class="mb-3" style="width: 20px; height:18px; padding:0 0 9px 6px; box-shadow: none; margin-left:20px;">
                        <img style="width: 25px; height: 25px;" class="" src="/TeachingMaterialsScheduleAndProgressManagement/service/resources/images/レンチ＆ドライバーの設定アイコン.png" alt="">
                            <li style="list-style: none; float:right;" id="collapseExample" class="setting_li_1">
                                <a href="{{route('for_goal.del_conform',['del'=>$for_goal->id])}}" class="btn delete-btn btn-link mt-1">削除</a>
                            </li>
                            <li style="list-style: none; float:right;" id="collapseExample" class="setting_li_2">
                                <a href="{{route('for_goal.edit',['edit'=>$for_goal->id])}}" class="btn edit-btn btn-link mt-1">編集</a>
                            </li>
                    </a>
                </h1>

                <div class="card-body ">
                    <h1>{{$for_goal->title}}


                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="width: 200px; border-color: #30c8d6;">
                            <ul class="" style="margin:0 auto; list-style: none;">
                                <li style="list-style: none; float:left;">
                                    <a href="{{route('for_goal.edit',['edit'=>$for_goal->id])}}" class="btn edit-btn btn-link">編集</a>
                                </li>
                                <li style="list-style: none; float:left;" class="ml-3">
                                    <a href="{{route('for_goal.del_conform',['del'=>$for_goal->id])}}" class="btn delete-btn btn-link">削除</a>
                                </li>
                            </ul>
                        </div>

                    </h1>
                </div>
            </div>
        </div>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        @if(empty($setting_schedule))
                        <th><a class="btn btn-primary title-btn" href="{{route('setting_schedule.create',['for_goal_id'=>$for_goal->id])}}">スケジュールを作る</a></th>
                        @else
                        <th><a style="border-color: none; padding:3;" class="btn btn-primary title-btn" href="{{route('setting_schedule.show',['setting_schedule'=>$setting_schedule->id])}}">設定内容</a></th>
                        @endif
                    </tr>
                    <th><a style="border-color: none; padding:3;" btn edit-btn btn-link mb-3 collapsed href="{{route('setting_schedule.show',['setting_schedule'=>$setting_schedule->id])}}">設定内容</a></th>
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
                        <td>{{$schedule->setting_schedule_id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>{{$schedules->links()}}</p>
        </div>
    </div>
</div>
@endsection
