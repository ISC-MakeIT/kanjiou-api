<?php

namespace Packages\Domain\Models\TimeLimit\Entities;

use Packages\Domain\Models\TimeLimit\ValueObjects\Name;
use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;

final class InitTimeLimit
{
    private Name $name;
    private Seconds $seconds;

    public function __construct(
        Name $name,
        Seconds $seconds,
    )
    {
        $this->name = $name;
        $this->seconds = $seconds;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function seconds(): Seconds
    {
        return $this->seconds;
    }
}
