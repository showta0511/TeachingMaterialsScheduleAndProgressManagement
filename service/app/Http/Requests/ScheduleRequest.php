<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            "date"=>["date","required"],
            "first_page"=>["integer","required"],
            "last_page"=>["integer","required"],
        ];
    }

    public function messages()
    {
        return [
            "date.required"=>"教材を入力してください",
            "date.date"=>"データ型で入力してください",
            "first_page.integer"=>"数値型で入力してください",
            "first_page.required"=>"教材の開始ページを入力してください",
            "last_page.integer"=>"数値型で入力してください",
            "last_page.required"=>"教材の終了ページを入力してください",
        ];
    }
}
