<?php

namespace Packages\Domain\Models\Auth\Entities;

use Packages\Domain\Models\User\ValueObjects\Password;
use Packages\Domain\Models\User\ValueObjects\Username;

final class InitLogin {
    private Username $username;
    private Password $password;

    public function __construct(
        Username $username,
        Password $password
    )
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function username(): Username {
        return $this->username;
    }

    public function password(): Password {
        return $this->password;
    }

    public function ofJson(): array {
        return [
            'username' => $this->username->value(),
            'password' => $this->password->value(),
        ];
    }
}
