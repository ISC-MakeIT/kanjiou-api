<?php

namespace Packages\Domain\Models\TimeLimit\Entities;

use Carbon\Carbon;
use Packages\Domain\Models\TimeLimit\ValueObjects\Name;
use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;

final class TimeLimit
{
    private TimeLimitId $timeLimitId;
    private Name $name;
    private Seconds $seconds;
    private Carbon $createdAt;

    public function __construct(
        TimeLimitId $timeLimitId,
        Name $name,
        Seconds $seconds,
        Carbon $createdAt,
    )
    {
        $this->timeLimitId = $timeLimitId;
        $this->name = $name;
        $this->seconds = $seconds;
        $this->createdAt = $createdAt;
    }

    public function timeLimitId(): TimeLimitId
    {
        return $this->timeLimitId;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function seconds(): Seconds
    {
        return $this->seconds;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
