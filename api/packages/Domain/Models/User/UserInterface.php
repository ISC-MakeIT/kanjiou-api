<?php

namespace Packages\Domain\Models\User;

use Packages\Domain\Models\User\Entities\CreateUserEntity;

interface UserInterface
{
    public function createUser(CreateUserEntity $createUserEntity): void;
}
