<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Models\User\Entities\InitUser;
use Packages\Domain\Models\User\ValueObjects\Password;
use Packages\Domain\Models\User\ValueObjects\Username;

class CreateUserRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
		];
	}

    public function ofDomain(): InitUser
    {
        return new InitUser(
            Username::of($this->username),
            Password::of($this->password)
        );
    }
}
