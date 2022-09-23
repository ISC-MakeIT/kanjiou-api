<?php

namespace App\Http\Requests\TimeLimit;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Models\TimeLimit\Entities\InitTimeLimit;
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
		return [];
	}

    public function ofDomain(): InitTimeLimit
    {
        return new InitTimeLimit(
            Name::of($this->name),
            Seconds::of($this->seconds)
        );
    }
}
