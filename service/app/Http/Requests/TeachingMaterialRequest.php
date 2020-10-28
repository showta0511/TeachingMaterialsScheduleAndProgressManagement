<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeachingMaterialRequest extends FormRequest
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
            "title"=>"required",'max:50',
            "content"=>'max:200',
            "first_page"=>"required",
            "last_page"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "title.required"=>"教材を入力してください",
            "title.max:50"=>"教材は50文字以内で入力してください",
            "content.max:200"=>"内容は200文字以内で入力してください",
            "first_page.required"=>"教材の開始位置を入力してください",
            "last_page.required"=>"教材の終了位置を入力してください",
        ];
    }
}
