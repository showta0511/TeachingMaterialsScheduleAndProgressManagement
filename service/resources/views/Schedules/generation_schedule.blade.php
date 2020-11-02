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
            <form action="{{route('schedule.store')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" name="for_goal_id" value="{{$for_goal_id}}">
                <input type="hidden" name="setting_schedule_id" value="{{$setting_schedule}}">
                <table>
                    <thead>
                        <tr>
                            <th>日程</th>
                        </tr>
                    </thead>
                    <tbody style="height: 1000px;">
                        @while($first_day < $end_date_of_learning)
                        <tr>
                            <td>
                                <input size="10" type="date" value="{{$first_day}}" name="date">
                            </td>
                        </tr>
                        <?php $first_day = date('Y-m-d', strtotime($first_day . '+1 day'))?>
                        @endwhile
                        <input type="submit" value="作成">
                    </tbody>
                </table>

                <table>
                    <thead>
                        <tr>
                            <th><label for="page">ページ</label></th>
                        </tr>
                    </thead>
                    <tbody style="height: 1000px;">
                            @for($i=$first_page; $i<$last_page; $i=$i+$daily_learning_page)
                            <tr>
                                <td>
                                    <input id="page" class="first_page" name="first_page" size="10" type="number" value="{{$i}}">~<input id="last_page" class="last_page" name="last_page" size="10" type="number" value="{{$i+$daily_learning_page}}">
                                </td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
