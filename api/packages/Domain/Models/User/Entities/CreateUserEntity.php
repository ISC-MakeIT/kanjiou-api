<?php

namespace Packages\Domain\Models\User\Entities;

final class CreateUserEntity
{
    private CreateUser $user;
    private ?CreateAdminUser $adminUser;

    public function __construct(
        CreateUser $user,
        ?CreateAdminUser $adminUser,
    )
    {
        $this->user = $user;
        $this->adminUser = $adminUser;
    }

    public function user(): CreateUser
    {
        return $this->user;
    }

    public function isAdmin(): bool
    {
        return !is_null($this->adminUser);
    }
}
