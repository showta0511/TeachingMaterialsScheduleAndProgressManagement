<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForTheGoalRequest extends FormRequest
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
            "title"=>"required",'max:100',
        ];
    }

    public function messages()
    {
        return [
            "title.required"=>"理想に必要な要素を入力してください",
            "title.max:100"=>"100文字以内で入力してください",
        ];
    }
}
