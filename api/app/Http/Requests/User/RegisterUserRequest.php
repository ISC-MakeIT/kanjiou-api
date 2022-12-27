<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Error\Entities\ErrorList;
use Packages\Domain\User\Entities\InitUser;
use Packages\Domain\User\ValueObjects\Password;
use Packages\Domain\User\ValueObjects\UserName;

class RegisterUserRequest extends FormRequest {
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

    public function toDomain(): InitUser {
        $this->errorList = ErrorList::from([]);

        $initUser = InitUser::from(
            UserName::unsafetyFrom($this->userName),
            Password::unsafetyFrom($this->password)
        );

        $this->errorList = $this->errorList->addIfError($initUser->userName());
        $this->errorList = $this->errorList->addIfError($initUser->password());

        return $initUser;
    }
}
