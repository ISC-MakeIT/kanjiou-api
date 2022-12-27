<?php

namespace Packages\Service\User\Command;

use Packages\Infrastructure\Repositories\User\UserToLogoutRepository;

final class UserToLogoutService {
    private UserToLogoutRepository $userToLogoutRepository;

    public function __construct(UserToLogoutRepository $userToLogoutRepository) {
        $this->userToLogoutRepository = $userToLogoutRepository;
    }

    public function logout(): void {
        $this->userToLogoutRepository->logout();
    }
}
