<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
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
            "title"=>["string","required",'max:100'],
            "motive"=>["string","required",'max:200'],
        ];
    }

    public function messages()
    {
        return [
            "title.string"=>"文字列型で入力してください",
            "motive.string"=>"文字列型で入力してください",
            "title.required"=>"理想を入力してください",
            "title.max"=>"100文字以内で入力してください",
            "motive.max"=>"200文字以内で入力してください",
            "motive.required"=>"動機を入力してください"
        ];
    }
}
