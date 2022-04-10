<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RankedRegisterRequst extends FormRequest
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

    public function get_data() {
        return $this->only("seconds", "name");
    }

    public function messages() {
        return [
            "seconds.request" => "秒数は必須項目です",
            "seconds.integer" => "秒数は数字型でなければなりません",
            "seconds.max" => "秒数は60文字以下でなければなりません",

            "name.request" => "名前は必須項目です",
            "name.string" => "名前は文字列型でなければなりません",
            "name.max" => "名前は8文字以下でなければなりません",
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "seconds" => ["required", "integer", "max:60"],
            "name" => ["required", "string", "max:8"],
        ];
    }
}
