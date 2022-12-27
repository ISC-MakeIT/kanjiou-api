<?php

namespace Packages\Infrastructure\Repositories\User;

use Packages\Domain\User\Entities\UserToLogin;
use Packages\Exception\User\FailUserToLoginException;

final class UserToLoginRepository {
    public function login(UserToLogin $userToLogin): void {
        if (auth()->attempt($userToLogin->toJson())) {
            return;
        }

        throw new FailUserToLoginException();
    }
}
