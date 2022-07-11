<?php

namespace Packages\Domain\Models\User\Entities;

use Carbon\Carbon;
use Packages\Domain\Models\User\ValueObjects\UserId;

final class AdminUser
{
    private UserId $userId;
    private Carbon $createdAt;

    public function __construct(
        UserId $userId,
        Carbon $createdAt,
    )
    {
        $this->userId = $userId;
        $this->createdAt = $createdAt;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
