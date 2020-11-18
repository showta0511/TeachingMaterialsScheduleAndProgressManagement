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
            <form action="{{route('schedule.generation_schedule_save',['setting_schedule'=>$setting_schedule])}}" method="post">
                @csrf
                <p>以下の内容で作成してよろしいですか？</p>
                <p>作成後編集可能です。</p>
                <input type="submit" value="はい">
                @for ($i=0; $i<=$learning_period; $i++)
                    <!-- 開始ページの計算処理を$pageに代入 -->
                    <?php $page = $first_page + ($daily_learning_page * $i) ?>
                    @if($first_page === $last_page)
                        <input type="hidden" name="user_id[]" value="{{Auth::id()}}">
                        <input type="hidden" name="for_goal_id[]" value="{{$for_goal_id}}">
                        <input type="hidden" name="setting_schedule_id[]" value="{{$setting_schedule}}">
                        <p>日程</p>
                        <!-- 日程の計算処理をdateに代入 -->
                        <?php $date = date('Y-m-d', strtotime($first_day . '+' . $i . 'day')); ?>
                        <input size="10" type="hidden" value="{{$date}}" name="date[]">
                        {{$date}}
                        <p>ページ</p>
                        <input id="page" class="first_page" name="first_page[]" size="10" type="hidden" value="{{$page}}">
                        {{$page}}
                        @endif
                    @if($page != $last_page)
                        <input type="hidden" name="user_id[]" value="{{Auth::id()}}">
                        <input type="hidden" name="for_goal_id[]" value="{{$for_goal_id}}">
                        <input type="hidden" name="setting_schedule_id[]" value="{{$setting_schedule}}">
                        <p>日程</p>
                        <!-- 日程の計算処理をdateに代入 -->
                        <?php $date = date('Y-m-d', strtotime($first_day . '+' . $i . 'day')); ?>
                        <input size="10" type="hidden" value="{{$date}}" name="date[]">
                        {{$date}}
                        <p>ページ</p>
                        <input id="page" class="first_page" name="first_page[]" size="10" type="hidden" value="{{$page}}">
                        {{$page}}~
                        @if($page+$daily_learning_page >= $last_page)
                            <input id="last_page" class="last_page" name="last_page[]" size="10" type="hidden" value="{{$last_page}}">
                            {{$last_page}}
                            @else
                            <input id="last_page" class="last_page" name="last_page[]" size="10" type="hidden" value="{{$page+$daily_learning_page}}">
                            {{$page+$daily_learning_page}}
                        @endif
                    @endif
                    @endfor
            </form>
        </div>
    </div>
</div>
@endsection
