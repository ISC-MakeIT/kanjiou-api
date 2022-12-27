<?php

namespace Packages\Service\User\Command;

use Packages\Domain\User\Entities\InitUser;
use Packages\Exception\User\IllegalExistsUserInDatabaseException;
use Packages\Infrastructure\Repositories\User\RegisterUserRepository;
use Packages\Infrastructure\Repositories\User\UserListRepository;

final class RegisterUserService {
    private RegisterUserRepository $registerUserRepository;
    private UserListRepository $userListRepository;

    public function __construct(
        RegisterUserRepository $registerUserRepository,
        UserListRepository $userListRepository
    ) {
        $this->registerUserRepository = $registerUserRepository;
        $this->userListRepository     = $userListRepository;
    }

    public function registerUser(InitUser $initUser): void {
        $userList = $this->userListRepository->userList();

        if ($userList->hasItem()) {
            throw new IllegalExistsUserInDatabaseException();
        }

        $this->registerUserRepository->registerUser($initUser);
    }
}
