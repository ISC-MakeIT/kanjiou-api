<?php

namespace Packages\Domain\Models\TimeLimit\Entities;

use Carbon\Carbon;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;

final class TimeLimitDelete
{
    private TimeLimitId $timeLimitId;
    private Carbon $createdAt;

    public function __construct(
        TimeLimitId $timeLimitId,
        Carbon $createdAt,
    )
    {
        $this->timeLimitId = $timeLimitId;
        $this->createdAt = $createdAt;
    }

    public function timeLimitId(): TimeLimitId
    {
        return $this->timeLimitId;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
