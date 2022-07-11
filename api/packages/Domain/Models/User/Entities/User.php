<?php

namespace Packages\Domain\Models\User\Entities;

use Carbon\Carbon;
use Packages\Domain\Models\User\ValueObjects\Email;
use Packages\Domain\Models\User\ValueObjects\Password;
use Packages\Domain\Models\User\ValueObjects\UserId;

final class User
{
    private UserId $userId;
    private Email $email;
    private Password $password;
    private Carbon $createdAt;

    public function __construct(
        UserId $userId,
        Email $email,
        Password $password,
        Carbon $createdAt,
    )
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
