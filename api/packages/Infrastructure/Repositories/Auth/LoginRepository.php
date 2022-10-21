<?php

namespace Packages\Infrastructure\Repositories\Auth;

use Packages\Domain\Models\Auth\Entities\InitLogin;
use Packages\Infrastructure\Repositories\Exceptions\Auth\FailLoginException;

final class LoginRepository {
    public function login(InitLogin $initLogin): void {
        if (auth()->attempt($initLogin->ofJson())) return;

        throw new FailLoginException();
    }
}
