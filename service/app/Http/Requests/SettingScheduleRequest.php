<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "teaching_material_id"=>"required",
            "to_learn"=>"required",'max:150',
            "content"=>'max:200',
            "first_day"=>"required",
            // "last_day"=>"required",
            // "daily_learning_page"=>"required",
            "first_page"=>"required",
            "last_page"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "teaching_material_id.required"=>"教材を入力してください",
            "to_learn.required"=>"学びたい、習得したい事を入力してください",
            "content.max:200"=>"内容は200文字以内で入力してください",
            "first_day.required"=>"教材の開始日を入力してください",
            // "last_day.required"=>"教材の終了日を入力してください",
            // "daily_learning_page.required"=>"一日の一日の学習ページを入力してください",
            "first_page.required"=>"教材の開始位置を入力してください",
            "last_page.required"=>"教材の終了位置を入力してください",
        ];
    }
}
