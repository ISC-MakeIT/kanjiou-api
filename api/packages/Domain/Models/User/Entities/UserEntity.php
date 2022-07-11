<?php

namespace Packages\Domain\Models\User\Entities;

final class UserEntity
{
    private User $user;
    private ?AdminUser $adminUser;

    public function __construct(
        User $user,
        ?AdminUser $adminUser,
    )
    {
        $this->user = $user;
        $this->adminUser = $adminUser;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function isAdmin(): bool
    {
        return !is_null($this->adminUser);
    }
}
