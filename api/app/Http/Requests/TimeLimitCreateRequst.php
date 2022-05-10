<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeLimitCreateRequst extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function time_limit_data()
	{
		return $this->only('seconds', 'name');
	}

	public function messages()
	{
		return [
			'seconds.required' => '秒数は必須項目です',
			'seconds.integer'  => '秒数は数字型でなければなりません',
			'seconds.max'      => '秒数は60文字以下でなければなりません',

			'name.required' => '名前は必須項目です',
			'name.string'   => '名前は文字列型でなければなりません',
			'name.max'      => '名前は8文字以下でなければなりません',
		];
	}

	public function rules()
	{
		return [
			'seconds' => ['required', 'integer', 'max:60'],
			'name'    => ['required', 'string', 'max:8'],
		];
	}
}
