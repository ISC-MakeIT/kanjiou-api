<?php

namespace App\Http\Requests\TimeLimit;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Models\TimeLimit\Entities\CreateTimeLimit;
use Packages\Domain\Models\TimeLimit\ValueObjects\Name;
use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;

class CreateTimeLimitRequst extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name'    => [],
			'seconds' => [],
		];
	}

    public function ofDomain(): CreateTimeLimit
    {
        return new CreateTimeLimit(
            Name::of($this->name),
            Seconds::of($this->seconds)
        );
    }
}
