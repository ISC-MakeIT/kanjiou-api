<?php

namespace Packages\Infrastructure\Repositories\Auth;

final class LogoutRepository {
    public function logout(): void {
        auth()->logout();
    }
}
