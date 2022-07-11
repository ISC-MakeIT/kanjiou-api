<?php

namespace Packages\Domain\Models\TimeLimit\Entities;

use Carbon\Carbon;

final class TimeLimitEntity
{
    private TimeLimit $timeLimit;
    private ?TimeLimitDelete $timeLimitDelete;

    public function __construct(
        TimeLimit $timeLimit,
        ?TimeLimitDelete $timeLimitDelete,
    )
    {
        $this->timeLimit = $timeLimit;
        $this->timeLimitDelete = $timeLimitDelete;
    }

    public function timeLimit(): TimeLimit
    {
        return $this->timeLimit;
    }

    public function isDeleted(): bool
    {
        return !is_null($this->timeLimitDelete);
    }
}
