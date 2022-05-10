<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeLimitDeleteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'time_limit_id' => ['required', 'exists:time_limits']
        ];
    }
}
