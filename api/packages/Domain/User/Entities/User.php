<?php

namespace Packages\Domain\User\Entities;

use Packages\Domain\User\ValueObjects\UserName;

final class User {
    private UserName $userName;

    private function __construct(UserName $userName) {
        $this->userName = $userName;
    }

    public static function from(UserName $userName): User {
        return new User($userName);
    }
}
