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
            "teaching_material_id"=>["required",'integer'],
            "to_learn"=>["string","required",'max:150'],
            "content"=>["string",'max:200'],
            "first_day"=>["date","required"],
            "first_page"=>["integer","required"],
            "last_page"=>["integer","required"],
        ];
    }

    public function messages()
    {
        return [
            "teaching_material_id.required"=>"教材を入力してください",
            "to_learn.string"=>"学びたい、習得したい事を入力してください",
            "to_learn.required"=>"学びたい、習得したい事を入力してください",
            "content.string"=>"内容は文字列型で入力してください",
            "content.max:200"=>"内容は200文字以内で入力してください",
            "first_day.date"=>"日付型で入力してください",
            "first_day.required"=>"教材の開始日を入力してください",
            "first_page.integer"=>"数値型で入力してください",
            "first_page.required"=>"教材の開始位置を入力してください",
            "last_page.integer"=>"数値型で入力してください",
            "last_page.required"=>"教材の終了位置を入力してください",
        ];
    }
}
