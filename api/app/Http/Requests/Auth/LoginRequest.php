<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Models\Auth\Entities\InitLogin;
use Packages\Domain\Models\User\ValueObjects\Password;
use Packages\Domain\Models\User\ValueObjects\Username;

class LoginRequest extends FormRequest
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

    public function ofDomain(): InitLogin
    {
        return new InitLogin(
            Username::of($this->username),
            Password::of($this->password)
        );
    }
}
