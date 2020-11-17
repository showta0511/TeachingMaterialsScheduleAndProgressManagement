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
                @for ($i=0; $i<=$learning_period; $i++)
                    <input type="hidden" name="user_id[]" value="{{Auth::id()}}">
                    <input type="hidden" name="for_goal_id[]" value="{{$for_goal_id}}">
                    <input type="hidden" name="setting_schedule_id[]" value="{{$setting_schedule}}">
                    <label for="date">日程</label><br>
                    <!-- 日程の計算処理をdateに代入 -->
                    <?php
                    $date= date('Y-m-d', strtotime($first_day . '+' . $i . 'day'));
                    ?>
                    <input size="10" type="date" value="{{$date}}" name="date[]"><br>
                    <label for="page">ページ</label><br>
                    <!-- 開始ページの計算処理を$pageに代入 -->
                    <?php $page = $first_page + ($daily_learning_page * $i) ?>

                    <input id="page" class="first_page" name="first_page[]" size="10" type="number" value="{{$page}}">~
                    @if($page+$daily_learning_page<=$last_page)
                    <input id="last_page" class="last_page" name="last_page[]" size="10" type="number" value="{{$page+$daily_learning_page}}"><br>
                    @endif
                    @if($page+$daily_learning_page>$last_page)
                    <input id="last_page" class="last_page" name="last_page[]" size="10" type="number" value="{{$last_page}}"><br>
                    @endif
                    @endfor
                    <input type="submit">
            </form>
        </div>
    </div>
</div>
@endsection
