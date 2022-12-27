<?php

namespace Packages\Service\User\Command;

use Packages\Domain\User\Entities\UserToLogin;
use Packages\Infrastructure\Repositories\User\UserToLoginRepository;

final class UserToLoginService {
    private UserToLoginRepository $userToLoginRepository;

    public function __construct(UserToLoginRepository $userToLoginRepository) {
        $this->userToLoginRepository = $userToLoginRepository;
    }

    public function login(UserToLogin $userToLogin): void {
        $this->userToLoginRepository->login($userToLogin);
    }
}
