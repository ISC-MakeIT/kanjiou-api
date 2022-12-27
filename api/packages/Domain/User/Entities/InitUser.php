<?php

namespace Packages\Domain\User\Entities;

use Packages\Domain\User\ValueObjects\Password;
use Packages\Domain\User\ValueObjects\UserName;

final class InitUser {
    private UserName $userName;
    private Password $password;

    private function __construct(
        UserName $userName,
        Password $password,
    ) {
        $this->userName = $userName;
        $this->password = $password;
    }

    public function userName(): UserName {
        return $this->userName;
    }

    public function password(): Password {
        return $this->password;
    }

    public function toJson(): array {
        return [
            'user_name' => $this->userName()->value(),
            'password'  => $this->password()->value(),
        ];
    }

    public static function from(
        UserName $userName,
        Password $password,
    ): InitUser {
        return new InitUser(
            $userName,
            $password,
        );
    }
}
