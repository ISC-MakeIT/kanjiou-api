<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeLimitRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
			'seconds.request' => '秒数は必須項目です',
			'seconds.integer' => '秒数は数字型でなければなりません',
			'seconds.max'     => '秒数は60文字以下でなければなりません',
		];
	}

	public function rules()
	{
		return [
			'seconds' => ['required', 'integer', 'max:60'],
		];
	}
}
