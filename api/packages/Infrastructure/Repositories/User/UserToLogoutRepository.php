<?php

namespace Packages\Infrastructure\Repositories\User;

final class UserToLogoutRepository {
    public function logout(): void {
        auth()->logout();
    }
}
