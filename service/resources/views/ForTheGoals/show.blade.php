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

        <div class="row">
            <div id="" class="container content-card mt-5 mb-5 p-4  collapse show" style="">
                @if(empty($setting_schedule))
                <h2 font-size="[object Object]" class="content-title gGWJOW mb-4">スケジュール</h2>
                <a class="btn btn-primary title-btn" href="{{route('setting_schedule.create',['for_goal_id'=>$for_goal->id])}}">スケジュールを作る</a>
                @else

                <h2 font-size="[object Object]" class="content-title gGWJOW mb-4">
                    <a href="{{route('setting_schedule.show',['setting_schedule'=>$setting_schedule->id])}}" class="schedule-title">スケジュール</a>
                </h2>

                @endif

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th>日程</th>
                            <th>ページ数</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <th scope="row">{{$schedule->date}}</th>
                            <td>{{$schedule->first_page}}〜{{$schedule->last_page}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mb-3">
                    @if ($schedules->hasPages())
                    <nav>
                        <ul class="pagination justify-content-center pagination-lg">
                            {{-- Previous Page Link --}}@cannot('update', Model::class)
                            @endcannot
                            @if ($schedules->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&laquo;</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link text-success" style="color: #30c8d6 !important; box-shadow:none;" href="{{ $schedules->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                            </li>
                            @endif
                            {{-- Pagination Elements --}}
                            @foreach($schedules as $schedule)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($schedule))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $schedule }}</span></li>
                            @endif
                            {{-- Array Of Links --}}
                            @if (is_array($schedule))
                            @foreach ($schedule as $page => $url)
                            @if ($page == $schedule->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link bg-success border-success">{{ $page }}</span></li>
                            @else
                            <li class="page-item"><a class="page-link text-success" style="color: #30c8d6 !important; box-shadow:none;" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($schedules->hasMorePages())
                            <li class="page-item">
                                <a class="page-link text-success" style="color: #30c8d6 !important; box-shadow:none;" href="{{ $schedules->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                            </li>
                            @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&raquo;</span>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    @endif
                </div>
            </div>
        </div>


    </div>
</div>
</div>
@endsection
