<?php

namespace Packages\Service\Auth\Query;

use Packages\Domain\Models\Auth\Entities\InitLogin;
use Packages\Infrastructure\Repositories\Auth\LoginRepository;
use Packages\Infrastructure\Repositories\Auth\LogoutRepository;

final class AuthService
{
    private LoginRepository $loginRepository;
    private LogoutRepository $logoutRepository;

    public function __construct(
        LoginRepository $loginRepository,
        LogoutRepository $logoutRepository
    )
    {
        $this->loginRepository = $loginRepository;
        $this->logoutRepository = $logoutRepository;
    }

    public function login(InitLogin $initLogin): void {
        $this->loginRepository->login($initLogin);
    }

    public function logout(): void {
        $this->logoutRepository->logout();
    }
}
