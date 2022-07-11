<?php

namespace App\Http\Requests\TimeLimit;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;

class TimeLimitRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'seconds' => [],
		];
	}

    public function ofDomain(): Seconds
    {
        return Seconds::of($this->seconds);
    }
}
