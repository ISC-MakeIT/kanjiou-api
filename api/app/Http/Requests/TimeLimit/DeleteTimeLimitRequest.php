<?php

namespace App\Http\Requests\TimeLimit;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;

class DeleteTimeLimitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'time_limit_id' => []
        ];
    }

    public function ofDomain(): TimeLimitId
    {
        return TimeLimitId::of($this->time_limit_id);
    }
}
