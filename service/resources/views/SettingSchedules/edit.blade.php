

@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-3" style="width: 30rem; height:860px; margin:30px auto 50px auto; padding-bottom:10px;">
            <div class="card-header">{{ __('スケジュール設定') }}</div>
            <div class="card-body" style="margin: 0 auto; ">
                <form action="{{route('setting_schedule.update',['setting_schedule'=>$setting_schedule])}}" method="post">
                    @csrf
                    @method("put")
                    <div class="">
                        <label for="teaching_material_id">教材</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <select name="teaching_material_id" id="teaching_material_id" class="form-control @error('teaching_material_id') is-invalid @enderror">
                            <option value='' disabled>Choose...</option>
                            <option value="{{$schedule_content->teaching_material->id}}">{{$schedule_content->teaching_material->title}}</option>
                            @foreach($teaching_materials as $teaching_material)
                            <option value="{{$teaching_material->id}}">{{$teaching_material->title}}</option>
                            @endforeach
                        </select>
                        @error('teaching_material_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="to_learn">学びたい、習得したい事</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <input class="form-control @error('to_learn') is-invalid @enderror" type="text" name="to_learn" value="{{$schedule_content->to_learn}}">
                        @error('to_learn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="first_day">開始日</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <input class="form-control @error('first_day') is-invalid @enderror" type="date" name="first_day" value="{{$schedule_content->first_day}}">
                        @error('first_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="last_day">終了日</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <input class="form-control @error('last_day') is-invalid @enderror" type="date" name="last_day" value="{{$schedule_content->last_day}}">
                        @error('last_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="first_page">開始ページ</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <input class="form-control @error('first_page') is-invalid @enderror" type="number" name="first_page" value="{{$schedule_content->first_page}}">
                        @error('first_page')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="last_page">終了ページ</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <input class="form-control @error('last_page') is-invalid @enderror" type="number" name="last_page" value="{{$schedule_content->last_page}}">
                        @error('last_page')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="daily_learning_page">一日の学習ページ</label>
                    </div>
                    <div class="form-group" style="margin:0 0 30px 0;">
                        <input class="form-control @error('daily_learning_page') is-invalid @enderror" type="number" name="daily_learning_page" value="{{$schedule_content->daily_learning_page}}">
                        @error('daily_learning_page')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <input type="submit" class="btn edit-btn btn-link mt-3 mb-5" style="width: 180px; margin: 100px " value="作成">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
