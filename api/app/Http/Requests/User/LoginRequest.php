<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Error\Entities\ErrorList;
use Packages\Domain\User\Entities\UserToLogin;
use Packages\Domain\User\ValueObjects\Password;
use Packages\Domain\User\ValueObjects\UserName;

class LoginRequest extends FormRequest {
    private ErrorList $errorList;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function hasValidationError(): bool {
        $this->toDomain();
        return $this->errorList->hasValidationError();
    }

    public function validatedMessages(): array {
        $this->toDomain();
        return $this->errorList->validatedMessages();
    }

    public function toDomain(): UserToLogin {
        $this->errorList = ErrorList::from([]);

        $userToLogin = UserToLogin::from(
            UserName::unsafetyFrom($this->userName),
            Password::unsafetyFrom($this->password)
        );

        $this->errorList = $this->errorList->addIfError($userToLogin->userName());
        $this->errorList = $this->errorList->addIfError($userToLogin->password());

        return $userToLogin;
    }
}
