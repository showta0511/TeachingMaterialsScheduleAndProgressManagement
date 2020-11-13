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

        <form action="{{route('setting_schedule.update',['setting_schedule'=>$setting_schedule])}}" method="post">
                @csrf
                @method("put")
                <div class="form-group">
                    <label for="teaching_material_id">教材</label>
                    <input type="hidden" name="teaching_material_id" value="{{$schedule_content->teaching_material->id}}">
                    {{$schedule_content->teaching_material->title}}
                </div>
                <div class="form-group">
                    <label for="to_learn">学びたい、習得したい事</label>
                    <input class=" is-invalid" type="text" name="to_learn" value="{{$schedule_content->to_learn}}">

                    @if($errors->has('to_learn'))
                    @foreach($errors->get('to_learn') as $message)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="first_day">開始日</label>
                    <input class=" is-invalid"　id="first_day" name="first_day" type="date" value="{{$schedule_content->first_day}}" />
                    @if($errors->has('first_day'))
                    @foreach($errors->get('first_day') as $message)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="last_day">終了日</label>
                    <input class=" is-invalid"　id="last_day" name="last_day" type="date" value="{{$schedule_content->last_day}}" />
                    @if($errors->has('last_day'))
                    @foreach($errors->get('last_day') as $message)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="first_page">開始ページ</label>
                    <input class=" is-invalid"　id="first_page" name="first_page" value="{{$schedule_content->first_page}}" />
                    @if($errors->has('first_page'))
                    @foreach($errors->get('first_page') as $message)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="last_page">終了ページ</label>
                    <input class=" is-invalid"　id="last_page" name="last_page" value="{{$schedule_content->last_page}}">
                    @if($errors->has('last_page'))
                    @foreach($errors->get('last_page') as $message)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="daily_learning_page">一日の学習ページ</label>
                    <input class=" is-invalid" id="daily_learning_page" rows="3" name="daily_learning_page" value="{{$schedule_content->daily_learning_page}}">
                    @if($errors->has('daily_learning_page'))
                        <span class="invalid-feedback">
                        {{$errors->first('daily_learning_page')}}
                        </span>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
